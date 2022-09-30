<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Lista de productos</title>
</head>
<?php include "include/navbar.php" ?>

<main class="container p-4">
    <h3 class="offset-4 col-10">Lista de productos de la sede <?php echo $nombreSede ?></h3><br>
    <div class="w-50 card-body offset-3">
        <table class="table table-bordered">
            <thead class="thead-dark" align="center">
                <tr>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Unidad de medida</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody align="center">
                <?php foreach ($conn->query("SELECT p.idProducto, p.nombreProducto, p.unidadMedida, s.nombre 
                from productos p 
                INNER JOIN sede s ON s.idSede = p.idSede 
                where s.idSede = '$idSede'") as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['nombreProducto'] ?></td>
                        <td><?php echo $row['unidadMedida'] ?></td>
                        <td>
                            <a href="editarProducto.php?idProducto=<?php echo $row['idProducto']?>" class="btn btn-secondary">
                                <i class="fas fa-marker"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg></i>
                            </a>
                            <a href="eliminarProducto.php?idProducto=<?php echo $row['idProducto']?>" class="btn btn-danger">
                                <i class="fas fa-marker"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <form method="POST" action="create_excel.php">
				<button class="btn btn-success pull-right" name="export"><span class="glyphicon glyphicon-print"></span> Exportar a Excel</button>
			</form>
        </div>
    </div>
</main>