<?php

    $nombre = strip_tags($_POST["nombre"]);
    $id = strip_tags($_POST["id"]);
    
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");


    if ($connection) {
        
        $sentenciaSQL = "DELETE FROM carreras WHERE nombre = '" . $nombre . "' AND codigo ='" . $id . "'";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        
        if($resultado == 0){
            echo 'No se puede eliminar esa carrera.';
        }else{
             echo 'Carrera eliminada.';
        }
        
        mysqli_close($connection);
        
        
    }
   // header("Location: ../admin_Carreras.php");


