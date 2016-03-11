<?php

session_start();
if (isset($_POST["TFGagregarEstudiante"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $pass = "123";


     $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
 
    if ($connection) {
        $sentenciaSQL = "INSERT INTO tfgestudiantes (id, nombre, apellido1, apellido2, password, correo) VALUES (". $id .", '". $nombre ."', '". $ap1 ."', '". $ap2 ."', '".$pass ."', '". $correo ."')";
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


     $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
 
    if ($connection) {
        $sentenciaSQL = "INSERT INTO tfgdirectores (id, nombre, apellido1, apellido2, password, correo, titulo, especialidad) VALUES (". $id .", '". $nombre ."', '". $ap1 ."', '". $ap2 ."', '".$pass ."', '". $correo ."', '".$titulo ."', '".$especialidad ."')";
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


     $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
 
    if ($connection) {
        $sentenciaSQL = "INSERT INTO tfgencargados (id, nombre, apellido1, apellido2, password, correo) VALUES (". $id .", '". $nombre ."', '". $ap1 ."', '". $ap2 ."', '".$pass ."', '". $correo ."')";
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


     $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
 
    if ($connection) {
        $sentenciaSQL = "INSERT INTO tfgasesores (id, nombre, apellido1, apellido2, password, correo, especialidad) VALUES (". $id .", '". $nombre ."', '". $ap1 ."', '". $ap2 ."', '".$pass ."', '". $correo ."', '".$especialidad ."')";
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


     $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
 
    if ($connection) {
        $sentenciaSQL = "INSERT INTO tfgmiembroscomision (id, nombre, apellido1, apellido2, password, correo) VALUES (". $id .", '". $nombre ."', '". $ap1 ."', '". $ap2 ."', '".$pass ."', '". $correo ."')";
        $resultado = mysqli_query($connection, $sentenciaSQL); 
        mysqli_close($connection);
    }

    
   
    header("Location: ../admin_comisionTFG.php");
}


if (isset($_POST["TFGAgregarModalidad"])) {
    $nombre = $_POST["nombre"];
    $codigo = $_POST["codigo"];


    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

    if ($connection) {
        $sentenciaSQL = "INSERT INTO modalidades (codigo, nombre) VALUES (" . $codigo . ", '" . $nombre . "')";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }



    header("Location: ../admin_Modalidad.php");
}