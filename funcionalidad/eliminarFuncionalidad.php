<?php
if(isset($_POST["nombreCarrera"])){
    $nombre = strip_tags($_POST["nombreCarrera"]);
    $id = strip_tags($_POST["id"]);  
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
    if ($connection) {        
        $sentenciaSQL = "DELETE FROM carreras WHERE nombre = '" . $nombre . "' AND codigo ='" . $id . "'";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        
        if($resultado == 0){
            echo 'error';
        }else{
             echo 'success';
        }
        mysqli_close($connection);
        
        
    } else {
        echo 'db_error';
    }
}
if(isset($_POST["nombreCatedra"])){
    $nombre = strip_tags($_POST["nombreCatedra"]);
    $id = strip_tags($_POST["id"]);  
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
    if ($connection) {        
        $sentenciaSQL = "DELETE FROM catedras WHERE nombre = '" . $nombre . "' AND codigo ='" . $id . "'";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        
        if($resultado == 0){
            echo 'error';
        }else{
             echo 'success';
        }
        mysqli_close($connection);
        
        
    } else {
        echo 'db_error';
    }
}
if(isset($_POST["nombreLinea"])){
    $nombre = strip_tags($_POST["nombreLinea"]);
    $id = strip_tags($_POST["id"]);  
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
    if ($connection) {        
        $sentenciaSQL = "DELETE FROM lineasinvestigacion WHERE nombre = '" . $nombre . "' AND codigo ='" . $id . "'";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        
        if($resultado == 0){
            echo 'error';
        }else{
             echo 'success';
        }
        mysqli_close($connection);
        
        
    } else {
        echo 'db_error';
    }
}

if(isset($_POST["nombreModalidad"])){
    $nombre = strip_tags($_POST["nombreModalidad"]);
    $id = strip_tags($_POST["id"]);  
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
    if ($connection) {        
        $sentenciaSQL = "DELETE FROM modalidades WHERE nombre = '" . $nombre . "' AND codigo ='" . $id . "'";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        
        if($resultado == 0){
            echo 'error';
        }else{
             echo 'success';
        }
        mysqli_close($connection);
        
        
    } else {
        echo 'db_error';
    }
}



