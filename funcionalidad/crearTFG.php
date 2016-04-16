<?php

session_start();

$titulo = $_POST["tituloTFG"];
$lineaInvestigacion = $_POST["lineaInvest"];
$carrera = $_POST["carrera"];
$modalidad = $_POST["modalidad"];
$encargado = $_POST["radEncargado"];
$director = $_POST["radCoord"];
$asesor1 = $_POST["radAsesor1"];
$asesor2 = $_POST["radAsesor2"]; //este puede ser ninguno
$fecha = $_POST["daterange"];


$fechaArray = explode('-', $fecha);
$fechaArrayInicio = explode('/', trim($fechaArray[0]));
$fechaInicio = $fechaArrayInicio[2] . "-" . $fechaArrayInicio[1] . "-" . $fechaArrayInicio[0];
$fechaArrayFinal = explode('/', trim($fechaArray[1]));
$fechaFinal = $fechaArrayFinal[2] . "-" . $fechaArrayFinal[1] . "-" . $fechaArrayFinal[0];

$arrayDocentes = array();
for ($i = 1; $i < 7; $i++) {
    if (isset($_POST["nameEstudiante" . $i])) {
        array_push($arrayDocentes, $_POST["nameEstudiante" . $i]);
    }
}



$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");


if ($connection) {

    $sqlCodigo = "SELECT * FROM consecutivos where tipo = 'TFG'";
    $resultadoCodigo = mysqli_query($connection, $sqlCodigo);
    $annoActual = date("Y");
    
    $data = mysqli_fetch_assoc($resultadoCodigo);
    if ($data["anno"] == $annoActual) {
        $numeroCambio = (int)$data["numero"] + 1;
        $sqlcambioConsecutivo = "UPDATE consecutivos SET numero= " . $numeroCambio . " WHERE tipo='TFG'";
        $codigo = "TFG-" . $data["numero"] ."-". $data["anno"] ."-". $carrera ."-". $modalidad ."-". $lineaInvestigacion ;
    } else {
        $annoCambio = (int)$annoActual;
        $sqlcambioConsecutivo = "UPDATE consecutivos SET numero= 1, anno = " . $annoCambio . " WHERE tipo='TFG'";
        $codigo = "1-". $data["anno"] ."-". $carrera ."-". $modalidad ."-". $lineaInvestigacion ;
    }
    $resultadoCambioConsecutivo = mysqli_query($connection, $sqlcambioConsecutivo); 

    $sqExtension = "INSERT INTO tfg (codigo, titulo, directortfg, encargadotfg, lineainvestigacion, carrera, estado, modalidad, fechaInicio, fechaFinal) VALUES ('" . $codigo . "', '" . $titulo . "', '" . $director . "', '" . $encargado . "', '" . $lineaInvestigacion . "', '" . $carrera . "', 'Activo', '" . $modalidad . "', '" . $fechaInicio . "', '" . $fechaFinal . "')";
    $resultadoTFG = mysqli_query($connection, $sqExtension); // ingresar TFG


    

    // insertar estudiantes
    
    foreach ($arrayDocentes as $docente){
        $sqlDocentes= "INSERT INTO tfgrealizan (estudiante, tfg) VALUES ('".$docente."', '".$codigo."')";
        $resultadoDocentes = mysqli_query($connection, $sqlDocentes);
    }

    
    //ligar miembros
    $sqlMiembros = "SELECT * FROM tfgmiembroscomision WHERE estado = true";
    $resultadoMiembros = mysqli_query($connection, $sqlMiembros); // aca estan los miebros de la comision activos
    
     while ($data = mysqli_fetch_assoc($resultadoMiembros)){
        $sqlMiembrosAsoc= "INSERT INTO tfgevaluan (miembrocomisiontfg, tfg) VALUES ('".$data["id"]."', '".$codigo."')";
        $resultadoMiembrosAsoc = mysqli_query($connection, $sqlMiembrosAsoc);
     }
     
    // ligar asesores
    $sqlEvaluador1 = "INSERT INTO tfgasesoran (asesor, tfg) VALUES ('".$asesor1."', '".$codigo."')";
    $resultadoAsesor1 = mysqli_query($connection, $sqlEvaluador1);
    
    if($asesor2 != "ninguno" && $asesor1 != $asesor2){
        $sqlAsesor2 = "INSERT INTO tfgasesoran (asesor, tfg) VALUES ('".$asesor2."', '".$codigo."')";
        $resultadoAsesor2 = mysqli_query($connection, $sqlAsesor2);
    }
    
    //crear etapas probar                       
    $sqlEtapas1 = "INSERT INTO tfgetapas (numero, estado, tfg) VALUES (1, 'En ejecución', '".$codigo."')";
    $resultadoEtapas1 = mysqli_query($connection, $sqlEtapas1);
    $sqlEtapas2 = "INSERT INTO tfgetapas (numero, estado, tfg) VALUES (2, 'Inactiva', '".$codigo."')";
    $resultadoEtapas2 = mysqli_query($connection, $sqlEtapas2);
    $sqlEtapas3 = "INSERT INTO tfgetapas (numero, estado, tfg) VALUES (3, 'Inactiva', '".$codigo."')";
    $resultadoEtapas3 = mysqli_query($connection, $sqlEtapas3);
    

    mysqli_close($connection);
}



header("Location: ../admin_TFG.php");



