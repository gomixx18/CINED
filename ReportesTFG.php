<?php

session_start();

/*

  select * from tfg where tfg.estado = 'Activo' or  tfg.estado ='Aprobada para defensa';

  select tfgetapas.numero, tfgetapas.estado,tfgetapas.tfg from tfg, tfgetapas where tfgetapas.estado = 'Inactiva' and tfgetapas.numero = 1 and tfgetapas.tfg = 2 group by tfgetapas.tfg;

  SELECT * FROM uned_db.tfgetapas where tfg = 1 and numero = 1;

  select * from tfg where tfg.fechaInicio between '2015-04-05' and '2017-04-05';


 */

$Etfg = json_decode($_REQUEST["Etfg"], true);
$Etfg1 = json_decode($_REQUEST["Etfg1"], true);
$Etfg2 = json_decode($_REQUEST["Etfg2"], true);
$Etfg3 = json_decode($_REQUEST["Etfg3"], true);

$carrera = $_REQUEST["carrera"];
$linea = $_REQUEST["linea"];
$modalidad = $_REQUEST["modalidad"];
$fechainicio = $_REQUEST["fechainicio"];
$fechafin = $_REQUEST["fechafin"];

//echo $carrera.$linea.$modalidad.$fechainicio.$fechafin;

$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
if ($connection) {
    $bandera = true;
    $primera = true;


    $q1 = "";
    if (count($Etfg) > 0) {
        $primera = false;
        for ($i = 0; $i < count($Etfg); $i++) {
            $q1 = $q1 . " tfg.estado = '$Etfg[$i]' ";
            if ($i != count($Etfg) - 1) {
                $q1 = $q1 . " or ";
            }
        }
    }
    if (count($Etfg1) > 0) {
        if (!$primera) {
            $q1 = $q1 . " and ";
        }
        $primera = false;
        $bandera = false;

        for ($i = 0; $i < count($Etfg1); $i++) {
            $q1 = $q1 . " tfgetapas.estado = '$Etfg1[$i]' ";
            if ($i != count($Etfg1) - 1) {
                $q1 = $q1 . " or ";
            }
            if ($i == count($Etfg1) - 1) {
                $q1 = $q1 . " and tfgetapas.numero = 1";
            }
        }
    }
    if (count($Etfg2) > 0) {
        if (!$primera) {
            $q1 = $q1 . " and ";
        }
        $primera = false;
        $bandera = false;

        for ($i = 0; $i < count($Etfg2); $i++) {
            $q1 = $q1 . " tfgetapas.estado = '$Etfg2[$i]' ";
            if ($i != count($Etfg2) - 1) {
                $q1 = $q1 . " or ";
            }
            if ($i == count($Etfg2) - 1) {
                $q1 = $q1 . " and tfgetapas.numero = 2";
            }
        }
    }
    if (count($Etfg3) > 0) {
        if (!$primera) {
            $q1 = $q1 . " and ";
        }
        $primera = false;
        $bandera = false;
        

        for ($i = 0; $i < count($Etfg3); $i++) {
            $q1 = $q1 . " tfgetapas.estado = '$Etfg3[$i]' ";
            if ($i != count($Etfg3) - 1) {
                $q1 = $q1 . " or ";
            }
            if ($i == count($Etfg3) - 1) {
                $q1 = $q1 . " and tfgetapas.numero = 3";
            }
        }
    }
    if ($fechainicio != "") {
        if (!$primera) {
            $q1 = $q1 . " and ";
        }
        $q1 = $q1 . " tfg.fechaInicio between '$fechainicio' and '$fechafin' ";
    }

    if ($carrera != "Ninguna") {
        $q1 = $q1 . " and carrera ='" . $carrera . "'";
    }
    if ($modalidad != "Ninguna") {
        if (!$primera) {
            $q1 = $q1 . " and ";
        }
        $q1 = $q1 . " modalidad ='" . $modalidad . "'";
    }
    if ($linea != "Ninguna") {
        if (!$primera) {
            $q1 = $q1 . " and ";
        }
        $q1 = $q1 . "  lineainvestigacion ='" . $linea . "'";
    }
    
    if ($bandera) {
        $q1 = "select tfg.codigo from tfg, tfgetapas where " . $q1;
        $q1 = $q1 . " group by tfg.codigo";
    } else {
        $q1 = "select tfgetapas.tfg from tfg, tfgetapas where " . $q1;
        $q1 = $q1 . "  group by tfgetapas.tfg";
    }

    echo $q1;
    //$result = mysqli_query($connection, $q1);

    /* $data = array();
      while ($data = mysqli_fetch_assoc($query)) {

      $data[] = $row;
      } */
    //echo json_encode($data);
} else {
    
}


