<?php
session_start();
include '../functions/perfil.php';
?>
<html>
    <head>
        <title>Gerencia de Analisis</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="usuarioFinal.php">Solicitante</a></a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="usuarioFinal.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../soliFile/solicitudes.php">Solicitudes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php" align="right">Logout</a>
                </li>
            </ul>
        </nav>
        <!--<img src="../img/banner.png">-->
        <div class="container">
            <br>
            <h4>Bienvenido Solicitante</h4><br/>
            <h5>Su Perfil</h5>
            <?php
            perfil();
            ?>
            <p class='text-primary'>Algun Cambio Que Quiera Hacer Hable Con El Administrador</p>
        </div>
    </body>
</html>