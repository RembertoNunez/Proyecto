<?php
session_start();
include '../functions/getConnection.php';
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
                    <a class="nav-link" href="../administradorFile/perfil.php">Mi Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../functions/logoff.php" align="right">Logout</a>
                </li>
            </ul>
        </nav>
        <!--<img src="../img/banner.png">-->
        <div class="container">
            <br>
            <h4>Bienvenido Administrador</h4><br><br>
            <h5>Estos son los Usuarios Activo</h5>
            <?php
            $connect = getDBConnection();
            $sql = "SELECT * FROM `users` WHERE estatus = 'Activo'";
            $statement = $connect->prepare($sql);
            $statement->execute();
            $i = 1;
            if($statement->rowCount() > 0) {
                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo "<h5>$i</h5>";
                    echo "<p>Usuario: " . $row['nombre'] . " " . $row['apellido'] . "</p>"; 
                    echo "<p>Ingreso: " . $row['ultimoLogin'] . "</p>";
                    $i++;
                }
            }
            else {
                echo "No hay Usuarios Activos";
            }
            ?>
        </div>
    </body>
</html>