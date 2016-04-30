<?php

session_start();

$tfg = $_REQUEST["tfg"];
$estado = $_REQUEST["estado"];

echo $tfg . $estado;
$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

if ($connection) {
    $consulta = "update  uned_db.tfg set estado = '$estado' where codigo = '$tfg'";
    $query = mysqli_query($connection, $consulta);
    mysqli_close($connection);
}
