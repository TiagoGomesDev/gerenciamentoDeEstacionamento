<?php

// Conexão com o banco de dados
$conn = mysqli_connect("localhost", "root", "", "wi");

// Pega os dados do formulário
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$password = $_POST["password"];

// Faz a atualização dos dados no banco de dados
$sql = "UPDATE usuarios SET nombre = '$nombre', correo = '$correo', password = '$password' WHERE id = $id";
$result = mysqli_query($conn, $sql);

// Verifica se a atualização foi bem-sucedida
if ($result) {
    echo "Dados atualizados com sucesso!";
} else {
    echo "Erro ao atualizar os dados.";
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
