<?php
include '../getConnection.php';
getDBConnection();

if(isset($_POST['insert']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['numero']) && !empty($_POST['correo']) && !empty($_POST['puesto']) && !empty($_POST['userId']) && !empty($_POST['estatus']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['tipo'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $numero = $_POST['numero'];
    $correo = $_POST['correo'];
    $puesto = $_POST['puesto'];
    $estatus = $_POST['estatus'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tipo = $_POST['tipo'];
    $current_time = date('Y-m-d H:i:s');
    $connect = getDBConnection();
    $sql = "INSERT INTO `users` (`nombre`, `apellido`, `numero`, `correo`, `diaRegistrado` , `puesto`, `estatus`, `username`, `password`, `tipo`) VALUES('$nombre', '$apellido', '$numero', '$correo', '$current_time' , '$puesto', '$estatus','$username', sha1('$password') , '$tipo')";
    $statement = $connect->prepare($sql);
    $statement->execute(); 
}
?>
<!DOCTYPE html>
<html>
<head>
        <title>Gerencia de Analisis</title>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
        <script>
            function validateForm() {
                return false;
            }
        </script>
        <script>
            $(document).ready( function(){
                $("#user").change(function()
                {
                    error = true;
                    // alert("Enter name please.");
                    $.ajax({
                        type: "GET",
                        url: "checkDeUser.php",
                        dataType: "json",
                        data: { "username": $("#user").val() },
                        success: function(data,status) {
                            // alert(data);
                            if(!data) {
                                document.getElementById("username").style.color = "#008000";
                                $("#username").html("Available");
                                error = false;
                            }
                            else {
                                document.getElementById("username").style.color = "#ff0000";
                                $("#username").html("Username Already Taken");
                                error = true;
                            }
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                    });//ajax
                });

                 $("#Submit").click(function() {
                    document.getElementById("setInfo").style.fontSize = "24px";
                    if(error == false) {
                        document.getElementById("setInfo").style.color = "#008000";
                        $("#setInfo").html("Record Added!");
                    }
                    else if(error == true){
                        document.getElementById("setInfo").style.color = "#ff0000";
                        $("#setInfo").html("Fix Error!");
                    }
                    else{
                        document.getElementById("setInfo").style.color = "#ff0000";
                        $("#setInfo").html("Fill in Blank!");
                    }
                });

                 $("#repassword").change(function()
                {
                    if($("#password").val() != $("#repassword").val()) {
                        document.getElementById("rePassword").style.color = "#ff0000";
                        $("#rePassword").html("Password Does Not Match");
                        error = true;
                    }
                    else {
                        document.getElementById("rePassword").style.color = "#008000";
                        $("#rePassword").html("Match");
                        error = false;
                    }
                });
            });
        </script>
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
        	<h4>Creacion de Cuentas</h4>
        	<form method="post">
                <legend></legend>
                <label>Nombre:</label>
                <input class="form-control" name="nombre" type="text"><br>
                <label>Apellido: </label>              
                <input class="form-control" name="apellido" type="text"><br>
                <label>Numero de Telephono: </label>   
                <input class="form-control" name="numero" type="text"><br>
                <label>Correo: </label>               
                <input class="form-control" name="correo" type="text"><br>
                <label>Area:</label>                   
                <input class="form-control" name="puesto" type="text"><br>    
                <label>Numero de Usuario:</label>                   
                <input class="form-control" name="userId" type="text"><br>              
                <label>Poscion: </label>                
                <select class="form-control" name="tipo">
                    <option value="">Seleccione una Poscion</option>
                    <option value="ge">Administrador</option>
                    <option value="us">Solicitante</option>
                    <option value="ge">Lider de Analisis y Proyecto</option>
                    <option value="ge">Aanalista</option>
                    <option value="ge">Gerencia de Analisis</option>
                    <option value="ge">Vice Presidente</option>
                </select><br>
                <label>Estatus: </label>                
                <select class="form-control" name="estatus">
                    <option value="">Seleccione Estatus</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select><br>
                <lable>Nombre de Ususario:</label>
                <input class="form-control" type="text" name="username" id = "user"> <span class="text-danger" id="username"></span> <br>
                <label>Contrasena: </label>            
                <input class="form-control" type="password" name="password" id = "password"><br>
                <label>Reentrar Contrasena: </label>   
                <input  class="form-control" type="password" id = "repassword"> <span class="badge badge-success" id="rePassword"></span> <br><br>
                <input type="submit" name='insert' value="Registrar" class="btn btn-primary">
        	</form>
        </div>
	</body>
</html>