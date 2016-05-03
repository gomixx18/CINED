<?php

session_start();

$ie = $_REQUEST["ie"];
$estado = $_REQUEST["estado"];

echo $ie . $estado;
$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

if ($connection) {
    $consulta = "update  uned_db.ieproyectos set estado = '$estado' where codigo = '$ie'";
    $query = mysqli_query($connection, $consulta);
    mysqli_close($connection);
}
