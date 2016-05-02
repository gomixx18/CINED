<?php
session_start();

$ie = $_REQUEST["ie"];
$titulo = $_REQUEST["titulo"];

$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

if ($connection) {
    $consulta = "update uned_db.ieproyectos set titulo = '$titulo' where codigo = '$ie'";
    $query = mysqli_query($connection, $consulta);
    mysqli_close($connection);
}
