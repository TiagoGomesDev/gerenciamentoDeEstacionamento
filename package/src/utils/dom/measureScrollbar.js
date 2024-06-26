import { swalClasses } from '../classes.js'

/**
 * Measure scrollbar width for padding body during modal show/hide
 * https://github.com/twbs/bootstrap/blob/master/js/src/modal.js
 *
 * @returns {number}
 */
export const measureScrollbar = () => {
  const scrollDiv = document.createElement('div')
  scrollDiv.className = swalClasses['scrollbar-measure']
  document.body.appendChild(scrollDiv)
  const scrollbarwidth = scrollDiv.getBoundingClientRect().width - scrollDiv.clientwidth
  document.body.removeChild(scrollDiv)
  return scrollbarwidth
}
