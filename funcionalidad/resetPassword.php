<?php

$password = $_POST['newp'];
$id = urldecode(base64_decode($_POST['id']));
$key = $_POST['key'];
updateUserPassword($id, $password, $key);

function checkEmailKey($key, $userID) {
    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
    $date = date("Y-m-d H:i:s");
    if ($SQL = $connection->prepare("SELECT id FROM reset_password WHERE token = ? AND id = ? AND fecha >= ?")) {
        $SQL->bind_param('sss', $key, $userID, $date);
        $SQL->execute();
        $SQL->store_result();
        $numRows = $SQL->num_rows();
        $SQL->bind_result($userID);
        $SQL->fetch();
        $SQL->close();
        if ($numRows > 0 && $userID != '') {
            return true;
        }
        mysqli_close($connection);
    }
    return false;
}

function updateUserPassword($userID, $password, $token) {
    if (!checkEmailKey($token, $userID)) { //ha vencido el link
        $response_array['status'] = 'expirado';
    } else {
        $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
        if ($connection) {
            if ($SQL = $connection->prepare("UPDATE usuarios SET password = ? WHERE ID = ?")) {
                $SQL->bind_param('ss', $password, $userID);
                $SQL->execute();
                $SQL->close();
                $SQL = $connection->prepare("DELETE FROM reset_password WHERE token = ?");
                $SQL->bind_param('s', $token);
                $SQL->execute();
                $response_array['status'] = 'success';
            } else {
                $response_array['status'] = 'error';
            }
            mysqli_close($connection);
        } else {
            $response_array['status'] = 'db_conn_error';
        }
    }

    echo json_encode($response_array);
}

php
?>

