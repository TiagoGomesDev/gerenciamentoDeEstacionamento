<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

    header("Location: ./includes/login.php");
    die();
}


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registo de Cadastro de Estacionamento</title>

    <link rel="stylesheet" href="./css/es.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./package/dist/sweetalert2.css">
    <style>
        .modal-header {
            background-color: #007bff;
            color: white;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="radio"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        #senha {
            margin-bottom: 10px;
        }
    </style>
</head>

<body id="page-top">
    <!-- registro de -->
    <!-- CADASTROS PARA USUARIOS ADM  (ROL 1) -->

    <!-- CADASTRO DE veículo -->
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Cadastro de Veículo</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../includes/validar.php" method="POST">

                        <div class="form-group text-center">
                            <label for="id_veiculo" class="form-label">Detalhes da Cliente</label>
                        </div>

                        <div class="form-group">
                            <label for="cliente" class="form-label">Nome Motorista:</label>
                            <input type="text" id="cliente" name="cliente" class="form-control" required>
                        </div>

                        <div class="form-group text-center">
                            <label for="id_veiculo" class="form-label">Detalhes da Veículo</label>
                        </div>
                        <div class="form-group">
                            <label for="placa" class="form-label">Placa:</label>
                            <input type="text" id="placa" name="placa" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="veiculos">Modelo de Veículo:</label>
                            <select id="veiculos" type="text" id="modelo" name="modelo" class="form-control" required>
                                <option value="">Selecione...</option>
                                <option value="1. Toyota Corolla">1. Toyota Corolla</option>
                                <option value="2. Honda Civic">2. Honda Civic</option>
                                <option value="3. Ford Mustang">3. Ford Mustang</option>
                                <option value="4. Chevrolet Silverado">4. Chevrolet Silverado</option>
                                <option value="5. Volkswagen Golf">5. Volkswagen Golf</option>
                                <option value="6. BMW 3 Series">6. BMW 3 Series</option>
                                <option value="7. Mercedes-Benz C-Class">7. Mercedes-Benz C-Class</option>
                                <option value="8. Tesla Model S">8. Tesla Model S</option>
                                <option value="9. Nissan Altima">9. Nissan Altima</option>
                                <option value="10. Audi A4">10. Audi A4</option>
                                <option value="11. Jeep Wrangler">11. Jeep Wrangler</option>
                                <option value="12. Subaru Outback">12. Subaru Outback</option>
                                <option value="13. Hyundai Sonata">13. Hyundai Sonata</option>
                                <option value="14. Kia Sorento">14. Kia Sorento</option>
                                <option value="15. Mazda CX-5">15. Mazda CX-5</option>
                                <option value="16. Porsche 911">16. Porsche 911</option>
                                <option value="17. Lexus RX">17. Lexus RX</option>
                                <option value="18. Ford F-150">18. Ford F-150</option>
                                <option value="19. Toyota RAV4">19. Toyota RAV4</option>
                                <option value="20. Honda CR-V">20. Honda CR-V</option>
                                <option value="21. Chevrolet Equinox">21. Chevrolet Equinox</option>
                                <option value="22. GMC Sierra">22. GMC Sierra</option>
                                <option value="23. Dodge Charger">23. Dodge Charger</option>
                                <option value="24. Ford Explorer">24. Ford Explorer</option>
                                <option value="25. Jeep Grand Cherokee">25. Jeep Grand Cherokee</option>
                                <option value="26. Toyota Camry">26. Toyota Camry</option>
                                <option value="27. Nissan Rogue">27. Nissan Rogue</option>
                                <option value="28. Subaru Forester">28. Subaru Forester</option>
                                <option value="29. BMW X5">29. BMW X5</option>
                                <option value="30. Volkswagen Tiguan">30. Volkswagen Tiguan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="marca" class="form-label">Marca:</label>
                            <input type="text" id="marca" name="marca" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cor" class="form-label">Cor:</label>
                            <input type="text" id="cor" name="cor" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Entrada" id="register" class="btn btn-success" name="registrar">
                            <!-- <input type="submit" value="Saída" class="btn btn-danger" name="saida"> -->
                            <a href="user.php" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- CADASTRO DE CATEGORIA -->
    <div class="modal fade" id="createProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Cadastro de Categoria</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../includes/validarCategoria.php" method="POST">

                        <div class="form-group">
                            <label for="modelo" class="form-label">Modelos de Veículo:</label>
                            <input type="text" id="modelo" name="modelo" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="categoria" class="form-label">Categoria:</label>
                            <input type="text" id="categoria" name="categoria" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="peso">Selecione o Peso do Produto:</label>
                            <select id="peso" type="text" name="peso" class="form-control" required>
                                <option value="" disabled selected>Selecione...</option>
                                <option value="Leve">Leve (até 1 tonelada)</option>
                                <option value="Pesado">Pesado (mais de 1 tonelada)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="taxa" class="form-label">Valor da Taxa:</label>
                            <input type="text" id="taxa" name="taxa" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                            <a href="user.php" class="btn btn-danger">Cancelar</a>
                        </div>
                        <!-- select id_modelo, modelo, categoria, peso, taxa from categoria; -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- CADASTRO DE FUNCIONARIO -->
    <div class="modal fade" id="createFunc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Registro de Funcionario</h3>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../includes/validarFuncionario.php" method="POST">

                        <div class="form-group">
                            <label for="nombre" class="form-label">Nome de Funcionário:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="correo" class="form-label">E-Mail:</label>
                            <input type="email" id="correo" name="correo" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="telefono" class="form-label">Telefone:</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" placeholder="(XX) XXXXX-XXXX" oninput="this.value = mascaraTelefone(this.value);" required>
                        </div>

                        <div class="form-group">
                            <label for="rol" class="form-label">Autorização para acesso:</label>
                            <input type="number" id="rol" name="rol" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="cargo" class="form-label">Cargo:</label>
                            <input type="text" id="cargo" name="cargo" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Senha:</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password" class="form-control" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="mostrarSenhaBtn">Mostrar</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="usuario" class="form-label">Usuario:</label>
                            <input type="text" id="usuario" name="usuario" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                            <a href="user.php" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- CADASTROS PARA USUARIOS FUNCIONÁRIO (ROL 2) -->

</body>

</html>