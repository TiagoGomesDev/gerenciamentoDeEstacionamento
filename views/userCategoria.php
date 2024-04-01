<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if ($validar == null || $validar = '') {

  header("Location: ../includes/login.php");
  die();
}


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="../DataTables/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../css/es.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/resp/bootstrap.min.js"></script>
  <title>Categoria</title>
  <style>
    body {
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
    }

    h1 {
      display: flex;
      justify-content: center;
      align-items: center;
      /* height: 100vh; */
      margin: 0;
    }

    .table {
      width: 100%;
      margin-bottom: 1rem;
      color: #ffffff;
    }

    .table thead th {
      background-color: #007bff;
      color: #ffffff;
      border: none;
    }

    .table tbody tr:nth-of-type(odd) {
      background-color: rgba(0, 123, 255, 0.25);
    }

    .table tbody tr td {
      border: none;
    }

    .btn-group .btn {
      margin-right: 5px;
    }

    .btn-group .btn i {
      margin-right: 5px;
    }

    .modal-content {
      background-color: #343a40;
      color: #ffffff;
    }

    .modal-content .btn-primary,
    .modal-content .btn-secondary {
      background-color: #007bff;
    }

    .swal2-confirm,
    .swal2-cancel {
      background-color: #007bff;
      color: #ffffff;
    }
  </style>
</head>
<?php
include 'menu.php';
exibirMenu('A');
?><div class="container is-fluid">
  <div class="col-xs-12">
    <div class="col-xs-12">
      <h1>LISTA DE CATEGORIAS</h1>
      <div>
        <?php
        $conexion = mysqli_connect("localhost", "root", "", "wi");
        $where = "";

        if (isset($_GET['enviar'])) {
          $busqueda = $_GET['busqueda'];


          if (isset($_GET['busqueda'])) {
            $where = "WHERE user.correo LIKE'%" . $busqueda . "%' OR nombre  LIKE'%" . $busqueda . "%'
    OR telefono  LIKE'%" . $busqueda . "%'";
          }
        }
        ?>
        <!-- </form>
        <div class="container-fluid">
  <form class="d-flex">
      <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" 
      placeholder="Buscar con JS">
      <hr>
      </form>
  </div>  -->
        <br>
        <table class="table table-striped table-dark table_id " id="table_id">

          <thead>
            <tr>
              <th>ID</th>
              <th>MODELO</th>
              <th>CATEGORIA</th>
              <th>PESO</th>
              <th>VALOR DA TAXA</th>
              <th>AÇÕES</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $conexion = mysqli_connect("localhost", "root", "", "wi");
            $SQL = mysqli_query($conexion, "select id_modelo, modelo, categoria, peso, taxa 
            from categoria
            ORDER BY id_modelo desc
            LIMIT 0, 1000;");

            while ($fila = mysqli_fetch_assoc($SQL)) :
            ?>
              <tr>

                <td><?php echo $fila['id_modelo']; ?></td>
                <td><?php echo $fila['modelo']; ?></td>
                <td><?php echo $fila['categoria']; ?></td>
                <td><?php echo $fila['peso']; ?></td>
                <td><?php echo $fila['taxa']; ?></td>
                <td>
                  <div class="btn-group" role="group" aria-label="Ações">
                    <a class="btn btn-warning btn-sm" href="editar_userCategoria.php?id_modelo=<?php echo $fila['id_modelo'] ?>">
                      <i class="fa fa-edit"></i> Editar
                    </a>
                    <a class="btn btn-danger btn-sm btn-del" href="eliminar_Categoria.php?id_modelo=<?php echo $fila['id_modelo'] ?>">
                      <i class="fa fa-trash"></i> Excluir
                    </a>
                  </div>
                </td>
              </tr>
            <?php endwhile; ?>
            </body>
        </table>

        <script>
          $('.btn-del').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')

            Swal.fire({
              title: 'Tem certeza? Que quer excluir esta venda?',
              text: "Não poderá reverter!!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Sim!',
              cancelButtonText: 'Cancelar!',
            }).then((result) => {
              if (result.value) {
                if (result.isConfirmed) {
                  Swal.fire(
                    'Eliminado!',
                    'Esta venda foi excluida.',
                    'Sucesso'
                  )
                }

                document.location.href = href;
              }

            })
          })
        </script>
        <!-- <div id="paginador" class=""></div>-->
        <script src="../package/dist/sweetalert2.all.js"></script>
        <script src="../package/dist/sweetalert2.all.min.js"></script>
        <script src="../package/jquery-3.6.0.min.js"></script>

        <script type="text/javascript" src="../DataTables/js/datatables.min.js"></script>
        <script type="text/javascript" src="../DataTables/js/jquery.dataTables.min.js"></script>
        <script src="../DataTables/js/dataTables.bootstrap4.min.js"></script>

        <script src="../js/page.js"></script>
        <script src="../js/buscador.js"></script>
        <script src="../js/user.js"></script>




        <?php include('../index.php'); ?>

</html>