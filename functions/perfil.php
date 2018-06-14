<?php
    session_start();
    include 'getConnection.php';
    getDBConnection();
    
    function perfil() {
        $id = $_SESSION['userId'];
        echo "<p>Numero de Usurario: " . $id . "</p>";
        $connect = getDBConnection();
        $sql = "SELECT * FROM `users` WHERE id = '$id'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        if($statement->rowCount() > 0) {
            while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo "<p>Nombre: " . $row['nombre'] . "</p>";
                echo "<p>Apellido: " . $row['apellido'] . "</p>";
                echo "<p>Nombre de Usuario: ". $row['username'] . "</p>";
                echo "<p>Numero de Telefono: ". $row['numero'] . "</p>";
                echo "<p>Correo: ". $row['correo'] . "</p>";
                echo "<p>Puesto: ". $row['puesto'] . "</p>";
                echo "<p>Estatus: ". $row['estatus'] . "</p>";
            }
        }
        else {
            echo "0 resultados";
        }
    }
?>