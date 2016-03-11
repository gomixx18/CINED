<?php

session_start();
if (isset($_POST["INVAgregarInvestigador"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $pass = "123";


<<<<<<< HEAD
    $connection = mysqli_connect("localhost", "root", "", "uned_db");
=======
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
>>>>>>> origin/master

    if ($connection) {
        $sentenciaSQL = "INSERT INTO ieinvestigadores (id, nombre, apellido1, apellido2, password, correo) VALUES (" . $id . ", '" . $nombre . "', '" . $ap1 . "', '" . $ap2 . "', '" . $pass . "', '" . $correo . "')";
        $resultado = mysqli_query($connection, $sentenciaSQL);
<<<<<<< HEAD
        $sentenciaSQLexist = "SELECT * FROM usuarios where id= ". $id;
        $resultadoExist = mysqli_query($connection, $sentenciaSQLexist);
        if(mysqli_num_rows($resultadoExist) == 0){
            $sentenciaSQLusarios = "INSERT INTO usuarios (id, password, estudiante, encargadotfg, asesortfg, directortfg, miembrocomisiontfg, investigador, coordinadorinvestigacion, evaluador, miembrocomiex) VALUES (". $id .", '". $pass ."', false, false, false, false, false, true, false, false, false)";
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
        else{
            $sentenciaSQLusarios = "UPDATE usuarios SET investigador = true WHERE id= ". $id;
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
=======
>>>>>>> origin/master
        mysqli_close($connection);
    }



    header("Location: ../admin_investigador.php");
}
if (isset($_POST["INVAgregarCoordinador"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $pass = "123";


<<<<<<< HEAD
    $connection = mysqli_connect("localhost", "root", "", "uned_db");
=======
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
>>>>>>> origin/master

    if ($connection) {
        $sentenciaSQL = "INSERT INTO iecoordinadoresinvestigacion (id, nombre, apellido1, apellido2, password, correo) VALUES (" . $id . ", '" . $nombre . "', '" . $ap1 . "', '" . $ap2 . "', '" . $pass . "', '" . $correo . "')";
        $resultado = mysqli_query($connection, $sentenciaSQL);
<<<<<<< HEAD
        $sentenciaSQLexist = "SELECT * FROM usuarios where id= ". $id;
        $resultadoExist = mysqli_query($connection, $sentenciaSQLexist);
        if(mysqli_num_rows($resultadoExist) == 0){
            $sentenciaSQLusarios = "INSERT INTO usuarios (id, password, estudiante, encargadotfg, asesortfg, directortfg, miembrocomisiontfg, investigador, coordinadorinvestigacion, evaluador, miembrocomiex) VALUES (". $id .", '". $pass ."', false, false, false, false, false, false, true, false, false)";
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
        else{
            $sentenciaSQLusarios = "UPDATE usuarios SET coordinadorinvestigacion = true WHERE id= ". $id;
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
=======
>>>>>>> origin/master
        mysqli_close($connection);
    }



    header("Location: ../admin_coordinadorInv.php");
}

if (isset($_POST["INVAgregarEvaluador"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $pass = "123";


<<<<<<< HEAD
    $connection = mysqli_connect("localhost", "root", "", "uned_db");
=======
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
>>>>>>> origin/master

    if ($connection) {
        $sentenciaSQL = "INSERT INTO ieevaluadores (id, nombre, apellido1, apellido2, password, correo) VALUES (" . $id . ", '" . $nombre . "', '" . $ap1 . "', '" . $ap2 . "', '" . $pass . "', '" . $correo . "')";
        $resultado = mysqli_query($connection, $sentenciaSQL);
<<<<<<< HEAD
        $sentenciaSQLexist = "SELECT * FROM usuarios where id= ". $id;
        $resultadoExist = mysqli_query($connection, $sentenciaSQLexist);
        if(mysqli_num_rows($resultadoExist) == 0){
            $sentenciaSQLusarios = "INSERT INTO usuarios (id, password, estudiante, encargadotfg, asesortfg, directortfg, miembrocomisiontfg, investigador, coordinadorinvestigacion, evaluador, miembrocomiex) VALUES (". $id .", '". $pass ."', false, false, false, false, false, false, false, true, false)";
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
        else{
            $sentenciaSQLusarios = "UPDATE usuarios SET evaluador = true WHERE id= ". $id;
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
=======
>>>>>>> origin/master
        mysqli_close($connection);
    }



    header("Location: ../admin_evaluador.php");
}


if (isset($_POST["INVAgregarMiembro"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
  


<<<<<<< HEAD
    $connection = mysqli_connect("localhost", "root", "", "uned_db");
=======
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
>>>>>>> origin/master

    if ($connection) {
        $sentenciaSQL = "INSERT INTO iemiembroscomiex (id, nombres, apellido1, apellido2, correo) VALUES (" . $id . ", '" . $nombre . "', '" . $ap1 . "', '" . $ap2  . "', '" . $correo . "')";
        $resultado = mysqli_query($connection, $sentenciaSQL);
<<<<<<< HEAD
        $sentenciaSQLexist = "SELECT * FROM usuarios where id= ". $id;
        $resultadoExist = mysqli_query($connection, $sentenciaSQLexist);
        if(mysqli_num_rows($resultadoExist) == 0){
            $sentenciaSQLusarios = "INSERT INTO usuarios (id, password, estudiante, encargadotfg, asesortfg, directortfg, miembrocomisiontfg, investigador, coordinadorinvestigacion, evaluador, miembrocomiex) VALUES (". $id .", '". $pass ."', false, false, false, false, false, false, false, false, true)";
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
        else{
            $sentenciaSQLusarios = "UPDATE usuarios SET miembrocomiex = true WHERE id= ". $id;
            $resultadoUsuarios = mysqli_query($connection, $sentenciaSQLusarios); 
        }
=======
>>>>>>> origin/master
        mysqli_close($connection);
    }



    header("Location: ../admin_MiembroComiex.php");
}


if (isset($_POST["INVAgregarLinea"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];


<<<<<<< HEAD
    $connection = mysqli_connect("localhost", "root", "", "uned_db");
=======
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
>>>>>>> origin/master

    if ($connection) {
        $sentenciaSQL = "INSERT INTO lineasinvestigacion (codigo, nombre) VALUES (" . $id . ", '" . $nombre . "')";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }



    header("Location: ../admin_LineasInvestigacion.php");
}


if (isset($_POST["INVAgregarCarrera"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];


<<<<<<< HEAD
    $connection = mysqli_connect("localhost", "root", "", "uned_db");
=======
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
>>>>>>> origin/master

    if ($connection) {
        $sentenciaSQL = "INSERT INTO carreras (codigo, nombre) VALUES (" . $id . ", '" . $nombre . "')";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }



    header("Location: ../admin_Carreras.php");
}

if (isset($_POST["INVAgregarCatedra"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
<<<<<<< HEAD
    $connection = mysqli_connect("localhost", "root", "", "uned_db");
=======
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
>>>>>>> origin/master

    if ($connection) {
        $sentenciaSQL = "INSERT INTO catedras (codigo, nombre) VALUES (" . $id . ", '" . $nombre . "')";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }



    header("Location: ../admin_Catedras.php");
}