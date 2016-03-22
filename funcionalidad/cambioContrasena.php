<?php
session_start();
if (isset($_POST["modifyPass"])) {

     $oldPass = $_POST["oldP"];
     $newPass = $_POST["newP"];
 
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");

if ($connection) {
  
                //validacion
            $sentencia = 'update uned_db.usuarios set password= "'. $newPass .'" where password="'. $oldPass . '"';
            $st = oci_parse($conn, $sentencia);
            $result = oci_execute($st);
         
        mysqli_close($connection); 
    }
 
    header("Location: login.php");
}
?>