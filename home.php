<?php
//include "config/conexion.php";
include "include/head.php";

if($usertype != "user"){
    header("location: homeadmin.php");
}

include "include/navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
</head>
<body>

    <h3>Bienvenido <?php echo $nombres . ' ' . $apellidos . ', usted hace parte del restaurante ' .$nombreRestaurante . ' sede ' .$nombreSede?></h3>
</body>
</html>