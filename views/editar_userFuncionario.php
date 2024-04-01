<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$validar = $_SESSION['nombre'];

if ($validar == null || $validar == '') {
    header("Location: ../includes/login.php");
    die();
}

$id = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "wi");

if (!$conexion) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

$consulta = "SELECT id, nombre, correo, fecha, cargo, usuario, rol, password, cargo FROM user WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);

if (!$resultado) {
    die("Erro na consulta ao banco de dados: " . mysqli_error($conexion));
}

$usuario = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Usuário</title>

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

<body id="page-top">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Detalhes do Usuário
            </div>
            <div class="card-body">
                <form action="../includes/_functions.php" method="POST">

                    <div class="form-group">
                        <label for="id" class="form-label">ID do Usuário:</label>
                        <input type="text" readonly class="form-control" id="staticId" name="id" value="<?php echo $usuario['id']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="staticNombre" name="nombre" value="<?php echo $usuario['nombre']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="correo" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" id="staticCorreo" name="correo" value="<?php echo $usuario['correo']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="form-label">Data de Nascimento:</label>
                        <input type="text" class="form-control" id="staticFecha" name="fecha" value="<?php echo $usuario['fecha']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="cargo" class="form-label">Cargo:</label>
                        <input type="text" class="form-control" id="staticCargo" name="cargo" value="<?php echo $usuario['cargo']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="usuario" class="form-label">Nome de Usuário:</label>
                        <input type="text" class="form-control" id="staticUsuario" name="usuario" value="<?php echo $usuario['usuario']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="rol" class="form-label">Função/Rol:</label>
                        <input type="text" class="form-control" id="staticRol" name="rol" value="<?php echo $usuario['rol']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="staticPassword" name="password" value="<?php echo $usuario['password']; ?>">
                    </div>
                    <div class="mb-3">
                        <!-- <button type="submit" class="btn btn-success">Editar</button>
                        <a href="userFuncionario.php" class="btn btn-danger">Voltar</a> -->

                        <button type="submit" class="btn btn-primary">Editar</button>
                        <a href="userFuncionario.php" class="btn btn-secondary">Voltar</a>
                    </div>

                    <input type="hidden" name="accion" value="editar_registroFuncionarioUser">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <br>
                </form>
            </div>
        </div>
    </div>
</body>

</html>