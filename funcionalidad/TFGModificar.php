<?php

session_start();
if (isset($_POST["TFGModificarEstudiante"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $pass = "123";

    $connection = mysqli_connect("localhost", "root", "cined123", "unedtfg");
    if ($connection) {

        $sentenciaSQL = "UPDATE estudiantes SET nombre = '" . $nombre . "', apellido1 ='" . $ap1 . "', apellido2 ='" . $ap2 . "', correo ='" . $correo . "' WHERE id =" . $id . "";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }
    header("Location: ../admin_estudiante.php");
}


if (isset($_POST["TFGModificarDirector"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $titulo = $_POST["titulo"];
    $especialidad = $_POST["especialidad"];
    $correo = $_POST["correo"];

    $connection = mysqli_connect("localhost", "root", "cined123", "unedtfg");
    if ($connection) {

        $sentenciaSQL = "UPDATE directorestfg SET nombre = '" . $nombre . "', apellido1 ='" . $ap1 . "', apellido2 ='" . $ap2 . "', titulo ='" . $titulo .  "', especialidad ='" . $especialidad .   "', correo ='" . $correo . "' WHERE id =" . $id . "";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }
    header("Location: ../admin_directores.php");
}


if (isset($_POST["TFGModificarEncargado"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $connection = mysqli_connect("localhost", "root", "cined123", "unedtfg");
    if ($connection) {

        $sentenciaSQL = "UPDATE encargadostfg SET nombre = '" . $nombre . "', apellido1 ='" . $ap1 . "', apellido2 ='" . $ap2 . "', correo ='" . $correo . "' WHERE id =" . $id . "";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }
    header("Location: ../admin_encargados.php");
}

if (isset($_POST["TFGModificarAsesor"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $titulo = $_POST["titulo"];
    $especialidad = $_POST["especialidad"];
    $correo = $_POST["correo"];

    $connection = mysqli_connect("localhost", "root", "cined123", "unedtfg");
    if ($connection) {

        $sentenciaSQL = "UPDATE asesores SET nombre = '" . $nombre . "', apellido1 ='" . $ap1 . "', apellido2 ='" . $ap2 . "', titulo ='" . $titulo .  "', especialidad ='" . $especialidad .   "', correo ='" . $correo . "' WHERE id =" . $id . "";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }
    header("Location: ../admin_asesores.php");
}


if (isset($_POST["TFGModificarMiembroComision"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $connection = mysqli_connect("localhost", "root", "cined123", "unedtfg");
    if ($connection) {

        $sentenciaSQL = "UPDATE miembroscomisiontfg SET nombre = '" . $nombre . "', apellido1 ='" . $ap1 . "', apellido2 ='" . $ap2 . "', correo ='" . $correo . "' WHERE id =" . $id . "";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }
    header("Location: ../admin_comisionTFG.php");
}