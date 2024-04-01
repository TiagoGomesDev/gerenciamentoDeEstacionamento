<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar == '') {
    header("Location: ../includes/login.php");
    die();
}

$id_modelo = $_GET['id_modelo'];
$conexion = mysqli_connect("localhost", "root", "", "wi");
$consulta = "select id_modelo, modelo, categoria, peso, taxa 
            from categoria
             WHERE id_modelo = $id_modelo";

$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes das Categorias</title>

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
                Detalhes de Categorias
            </div>
            <div class="card-body">
                <form action="../includes/_functions.php" method="POST">
                    <div class="form-group">
                        <label for="id_modelo">ID Modelo:</label>
                        <input type="text" class="form-control" id="id_modelo" name="id_modelo" value="<?php echo $usuario['id_modelo']; ?>" readonly>>
                    </div>
                    <div class="form-group">
                        <label for="modelo">Nome do Modelo:</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $usuario['modelo']; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria:</label>
                        <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo $usuario['categoria']; ?>" >
                    </div>
                    <!-- select id_modelo, modelo, categoria, peso, taxa from categoria; -->
                    <div class="form-group">
                        <label for="peso">peso:</label>
                        <input type="text" class="form-control" id="peso" name="peso" value="<?php echo $usuario['peso']; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="taxa">taxa:</label>
                        <input type="text" class="form-control" id="taxa" name="taxa" value="<?php echo $usuario['taxa']; ?>" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary">Editar</button>
                    <a href="user.php" class="btn btn-secondary">Voltar</a>

                    <!-- <a href="user.php" class="btn btn-danger">Voltar</a> -->
                    <input type="hidden" name="accion" value="editar_registroCategoria">

                </form>
            </div>
        </div>
    </div>
</body>

</html>