<?php
require("PHPMailer/PHPMailerAutoload.php");

function sendMail($email, $name, $subject, $body, $wordWrap) {

	$mail = new PHPMailer(); 
	$recipient = "brendaruizm@hotmail.com";
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	$mail->Username = "cined.web@gmail.com";
	$mail->Password = "cined1234";
	$mail->SetFrom("cined.web@gmail.com");
	$mail->AddAddress($recipient); 
 
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->WordWrap = $wordWrap;
	 
    return $mail->send();
}
 
function newUserMail($username, $clave, $email, $name) {
    $link = "http://cined.cloudapp.net/change_pass.php";
    //$ref = "changePass.php?usuario=". $_POST["username"];
    $subject = "Sus credenciales de ingreso";
    $body = "Usted ha sido registrado en el sistema CINED. </br> Su clave es: " . $clave
            . " </br> Por favor ingrese al siguiente enlace para cambiar su clave: <a href='" . $link . "'>Click Here</a>";
    return sendMail($email, $name, $subject, $body, 50);
}
 
?>