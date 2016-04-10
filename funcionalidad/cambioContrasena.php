<?php

session_start();

    $oldPass = $_POST["oldP"];
    $newPass = $_POST["newP"];
    $userID = $_POST["userGet"];
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

    if ($connection) {

        $sentencia = "UPDATE usuarios SET password= '" . $newPass . "' WHERE id= '" . $userID . "'"
                . "AND password='" . $oldPass . "'";

        $passwordQuery = "SELECT password FROM usuarios WHERE id='" . $userID . "'";
        $r1 = mysqli_query($connection, $passwordQuery);
        $row = mysqli_fetch_assoc($r1);
        $p = $row['password'];
        $str = str_replace(' ', '', $oldPass);
        $aux = strcasecmp((string)$str, (string)$p); 
        if ($aux == 0) {
            
            $resultado = mysqli_query($connection, $sentencia);
            mysqli_close($connection);
            $response_array['status'] = 'success';
            echo json_encode($response_array);
        } else {

            mysqli_close($connection);
            $response_array['status'] = 'error';
            $response_array['oldp'] = $oldPass;
            $response_array['newp'] = $newPass;
            $response_array['id'] = $userID;
            echo json_encode($response_array);
        }
        //cambiar en otras tablas
    } else {
        $response_array['status'] = 'db_conn_error';
        echo json_encode($response_array);
    }

?>