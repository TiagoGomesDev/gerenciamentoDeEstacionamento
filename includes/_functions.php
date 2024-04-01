<?php
// Configurações para exibir erros do PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("_db.php");

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'editar_registro':
            editar_registro();
            break;
        case 'editar_registroFuncionarioUser':
            editar_registroFuncionarioUser();
            break;
        case 'editar_registroCategoria':
            editar_registroCategoria();
            break;
        case 'acceso_user':
            acceso_user();
            break;
    }
}

function editar_registro()
{
    $conexion = mysqli_connect("localhost", "root", "", "wi");
    extract($_POST);
    $id_veiculo = mysqli_real_escape_string($conexion, $_POST['id_veiculo']);
    $placa = mysqli_real_escape_string($conexion, $_POST['placa']);
    $cliente = mysqli_real_escape_string($conexion, $_POST['cliente']);
    $marca = mysqli_real_escape_string($conexion, $_POST['marca']);
    $modelo = mysqli_real_escape_string($conexion, $_POST['modelo']);
    $cor = mysqli_real_escape_string($conexion, $_POST['cor']);
    $data_entrada = mysqli_real_escape_string($conexion, $_POST['data_entrada']);
    $data_saida = mysqli_real_escape_string($conexion, $_POST['data_saida']);
    //select id_veiculo, placa, cliente, marca, modelo, cor, data_entrada, data_saida from veiculos;

    $consulta = "UPDATE veiculos SET placa = '$placa', 
    cliente = '$cliente', marca = '$marca', 
    modelo = '$modelo', cor = '$cor', data_entrada = '$data_entrada', 
    data_saida = '$data_saida'
    WHERE id_veiculo = '$id_veiculo'";

    
    mysqli_query($conexion, $consulta);

    header('Location: ../views/user.php');
}

function editar_registroFuncionarioUser()
{
    $conexion = mysqli_connect("localhost", "root", "", "wi");
    extract($_POST);
    $id = mysqli_real_escape_string($conexion, $id);
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $correo = mysqli_real_escape_string($conexion, $correo);
    $fecha = mysqli_real_escape_string($conexion, $fecha);
    $cargo = mysqli_real_escape_string($conexion, $cargo);
    $usuario = mysqli_real_escape_string($conexion, $usuario);
    $rol = mysqli_real_escape_string($conexion, $rol);
    $password = mysqli_real_escape_string($conexion, $password);

    $consulta = "UPDATE user SET nombre='$nombre', correo='$correo', fecha='$fecha', cargo='$cargo', usuario='$usuario', rol='$rol', password='$password' WHERE id=$id";
    mysqli_query($conexion, $consulta);

    header('Location: ../views/userFuncionario.php');
}

function editar_registroCategoria()
{
    $conexion = mysqli_connect("localhost", "root", "", "wi");
    extract($_POST);
    $id_modelo = mysqli_real_escape_string($conexion, $_POST['id_modelo']);
    $modelo = mysqli_real_escape_string($conexion, $_POST['modelo']);
    $categoria = mysqli_real_escape_string($conexion, $_POST['categoria']);
    $peso = mysqli_real_escape_string($conexion, $_POST['peso']);
    $taxa = mysqli_real_escape_string($conexion, $_POST['taxa']);
    
    //select id_modelo, modelo, categoria, peso, taxa from categoria;
    $consulta = "UPDATE categoria SET modelo = '$modelo', categoria = '$categoria', 
    peso = '$peso', taxa = '$taxa'
    WHERE id_modelo = '$id_modelo'";

    mysqli_query($conexion, $consulta);

    header('Location: ../views/userCategoria.php');
}

function acceso_user()
{
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    session_start();
    $_SESSION['nombre'] = $nombre;

    $conexion = mysqli_connect("localhost", "root", "", "wi");
    $consulta = "SELECT * FROM user WHERE nombre='$nombre' AND password='$password'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_array($resultado);

    if ($filas['rol'] == 1) { //admin
        header('Location: ../views/user.php');
    } else if ($filas['rol'] == 2) { //lector
        header('Location: ../views/lector.php');
    } else {
        header('Location: login.php');
        session_destroy();
    }
}