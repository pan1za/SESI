<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Total de salidas por entradas</title>
</head>
<?php include "include/navbar.php" ?>

<main class="container p-4">
    <h3 class="offset-4 col-10">Total de salidas por entradas</h3><br>
    <div class="w-100 card-body offset-0">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre del producto</th>
                    <!-- <th scope="col">Fecha de entrada</th> -->
                    <th scope="col">ID entrada</th>
                    <th scope="col">Entrada realizada por</th>
                    <th scope="col">Total entrada</th>
                    <th scope="col">Fecha de salida</th>
                    <th scope="col">Salida realizada por</th>
                    <th scope="col">Total salida</th>
                    <th scope="col">Total actual</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($conn->query('SELECT p.nombreProducto, e.idEntrada, u.nombres, u.apellidos, e.totalEntrada, 
                s.fechaSalida, u2.nombres as nombres2, u2.apellidos as apellidos2, 
                SUM(s.totalSalida) as totalSalidaEntradas 
                FROM productos p 
                INNER JOIN salidas s ON s.idProducto = p.idProducto 
                INNER JOIN entradas e ON e.idEntrada = s.idEntrada 
                INNER JOIN usuarios u ON u.idUsuario = e.idUsuario 
                INNER JOIN usuarios u2 ON s.idUsuario = u2.idUsuario 
                GROUP BY e.idEntrada;') as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['nombreProducto'] ?></td>
                        <!-- <td><?php echo $row['fechaEntrada'] ?></td> -->
                        <td><?php echo $row['idEntrada'] ?></td>
                        <td><?php echo $row['nombres'] . ' ' . $row['apellidos'] ?></td>
                        <td><?php echo $row['totalEntrada'] ?></td>
                        <!-- <td><?php echo $row['fechaSalida'] ?></td> -->
                        <td><?php echo $row['fechaSalida'] ?></td>
                        <td><?php echo $row['nombres2'] . ' ' . $row['apellidos2'] ?></td>
                        <td><?php echo $row['totalSalidaEntradas'] ?></td>
                        <td><?php echo $row['totalEntrada'] - $row['totalSalidaEntradas']?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</main>

<!-- SELECT p.nombreProducto, e.fechaEntrada, u.nombres, u.apellidos, e.totalEntrada, s.fechaSalida, u2.nombres, u2.apellidos, SUM(s.totalSalida) as totalSalidaEntradas
FROM productos p 
INNER JOIN salidas s ON s.idProducto = p.idProducto 
INNER JOIN entradas e ON e.idEntrada = s.idEntrada 
INNER JOIN usuarios u ON u.idUsuario = e.idUsuario 
INNER JOIN usuarios u2 ON s.idUsuario = u2.idUsuario 
GROUP BY e.idEntrada; -->