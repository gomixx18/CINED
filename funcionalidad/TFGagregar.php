<?php
require("../funcionalidad/email.php");

session_start();
if (isset($_POST["TFGagregarEstudiante"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    
    $pass = "a" . substr(md5(microtime()), 1, 7);
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

 
    if ($connection) {
        $sentenciaSQL = "INSERT INTO tfgestudiantes (id, nombre, apellido1, apellido2, password, correo, estado) VALUES ('". $id ."' , '". $nombre ."', '". $ap1 ."', '". $ap2 ."', '".$pass ."', '". $correo ."', 1)";
        $resultado = mysqli_query($connection, $sentenciaSQL); 
        $sentenciaSQLexist = "SELECT * FROM usuarios where id= '". $id . "'";
        $resultadoExist = mysqli_query($connection, $sentenciaSQLexist);
        if(mysqli_num_rows($resultadoExist) == 0){
            $sentenciaSQLusarios = "INSERT INTO usuarios (id, password, estudiante, encargadotfg, asesortfg, directortfg, miembrocomisiontfg, investigador, coordinadorinvestigacion, evaluador, miembrocomiex) VALUES ('". $id ."' , '". $pass ."', true, false, false, false, false, false, false, false, false)";
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
        else{
            $sentenciaSQLusarios = "UPDATE usuarios SET estudiante = true WHERE id= '". $id . "'";
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
        mysqli_close($connection);
    }
    //*** -- validar mas adelante -- ***
    newUserMail($id, $pass, $correo);

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
    $pass = "a" . substr(md5(microtime()), 1, 7);
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

 
    if ($connection) {
        $sentenciaSQL = "INSERT INTO tfgdirectores (id, nombre, apellido1, apellido2, password, correo, titulo, especialidad, estado) VALUES ('". $id ."' , '". $nombre ."', '". $ap1 ."', '". $ap2 ."', '".$pass ."', '". $correo ."', '".$titulo ."', '".$especialidad ."', 1)";
        $resultado = mysqli_query($connection, $sentenciaSQL); 
        $sentenciaSQLexist = "SELECT * FROM usuarios where id= '". $id . "'";
        $resultadoExist = mysqli_query($connection, $sentenciaSQLexist);
        if(mysqli_num_rows($resultadoExist) == 0){
            $sentenciaSQLusarios = "INSERT INTO usuarios (id, password, estudiante, encargadotfg, asesortfg, directortfg, miembrocomisiontfg, investigador, coordinadorinvestigacion, evaluador, miembrocomiex) VALUES ('". $id ."' , '". $pass ."', false, false, false, true, false, false, false, false, false)";
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
        else{
            $sentenciaSQLusarios = "UPDATE usuarios SET directortfg = true WHERE id= '". $id . "'";
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
        mysqli_close($connection);
    }

     //*** -- validar mas adelante -- ***
    newUserMail($id, $pass, $correo);
   
    header("Location: ../admin_directores.php");
}


if (isset($_POST["TFGagregarEncargado"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $pass = "a" . substr(md5(microtime()), 1, 7);
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

 
    if ($connection) {
        $sentenciaSQL = "INSERT INTO tfgencargados (id, nombre, apellido1, apellido2, password, correo, estado) VALUES ('". $id ."' , '". $nombre ."', '". $ap1 ."', '". $ap2 ."', '".$pass ."', '". $correo ."', 1)";
        $resultado = mysqli_query($connection, $sentenciaSQL); 
        $sentenciaSQLexist = "SELECT * FROM usuarios where id= '". $id . "'";
        $resultadoExist = mysqli_query($connection, $sentenciaSQLexist);
        if(mysqli_num_rows($resultadoExist) == 0){
            $sentenciaSQLusarios = "INSERT INTO usuarios (id, password, estudiante, encargadotfg, asesortfg, directortfg, miembrocomisiontfg, investigador, coordinadorinvestigacion, evaluador, miembrocomiex) VALUES ('". $id ."' , '". $pass ."', false, true, false, false, false, false, false, false, false)";
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
        else{
            $sentenciaSQLusarios = "UPDATE usuarios SET encargadotfg = true WHERE id= '". $id . "'";
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
        mysqli_close($connection);
    }

     //*** -- validar mas adelante -- ***
    newUserMail($id, $pass, $correo);
   
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
    $pass = $pass = "a" . substr(md5(microtime()), 1, 7);

     $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

 
    if ($connection) {
        $sentenciaSQL = "INSERT INTO tfgasesores (id, nombre, apellido1, apellido2, password, correo, especialidad, estado) VALUES ('". $id ."' , '". $nombre ."', '". $ap1 ."', '". $ap2 ."', '".$pass ."', '". $correo ."', '".$especialidad ."', 1)";
        $resultado = mysqli_query($connection, $sentenciaSQL); 
        $sentenciaSQLexist = "SELECT * FROM usuarios where id= '". $id . "'";
        $resultadoExist = mysqli_query($connection, $sentenciaSQLexist);
        if(mysqli_num_rows($resultadoExist) == 0){
            $sentenciaSQLusarios = "INSERT INTO usuarios (id, password, estudiante, encargadotfg, asesortfg, directortfg, miembrocomisiontfg, investigador, coordinadorinvestigacion, evaluador, miembrocomiex) VALUES ('". $id ."' , '". $pass ."', false, false, true, false, false, false, false, false, false)";
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
        else{
            $sentenciaSQLusarios = "UPDATE usuarios SET asesortfg = true WHERE id= '". $id . "'";
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
        mysqli_close($connection);
    }

    
    //*** -- validar mas adelante -- ***
    newUserMail($id, $pass, $correo);
    header("Location: ../admin_asesores.php");
}


if (isset($_POST["TFGagregarMiembroComision"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $pass = $pass = "a" . substr(md5(microtime()), 1, 7);
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

 
    if ($connection) {
        $sentenciaSQL = "INSERT INTO tfgmiembroscomision (id, nombre, apellido1, apellido2, password, correo, estado) VALUES ('". $id ."' , '". $nombre ."', '". $ap1 ."', '". $ap2 ."', '".$pass ."', '". $correo ."', 1)";
        $resultado = mysqli_query($connection, $sentenciaSQL); 
        $sentenciaSQLexist = "SELECT * FROM usuarios where id= '". $id . "'";
        $resultadoExist = mysqli_query($connection, $sentenciaSQLexist);
        if(mysqli_num_rows($resultadoExist) == 0){
            $sentenciaSQLusarios = "INSERT INTO usuarios (id, password, estudiante, encargadotfg, asesortfg, directortfg, miembrocomisiontfg, investigador, coordinadorinvestigacion, evaluador, miembrocomiex) VALUES ('". $id ."' , '". $pass ."', false, false, false, false, true, false, false, false, false)";
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
        else{
            $sentenciaSQLusarios = "UPDATE usuarios SET miembrocomisiontfg = true WHERE id= '". $id . "'";
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
        mysqli_close($connection);
    }

    // ** validar **
    newUserMail($id, $pass, $correo);
   
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