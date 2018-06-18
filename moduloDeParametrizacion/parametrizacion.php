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
            <a class="navbar-brand" href="parametrizacion.php">Parametrizacion</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="parametrizacion.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../paraFile/creaProyecto.php">Crear Proyectos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../paraFile/creaRequeri.php">Crear Requerimientos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../functions/logoff.php">Logout</a>
                </li>
            </ul>
        </nav>
        <!--<img src="../img/banner.png">-->
        <div class="container">
            <h4>Bienvenido</h4><br/>
            <h5>Titulo</h5>
            <?php
            
            ?>
        </div>
    </body>
</html>