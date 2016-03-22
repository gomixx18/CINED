<?php
session_start();
if (isset($_POST["modifyPass"])) {

     $oldPass = $_POST["oldP"];
     $newPass = $_POST["newP"];
 
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
    
if ($connection) {
  
            //validacion - usar ID
            $sentencia =  "UPDATE usuarios SET password= '" . $newPass . "' WHERE password= '" . $oldPass . "'";
            $st = oci_parse($connection, $sentencia);
            $result = oci_execute($st);
         
        mysqli_close($connection); 
    }
 
    header("Location: login.php");
}
?>