<?php

session_start();

$Eie = json_decode($_REQUEST["Eie"], true);
$Eie1 = json_decode($_REQUEST["Eie1"], true);
$Eie2 = json_decode($_REQUEST["Eie2"], true);
$Eie3 = json_decode($_REQUEST["Eie3"], true);

$catedra = json_decode($_REQUEST["catedra"], true);
$linea = json_decode($_REQUEST["linea"], true);
$carrera = json_decode($_REQUEST["carrera"], true);
$fechainicio = $_REQUEST["fechainicio"];
$fechafin = $_REQUEST["fechafin"];
$estadistica = $_REQUEST["estadistica"];
$extension = $_REQUEST["extension"];

$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
if ($connection) {
    $bandera = true;
    $primera = true;


    $q1 = "";
    if (count($Eie) > 0) {
        $primera = false;
        for ($i = 0; $i < count($Eie); $i++) {
            $q1 = $q1 . " ieproyectos.estado = '$Eie[$i]' ";
            if ($i != count($Eie) - 1) {
                $q1 = $q1 . " or ";
            }
        }
    }
    if (count($Eie1) > 0) {
        if (!$primera) {
            $q1 = $q1 . " and ";
        }
        $primera = false;
        $bandera = false;

        for ($i = 0; $i < count($Eie1); $i++) {
            $q1 = $q1 . " ieetapas.estado = '$Eie1[$i]' ";
            if ($i != count($Eie1) - 1) {
                $q1 = $q1 . " or ";
            }
            if ($i == count($Eie1) - 1) {
                $q1 = $q1 . " and ieetapas.numero = 1";
            }
        }
    }
    if (count($Eie2) > 0) {
        if (!$primera) {
            $q1 = $q1 . " and ";
        }
        $primera = false;
        $bandera = false;

        for ($i = 0; $i < count($Eie2); $i++) {
            $q1 = $q1 . " ieetapas.estado = '$Eie2[$i]' ";
            if ($i != count($Eie2) - 1) {
                $q1 = $q1 . " or ";
            }
            if ($i == count($Eie2) - 1) {
                $q1 = $q1 . " and ieetapas.numero = 2";
            }
        }
    }
    if (count($Eie3) > 0) {
        if (!$primera) {
            $q1 = $q1 . " and ";
        }
        $primera = false;
        $bandera = false;


        for ($i = 0; $i < count($Eie3); $i++) {
            $q1 = $q1 . " ieetapas.estado = '$Eie3[$i]' ";
            if ($i != count($Eie3) - 1) {
                $q1 = $q1 . " or ";
            }
            if ($i == count($Eie3) - 1) {
                $q1 = $q1 . " and ieetapas.numero = 3";
            }
        }
    }
    if ($fechainicio != "") {
        if (!$primera) {
            $q1 = $q1 . " and ";
        }
        $primera = false;
        
        $q1 = $q1 . " ieproyectos.fechaInicio between '$fechainicio' and '$fechafin' ";
    }

    if (count($carrera) > 0) {
        if (!$primera) {
            $q1 = $q1 . " and ";
        }
        $primera = false;
        
        for ($i = 0; $i < count($carrera); $i++) {

            $q1 = $q1 . " carrera ='" . $carrera[$i] . "'";

            if ($i != count($carrera) - 1) {
                $q1 = $q1 . " or ";
            }
        }
    }
    if (count($catedra) > 0) {
        if (!$primera) {
            $q1 = $q1 . " and ";
        }
        $primera = false;
        
        for ($i = 0; $i < count($catedra); $i++) {

            $q1 = $q1 . " catedra ='" . $catedra[$i] . "'";

            if ($i != count($catedra) - 1) {
                $q1 = $q1 . " or ";
            }
        }
    }
    if (count($linea) > 0) {
        if (!$primera) {
            $q1 = $q1 . " and ";
        }
        $primera = false;
        
        for ($i = 0; $i < count($linea); $i++) {

            $q1 = $q1 . "  lineainvestigacion ='" . $linea[$i] . "'";

            if ($i != count($linea) - 1) {
                $q1 = $q1 . " or ";
            }
        }
    }
    if (!$primera) {
            $q1 = $q1 . " and ";
        }
        $q1 = $q1 . " isExtension = '$extension'";
    
    if ($bandera) {
        $q1 = "select ieproyectos.codigo from ieproyectos, ieetapas where " . $q1;
        $q1 = $q1 . " group by ieproyectos.codigo";
    } else {
        $q1 = "select ieetapas.proyecto from ieproyectos, ieetapas where " . $q1;
        $q1 = $q1 . "  group by ieetapas.proyecto";
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


