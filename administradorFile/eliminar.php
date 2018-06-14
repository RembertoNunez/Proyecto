<?php
// Establece Conexion con la base de datos
include '../getConnection.php';
getDBConnection();

// Si el boton de borrar a sido selecionado y hay un nombre 
if(isset($_POST['delete']) && !empty($_POST['nombre'])) {
    $nombre = $_POST['nombre'];

    $connect = getDBConnection();
    $sql = "SELECT * FROM `users` WHERE nombre='$nombre';";
    $statement = $connect->prepare($sql);
    $statement->execute();
    // Si el nombre ingresado esta en la base de datos sera borrado si no mostrara un error
    if($statement->rowCount() > 0) {
        $sql = "DELETE FROM `users` WHERE nombre='$nombre'";
    }
    else {
        echo "<h3 class='badge badge-pill badge-danger'>ERROR</h3>";
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
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="../moduloDeSeguridad/administrador.php">Administrador</a>
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
        <!--<img src="../img/banner.png">-->
        <div class="container">
            <br>
        	<h4>Eliminar una Cuenta</h4>
        	<form method="post">
        		<label>Ingrese el <strong>Primer Nombre</strong> de la Cuenta para Eliminar</label>
                <input type="text" class="form-control" name="nombre"><br>
                <input type="submit" name='delete' value="Eliminar" class="btn btn-primary">
        	</form><br>
            <h6 align="center">Usurarios</h6>
            <?php
            // SQL code para agarrar informacion de la base de datos
            $connect = getDBConnection();
            $sql = "SELECT * FROM `users`";
            if ($_GET['sort'] == 'nombre') {
                $sql .= " ORDER BY nombre";
            }
            elseif ($_GET['sort'] == 'apellido') {
                $sql .= " ORDER BY apellido";
            }
            elseif ($_GET['sort'] == 'numero') {
                $sql .= " ORDER BY numero";
            }
            elseif($_GET['sort'] == 'correo') {
                $sql .= " ORDER BY correo";
            }
            elseif($_GET['sort'] == 'area') {
                $sql .= " ORDER BY area";
            }
            elseif($_GET['sort'] == 'estatus') {
                $sql .= " ORDER BY estatus";
            }
            elseif($_GET['sort'] == 'id') {
                $sql .= " ORDER BY id";
            }
            $statement = $connect->prepare($sql);
            $statement->execute();
            
            // Crea tabla con la informacion conseguida de la base de datos
            if($statement->rowCount() > 0) {
                echo "<table id='table' align='center'>";
                echo "<tr class='table-dark' align='center'>";
                echo "<th><a href='eliminar.php?sort=nombre'>Nombre</a></th>";
                echo "<th><a href='eliminar.php?sort=apellido'>Apellido</a></th>";
                echo "<th><a href='eliminar.php?sort=id'>Id Usuario</a></th>";
                echo "<th><a href='eliminar.php?sort=numero'>Telefono</a></th>";
                echo "<th><a href='eliminar.php?sort=correo'>Correo</a></th>";
                echo "<th><a href='eliminar.php?sort=area'>Area</a></th>";
                echo "<th><a href='eliminar.php?sort=estatus'>Estatus</a></th>";
                echo "</tr>";
                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row["nombre"]. "</td>";
                    echo "<td>" . $row["apellido"]. "</td>";
                    echo "<td>" . $row["id"]. "</td>";
                    echo "<td>" . $row["numero"]. "</td>";
                    echo "<td>" . $row["correo"]. "</td>";
                    echo "<td>" . $row["puesto"]. "</td>";
                    echo "<td>" . $row["estatus"]. "</td>";
                }
                echo "</table> <br/><br/>";
            }
            else {
                echo "0 resultados";
            }
            ?>
        </div>
	</body>
</html>