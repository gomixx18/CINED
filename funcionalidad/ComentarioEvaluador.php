<?php

session_start();

$id = $_REQUEST["id"];
$comentario = $_REQUEST["comentario"];
$ie = $_REQUEST["ie"];
$etapa = $_REQUEST["etapa"];

$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

if ($connection) {
    $sentenciaSQL = "replace into iecomentariosevaluadores set etapa ='$etapa', proyecto ='$ie', comentario ='$comentario', evaluador ='$id'";
    $resultado = mysqli_query($connection, $sentenciaSQL);
    echo $id.$tfg.$etapa.$comentario;
    mysqli_close($connection);
}
