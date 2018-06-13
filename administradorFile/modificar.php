<?php
include '../getConnection.php';
getDBConnection();
if(isset($_POST['delete']) && !empty($_POST['nombre']) && $_POST['nombre'] != "") {
    $nombre = $_POST['nombre'];
    $estatus = $_POST['estatus'];
    $connect = getDBConnection();
    $sql = "SELECT * FROM `users` WHERE nombre='$nombre';";
    $statement = $connect->prepare($sql);
    $statement->execute();
    if($statement->rowCount() > 0) {
        $sql = "UPDATE `users` SET `estatus`='$estatus' WHERE `users`.`nombre`='$nombre';";
    }
    else {
        echo "<h3>ERROR</h3>";
    }
    $statement = $connect->prepare($sql);
    $statement->execute();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gerencia de Analisis</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <style type="text/css">
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand"  href="../moduloDeSeguridad/administrador.php">Administrador</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../moduloDeSeguridad/administrador.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="crear.php">Crear Cuenta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="eliminar.php">Eliminar Cuenta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="modificar.php">Modificar Cuenta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php" align="right">Logout</a>
                </li>
            </ul>
        </nav>
        <div class="container">
            <br>
        	<h4>Moficiar Estatus de Cuenta</h4>
        	<form method="post">
        		<label>Ingrese el <strong>Primer Nombre</strong> de la Cuenta para Modificar</label>
                <input type="text" class="form-control" name="nombre"><br>
                <select class="form-control" name="estatus">
                    <option value="">Seleccione Estatus</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select><br>
                <input type="submit" name='delete' value="Modificar" class="btn btn-primary">
        	</form><br>
            <h6 align="center">Usurarios</h6>
            <?php
            $connect = getDBConnection();
            $sql = "SELECT * FROM `users`";
            $statement = $connect->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0) {
                echo "<table id='table' align='center'>";
                echo "<tr class='table-dark' align='center'>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido</th>";
                echo "<th>Numero</th>";
                echo "<th>Correo</th>";
                echo "<th>Area</th>";
                echo "<th>Estatus</th>";
                echo "</tr>";
                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row["nombre"]. "</td>";
                    echo "<td>" . $row["apellido"]. "</td>";
                    echo "<td>" . $row["numero"]. "</td>";
                    echo "<td>" . $row["correo"]. "</td>";
                    echo "<td>" . $row["puesto"]. "</td>";
                    echo "<td>" . $row["estatus"]. "</td>";
                }
                echo "</table> <br/><br/>";
            }
            else {
                echo "0 results";
            }
            ?>
        </div>
	</body>
</html>