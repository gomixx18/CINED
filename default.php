<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>::..Funciones FTP..::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
    

<?php 
//date_default_timezone_set('America/Costa_Rica');

$horatotal = time();
$date = gmdate('D, d M Y h:i:s T', $horatotal);

echo $date;

?>

    <form action="funcionalidad/CargarArchivoBlobTFG.php"  method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file"/>
        <input type="submit"/>
    </form>
</body>
</html>
