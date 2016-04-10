<?php

$carrera = $_POST["carrera"];
$lineaInvestigacion = $_POST["lineaInvest"];
$modalidad = $_POST["modalidad"];
$director = $_POST["director"];
$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
if ($connection) {

    $q1 = 'select * from tfg where ';
    if ($carrera != "todas") {
        $q1 += "carrera ='" . $carrera . "' AND ";
    }
    if ($modalidad != "todas") {
        $q1 += "modalidad ='" . $modalidad . "' AND ";
    }
    if ($lineaInvestigacion != "todas") {
        $q1 += "lineainvestigacion ='" . $lineaInvestigacion . "' AND ";
    }

    $q1+= "directortfg ='" . $director . "'";
    $result = mysqli_query($connection, $q1);

    $data = array();
    while ($data = mysqli_fetch_assoc($query)) {
        
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    
}

php
?>
