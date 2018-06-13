<?php
// Conexion con la base de datos
include 'getConnection.php';
getDBConnection();
?>
<html>
    <head>
        <title>Gerencia de Analisis</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php">Gerencia</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
            </ul>
        </nav>
        <img src="./img/banner.png">
        <div class="container">
            <br>
            <h3>Porfavor ingrese sus credenciales</h3>
            <form method="post" action="verify.php">
                <div class="form-group">
                    <label for="InputUsername">Usurario</label>
                    <input type="text" name="username" class="form-control" placeholder="Usurario">
                </div>
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input type="password" name="password" class="form-control"placeholder="Password">
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
        </div>
    </body>
</html>