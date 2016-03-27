<?php

require("email.php");

$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
$id = $_POST['cedula'];
$pass = "a" . substr(md5(microtime()), 1, 7);

if ($connection) {
    //verificar que existe
    $sentencia = "SELECT id FROM usuarios WHERE id= " . $id;
    $resultadoExist = mysqli_query($connection, $sentencia);
    if (mysqli_num_rows($resultadoExist) == 0) {
        $response_array['status'] = 'error';
    } else {
        $s2 = "SELECT * FROM usuarios where id=" . $id;
        $result2 = mysqli_query($connection, $s2);
        $usuario = mysqli_fetch_assoc($result2);
        if ($usuario['encargadotfg']) {
            $sentenciaSQLespecifica = "SELECT correo FROM tfgencargados where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            newUserMail($id, $pass, $correo);
        }
        if ($usuario['asesortfg']) {
            $sentenciaSQLespecifica = "SELECT correo FROM tfgasesores where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            newUserMail($id, $pass, $correo);
        }
        if ($usuario['directortfg']) {

            $sentenciaSQLespecifica = "SELECT correo FROM tfgdirectores where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            newUserMail($id, $pass, $correo);
        } // fin directores
        if ($usuario['estudiante']) {
            $sentenciaSQLespecifica = "SELECT correo FROM tfgestudiantes where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            newUserMail($id, $pass, $correo);
        }
        if ($usuario['miembrocomisiontfg']) {
            $sentenciaSQLespecifica = "SELECT correo FROM tfgmiembroscomision where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            newUserMail($id, $pass, $correo);
           
        }
        if ($usuario['investigador']) {
            $sentenciaSQLespecifica = "SELECT correo FROM ieinvestigadores where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            newUserMail($id, $pass, $correo);

        }
        if ($usuario['coordinadorinvestigacion']) {
            $sentenciaSQLespecifica = "SELECT correo FROM iecoordinadoresinvestigacion where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            newUserMail($id, $pass, $correo);

        }
        if ($usuario['evaluador']) {
            $sentenciaSQLespecifica = "SELECT correo FROM ieevaluadores where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            newUserMail($id, $pass, $correo);

        }
        if ($usuario['miembrocomiex']) {
            $sentenciaSQLespecifica = "SELECT correo FROM iemiembroscomiex where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            newUserMail($id, $pass, $correo);

        }
        
        $response_array['status'] = 'success';
    }
    echo json_encode($response_array);
//header("Location: ../login.php");
} else {
    $response_array['status'] = 'db_conn_error';
    echo json_encode($response_array);
}
?>

