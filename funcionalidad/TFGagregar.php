<?php

session_start();
if (isset($_POST["TFGagregarEstudiante"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $pass = "123";


     $connection = mysqli_connect("localhost", "root", "cined123", "unedtfg");
 
    if ($connection) {
        $sentenciaSQL = "INSERT INTO estudiantes (id, nombre, apellido1, apellido2, password, correo) VALUES (". $id .", '". $nombre ."', '". $ap1 ."', '". $ap2 ."', '".$pass ."', '". $correo ."')";
        $resultado = mysqli_query($connection, $sentenciaSQL); 
        mysqli_close($connection);
    }

    
   
    header("Location: ../admin_estudiante.php");
}


if (isset($_POST["TFGagregarDirector"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $titulo = $_POST["titulo"];
    $especialidad = $_POST["especialidad"];
    $correo = $_POST["correo"];
    $pass = "123";


     $connection = mysqli_connect("localhost", "root", "cined123", "unedtfg");
 
    if ($connection) {
        $sentenciaSQL = "INSERT INTO directorestfg (id, nombre, apellido1, apellido2, password, correo, titulo, especialidad) VALUES (". $id .", '". $nombre ."', '". $ap1 ."', '". $ap2 ."', '".$pass ."', '". $correo ."', '".$titulo ."', '".$especialidad ."')";
        $resultado = mysqli_query($connection, $sentenciaSQL); 
        mysqli_close($connection);
    }

    
   
    header("Location: ../admin_directores.php");
}


if (isset($_POST["TFGagregarEncargado"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $pass = "123";


     $connection = mysqli_connect("localhost", "root", "cined123", "unedtfg");
 
    if ($connection) {
        $sentenciaSQL = "INSERT INTO encargadostfg (id, nombre, apellido1, apellido2, password, correo) VALUES (". $id .", '". $nombre ."', '". $ap1 ."', '". $ap2 ."', '".$pass ."', '". $correo ."')";
        $resultado = mysqli_query($connection, $sentenciaSQL); 
        mysqli_close($connection);
    }

    
   
    header("Location: ../admin_encargados.php");
}


if (isset($_POST["TFGagregarAsesor"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $titulo = $_POST["titulo"];
    $especialidad = $_POST["especialidad"];
    $correo = $_POST["correo"];
    $pass = "123";


     $connection = mysqli_connect("localhost", "root", "cined123", "unedtfg");
 
    if ($connection) {
        $sentenciaSQL = "INSERT INTO asesores (id, nombre, apellido1, apellido2, password, correo, titulo, especialidad) VALUES (". $id .", '". $nombre ."', '". $ap1 ."', '". $ap2 ."', '".$pass ."', '". $correo ."', '".$titulo ."', '".$especialidad ."')";
        $resultado = mysqli_query($connection, $sentenciaSQL); 
        mysqli_close($connection);
    }

    
   
    header("Location: ../admin_asesores.php");
}


if (isset($_POST["TFGagregarMiembroComision"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $pass = "123";


     $connection = mysqli_connect("localhost", "root", "cined123", "unedtfg");
 
    if ($connection) {
        $sentenciaSQL = "INSERT INTO miembroscomisiontfg (id, nombre, apellido1, apellido2, password, correo) VALUES (". $id .", '". $nombre ."', '". $ap1 ."', '". $ap2 ."', '".$pass ."', '". $correo ."')";
        $resultado = mysqli_query($connection, $sentenciaSQL); 
        mysqli_close($connection);
    }

    
   
    header("Location: ../admin_comisionTFG.php");
}