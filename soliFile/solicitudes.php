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
            <a class="navbar-brand" href="../moduloDeSeguridad/usuarioFinal.php">Solicitantes</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../moduloDeSeguridad/usuarioFinal.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="solicitudes.php">Solicitudes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php" align="right">Logout</a>
                </li>
            </ul>
        </nav>
        <div class="container">
            <br>
            <h4>Bienvenido a sus Solicitudes</h4><br/><br/>
            <h5>Estas son sus Solicitudes</h5><br/>
            <?php
            echo "<p>Numero de Usurario: " . $_SESSION['userId'] . "</p>";
            $connect = getDBConnection();
            $sql = "SELECT * FROM `requerimientos`";
            $statement = $connect->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0) {
                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    if($_SESSION['id'] == $row['numDeSys']) {
                        echo "<p>Usted es el Usurario: " . $_SESSION['username'] . "</p>";
                        echo "<p>Fecha de Solicitud: " . $row["fechaSoliSys"] . "</p>";
                        echo "<p>Estado: " . $row["estatus"] . "</p>";
                        $porce = $row['porceAvance'];
                        echo "<p>Porcentaje de Avance</p>";
                        echo "<div class='progress'>
                                <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='75' aria-valuemin='0' aria-valuemax='100' style='width: $porce%'>$porce%</div>
                            </div>";
                    }
                }
            }
            else {
                echo "0 resultados";
            }
            ?>
        </div>
    </body>
</html>