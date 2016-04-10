<?php

session_start();

$id = $_REQUEST["id"];
$comentario = $_REQUEST["comentario"];
$tfg = $_REQUEST["tfg"];
$etapa = $_REQUEST["etapa"];

$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

if ($connection) {
    $sentenciaSQL = "replace into tfgcomentariosasesores set etapa = ".$etapa.",tfg = ".$tfg.","
            . " comentario =\"".$comentario."\", asesor =".$id;
    $resultado = mysqli_query($connection, $sentenciaSQL);
    echo $id.$tfg.$etapa.$comentario;
    mysqli_close($connection);
}


