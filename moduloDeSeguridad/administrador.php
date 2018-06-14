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
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="administrador.php">Administrador</a></a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="administrador.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../administradorFile/crear.php">Crear Cuenta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../administradorFile/eliminar.php">Eliminar Cuenta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../administradorFile/modificar.php">Modificar Cuenta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php" align="right">Logout</a>
                </li>
            </ul>
        </nav>
        <!--<img src="../img/banner.png">-->
        <div class="container">
            <br>
            <h4>Bienvenido Administrador</h4><br><br>
            <p>En el perifl de administrador usted puede crear cuentras para los usuarios al igaul que eliminarlas o modificarlas</p>
        </div>
    </body>
</html>