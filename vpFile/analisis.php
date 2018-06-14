<?php
session_start();
include '../functions/getConnection.php';
getDBConnection();
?>
<html>
    <head>
        <title>Gerencia de Analisis</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="../moduloDeSeguridad/vpPerfil.php">VP</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../moduloDeSeguridad/vpPerfil.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="analisis.php">Analisis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="proyecto.php">Proyectos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="estado.php">Estatus de Requerimientos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../functions/logoff.php">Logout</a>
                </li>
            </ul>
        </nav>
        <!--<img src="../img/banner.png">-->
        <div class="container">
            <br>
            <h4>Bienvenido al Analisis</h4><br/>
            <h5>Estos son los Analisis</h5>
            <?php
            
            ?>
        </div>
    </body>
</html>