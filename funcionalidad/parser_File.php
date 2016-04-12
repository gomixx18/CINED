<?php
$fileName = $_FILES["archivo"]["name"]; // The file name
$fileTmpLoc = $_FILES["archivo"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["archivo"]["type"]; // The type of file it is
$fileSize = $_FILES["archivo"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["archivo"]["error"];

