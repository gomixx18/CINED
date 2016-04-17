<?php

//Enviar correo a un usuario que olvido la contrasena.
//En ese correo va un url unico para reestablecer contrasena.
require("email.php");

$connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
$id = $_POST['cedula'];
$pass = "a" . substr(md5(microtime()), 1, 7);

if ($connection) {
    //verificar que existe

    $sentencia = $connection->prepare('SELECT id FROM usuarios WHERE id = ?');
    $sentencia->bind_param('s', $id);
    $sentencia->execute();
    $sentencia->store_result();
    

    if ($sentencia->num_rows == 0) {
        $response_array['status'] = 'error';
    } else {
        $s2 = "SELECT * FROM usuarios where id= " . $id;
        $result2 = mysqli_query($connection, $s2);
        $usuario = mysqli_fetch_assoc($result2);

        if ($usuario['encargadotfg']) {
            $sentenciaSQLespecifica = "SELECT correo FROM tfgencargados where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            $sentencia->close();
           sendPassReset($id, $correo,  $connection);
        }
        if ($usuario['asesortfg']) {
            $sentenciaSQLespecifica = "SELECT correo FROM tfgasesores where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            
            $sentencia->close();
            sendPassReset($id, $correo, $connection);
        }
        if ($usuario['directortfg']) {

            $sentenciaSQLespecifica = "SELECT correo FROM tfgdirectores where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            sendPassReset($id, $correo, $connection);
        } // fin directores
        if ($usuario['estudiante']) {
            $sentenciaSQLespecifica = "SELECT correo FROM tfgestudiantes where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
           sendPassReset($id, $correo, $connection);
        }
        if ($usuario['miembrocomisiontfg']) {
            $sentenciaSQLespecifica = "SELECT correo FROM tfgmiembroscomision where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            sendPassReset($id, $correo, $connection);
        }
        if ($usuario['investigador']) {
            $sentenciaSQLespecifica = "SELECT correo FROM ieinvestigadores where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            sendPassReset($id, $correo, $connection);
        }
        if ($usuario['coordinadorinvestigacion']) {
            $sentenciaSQLespecifica = "SELECT correo FROM iecoordinadoresinvestigacion where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            sendPassReset($id, $correo, $connection );
        }
        if ($usuario['evaluador']) {
            $sentenciaSQLespecifica = "SELECT correo FROM ieevaluadores where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            sendPassReset($id, $correo, $connection);
        }
        if ($usuario['miembrocomiex']) {
            $sentenciaSQLespecifica = "SELECT correo FROM iemiembroscomiex where id= " . $id;
            $resultadoEspecifico = mysqli_query($connection, $sentenciaSQLespecifica);
            $row = mysqli_fetch_assoc($resultadoEspecifico);
            $correo = $row['correo'];
            sendPassReset($id, $correo, $connection);
        }

        $response_array['status'] = 'success';
    }
    $sentencia->close();
    mysqli_close($connection);
    echo json_encode($response_array);

} else {
    $response_array['status'] = 'db_conn_error';
    echo json_encode($response_array);
}
?>

