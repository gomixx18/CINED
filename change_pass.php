<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'elements.php';
?>
<html>
    <head>
        <title>Cambio de Contraseña</title>
        <meta charset="UTF-8">
         <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="css/mycss.css" rel="stylesheet" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <body>
        <?php
         $userGet = $_GET['usuario'];
         $flag = $_GET['resultado'];
        
        ?>
        <script>
            function validar() {
                alert('voy a validar');
                var bandera = true;
                newP = document.getElementById("newP").value;
                cedula = document.getElementById("ced").value;
              
                alert(cedula);
             
               // alert(bandera);
                //return bandera;
            }
 
        </script>
        <div class="wrapper">
 
            <div id="container">
                <div class="panel panel-default" id="panel1">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cambiar Contraseña</h3>
                    </div>
                    <div class="panel-body">
                        <fieldset id="formularioAddUser">                     
                            <form method="POST" action="funcionalidad/cambioContrasena.php" class="form-horizontal" onsubmit="return validar()">
 
                                <input type="hidden" id="ced" name="userGet" value="<?= $userGet ?>" >
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Contraseña Anterior</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="oldP" name="oldP" placeholder="Old Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Contraseña Nueva</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="newP" name="newP" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="modifyPass" class="btn btn-default">Guardar</button>
 
                                    </div>
                                </div>
                               
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
<?php
footer();
?>
 
 
 
 
    </body>
</html>