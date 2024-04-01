<?php

$id_modelo = $_GET['id_modelo'];
$conexion = mysqli_connect("localhost", "root", "", "wi");
$consulta = mysqli_query($conexion, "DELETE FROM categoria WHERE id_modelo= '$id_modelo'");

header('Location: userCategoria.php');
