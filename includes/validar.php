<?php
$conexion = mysqli_connect("localhost", "root", "", "wi");

if ($conexion) { // Verificar se a conexão foi estabelecida com sucesso
    if (isset($_POST["registrar"])) { // Verificar se o botão "Entrada" foi clicado
        if (
            isset($_POST["placa"]) && !empty($_POST["placa"]) &&
            isset($_POST["cliente"]) && !empty($_POST["cliente"]) &&
            isset($_POST["modelo"]) && !empty($_POST["modelo"]) &&
            isset($_POST["marca"]) && !empty($_POST["marca"]) &&
            isset($_POST["cor"]) && !empty($_POST["cor"])
        ) {
            $placa = $_POST["placa"];
            $data_entrada = date('Y-m-d H:i:s'); // Obtém a data e hora atual

            // Consulta para verificar se a placa já existe no banco de dados
            $query = "SELECT * FROM veiculos WHERE placa = ?";
            $stmt = mysqli_prepare($conexion, $query);
            mysqli_stmt_bind_param($stmt, "s", $placa);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                echo "Esta placa está ocupando uma vaga. Por favor, de saida para retornar ou insira uma placa diferente.";
            } else {
                // A placa não existe, então você pode prosseguir com a inserção do registro
                $cliente = $_POST["cliente"];
                $modelo = $_POST["modelo"];
                $marca = $_POST["marca"];
                $cor = $_POST["cor"];
                $data_entrada = date('Y-m-d H:i:s'); // Data e hora atuais
                // Definindo a data de saída como null, pois o veículo está apenas entrando
                $data_saida = null;

                $sql = "INSERT INTO veiculos (placa, cliente, modelo, marca, cor, data_entrada, data_saida) VALUES (?, ?, ?, ?, ?, NOW(), ?)";

                if ($statement = mysqli_prepare($conexion, $sql)) {
                    mysqli_stmt_bind_param($statement, "ssssss", $placa, $cliente, $modelo, $marca, $cor, $data_saida);

                    if (mysqli_stmt_execute($statement)) {
                        header('Location: ../views/user.php');
                        exit;
                    } else {
                        echo "Não foi possível inserir os dados do veículo.";
                    }
                    mysqli_stmt_close($statement);
                } else {
                    // echo "Erro na preparação da consulta.";
                    echo "Erro ao cadastrar: " . $stmt->error;
                }
            }
        }
    } elseif (isset($_POST["saida"])) { // Verificar se o botão "Saída" foi clicado
        echo "Botão 'Saída' foi clicado.";
    } else {
        echo "Nenhum botão foi clicado.";
    }
    mysqli_close($conexion);
} else {
    echo "Erro na conexão com o banco de dados.";
}
?>
