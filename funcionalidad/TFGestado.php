<?php

session_start();

$tfg = $_REQUEST["tfg"];
$estado = $_REQUEST["estado"];
$numero = $_REQUEST["etapa"];
echo $tfg . $estado . $numero;
$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

if ($connection) {
    $consulta = "update tfgetapas set estado = \"$estado\" where numero = $numero and tfg = '$tfg'";
    $query = mysqli_query($connection, $consulta);

    mysqli_close($connection);
}
