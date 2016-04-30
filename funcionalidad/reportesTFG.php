<?php

session_start();

/*
$carrera = $_POST["carrera"];
$lineaInvestigacion = $_POST["lineaInvest"];
$modalidad = $_POST["modalidad"];
$rango = $_POST["daterange"];

select * from tfg where tfg.estado = 'Activo' or  tfg.estado ='Aprobada para defensa'; 

select tfgetapas.numero, tfgetapas.estado,tfgetapas.tfg from tfg, tfgetapas where tfgetapas.estado = 'Inactiva' and tfgetapas.numero = 1 and tfgetapas.tfg = 2 group by tfgetapas.tfg; 

SELECT * FROM uned_db.tfgetapas where tfg = 1 and numero = 1;

select * from tfg where tfg.fechaInicio between '2015-04-05' and '2017-04-05';

  
 */

$checkEta []= array($_REQUEST["estadoTFG"]);

/*
$checkEta1 = $_POST["estadosE1"];
$checkEta2 = $_POST["estadosE2"];
$checkEta3 = $_POST["estadosE3"];
*/
//<form method="POST" role="form" id="reporte" name="reporte" action="funcionalidad/reportesTFG.php">

echo $checkEta;
/*
$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
if ($connection) {

    $q1 = 'select * from tfg where ';
    
    
    if ($carrera != "Ninguna") {
        $q1 += "carrera ='" . $carrera . "' AND ";
    }
    if ($modalidad != "Ninguna") {
        $q1 += "modalidad ='" . $modalidad . "' AND ";
    }
    if ($lineaInvestigacion != "Ninguna") {
        $q1 += "lineainvestigacion ='" . $lineaInvestigacion . "' AND ";
    }
    $result = mysqli_query($connection, $q1);

    $data = array();
    while ($data = mysqli_fetch_assoc($query)) {
        
        $data[] = $row;
    }
    //echo json_encode($data);
} else {
    
}
*/

