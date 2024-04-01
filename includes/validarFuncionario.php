<?php
var_dump($_POST);  // Debugging line to check POST data

$conexion = mysqli_connect("localhost", "root", "", "wi");

if (
    isset($_POST["nombre"]) && !empty($_POST["nombre"]) &&
    isset($_POST["correo"]) && !empty($_POST["correo"]) &&
    isset($_POST["telefono"]) && !empty($_POST["telefono"]) &&
    isset($_POST["rol"]) && !empty($_POST["rol"])  &&
    isset($_POST["cargo"]) && !empty($_POST["cargo"]) &&
    isset($_POST["usuario"]) && !empty($_POST["usuario"]) &&
    isset($_POST["password"]) && !empty($_POST["password"])
) {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $rol = $_POST["rol"];
    $cargo = $_POST["cargo"];
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    if (isset($_POST["selImg"]) && !empty($_POST["selImg"])) {
        $imagen = $_POST["selImg"];
    } else {
        $imagen = '';
    }

    $sql = "INSERT INTO user (nombre, correo, telefono, rol, cargo, usuario, password)
    VALUES (?, ?, ?, ?, ?, ?, ?)";
    if ($statement = mysqli_prepare($conexion, $sql)) {

        mysqli_stmt_bind_param($statement, "sssssss", $nombre, $correo, $telefono, $rol, $cargo, $usuario, $password);

        if (mysqli_stmt_execute($statement)) {
            header('Location: ../views/user.php');
        } else {
            echo "Não pode realizar a aquisição";
        }
        mysqli_stmt_close($statement);
    }

    mysqli_close($conexion);
} else {
?>
<?php  } ?>