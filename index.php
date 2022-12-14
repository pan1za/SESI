<?php
include "config/conexion.php";

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION["user_id"])=== true) {
    header("location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap\css\styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>Iniciar sesión - Sistema de Asesorías Innova</title>
</head>

<body class="login-page">
    <div class="login-box">

        
        <div class="login-box-body">
            <div class="login-logo">
                <a href=""><img src="img/logo3.png"></a>
            </div>
            
            <p class="login-box-msg">Iniciar sesión</p>
            <form action="action/login.php" method="POST">
                <div class="form-group has-feedback">
                    <input type="text" name="email" class="form-control" placeholder="Correo electrónico" required>
                    <small id="emailHelp" class="form-text tex-muted">No compartiremos tu email con nadie.</small>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox">Recordar contraseña</input>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" name="login" value="login" class="btn btn-primary btn-flat w-100">Iniciar Sesion</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        <?php
        include "/include/scripts.php";
        ?>
    </script>

</body>

</html>