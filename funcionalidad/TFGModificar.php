<?php

session_start();
if (isset($_POST["TFGModificarEstudiante"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $ap1 = $_POST["apellido1"];
    $ap2 = $_POST["apellido2"];
    $correo = $_POST["correo"];
    $pass = "123";

    $connection = mysqli_connect("localhost", "root", "", "uned_db");
    if ($connection) {

        $sentenciaSQL = "UPDATE tfgestudiantes SET nombre = '" . $nombre . "', apellido1 ='" . $ap1 . "', apellido2 ='" . $ap2 . "', correo ='" . $correo . "' WHERE id =" . $id . "";
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

    $connection = mysqli_connect("localhost", "root", "", "uned_db");
    if ($connection) {

        $sentenciaSQL = "UPDATE tfgdirectores SET nombre = '" . $nombre . "', apellido1 ='" . $ap1 . "', apellido2 ='" . $ap2 . "', titulo ='" . $titulo .  "', especialidad ='" . $especialidad .   "', correo ='" . $correo . "' WHERE id =" . $id . "";
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
    $connection = mysqli_connect("localhost", "root", "", "uned_db");
    if ($connection) {

        $sentenciaSQL = "UPDATE tfgencargados SET nombre = '" . $nombre . "', apellido1 ='" . $ap1 . "', apellido2 ='" . $ap2 . "', correo ='" . $correo . "' WHERE id =" . $id . "";
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

    $connection = mysqli_connect("localhost", "root", "", "uned_db");
    if ($connection) {

        $sentenciaSQL = "UPDATE tfgasesores SET nombre = '" . $nombre . "', apellido1 ='" . $ap1 . "', apellido2 ='" . $ap2 . "', titulo ='" . $titulo .  "', especialidad ='" . $especialidad .   "', correo ='" . $correo . "' WHERE id =" . $id . "";
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
    $connection = mysqli_connect("localhost", "root", "", "uned_db");
    if ($connection) {

        $sentenciaSQL = "UPDATE tfgmiembroscomision SET nombre = '" . $nombre . "', apellido1 ='" . $ap1 . "', apellido2 ='" . $ap2 . "', correo ='" . $correo . "' WHERE id =" . $id . "";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }
    header("Location: ../admin_comisionTFG.php");
}

if (isset($_POST["TFGModificarModalidad"])) {
    $nombre = $_POST["nombre"];
    $id = $_POST["codigo"];

    $connection = mysqli_connect("localhost", "root", "", "uned_db");
    if ($connection) {

        $sentenciaSQL = "UPDATE modalidades SET nombre = '" . $nombre . "', id ='" . $id . "' WHERE id =" . $id . "";
        $resultado = mysqli_query($connection, $sentenciaSQL);
        mysqli_close($connection);
    }
    header("Location: ../admin_Modalidad.php");
}