<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "wi";


$conexion = mysqli_connect($host, $user, $password, $database);
if (!$conexion) {
    echo "A conexão com o banco de dados não foi feita, o erro foi:" .
        mysqli_connect_error();
}