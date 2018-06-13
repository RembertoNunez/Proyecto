<?php
session_start();
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
            <h4>Bienvenido Solicitante</h4><br/><br/>
            <h5>Su Perfil</h5><br/>
            <?php
            $id = $_SESSION['userId'];
            echo "<p>Numero de Usurario: " . $id . "</p>";
            $connect = getDBConnection();
            $sql = "SELECT * FROM `users` WHERE id = '$id'";
            $statement = $connect->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0) {
                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo "<p>Nombre: " . $row['nombre'] . "</p>";
                    echo "<p>Apellido: " . $row['apellido'] . "</p>";
                    echo "<p>Nombre de Usuario: ". $row['username'] . "</p>";
                    echo "<p>Numero de Telefono: ". $row['numero'] . "</p>";
                    echo "<p>Correo: ". $row['correo'] . "</p>";
                    echo "<p>Puesto: ". $row['puesto'] . "</p>";
                    echo "<p>Estatus: ". $row['estatus'] . "</p>";
                    echo "<p class='text-primary'>Algun Cambio Que Quiera Hacer Hable Con El Administrador</p>";
                }
            }
            else {
                echo "0 resultados";
            }
            ?>
        </div>
    </body>
</html>