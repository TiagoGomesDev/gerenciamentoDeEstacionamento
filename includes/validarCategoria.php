<?php
var_dump($_POST);  // Debugging line to check POST data

$conexion = mysqli_connect("localhost", "root", "", "wi");

if (
    isset($_POST["modelo"]) && !empty($_POST["modelo"]) &&
    isset($_POST["categoria"]) && !empty($_POST["categoria"]) &&
    isset($_POST["peso"]) && !empty($_POST["peso"])&&
    isset($_POST["taxa"]) && !empty($_POST["taxa"]) 
    ) {
    $modelo = $_POST["modelo"];
    $categoria = $_POST["categoria"];
    $peso = $_POST["peso"];
    $taxa = $_POST["taxa"];
    //select id_modelo, modelo, categoria, peso, taxa from categoria;

    if (isset($_POST["selImg"]) && !empty($_POST["selImg"])) {
        $imagen = $_POST["selImg"];
    } else {
        $imagen = '';
    }

    $sql = "INSERT INTO categoria (modelo, categoria, peso, taxa)
    VALUES (?, ?, ?, ?)";
    if ($statement = mysqli_prepare($conexion, $sql)) {

        mysqli_stmt_bind_param($statement, "ssss", $modelo , $categoria, $peso, $taxa);

        if (mysqli_stmt_execute($statement)) {
            header('Location: ../views/userCategoria.php');
        } else {
            echo "Não pode realizar a aquisição";
        }
        mysqli_stmt_close($statement);
    }

    mysqli_close($conexion);
} else {
?>
<?php  } ?>