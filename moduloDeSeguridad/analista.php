<?php
// Se inicia Session y se incluye el file de perfiles
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
            <a class="navbar-brand" href="analista.php">Analista</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="analista.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../analistaFile/analisis.php">Analisis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../functions/logoff.php">Logout</a>
                </li>
            </ul>
        </nav>
        <!--<img src="../img/banner.png">-->
        <div class="container">
            <br>
            <h4>Bienvenido Analista</h4><br/>
            <h5>Su Perfil</h5>
            <?php
            // Funcion para accesar el perfil del usuario
            perfil();
            ?>
            <p class='text-primary'>Algun Cambio Que Quiera Hacer Hable Con El Administrador</p>
        </div>
    </body>
</html>