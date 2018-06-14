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
            <a class="navbar-brand" href="liderDeAnyPro.php">Lider</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="liderDeAnyPro.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../liderFile/analisis.php">Analisis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../liderFile/proyecto.php">Proyectos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../functions/logoff.php">Logout</a>
                </li>
            </ul>
        </nav>
        <!--<img src="../img/banner.png">-->
        <div class="container">
            <br>
            <h4>Bienvenido Lider de Analisis y Proyectos</h4><br/>
            <h5>Su Perfil</h5>
            <?php
            perfil();
            ?>
            <p class='text-primary'>Algun Cambio Que Quiera Hacer Hable Con El Administrador</p>
        </div>
    </body>
</html>