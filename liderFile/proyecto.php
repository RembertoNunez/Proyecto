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
            <a class="navbar-brand" href="../moduloDeSeguridad/liderDeAnyPro.php">Lider</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../moduloDeSeguridad/liderDeAnyPro.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="analisis.php">Analisis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="proyecto.php">Proyectos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Logout</a>
                </li>
            </ul>
        </nav>
        <!--<img src="../img/banner.png">-->
        <div class="container">
            <br>
            <h4>Bienvenido a los Proyectos</h4><br/>
            <h5>Estos son los Proyectos y sus Requerimeintos</h5>
            <?php
            $id =  $_SESSION['userId'];
            echo "<p>Numero de Usurario: $id</p>";
            $connect = getDBConnection();
            $sql = "SELECT * FROM `proyectos` WHERE lider = '$id'";
            $statement = $connect->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0) {
                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo "<p>Nombre del proyecto: " . $row['proyecto'] . "</p>";
                    echo "<p>Unidad: " . $row['unidad'] . "</p>";
                    echo "<p>Proveedor(s): " . $row['proveedor'] . "</p>";
                    echo "<p>Fecha de Peticion: " . $row['fechaDePeti'] . "</p>";
                    echo "<p>Fecha de Inicio: " . $row['fechaInicio'] . "</p>";
                    echo "<p>Fecha Estimada de Finalizacion: " . $row['fechaEstiFinal'] . "</p>";
                    echo "<p>Vice Presidente: " . $row['vp'] . "</p>";
                    echo "<p>Area Solicitante: " . $row['areaSoli'] . "</p>";
                    echo "<p>Responsable: " . $row['responsable'] . "</p>";
                    echo "<p>Estatus: " . $row['estatus'] . "</p>";
                    $porce = $row['porceAvance'];
                    echo "<p>Porcentaje de Avance:</p>";
                    echo "<div class='progress'>
                                <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='75' aria-valuemin='0' aria-valuemax='100' style='width: $porce%'>$porce%</div>
                            </div>";
                    echo "<p>Observaciones: " . $row['observaciones'] . "</p>";
                }
            }
            else {
                echo "No Hay Resultados!";
            }
            ?>
        </div>
    </body>
</html>