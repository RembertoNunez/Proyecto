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
            <h5>Estos son los Analisis de Indicadores</h5>
            <?php
            $coonnect = getDBConnection();
            $sql = "SELECT * FROM `indicadores` WHERE id = $id";
            $statement = $connect->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0) {
                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo "<p>Requerimiento: " . $row['requerimiento'] . "</p>";
                    echo "<p>Requerimientos Nuevos: " . $row['reqNuevos'] . "</p>";
                    echo "<p>Estado de Requerimiento: " . $row['estadoReq'] . "</p>";
                    echo "<p>Eficiencia Requerimiento: " . $row['eficiencia'] . "</p>";
                }
            }
            else {
                echo "No hay Resultados de Analisis de Indicadores";
            }
            echo "<h5>Analisis de Proyecto</h5>";
            $coonnect = getDBConnection();
            $sql = "SELECT * FROM `observaciones`";
            $statement = $connect->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0) {
                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo "<p>Fecha Realizada: " . $row['fechaRealizada'] . "</p>";
                    echo "<p>Quien la Realizo: " . $row['userId'] . "</p>";
                    echo "<p>Observaciones: " . $row['observacion'] . "</p>";
                }
            }
            else {
                echo "No hay Resultados de Analisis de Proyectos";
            }
            ?>
        </div>
    </body>
</html>