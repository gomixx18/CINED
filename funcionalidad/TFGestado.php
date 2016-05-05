<?php
require("email.php");
session_start();

$tfg = $_REQUEST["tfg"];
$estado = $_REQUEST["estado"];
$numero = $_REQUEST["etapa"];
echo $tfg . $estado . $numero;
$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
$titulo = $_REQUEST["titulo"];
$estID = json_decode($_REQUEST["estID"], true);
$estCorreos = json_decode($_REQUEST["estCorreos"], true);
$director = $_REQUEST["director"];
$asesores = $_REQUEST["asesores"];

$destinatarios = array();


for ($index = 0;$index < count($asesores);$index++) {
    array_push($destinatarios, $asesores[$index]);
}
for ($index = 0;$index < count($estCorreos);$index++) {
    array_push($destinatarios, $estCorreos[$index]);
}
array_push($destinatarios, $director);


if ($connection) {
    $consulta = "update tfgetapas set estado = \"$estado\" where numero = $numero and tfg = '$tfg'";
    $query = mysqli_query($connection, $consulta);
        
    //meter correos en un solo array
    emailEtapa($connection, $titulo , $tfg, $destinatarios, $numero, $estado); 
     
    


    mysqli_close($connection);
}
