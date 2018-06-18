<?php
// Verifica que el Usuario y la Contrasena esten correctos

session_start();
include 'getConnection.php';
$connect = getDBConnection();

// Conexion con la base de datos
$sql = "SELECT * FROM `users` WHERE username = :username AND password = :password";
$stmt = $connect->prepare($sql);
$data = array(":username" => $_POST['username'], ":password" => sha1($_POST['password']));
$stmt->execute($data);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$current_time = date('Y-m-d H:i:s');

// Funcion para agarrar el IP del usuario que usa la pagina
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

// Crea varaibale y session para guardar la IP del usuario
$_SESSION['ip'] = get_client_ip();
$ip = get_client_ip();

if($user['estatus'] == 'Activo') {
    // Verifica el tipo de cuenta del usuario para ingresarlo a su respectivo Dashboard
    if($user['tipo'] == "ad" && $user['username'] == $_POST['username']){
        // Crea session para guardar el nombre de usuario y el id del usuario
        $_SESSION['username'] = $user['username'];
        $_SESSION['userId'] = $user['id'];
        // Crea variable para guardar el nombre de usuario y el id del usuario
        $id = $user['id'];
        $nombre = $_POST['username'];
        // Code in SQL para actualizar el tiempo que el usuario hizo login y cabiar el estatus a activo
        $sql = "UPDATE `users` SET `ultimoLogin`='$current_time', `estatus`='Activo' WHERE `users`.`username`='$nombre';";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        // Code in SQL para agregar el log del usuario con el id, la hora que inicio, y la dericcion IP 
        $sql = "INSERT INTO `logs` (`userId`, `inicio`, `direccionIP`) VALUES('$id', '$current_time', '$ip')";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        // Code in SQL aggarar el id del ultimpo log para poder agregar informacion del log
        $sql = "SELECT LAST_INSERT_ID() FROM `logs`";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        $log = $statement->fetch(PDO::FETCH_ASSOC);
        $_SESSION['userLog'] = $log['LAST_INSERT_ID()'];
        // Envia al usuario a la pagina del administrador
        header('Location: ../moduloDeSeguridad/administrador.php');
    } 
    
    else if($user['tipo'] == "us" && $user['username'] == $_POST['username']){
        // Crea session para guardar el nombre de usuario y el id del usuario
        $_SESSION['username'] = $user['username'];
        $_SESSION['userId'] = $user['id'];
        // Crea variable para guardar el nombre de usuario y el id del usuario
        $id = $user['id'];
        $nombre = $_POST['username'];
        // Code in SQL para actualizar el tiempo que el usuario hizo login y cabiar el estatus a activo
        $sql = "UPDATE `users` SET `ultimoLogin`='$current_time', `estatus`='Activo' WHERE `users`.`username`='$nombre';";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        // Code in SQL para agregar el log del usuario con el id, la hora que inicio, y la dericcion IP 
        $sql = "INSERT INTO `logs` (`userId`, `inicio`, `direccionIP`) VALUES('$id', '$current_time', '$ip')";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        // Code in SQL aggarar el id del ultimpo log para poder agregar informacion del log
        $sql = "SELECT LAST_INSERT_ID() FROM `logs`";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        $log = $statement->fetch(PDO::FETCH_ASSOC);
        $_SESSION['userLog'] = $log['LAST_INSERT_ID()'];
        // Envia al usuario a la pagina de solicitante
        header('Location: ../moduloDeSeguridad/usuarioFinal.php');
    }
    
    else if($user['tipo'] == "li" && $user['username'] == $_POST['username']){
        // Crea session para guardar el nombre de usuario y el id del usuario
        $_SESSION['username'] = $user['username'];
        $_SESSION['userId'] = $user['id'];
        // Crea variable para guardar el nombre de usuario y el id del usuario
        $id = $user['id'];
        $nombre = $_POST['username'];
        // Code in SQL para actualizar el tiempo que el usuario hizo login y cabiar el estatus a activo
        $sql = "UPDATE `users` SET `ultimoLogin`='$current_time', `estatus`='Activo' WHERE `users`.`username`='$nombre';";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        // Code in SQL para agregar el log del usuario con el id, la hora que inicio, y la dericcion IP 
        $sql = "INSERT INTO `logs` (`userId`, `inicio`, `direccionIP`) VALUES('$id', '$current_time', '$ip')";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        // Code in SQL aggarar el id del ultimpo log para poder agregar informacion del log
        $sql = "SELECT LAST_INSERT_ID() FROM `logs`";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        $log = $statement->fetch(PDO::FETCH_ASSOC);
        $_SESSION['userLog'] = $log['LAST_INSERT_ID()'];
        // Envia al usuario a la pagina de lider de any proyecto
        header('Location: ../moduloDeSeguridad/liderDeAnyPro.php');
    }
    
    else if($user['tipo'] == "an" && $user['username'] == $_POST['username']){
        // Crea session para guardar el nombre de usuario y el id del usuario
        $_SESSION['username'] = $user['username'];
        $_SESSION['userId'] = $user['id'];
        // Crea variable para guardar el nombre de usuario y el id del usuario
        $id = $user['id'];
        $nombre = $_POST['username'];
        // Code in SQL para actualizar el tiempo que el usuario hizo login y cabiar el estatus a activo
        $sql = "UPDATE `users` SET `ultimoLogin`='$current_time', `estatus`='Activo' WHERE `users`.`username`='$nombre';";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        // Code in SQL para agregar el log del usuario con el id, la hora que inicio, y la dericcion IP 
        $sql = "INSERT INTO `logs` (`userId`, `inicio`, `direccionIP`) VALUES('$id', '$current_time', '$ip')";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        // Code in SQL aggarar el id del ultimpo log para poder agregar informacion del log
        $sql = "SELECT LAST_INSERT_ID() FROM `logs`";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        $log = $statement->fetch(PDO::FETCH_ASSOC);
        $_SESSION['userLog'] = $log['LAST_INSERT_ID()'];
        // Envia al usuario a la pagina de Analista
        header('Location: ../moduloDeSeguridad/analista.php');
    }
    
    else if($user['tipo'] == "ga" && $user['username'] == $_POST['username']){
        // Crea session para guardar el nombre de usuario y el id del usuario
        $_SESSION['username'] = $user['username'];
        $_SESSION['userId'] = $user['id'];
        // Crea variable para guardar el nombre de usuario y el id del usuario
        $id = $user['id'];
        $nombre = $_POST['username'];
        // Code in SQL para actualizar el tiempo que el usuario hizo login y cabiar el estatus a activo
        $sql = "UPDATE `users` SET `ultimoLogin`='$current_time', `estatus`='Activo' WHERE `users`.`username`='$nombre';";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        // Code in SQL para agregar el log del usuario con el id, la hora que inicio, y la dericcion IP 
        $sql = "INSERT INTO `logs` (`userId`, `inicio`, `direccionIP`) VALUES('$id', '$current_time', '$ip')";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        // Code in SQL aggarar el id del ultimpo log para poder agregar informacion del log
        $sql = "SELECT LAST_INSERT_ID() FROM `logs`";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        $log = $statement->fetch(PDO::FETCH_ASSOC);
        $_SESSION['userLog'] = $log['LAST_INSERT_ID()'];
        // Envia al usuario a la pagina de la Gerencia de Analisis
        header('Location: ../moduloDeSeguridad/gerenciaAnalisis.php');
    }
    
    else if($user['tipo'] == "vp" && $user['username'] == $_POST['username']){
        // Crea session para guardar el nombre de usuario y el id del usuario
        $_SESSION['username'] = $user['username'];
        $_SESSION['userId'] = $user['id'];
        // Crea variable para guardar el nombre de usuario y el id del usuario
        $id = $user['id'];
        $nombre = $_POST['username'];
        // Code in SQL para actualizar el tiempo que el usuario hizo login y cabiar el estatus a activo
        $sql = "UPDATE `users` SET `ultimoLogin`='$current_time', `estatus`='Activo' WHERE `users`.`username`='$nombre';";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        // Code in SQL para agregar el log del usuario con el id, la hora que inicio, y la dericcion IP 
        $sql = "INSERT INTO `logs` (`userId`, `inicio`, `direccionIP`) VALUES('$id', '$current_time', '$ip')";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        // Code in SQL aggarar el id del ultimpo log para poder agregar informacion del log
        $sql = "SELECT LAST_INSERT_ID() FROM `logs`";
        $statement = $connect->prepare($sql);
        $statement->execute(); 
        $log = $statement->fetch(PDO::FETCH_ASSOC);
        $_SESSION['userLog'] = $log['LAST_INSERT_ID()'];
        // Envia al usuario a la pagina de Vice Presidente
        header('Location: ../moduloDeSeguridad/vpPerfil.php');
    }
    
    else {
        echo "<h4>Los datos ingresados son incorrectos porfavor intentar de nuevo <a href='../index.php'>AQUI</a><h4>";
    }
}
else {
    echo "<h4>Este usario ya esta en Session <a href='../index.php'>AQUI</a><h4>";
}
?>