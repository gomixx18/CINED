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
        <title>Reestablecer Contraseña</title>
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <script src="js/jquery-2.1.1.js"></script>
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body class="gray-bg">
        <?php
        $userGet = $_GET['u'];
        ?>
        <script type="text/javascript">
            $(function () {

                $("form#changePass").submit(function () {
                    var id = $("#user").val();
                    var newp = $("#newp").val();
                    var key = $("#key").val();
                    var err = $("#result");
                    
                    
                    err = err.hide();
                    $('*').css('cursor', 'progress');
                    $.ajax({
                        url: "funcionalidad/resetPassword.php",
                        type: "POST",
                        data: {
                           
                            newp: newp,
                            id: id,
                            key: key
                        },
                        dataType: "json",
                        success: function (data) {

                            if (data.status === 'success') {
                                err = err.text("Su contraseña ha sido reestablecida.").css('color', 'green');
                            } else if (data.status === 'error') {
                                err = err.text("Ha ocurrido un error.").css('color', 'red');
                            }
                           
                            err.fadeIn(1000);
                            $('*').css('cursor', 'default');
                        }
                    });
                    return false;
                });
            });
        </script>


        <div class="passwordBox animated fadeInDown">
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox-content">

                        <h2 class="font-bold">Reestablecer Contraseña</h2>

                        <div class="row">
                            <div class="col-lg-14">
                                <form id="changePass" action="funcionalidad/resetPassword.php" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Contraseña Nueva</label>
                                        <div class="col-sm-6">
                                            <input type="hidden" name="key" id="key" value="deae251b21cd56688c52260e968d6b32" />
                                            <input type="hidden" name="user" id="user" value="Njc4" />
                                            <input type="password" class="form-control" id="newp" name="newp" placeholder="">
                                        </div>
                                    </div>
                                    
                                    <button type="submit" name="resetPass" class="btn btn-primary center-block">Guardar</button>
                                    <br>
                                    <p id="result" align="center">

                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





    </body>
</html>
