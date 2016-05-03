<?php

session_start();

$ie = $_REQUEST["ie"];
$investigadores = json_decode($_REQUEST["investigadores"], true);
$tiempos = json_decode($_REQUEST["tiempos"], true);


$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

if ($connection) {
    $consulta = "";
    for ($i = 0; $i < count($investigadores); $i++) {
        $consulta = " UPDATE uned_db.ieinvestigan SET tiempoacademico ='$tiempos[$i]' WHERE investigador='$investigadores[$i]' and proyecto='$ie';";
        $query = mysqli_query($connection, $consulta);
    }


    mysqli_close($connection);
}

