<?php
require ("email.php");



/*
  select A.tfg, A.numero, (select fechaAprobacion from tfgetapas  where numero = A.numero and tfg = A.tfg) as fecha
  from (
  select tfg, MAX(numero) as numero, fechaAprobacion from tfgetapas
  where estado = 'Aprobada' || estado = 'Aprobada con Observaciones'
  group by tfg) A

 */

session_start();

$arrayCorreos = array();

$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

if ($connection) {
    $sentenciaSQL = "select tfg.fechaFinal, A.tfg, A.numero, (select fechaAprobacion from tfgetapas  where numero = A.numero and tfg = A.tfg) as fecha
                        from (
                        select tfg, MAX(numero) as numero, fechaAprobacion from tfgetapas
                        where estado = 'Aprobada' || estado = 'Aprobada con Observaciones'
                        group by tfg) A, tfg 
                        where tfg.codigo= A.tfg;";
    $resultado = mysqli_query($connection, $sentenciaSQL);
    

    while ($data = mysqli_fetch_assoc($resultado)) {
        
        //echo "fecha final ". $data["fechaFinal"] . "<br/>";
        $nuevafecha = strtotime ( '-7 day' , strtotime ( $data["fechaFinal"]) ) ;
        $nuevafecha = date ( 'Y/m/d' , $nuevafecha );
        //echo "fecha final - 7 dias ". $nuevafecha . "<br/>";
        $fecha_actual=date("Y/m/d");
        if($fecha_actual === $nuevafecha){ // una semana antes de la entrega
            //conseguir todos los correos
            echo "este tfg tiene q mandar correos: ". $data['tfg'] . "<br/>";
            
            //estudiantes
            $sentenciaEstudiantes = "select tfgestudiantes.correo from tfg, tfgestudiantes, tfgrealizan
                                    where tfg.codigo = tfgrealizan.tfg and tfgestudiantes.id = tfgrealizan.estudiante and
                                    tfgrealizan.estado= 1 and tfg.codigo = '". $data['tfg'] ."'";
            $resultadoEstudiantes = mysqli_query($connection, $sentenciaEstudiantes);
            while ($data2 = mysqli_fetch_assoc($resultadoEstudiantes)) {
                array_push($arrayCorreos, $data2["correo"]);
            }
            
            //director
            $sentenciaDirector = "select tfgdirectores.correo from tfg, tfgdirectores 
                                    where tfg.directortfg = tfgdirectores.id and tfg.codigo = '". $data['tfg'] ."'";
            $resultadoDirector = mysqli_query($connection, $sentenciaDirector);
            $data3 = mysqli_fetch_assoc($resultadoDirector);
            array_push($arrayCorreos, $data3["correo"]);
            
            //encargado
            $sentenciaEncargado = "select tfgencargados.correo from tfg, tfgencargados 
                                    where tfg.encargadotfg = tfgencargados.id and tfg.codigo = '". $data['tfg'] ."'";
            $resultadoEncargado = mysqli_query($connection, $sentenciaEncargado);
            $data4 = mysqli_fetch_assoc($resultadoEncargado);
            array_push($arrayCorreos, $data4["correo"]);
            
            //asesores
            $sentenciaAsesores = "select tfgasesores.correo from tfg, tfgasesores, tfgasesoran
                                where tfg.codigo = tfgasesoran.tfg and tfgasesores.id = tfgasesoran.asesor and
                                tfgasesoran.estado= 1 and tfg.codigo = '". $data['tfg'] ."'";
            $resultadoAsesores = mysqli_query($connection, $sentenciaAsesores);
            while ($data5 = mysqli_fetch_assoc($resultadoAsesores)) {
                array_push($arrayCorreos, $data5["correo"]);
            }
           
            foreach ($arrayCorreos as $correo) {
                echo $correo . "<br/>";
            }
            $info = array();
            array_push($info, $data['tfg'], $data['numero'], $nuevafecha);
           
            
            //enviar alarma a los correos
            alarmaTFG($info, $arrayCorreos);
          
            
            
        }
          //echo "fecha de hoy: ". $fecha_actual . " y la fecha de entrega menos 7 dias: ". $nuevafecha . "<br/>";  
        
    }
    
    
  
    //$sentenciaSQLPrueba = "INSERT INTO tfgestudiantes (id, nombre, apellido1, apellido2, password, correo, estado) VALUES ('32', 'oscar','vega','zapata','123','f@f',1)";
    //$resultadoPrueba = mysqli_query($connection, $sentenciaSQLPrueba); 
    
    mysqli_close($connection);
}
