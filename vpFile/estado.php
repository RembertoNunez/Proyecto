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
            <h4>Bienvenido al Estado</h4><br/>
            <h5>Este es el Estado de Requerimeintos</h5>
            <?php
             $id =  $_SESSION['userId'];
            echo "<p>Numero de Usurario: $id</p>";
            $connect = getDBConnection();
            $sql = "SELECT * FROM `proyectos` WHERE lider = '$id'";
            $statement = $connect->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0) {
                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo "<p>Ajuste Para Desarrollador: ". $row['ajusteParaDesa']."</p>";
                    echo "<p>Analisis Para Infatlan: ". $row['analisisInfatlan']."</p>";
                    echo "<p>Producion: ". $row['production'] ."</p>";
                    echo "<p>Certificacion: ". $row['certificacion'] ."</p>";
                    echo "<p>Se Mantienen En Desarrollo: ". $row['mantienenEnDesa'] ."</p>";
                }
            }
            else {
                echo "<p>No hay estados para Requerimientos</p>";
            }
            ?>
        </div>
    </body>
</html>