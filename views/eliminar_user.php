<?php

$id_veiculo = $_GET['id_veiculo'];
$conexion = mysqli_connect("localhost", "root", "", "wi");
$consulta = mysqli_query($conexion, "DELETE FROM veiculos WHERE id_veiculo= '$id_veiculo'");

header('Location: user.php');
