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
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <script src="js/jquery-2.1.1.js"></script>
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    
    <body class="gray-bg">
        <?php
        $userGet = $_GET['usuario'];
        $flag = $_GET['resultado'];
        ?>

        <div class="passwordBox animated fadeInDown">
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox-content">

                        <h2 class="font-bold">Cambiar Contraseña</h2>

                        <div class="row">
                            <div class="col-lg-14">
                                <form method="POST" action="funcionalidad/cambioContrasena.php" class="form-horizontal" onsubmit="return validar()">

                                    <input type="hidden" id="ced" name="userGet" value="<?= $userGet ?>" >

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Contraseña Anterior</label>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" id="oldP" name="oldP" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Contraseña Nueva</label>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" id="newP" name="newP" placeholder="">
                                        </div>
                                    </div>
                                    <button type="submit" name="modifyPass" class="btn btn-primary center-block">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





    </body>
</html>