<?php

define('PW_SALT', '(+3%_');
require("../PHPMailer/PHPMailerAutoload.php");

function sendMail($email, $subject, $body, $wordWrap) {

    $mail = new PHPMailer();
    $recipient = $email;
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->CharSet = "UTF-8";
    $mail->Username = "cined.web@gmail.com";
    $mail->Password = "cined1234";
    $mail->SetFrom("cined.web@gmail.com");
    $mail->AddAddress($recipient);
    $mail->Subject = $subject;
    $mail->IsHTML(true);
    $mail->Body = $body;
    $mail->WordWrap = $wordWrap;
    return $mail->send();
}

function newUserMail($id, $clave, $nombre, $tipo, $email) {
    $link = "http://cined.cloudapp.net/change_pass.php?usuario=" . $id;

    $subject = "CINED - Credenciales de usuario";
    $body = "<h3>" . $nombre . ":</h3><br />";
    $body .= "Usted ha sido registrado como " . $tipo . " en el sistema del Centro de Investigación de la Escuela de Educación - CINED. </br> Su clave temporal es la siguiente:<b> " . $clave ."</b>"
            . " Por favor haga click en el enlace para cambiar su clave: <a href='" . $link . "'>Ingrese aquí</a>";
    return sendMail($email, $subject, $body, 50);
}

function sendPassReset($id, $email, $nombre, $connection) {

    $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 3, date("Y"));
    $currFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
    $expDate = date("Y-m-d H:i:s", $expFormat);
    $token = md5($id . '_' . $email . rand(0, 10000) . $expDate . PW_SALT);
    $stmt = $connection->prepare('INSERT into reset_password (id, token, fecha) values (?,?,?)');
    $timestamp = date("Y-m-d H:i:s", $currFormat);

    if ($stmt) {
        $stmt->bind_param('sss', $id, $token, $expDate);
        $stmt->execute();
        $stmt->store_result();
        $stmt->close();

        $subject = 'Reestablecer contraseña - CINED.';
        $link = "<a href=\"http://cined.cloudapp.net/reset_password.php?e=" . $token . "&u=" . urlencode(base64_encode($id))
                . "\">"
                . "http://cined.cloudapp.net/reset_password.php?e=" . $token . "&u=" . urlencode(base64_encode($id)) . "</a>";

        $body = '<head>
        <style type = "text/css">  
    p {
        display: none !important
    }
        </style>
        </head >';
        $body .= $nombre . ',<br /> <br/ >'
                . 'Hemos recibido una solicitud para reestablecer su contraseña de su cuenta en el sistema CINED.'
                . '<br/ > <br/ >'
                . 'Para reestablecer la contraseña por favor ingrese al siguiente enlace: <br/ > ';
        $body .= $link . '<br/ >';
        $body .= '<b>Este link se expirará en 3 días por razones de seguridad.</b> <br/ > <br/ >';
        $body .= 'Si no ha solicitado este cambio, simplemente ignore este correo y su contaseña no cambiará.'
                . '<p style="display:none;">' . $timestamp . '</p>';

        mysqli_close($connection);
        return sendMail($email, $subject, $body, 50);
    } else {
        
    }
}

function emailEtapa($titulo, $correos, $etapa, $estado, $type) {

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->IsHTML(true);
    $mail->CharSet = "UTF-8";
    $mail->Username = "cined.web@gmail.com";
    $mail->Password = "cined1234";
    $mail->SetFrom("cined.web@gmail.com");
    $mail->WordWrap = 100;
    $mail->Body = "<head>
        <style type = 'text/css'>  
  
    input {
        background-color: #00519e;
        color: white;
        padding: 12px 18px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        
    }
        </style>
        </head >";

    switch ($type) {
        case 1: {
                $mail->Subject = "CINED - Cambio de estado de etapa de TFG";
                $mail->Body .= "La etapa #" . $etapa . " del TFG:<b> " . $titulo . "</b> ha sido establecida como: " . $estado . ".<br />";
                break;
            }
        case 2: {
                $mail->Subject = "CINED - Aprobación Final de TFG";
                $mail->Body .= "Le informamos que el TFG: <b>" . $titulo . "</b> ha sido aprobado para la defensa.<br /><br />";
                break;
            }
        case 3: {
                $mail->Subject = "CINED - Cambio de estado de etapa de Proyecto de Investigación";
                $mail->Body .= "La etapa #" . $etapa . " del proyecto de investigación:<b> " . $titulo . "</b> ha sido establecida como: " . $estado . ".<br />";
                break;
            }
        case 4: {
                $mail->Subject = "CINED - Aprobación Final Proyecto de Investigación";
                $mail->Body .= "Le informamos que el proyecto de investigación:<b> " . $titulo . "</b> ha sido aprobado para la defensa.<br />";
                break;
            }
        case 5: {
                $mail->Subject = "CINED - Cambio de estado de etapa Proyecto de Extensión";
                $mail->Body .= "La etapa #" . $etapa . " del proyecto de extensión:<b> " . $titulo . "</b> ha sido establecida como: " . $estado . ".<br />";
                break;
            }
        case 6: {
                $mail->Subject = "CINED - Aprobación Final Proyecto de Extensión";
                $mail->Body .= "Le informamos que el proyecto de extensión: <b>" . $titulo . "</b> ha sido aprobado para la defensa.<br />";
                break;
            }
    }
    $mail->Body .= "<br /><form action='http://cined.cloudapp.net/login.php'>
              <input type='submit' value='Ir al sitio'>
              </form>";
    for ($index = 0; $index < count($correos); $index++) {
        $mail->AddAddress($correos[$index]);
    }
    return $mail->send();
}

function emailRegistroProyecto($info, $correos, $type) {
    $proyecto = "";
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->IsHTML(true);
    $mail->CharSet = "UTF-8";
    $mail->Username = "cined.web@gmail.com";
    $mail->Password = "cined1234";
    $mail->SetFrom("cined.web@gmail.com");
    $mail->WordWrap = 100;

    switch ($type) {
        case 1: {
                $op = "Modalidad";
                $proyecto = "TFG";
                break;
            } case 2: {
                $op = "Cátedra";
                $proyecto = "Proyecto de Investigación";
                break;
            } case 3: {
                $op = "Cátedra";
                $proyecto = "Proyecto de Extensión";
                break;
            }
    }
    $mail->Subject = "CINED - Confirmación de Registro de " . $proyecto;
    $body = '<head>
        <style type = "text/css">  
    table {
        border-collapse: collapse;
    }
    th {
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #00799e;
        color: white;   
    }

    table, th, td {
        border: 1px solid black;
       
    }
    th, td {
        text-align: left;
        padding: 6px;
    }
    tr:nth-child(even){ background-color: #f2f2f2 }
    input {
        background-color: #00519e;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        
    }
        </style>
        </head >';
    $body .= "<h3>Confirmación de registro de " . $proyecto . "</h3><br /><br />"
            . "Se ha registrado el siguiente " . $proyecto . " en el sistema web de CINED. <br /><br />";
    $body.= "<table>"
            . "<thead><th>Título</th>"
            . "<th>Carrera</th>"
            . "<th>" . $op . "</th>"
            . "<th>Línea de investigación</th>"
            . "<th>Fecha de inicio</th>"
            . "</thead>"
            . "<tbody>"
            . "<tr>"
            . "<td>" . $info[0] . "</td>"
            . "<td>" . $info[1] . "</td>"
            . "<td>" . $info[2] . "</td>"
            . "<td>" . $info[3] . "</td>"
            . "<td>" . $info[4] . "</td>"
            . "<tr>"
            . "</tbody>"
            . "</table><br />";
    $body .= "<form action='http://cined.cloudapp.net/login.php'>
              <input type='submit' value='Ir al sitio'>
              </form>";

    $mail->Body = $body;
    for ($index = 0; $index < count($correos); $index++) {
        $mail->AddAddress($correos[$index]);
    }
    return $mail->send();
}

?>