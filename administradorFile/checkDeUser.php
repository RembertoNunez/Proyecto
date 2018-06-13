<?php

include '../getConnection.php';

$conn = getDBConnection();

$username = $_GET['username'];

//next query allows SQL Injection!
$sql = "SELECT * FROM `users` WHERE username = :username ";


$stmt = $conn->prepare($sql);
$stmt->execute( array(":username"=> $username ));
$record = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($record);

?>