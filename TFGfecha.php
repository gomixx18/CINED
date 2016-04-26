<?php
session_start();

$tfg = $_REQUEST["tfg"];
$fecha = $_REQUEST["fecha"];

$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

if ($connection) {
    $consulta = "update uned_db.tfg set fechaFinal =' $fecha' where codigo = $tfg";
    $query = mysqli_query($connection, $consulta);
    mysqli_close($connection);
}
