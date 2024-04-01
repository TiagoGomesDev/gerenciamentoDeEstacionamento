<!DOCTYPE html>
<html lang="pt -BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>

<body>

    <?php
    function exibirMenu($menu)
    {
        switch ($menu) {
            case 'A':
                echo '<link rel="icon" type="image/png" href="../imgs/carro.jfif">';
                echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">';
                echo '<div class="container">';
                echo '<a class="navbar-brand" href="user.php">';
                echo '<img src="../imgs/carro.jfif" alt="Gcred" style="width: 70px; max-width: 100%; height: auto; border-radius: 50%;">';
                echo '</a>';
                echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">';
                echo '<span class="navbar-toggler-icon"></span>';
                echo '</button>';
                echo '<div class="collapse navbar-collapse" id="navbarNav">';
                echo '<ul class="navbar-nav ml-auto">';

                echo '<li class="nav-item dropdown">';
                echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                echo 'Cadastros';
                echo '</a>';
                echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                echo '<a class="dropdown-item" type="button" class="nav-link" data-toggle="modal" data-target="#create">';
                echo '<span class="glyphicon glyphicon-plus"></span> Veículo ';
                echo '<i class="fa fa-plus"></i>';
                echo '</a>';
                echo '<div class="dropdown-divider"></div>';

                echo '<a class="dropdown-item" type="button" class="nav-link" data-toggle="modal" data-target="#createProd">';
                echo '<span class="glyphicon glyphicon-plus"></span> Categoria ';
                echo '<i class="fa fa-plus"></i>';
                echo '</a>';
                echo '<div class="dropdown-divider"></div>';

                echo '<a class="dropdown-item" type="button" class="nav-link" data-toggle="modal" data-target="#createFunc">';
                echo '<span class="glyphicon glyphicon-plus"></span> Funcionario ';
                echo '<i class="fa fa-plus"></i>';
                echo '</a>';
                echo '</div>';
                echo '</li>';

                echo '<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Amostras de Dados
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="user.php" class="nav-link">Veículo </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="userCategoria.php" class="nav-link">Categoria</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="userFuncionario.php" class="nav-link">Funcionário</a>
            </div>
        </li>';

                echo '<li class="nav-item active">
        <a class="nav-link">
            <h5>Usuário: ' . $_SESSION["nombre"] . '</h5>
        </a>
    </li>';

                echo '<li class="nav-item">
            <a class="nav-link" href="../includes/_sesion/cerrarSesion.php">Sair
                <i class="fa fa-power-off" aria-hidden="true"></i>
            </a>
        </li>';

                echo '</ul>';
                echo '</div>';
                echo '</div>';
                echo '</nav>';
                echo '<br>';
                echo '<br>';
                echo '<ul>';
                echo '</ul>';
                break;

            case 'B':
                echo '<link rel="icon" type="image/png" href="../imgs/carro.jfif">';
                echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">';
                echo '<div class="container">';
                echo '<a class="navbar-brand" href="lector.php">';
                echo '<img src="../imgs/carro.jfif" alt="Gcred" style="width: 70px; max-width: 100%; height: auto; border-radius: 50%;">';
                echo '</a>';
                echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">';
                echo '<span class="navbar-toggler-icon"></span>';
                echo '</button>';
                echo '<div class="collapse navbar-collapse" id="navbarNav">';
                echo '<ul class="navbar-nav ml-auto">';

                echo '<li class="nav-item dropdown">';
                echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                echo 'Cadastros';
                echo '</a>';
                echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                echo '<a class="dropdown-item" type="button" class="nav-link" data-toggle="modal" data-target="#create2">';
                echo '<span class="glyphicon glyphicon-plus"></span> Venda ';
                echo '<i class="fa fa-plus"></i>';
                echo '</a>';
                echo '<div class="dropdown-divider"></div>';

                echo '<a class="dropdown-item" type="button" class="nav-link" data-toggle="modal" data-target="#createProd2">';
                echo '<span class="glyphicon glyphicon-plus"></span> Cliente ';
                echo '<i class="fa fa-plus"></i>';
                echo '</a>';
                echo '</div>';
                echo '</li>';

                echo '<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Amostras de Dados
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="lector.php" class="nav-link">Venda </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="userProdutoLector.php" class="nav-link">Cliente </a>
            </div>
        </li>';

                echo '<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Gráficos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="grafica.php" class="nav-link">Venda </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="graficaProduto.php" class="nav-link">Cliente </a>
            </div>
        </li>';

                echo '<li class="nav-item active">
        <a class="nav-link">
            <h5>Usuário: ' . $_SESSION["nombre"] . '</h5>
        </a>
    </li>';

                echo '<li class="nav-item">
            <a class="nav-link" href="../includes/_sesion/cerrarSesion.php">Sair
                <i class="fa fa-power-off" aria-hidden="true"></i>
            </a>
        </li>';

                echo '</ul>';
                echo '</div>';
                echo '</div>';
                echo '</nav>';
                echo '<br>';
                echo '<br>';
                echo '<ul>';
                echo '</ul>';
                break;

            default:
                echo 'Menu não reconhecido';
                break;
        }
    }
    ?>

</body>

</html>
