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


// Verifica el tipo de cuenta del usuario para ingresarlo a su respectivo Dashboard
if($user['tipo'] == "ad" && $user['username'] == $_POST['username']){
    $_SESSION['username'] = $user['username'];
    $_SESSION['userId'] = $user['id'];
    $nombre = $_POST['username'];
    $sql = "UPDATE `users` SET `ultimoLogin`='$current_time' WHERE `users`.`username`='$nombre';";
    $statement = $connect->prepare($sql);
    $statement->execute(); 
    header('Location: ../moduloDeSeguridad/administrador.php');
} 

else if($user['tipo'] == "us" && $user['username'] == $_POST['username']){
    $_SESSION['username'] = $user['username'];
    $_SESSION['userId'] = $user['id'];
    $nombre = $_POST['username'];
    $sql = "UPDATE `users` SET `ultimoLogin`='$current_time' WHERE `users`.`username`='$nombre';";
    $statement = $connect->prepare($sql);
    $statement->execute(); 
    header('Location: ../moduloDeSeguridad/usuarioFinal.php');
}

else if($user['tipo'] == "li" && $user['username'] == $_POST['username']){
    $_SESSION['username'] = $user['username'];
    $_SESSION['userId'] = $user['id'];
    $nombre = $_POST['username'];
    $sql = "UPDATE `users` SET `ultimoLogin`='$current_time' WHERE `users`.`username`='$nombre';"; 
    $statement = $connect->prepare($sql);
    $statement->execute(); 
    header('Location: ../moduloDeSeguridad/liderDeAnyPro.php');
}

else if($user['tipo'] == "an" && $user['username'] == $_POST['username']){
    $_SESSION['username'] = $user['username'];
    $_SESSION['userId'] = $user['id'];
    $nombre = $_POST['username'];
    $sql = "UPDATE `users` SET `ultimoLogin`='$current_time' WHERE `users`.`username`='$nombre';";
    $statement = $connect->prepare($sql);
    $statement->execute(); 
    header('Location: ../moduloDeSeguridad/analista.php');
}

else if($user['tipo'] == "ga" && $user['username'] == $_POST['username']){
    $_SESSION['username'] = $user['username'];
    $_SESSION['userId'] = $user['id'];
    $nombre = $_POST['username'];
    $sql = "UPDATE `users` SET `ultimoLogin`='$current_time' WHERE `users`.`username`='$nombre';";
    $statement = $connect->prepare($sql);
    $statement->execute(); 
    header('Location: ../moduloDeSeguridad/gerenciaAnalisis.php');
}

else if($user['tipo'] == "vp" && $user['username'] == $_POST['username']){
    $_SESSION['username'] = $user['username'];
    $_SESSION['userId'] = $user['id'];
    $nombre = $_POST['username'];
    $sql = "UPDATE `users` SET `ultimoLogin`='$current_time' WHERE `users`.`username`='$nombre';";
    $statement = $connect->prepare($sql);
    $statement->execute(); 
    header('Location: ../moduloDeSeguridad/vpPerfil.php');
}

else {
    echo "<h4>Los datos ingresados son incorrectos porfavor intentar de nuevo <a href='../index.php'>AQUI</a><h4>";
}
?>