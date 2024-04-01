<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar == '') {

    header("Location: ../includes/login.php");
    die();
}

$id_veiculo = $_GET['id_veiculo'];
$conexion = mysqli_connect("localhost", "root", "", "wi");
// $consulta = "SELECT 
// id_venda, vl_passado, vl_retirado, taxa, nsu, status, fk_cliente, fk_funcionario, fk_parceiro,
// nombre as n_func, id_cliente, n_cliente, cpf_cnpj, rg, endereco, tel_cel, 
// id_status, nome_status
// FROM vendas AS vend
// INNER JOIN clientes AS c ON c.id_cliente = vend.fk_cliente
// INNER JOIN user AS u ON u.id = vend.fk_funcionario
// INNER JOIN status AS st ON st.id_status = vend.status            
// WHERE id_venda = $id_venda";
$consulta = "SELECT      
id_veiculo, placa, cliente, marca, modelo, cor, data_entrada, data_saida 
FROM veiculos AS vc
WHERE id_veiculo = $id_veiculo";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Venda</title>

    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/es.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
            padding: 10px 0;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
        }

        .btn-primary,
        .btn-secondary {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            margin-right: 10px;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Veículo Estacionado
            </div>
            <div class="card-body">
                <form action="../includes/_functions.php" method="POST">
                    <div class="form-group">
                        <label for="id_veiculo">ID da Veículo:</label>
                        <input type="text" class="form-control" id="id_veiculo" name="id_veiculo" value="<?php echo $usuario['id_veiculo']; ?>" readonly>
                    </div>
                    <!-- select id_veiculo, data_entrada, cliente, marca, 
modelo, cor, data_entrada, data_saida from veiculos; -->

                    <div class="form-group">
                        <label for="placa">Placa:</label>
                        <input type="text" class="form-control" id="placa" name="placa" value="<?php echo $usuario['placa']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="cliente">Cliente:</label>
                        <input type="text" class="form-control" id="cliente" name="cliente" value="<?php echo $usuario['cliente']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="marca">Marca:</label>
                        <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $usuario['marca']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo:</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $usuario['modelo']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="cor">Cor:</label>
                        <input type="text" class="form-control" id="cor" name="cor" value="<?php echo $usuario['cor']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="data_entrada">Data Entrada:</label>
                        <input type="text" class="form-control" id="data_entrada" name="data_entrada" value="<?php echo $usuario['data_entrada']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="data_saida">Data Saída:</label>
                        <input type="text" class="form-control" id="data_saida" name="data_saida" value="<?php echo $usuario['data_saida']; ?>" readonly>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="data_saida">Data Saída:</label>
                        <input type="submit" value="Saída" class="btn btn-danger" name="saida">
                    </div> -->

                    <!-- Botão de Saída -->
                    <button type="button" class="btn btn-danger" id="btnSaida">Saída</button>

                    <!-- Campos ocultos e botões de submit -->
                    <input type="hidden" name="accion" value="editar_registro">
                    <input type="hidden" name="id_veiculo" value="<?php echo $usuario['id_veiculo']; ?>">


                    <!-- <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status">-->
                    <!-- Aqui você pode incluir as opções de status -->
                    <!--<option value="1" <?php if ($usuario['status'] == 1) echo 'selected'; ?>>Pago</option>
                            <option value="2" <?php if ($usuario['status'] == 2) echo 'selected'; ?>>Não Pago</option>
                            <option value="3" <?php if ($usuario['status'] == 3) echo 'selected'; ?>>Concluído</option>
                            <option value="4" <?php if ($usuario['status'] == 4) echo 'selected'; ?>>Pendente</option>
                            <option value="5" <?php if ($usuario['status'] == 5) echo 'selected'; ?>>Ativo</option>
                            <option value="6" <?php if ($usuario['status'] == 6) echo 'selected'; ?>>Inativo</option>
                            <option value="7" <?php if ($usuario['status'] == 7) echo 'selected'; ?>>Aberto</option>
                            <option value="8" <?php if ($usuario['status'] == 8) echo 'selected'; ?>>Fechado</option>
                            <option value="9" <?php if ($usuario['status'] == 9) echo 'selected'; ?>>Em Andamento</option>
                            <option value="10" <?php if ($usuario['status'] == 10) echo 'selected'; ?>>Encerrado</option>
                            <option value="11" <?php if ($usuario['status'] == 11) echo 'selected'; ?>>Aprovado</option>
                            <option value="12" <?php if ($usuario['status'] == 12) echo 'selected'; ?>>Reprovado</option>
                            <option value="13" <?php if ($usuario['status'] == 13) echo 'selected'; ?>>Enviado</option>
                            <option value="14" <?php if ($usuario['status'] == 14) echo 'selected'; ?>>Não Enviado</option>
                            <option value="15" <?php if ($usuario['status'] == 15) echo 'selected'; ?>>Agendado</option>
                            <option value="16" <?php if ($usuario['status'] == 16) echo 'selected'; ?>>Cancelado</option>

                        </select>
                    </div> -->

                    <button type="submit" class="btn btn-primary">Editar</button>
                    <a href="user.php" class="btn btn-secondary">Voltar</a>

                    <!-- <a href="user.php" class="btn btn-danger">Voltar</a> -->
                    <input type="hidden" name="accion" value="editar_registro">
                </form>
            </div>
        </div>
    </div>
</body>
<!-- Script JavaScript -->
<script>
    // Função para atualizar a data de saída com a data e hora atual
    function atualizarDataSaida() {
        var dataSaidaInput = document.getElementById('data_saida');
        var dataAtual = new Date();
        var dataFormatada = dataAtual.getFullYear() + '-' + (dataAtual.getMonth() + 1).toString().padStart(2, '0') + '-' + dataAtual.getDate().toString().padStart(2, '0');
        var horaFormatada = dataAtual.getHours().toString().padStart(2, '0') + ':' + dataAtual.getMinutes().toString().padStart(2, '0') + ':' + dataAtual.getSeconds().toString().padStart(2, '0');
        dataSaidaInput.value = dataFormatada + ' ' + horaFormatada;
    }

    // Adicionando um listener de evento para o botão de Saída
    document.getElementById('btnSaida').addEventListener('click', function() {
        atualizarDataSaida();
    });
</script>

</html>