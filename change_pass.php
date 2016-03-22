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
        <title>Password Change</title>
        <meta charset="UTF-8">
         <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="css/mycss.css" rel="stylesheet" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <body>
        
        <script>
            function validar() {
                alert('voy a validar');
                var bandera = true;
                newP = document.getElementById("newP").value;
                expr = document.getElementById("expr").value;
               // var expRegNombre = /^[ a-zA-Z]{1,}$/;     
                var expRegNombre = new RegExp(expr);
               //var expRegNombre = /^[a_z][a_zA_Z]{4}$/; 
                 
                alert(expRegNombre);
                alert(newP);
                if (!expRegNombre.test(newP)) {
                    bandera = false;
                    document.getElementById("newP").value = "";
                }
                alert(bandera);
                return bandera;
            }
 
        </script>
        <div class="wrapper">
 
            <div id="container">
                <div class="panel panel-default" id="panel1">
                    <div class="panel-heading">
                        <h3 class="panel-title">Change Password</h3>
                    </div>
                    <div class="panel-body">
                        <fieldset id="formularioAddUser">                     
                            <form method="POST" action="funcionalidad/cambioContrasena.php" class="form-horizontal" onsubmit="return validar()">
 
                                <input type="hidden" name="userGet" value="<?= $userGet ?>" >
                                <input type="hidden" id="expr" value="<?= $expresionRegular ?>" >
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Old Password</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="oldP" name="oldP" placeholder="Old Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">New Password</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="newP" name="newP" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="modifyPass" class="btn btn-default">Save changes</button>
 
                                    </div>
                                </div>
                                Note. The key must always start with a lowercase letter.
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