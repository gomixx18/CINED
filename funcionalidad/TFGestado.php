<?php

session_start();

$tfg = $_REQUEST["tfg"];
$estado = $_REQUEST["estado"];
$numero = $_REQUEST["etapa"];
$tituloTFG = $_REQUEST["titulo"];
echo $tfg . $estado . $numero;
$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

if ($connection) {
    $consulta = "update tfgetapas set estado = \"$estado\" where numero = $numero and tfg = '$tfg'";
    $query = mysqli_query($connection, $consulta);

    //enviar correo al cambiar estado de la etapa
    $q2 = "select estudiante from tfgrealizan where tfg = '" . $tfg . "'";
    $result = mysqli_query($connection, $q2);
    if ($result) {
              
       while ($row = mysqli_fetch_assoc($result)) { // loop to store the data in an associative array.
            $array1[] = $row;
            
        }
        
     
     
     $q3 = "select correo from tfgestudiantes where id = '";
     for ($index1 = 0;$index1 < count($array1);$index1++) {
        
      $s2 += strval(array_values($array1)[$index1]['estudiante']) . ", ";
     }
     
     $q3 = $q3 . $s2 . "'"; //error aqui
     $r2 = mysqli_query($connection, $q3);
     $row = $r2->fetch_assoc();
     $correo= $row['correo'];
     
     emailEtapa3($connection, $correos, $tituloTFG);
     
     $array2 = array(); // guardar correos que se ocupan en un array
    
     
         
     
    }


    mysqli_close($connection);
}
