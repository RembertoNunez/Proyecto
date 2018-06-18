<?php
session_start();
include '../functions/perfil.php';

?>
<html>
    <head>
        <title>Gerencia de Analisis</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="../moduloDeParametrizacion/parametrizacion.php">Parametrizacion</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../moduloDeParametrizacion/parametrizacion.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="creaProyecto.php">Crear Proyectos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="creaRequeri.php">Crear Requerimientos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../functions/logoff.php">Logout</a>
                </li>
            </ul>
        </nav>
        <!--<img src="../img/banner.png">-->
        <div class="container">
            <h4>Bienvenido</h4><br/>
            <h5>Ingrese Proyecto</h5>
            <form method="post">
                <label for="InputProy">Nombre del Proyecto</label>
                <input type="text" name="proyecto" class="form-control"/>
                <label for="InputUnidad">Unidad</label>
                <input type="text" name="unidad" class="form-control"/>
                <label for="InputLider">Lider de Proyecto</label>
                <input type="text" name="lider" class="form-control"/>
                <label for="InputProveedor">Proveedor(s)</label>
                <input type="text" name="proveedor" class="form-control"/>
                <label for="InputFecha1">Fecha de Peticion</label>
                <input type="text" name="fechaDePeti" class="form-control"/>
                <label for="InputFecha2">Fecha de Inicio</label>
                <input type="text" name="fechaInicio" class="form-control"/>
                <label for="InputFecha3">Fecha Final Estimada</label>
                <input type="text" name="fechaEstiFinal" class="form-control"/>
                <label for="InputVP">Vice Presidente Encargado</label>
                <input type="text" name="vp" class"form-control"/>
                
            </form>
        </div>
    </body>
</html>