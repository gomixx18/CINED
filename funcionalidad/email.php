<?php
define(PW_SALT,'(+3%_');
require("../PHPMailer/PHPMailerAutoload.php");

function sendMail($email, $subject, $body, $wordWrap) {

    $mail = new PHPMailer();
    $recipient = $email;
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->CharSet = "UTF-8";
    $mail->Username = "cined.web@gmail.com";
    $mail->Password = "cined1234";
    $mail->SetFrom("cined.web@gmail.com");
    $mail->AddAddress($recipient);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->WordWrap = $wordWrap;
     

    return $mail->send();
}

function newUserMail($id, $clave, $email) {
    $link = "http://cined.cloudapp.net/change_pass.php?usuario=" . $id;

    $subject = "CINED - Credenciales de usuario";
    $body = "Usted ha sido registrado en el sistema CINED. </br> Su clave es: " . $clave
            . " </br> Por favor ingrese al siguiente enlace para cambiar su clave: <a href='" . $link . "'>Ingrese aquí</a>";
    return sendMail($email, $subject, $body, 50);
}

function sendPassReset($id, $email,  $connection) {

   
    $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 3, date("Y"));
    $expDate = date("Y-m-d H:i:s", $expFormat);
    $token = md5($id . '_' . $email . rand(0, 10000) . $expDate . PW_SALT);
    $stmt = $connection->prepare('INSERT into reset_password (id, token, fecha) values (?,?,?)');
   
    if ($stmt) {
        $stmt->bind_param('sss', $id, $token, $expDate);
        $stmt->execute();
        $stmt->store_result();
        $stmt->close();
        $subject = 'Reestablecer contraseña - CINED.';
        $link = "<a href=\"?a=recover&email=" . $token . "&u=" . urlencode(base64_encode($id))
                . "\">http://cined.cloudapp.net/reset_password.php?e=" . $token . "&u=" . urlencode(base64_encode($id)) . "</a>";
        $body = 'Para reestablecer su contraseña por favor copie y pegue este link en su navegador: <br/ > ';
        $body .= $link . '<br/ >';
        $body .= 'Este link se expirará en 3 días por razones de seguridad. <br/ >';
        mysqli_close($connection);
        return sendMail($email, $subject, $body, 50);
    } else{
        
    }
}

function emailEtapa3($connection, $codigo){
    
    //obtener estudiantes de tfg de base de datos
    $stmt = $connection->prepare('SELECT estudiante FROM tfgrealizan WHERE tfg = ?');
    $stmt->bind_param('s', $codigo);
    $stmt->execute();
    $stmt->bind_result($codigo);
    
   while($stmt->fetch()){
       $str += $codigo;
   }
    
    
//    $mail = new PHPMailer();
//    $recipient = $ad;
//    $mail->IsSMTP(); // enable SMTP
//    $mail->SMTPAuth = true; // authentication enabled
//    $mail->SMTPSecure = 'ssl';
//    $mail->Host = "smtp.gmail.com";
//    $mail->Port = 465; // or 587
//    $mail->IsHTML(true);
//    $mail->CharSet = "UTF-8";
//    $mail->Username = "cined.web@gmail.com";
//    $mail->Password = "cined1234";
//    $mail->SetFrom("cined.web@gmail.com");
//    $mail->AddAddress($recipient);
//    $mail->Subject = $subject;
//    $mail->Body = $body;
//    $mail->WordWrap = $wordWrap;
//     
//
//    return $mail->send();
}

?>