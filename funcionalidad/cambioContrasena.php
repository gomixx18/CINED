<?php

session_start();
if (isset($_POST["modifyPass"])) {

    $oldPass = $_POST["oldP"];
    $newPass = $_POST["newP"];
    $userID = $_POST["userGet"];
    $connection = mysqli_connect("localhost", "root", "", "uned_db");
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

    if ($connection) {
        $sentencia = "UPDATE usuarios SET password= '" . $newPass . "' WHERE id= '" . $userID . "'"
                . "AND password='" . $oldPass . "'";
        $resultado = mysqli_query($connection, $sentencia);
        mysqli_close($connection);
        
    } else {
        echo "No se pudo conectar con la base de datos.";
    }

    header("Location: ../login.php");
}
?>