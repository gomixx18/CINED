<?php
require("PHPMailer/PHPMailerAutoload.php");

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
$mail->Subject = "Correo de CINED Web";
$mail->Body = "Cuerpo del mensaje.";
$mail->AddAddress($recipient); 



if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

 header("Location: index.php");

?>