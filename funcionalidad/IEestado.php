<?php

session_start();

$ie = $_REQUEST["ie"];
$estado = $_REQUEST["estado"];
$numero = $_REQUEST["etapa"];

$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

if ($connection) {
    $consulta = "update ieetapas set estado = \"$estado\" where numero = $numero and proyecto = '$ie'";
    $query = mysqli_query($connection, $consulta);

    //enviar correo al cambiar estado de la etapa
    /*$q2 = "select estudiante from tfgrealizan where proyecto = '" . $tfg . "'";
    $result = mysqli_query($connection, $q2);
    if ($result) {
              
       while ($row = mysqli_fetch_assoc($result)) { // loop to store the data in an associative array.
            $array1[] = $row;
            
        }
        
     $array2 = array();
     
     for ($index1 = 0;$index1 < count($array1);$index1++) {
        
         $q3 = "select correo from tfgestudiantes where id = '";
     }
    }*/
    mysqli_close($connection);
}


