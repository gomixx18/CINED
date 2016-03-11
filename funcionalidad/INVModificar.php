<?php

session_start();
if (isset($_POST["INVModificarInvestigador"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $pass = "123";


    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

    if ($connection) {

        //UPDATE `uned`.`estudiantes` SET `nombre`='papa', `apellido1`='p', `apellido2`='p', `password`='p', `correo`='p@p' WHERE `id`='123';
        $sentenciaSQL = "UPDATE ieinvestigadores SET nombre = '" . $nombre . "', apellido1 ='" . $ap1 . "', apellido2 ='" . $ap2 . "', correo ='" . $correo . "' WHERE id =" . $id . "";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }
    header("Location: ../admin_investigador.php");
}

if (isset($_POST["INVModificarCoordinador"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $pass = "123";


    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

    if ($connection) {

        //UPDATE `uned`.`estudiantes` SET `nombre`='papa', `apellido1`='p', `apellido2`='p', `password`='p', `correo`='p@p' WHERE `id`='123';
        $sentenciaSQL = "UPDATE iecoordinadoresinvestigacion SET nombre = '" . $nombre . "', apellido1 ='" . $ap1 . "', apellido2 ='" . $ap2 . "', correo ='" . $correo . "' WHERE id =" . $id . "";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }
    header("Location: ../admin_coordinadorInv.php");
}


if (isset($_POST["INVModificarEvaluador"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $pass = "123";


    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

    if ($connection) {

        //UPDATE `uned`.`estudiantes` SET `nombre`='papa', `apellido1`='p', `apellido2`='p', `password`='p', `correo`='p@p' WHERE `id`='123';
        $sentenciaSQL = "UPDATE ieevaluadores SET nombre = '" . $nombre . "', apellido1 ='" . $ap1 . "', apellido2 ='" . $ap2 . "', correo ='" . $correo . "' WHERE id =" . $id . "";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }
    header("Location: ../admin_evaluador.php");
}


if (isset($_POST["INVModificarMiembro"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $pass = "123";


    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

    if ($connection) {

        //UPDATE `uned`.`estudiantes` SET `nombre`='papa', `apellido1`='p', `apellido2`='p', `password`='p', `correo`='p@p' WHERE `id`='123';
        $sentenciaSQL = "UPDATE iemiembroscomiex SET nombres = '" . $nombre . "', apellido1 ='" . $ap1 . "', apellido2 ='" . $ap2 . "', correo ='" . $correo . "' WHERE id =" . $id . "";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }
    header("Location: ../admin_MiembroComiex.php");
}


if (isset($_POST["INVModificarLinea"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

    if ($connection) {

        //UPDATE `uned`.`estudiantes` SET `nombre`='papa', `apellido1`='p', `apellido2`='p', `password`='p', `correo`='p@p' WHERE `id`='123';
        $sentenciaSQL = "UPDATE lineasinvestigacion SET nombre = '" . $nombre . "' WHERE codigo =" . $id . "";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }
    header("Location: ../admin_LineasInvestigacion.php");
}


if (isset($_POST["INVModificarCarrera"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

    if ($connection) {

        //UPDATE `uned`.`estudiantes` SET `nombre`='papa', `apellido1`='p', `apellido2`='p', `password`='p', `correo`='p@p' WHERE `id`='123';
        $sentenciaSQL = "UPDATE carreras SET nombre = '" . $nombre . "' WHERE codigo =" . $id . "";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }
    header("Location: ../admin_Carreras.php");
}

if (isset($_POST["INVModificarCatedra"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

    if ($connection) {

        //UPDATE `uned`.`estudiantes` SET `nombre`='papa', `apellido1`='p', `apellido2`='p', `password`='p', `correo`='p@p' WHERE `id`='123';
        $sentenciaSQL = "UPDATE catedras SET nombre = '" . $nombre . "' WHERE codigo =" . $id . "";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }
    header("Location: ../admin_Catedras.php");
}