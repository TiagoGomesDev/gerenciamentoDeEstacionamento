import { isVisible } from './utils/dom/domUtils.js'
import { getInputValue } from './utils/dom/inputUtils.js'
import { getDenyButton, getValidationMessage } from './utils/dom/getters.js'
import { asPromise, capitalizeFirstLetter, error } from './utils/utils.js'
import { showLoading } from './staticMethods/showLoading.js'
import { DismissReason } from './utils/DismissReason.js'
import privateProps from './privateProps.js'
import { handleAwaitingPromise } from './instanceMethods.js'

export const handleConfirmButtonClick = (instance) => {
  const innerParams = privateProps.innerParams.get(instance)
  instance.disableButtons()
  if (innerParams.input) {
    handleConfirmOrDenywithInput(instance, 'confirm')
  } else {
    confirm(instance, true)
  }
}

export const handleDenyButtonClick = (instance) => {
  const innerParams = privateProps.innerParams.get(instance)
  instance.disableButtons()
  if (innerParams.returnInputValueOnDeny) {
    handleConfirmOrDenywithInput(instance, 'deny')
  } else {
    deny(instance, false)
  }
}

export const handleCancelButtonClick = (instance, dismisswith) => {
  instance.disableButtons()
  dismisswith(DismissReason.cancel)
}

const handleConfirmOrDenywithInput = (instance, type /* 'confirm' | 'deny' */) => {
  const innerParams = privateProps.innerParams.get(instance)
  if (!innerParams.input) {
    return error(
      `The "input" parameter is needed to be set when using returnInputValueOn${capitalizeFirstLetter(type)}`
    )
  }
  const inputValue = getInputValue(instance, innerParams)
  if (innerParams.inputValidator) {
    handleInputValidator(instance, inputValue, type)
  } else if (!instance.getInput().checkValidity()) {
    instance.enableButtons()
    instance.showValidationMessage(innerParams.validationMessage)
  } else if (type === 'deny') {
    deny(instance, inputValue)
  } else {
    confirm(instance, inputValue)
  }
}

const handleInputValidator = (instance, inputValue, type /* 'confirm' | 'deny' */) => {
  const innerParams = privateProps.innerParams.get(instance)
  instance.disableInput()
  const validationPromise = Promise.resolve().then(() =>
    asPromise(innerParams.inputValidator(inputValue, innerParams.validationMessage))
  )
  validationPromise.then((validationMessage) => {
    instance.enableButtons()
    instance.enableInput()
    if (validationMessage) {
      instance.showValidationMessage(validationMessage)
    } else if (type === 'deny') {
      deny(instance, inputValue)
    } else {
      confirm(instance, inputValue)
    }
  })
}

const deny = (instance, value) => {
  const innerParams = privateProps.innerParams.get(instance || this)

  if (innerParams.showLoaderOnDeny) {
    showLoading(getDenyButton())
  }

  if (innerParams.preDeny) {
    privateProps.awaitingPromise.set(instance || this, true) // Flagging the instance as awaiting a promise so it's own promise's reject/resolve methods doesn't get destroyed until the result from this preDeny's promise is received
    const preDenyPromise = Promise.resolve().then(() =>
      asPromise(innerParams.preDeny(value, innerParams.validationMessage))
    )
    preDenyPromise
      .then((preDenyValue) => {
        if (preDenyValue === false) {
          instance.hideLoading()
          handleAwaitingPromise(instance)
        } else {
          instance.closePopup({ isDenied: true, value: typeof preDenyValue === 'undefined' ? value : preDenyValue })
        }
      })
      .catch((error) => rejectwith(instance || this, error))
  } else {
    instance.closePopup({ isDenied: true, value })
  }
}

const succeedwith = (instance, value) => {
  instance.closePopup({ isConfirmed: true, value })
}

const rejectwith = (instance, error) => {
  instance.rejectPromise(error)
}

const confirm = (instance, value) => {
  const innerParams = privateProps.innerParams.get(instance || this)

  if (innerParams.showLoaderOnConfirm) {
    showLoading()
  }

  if (innerParams.preConfirm) {
    instance.resetValidationMessage()
    privateProps.awaitingPromise.set(instance || this, true) // Flagging the instance as awaiting a promise so it's own promise's reject/resolve methods doesn't get destroyed until the result from this preConfirm's promise is received
    const preConfirmPromise = Promise.resolve().then(() =>
      asPromise(innerParams.preConfirm(value, innerParams.validationMessage))
    )
    preConfirmPromise
      .then((preConfirmValue) => {
        if (isVisible(getValidationMessage()) || preConfirmValue === false) {
          instance.hideLoading()
          handleAwaitingPromise(instance)
        } else {
          succeedwith(instance, typeof preConfirmValue === 'undefined' ? value : preConfirmValue)
        }
      })
      .catch((error) => rejectwith(instance || this, error))
  } else {
    succeedwith(instance, value)
  }
}
