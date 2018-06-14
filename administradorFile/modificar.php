<?php
// Establece Conexion con la base de datos
include '../functions/getConnection.php';
getDBConnection();

// Si el boton de modificar a sido selecionado y hay un nombre 
if(isset($_POST['delete']) && !empty($_POST['nombre']) && $_POST['nombre'] != "") {
    $nombre = $_POST['nombre'];
    $estatus = $_POST['estatus'];
    $connect = getDBConnection();
    $sql = "SELECT * FROM `users` WHERE nombre='$nombre';";
    $statement = $connect->prepare($sql);
    $statement->execute();
    // Si el nombre ingresado esta en la base de datos sera modificado si no mostrara un error
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
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
                    <a class="nav-link" href="perfil.php">Mi Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../functions/logoff.php" align="right">Logout</a>
                </li>
            </ul>
        </nav>
        <!--<img src="../img/banner.png">-->
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
            $statement = $connect->prepare($sql);
            $statement->execute();
            if($statement->rowCount() > 0) {
                echo "<table id='table' align='center'>";
                echo "<tr class='table-dark' align='center'>";
                echo "<th><a href='eliminar.php?sort=nombre'>Nombre</a></th>";
                echo "<th><a href='eliminar.php?sort=apellido'>Apellido</a></th>";
                echo "<th><a href='eliminar.php?sort=numero'>Numero</a></th>";
                echo "<th><a href='eliminar.php?sort=correo'>Correo</a></th>";
                echo "<th><a href='eliminar.php?sort=area'>Area</a></th>";
                echo "<th><a href='eliminar.php?sort=estatus'>Estatus</a></th>";
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
                echo "0 resultados";
            }
            ?>
        </div>
	</body>
</html>