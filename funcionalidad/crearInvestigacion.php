

<?php

session_start();

$titulo = $_POST["titulo"];
$lineaInvestigacion = $_POST["lineaInvest"];
$carrera = $_POST["carrera"];
$catedra = $_POST["catedra"];
$coordinador = $_POST["radCoordinador"];
$evaluador1 = $_POST["radEva1"];
$evaluador2 = $_POST["radEva2"]; //este puede ser ninguno
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

    $sqlCodigo = "SELECT * FROM consecutivos where tipo = 'IE'";
    $resultadoCodigo = mysqli_query($connection, $sqlCodigo);
    $annoActual = date("Y");
    
    $data = mysqli_fetch_assoc($resultadoCodigo);
    if ($data["anno"] == $annoActual) {
        $numeroCambio = (int)$data["numero"] + 1;
        $sqlcambioConsecutivo = "UPDATE consecutivos SET numero= " . $numeroCambio . " WHERE tipo='IE'";
        $codigo = "INV-" . $data["numero"] ."-". $data["anno"] ."-". $carrera ."-". $catedra ."-". $lineaInvestigacion ;
    } else {
        $annoCambio = (int)$annoActual;
        $sqlcambioConsecutivo = "UPDATE consecutivos SET numero= 1, anno = " . $annoCambio . " WHERE tipo='IE'";
        $codigo = "INV-1-". $data["anno"] ."-". $carrera ."-". $catedra ."-". $lineaInvestigacion ;
    }
    $resultadoCambioConsecutivo = mysqli_query($connection, $sqlcambioConsecutivo); 

    $sqlInvestigacion = "INSERT INTO ieproyectos (codigo, titulo, coordinador, estado, lineainvestigacion, isExtension, carrera, catedra, fechaInicio, fechaFinal) VALUES ('".$codigo."', '".$titulo."', '".$coordinador."', 'Activo', '".$lineaInvestigacion."', false, '".$carrera."', '".$catedra."', '".$fechaInicio."', '".$fechaFinal."')";
    $resultadoInvestigacion= mysqli_query($connection, $sqlInvestigacion); // ingresar Extension

    
    

    // insertar Docentes
    
    foreach ($arrayDocentes as $docente){
        $sqlDocentes= "INSERT INTO ieinvestigan (investigador, proyecto) VALUES ('".$docente."', '".$codigo."')";
        $resultadoDocentes = mysqli_query($connection, $sqlDocentes);
    }

    
    //ligar miembros
    $sqlMiembros = "SELECT * FROM iemiembroscomiex WHERE estado = true";
    $resultadoMiembros = mysqli_query($connection, $sqlMiembros); // aca estan los miebros de la comision activos
    
     while ($data = mysqli_fetch_assoc($resultadoMiembros)){
        $sqlMiembrosAsoc= "INSERT INTO ierevisan (miembrocomiex, proyecto) VALUES ('".$data["id"]."', '".$codigo."')";
        $resultadoMiembrosAsoc = mysqli_query($connection, $sqlMiembrosAsoc);
     }
     
    // ligar evaluadores
    $sqlEvaluador1 = "INSERT INTO ieevaluan (evaluador, proyecto) VALUES ('".$evaluador1."', '".$codigo."')";
    $resultadoEvaluador1 = mysqli_query($connection, $sqlEvaluador1);
    
    if($evaluador2 != "ninguno" && $evaluador1 != $evaluador2){
        $sqlEvaluador2 = "INSERT INTO ieevaluan (evaluador, proyecto) VALUES ('".$evaluador2."', '".$codigo."')";
        $resultadoEvaluador2 = mysqli_query($connection, $sqlEvaluador2);
    }
    
    //crear etapas probar                       
    $sqlEtapas1 = "INSERT INTO ieetapas (numero, estado, proyecto) VALUES (1, 'En ejecución', '".$codigo."')";
    $resultadoEtapas1 = mysqli_query($connection, $sqlEtapas1);
    $sqlEtapas2 = "INSERT INTO ieetapas (numero, estado, proyecto) VALUES (2, 'Inactiva', '".$codigo."')";
    $resultadoEtapas2 = mysqli_query($connection, $sqlEtapas2);
    $sqlEtapas3 = "INSERT INTO ieetapas (numero, estado, proyecto) VALUES (3, 'Inactiva', '".$codigo."')";
    $resultadoEtapas3 = mysqli_query($connection, $sqlEtapas3);
    

    mysqli_close($connection);
}



header("Location: ../admin_Investigacion.php");






