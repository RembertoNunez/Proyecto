<?php
session_start();
include 'getConnection.php';
$connect = getDBConnection();

$id = $_SESSION['userId'];
$idLog = $_SESSION['userLog'];
$sql = "SELECT * FROM `users` WHERE id = $id";
$stmt = $connect->prepare($sql);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$current_logout_time = date('Y-m-d H:i:s');

if($user['estatus'] == "Activo"){
    $sql = "UPDATE `users` SET `estatus`='Inactivo' WHERE `users`.`id` = '$id'";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sql = "UPDATE `logs` SET `finalizacion` = '$current_logout_time' WHERE `logs`.`userId` = '$id' and `logs`.`id` = $idLog";
    $statement = $connect->prepare($sql);
    $statement->execute();
    header('Location: ../index.php');
} 
else if($user == "Inactivo") {
    echo "<h4>El Usuario ya esta inactivo porfavor regrese al login <a href='../index.php'>AQUI</a><h4>";
}
else {
    echo "<h4>Los datos ingresados son incorrectos porfavor intentar de nuevo <a href='../index.php'>AQUI</a><h4>";
}
?>