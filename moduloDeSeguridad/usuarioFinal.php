<?php
include '../getConnection.php';
getDBConnection();
?>
<html>
    <head>
        <title>Gerencia de Analisis</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
        <div class="container">
            <br>
            <h4>Bienvenido Solicitante</h4>
        </div>
    </body>
</html>