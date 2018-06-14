<?php
//Incluye Conexion
include '../functions/getConnection.php';
getDBConnection();

// Inserta la informacion de la forma a la base de datos si los parametros son cumplidos
if(isset($_POST['insert']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['numero']) && !empty($_POST['correo']) && !empty($_POST['puesto']) && !empty($_POST['estatus']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['tipo'])) {
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
        // Verifica que el nombre de usuario este habilitado
        error = true;
            $(document).ready( function(){
                $("#user").change(function()
                {
                    error = true;
                    // alert("Enter name please.");
                    $.ajax({
                        type: "GET",
                        url: "../functions/checkDeUser.php",
                        dataType: "json",
                        data: { "username": $("#user").val() },
                        success: function(data,status) {
                            // alert(data);
                            if(!data) {
                                document.getElementById("username");
                                $("#username").html("Habilitado").addClass("text-success");
                                error = false;
                            }
                            else {
                                document.getElementById("username");
                                $("#username").html("Ese Nombre de Usurario ya esta Utilizado").addClass("text-danger");
                                error = true;
                            }
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                    });//ajax
                });

                // Verfica que la informacion ingresada fue guardada
                 $("#Submit").click(function() {
                    document.getElementById("setInfo").style.fontSize = "24px";
                    if(error == false) {
                        document.getElementById("setInfo");
                        $("#setInfo").html("Agregado!").addClass("text-success");
                    }
                    else if(error == true){
                        document.getElementById("setInfo");
                        $("#setInfo").html("Hay Error!").addClass("text-danger");
                    }
                    else{
                        document.getElementById("setInfo");
                        $("#setInfo").html("Complete la Forma").addClass("text-danger");
                    }
                });
                
                // Asegura que la segunda contrasena ingresada sea igual que la primera
                 $("#repassword").change(function()
                {
                    if($("#password").val() != $("#repassword").val()) {
                        document.getElementById("rePassword");
                        $("#rePassword").html("Password no Coincide").addClass("text-danger");
                        error = true;
                    }
                    else {
                        document.getElementById("rePassword");
                        $("#rePassword").html("Coincide").addClass("text-success");
                        error = false;
                    }
                });
            });
        </script>
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
            <?php
            // Muestra un error en la parte superior si hay algo sin llenar en la forma
            if (isset($_POST['insert']) && (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['numero']) || empty($_POST['correo']) || empty($_POST['puesto']) || empty($_POST['estatus']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['tipo']))) {
                echo '<h2 class="badge badge-pill badge-danger">Error</h2>';
            }
            ?>
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
                <label>Posicion: </label>                
                <select class="form-control" name="tipo">
                    <option value="">Seleccione una Posicion</option>
                    <option value="ad">Administrador</option>
                    <option value="us">Solicitante</option>
                    <option value="li">Lider de Analisis y Proyecto</option>
                    <option value="an">Analista</option>
                    <option value="ga">Gerencia de Analisis</option>
                    <option value="vp">Vice Presidente</option>
                </select><br>
                <label>Estatus: </label>                
                <select class="form-control" name="estatus">
                    <option value="">Seleccione Estatus</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select><br>
                <lable>Nombre de Ususario:</label>
                <input class="form-control" type="text" name="username" id = "user"> <span id="username"></span> <br>
                <label>Contrasena: </label>            
                <input class="form-control" type="password" name="password" id = "password"><br>
                <label>Reentrar Contrasena: </label>   
                <input  class="form-control" type="password" id = "repassword"> <span id="rePassword"></span> <br><br>
                <input type="submit" id="Submit" name='insert' value="Registrar" class="btn btn-primary">
                <div id="setInfo"></div>
        	</form>
        </div>
	</body>
</html>