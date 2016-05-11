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

$carrera = json_decode($_REQUEST["carrera"], true);
$linea = json_decode($_REQUEST["linea"], true);
$modalidad = json_decode($_REQUEST["modalidad"], true);
$fechainicio = $_REQUEST["fechainicio"];
$fechafin = $_REQUEST["fechafin"];
$estadistica = $_REQUEST["estadistica"];
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
        $primera = false;
        
        $q1 = $q1 . " tfg.fechaInicio between '$fechainicio' and '$fechafin' ";
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
    if (count($modalidad) > 0) {
        if (!$primera) {
            $q1 = $q1 . " and ";
        }
        $primera = false;
        
        for ($i = 0; $i < count($modalidad); $i++) {

            $q1 = $q1 . " modalidad ='" . $modalidad[$i] . "'";

            if ($i != count($modalidad) - 1) {
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

    if ($bandera) {
        $q1 = "select tfg.codigo as tfg from tfg, tfgetapas where " . $q1;
        $q1 = $q1 . " group by tfg.codigo";
    } else {
        $q1 = "select tfgetapas.tfg from tfg, tfgetapas where " . $q1;
        $q1 = $q1 . "  group by tfgetapas.tfg";
    }

    //echo $q1;
    @session_start();
    $_SESSION['pdfTFG'] = $q1;
    header("Location: pdfParserTFG.php");
    //$result = mysqli_query($connection, $q1);

    /* $data = array();
      while ($data = mysqli_fetch_assoc($query)) {

      $data[] = $row;
      } */
    //echo json_encode($data);
} else {
    
}


