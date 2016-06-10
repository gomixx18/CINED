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

    <nav class="navbar navbar-default navbar-static-top" id='nav2' role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <h3 class="navbar-brand" >CINED</h3>

        </div>

    </nav>
</head>



<body class="gray-bg">
    <?php
    $userGet = $_GET['u'];
    $token = $_GET['e'];
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
                    url: "funcionalidad/reestablecerContrasena.php",
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
                        } else if (data.status === 'expirado') {
                            err = err.text("Ha alcanzado la fecha limite para reestablecer su contraseña. Por favor solicítela de nuevo.").css('color', 'red');
                        } else if (data.status === 'db_conn_error') {
                            err = err.text("No se puede establecer conexión con la base de datos. Comuníquese con el encargado.").css('color', 'red');
                        }

                        err.fadeIn(1000);
                        
                        $('*').css('cursor', 'default');
                        
                        setTimeout(function redirectPage(){
                            window.location.href = "http://cined.cloudapp.net/";
                        },3000);
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
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="changePass" action="funcionalidad/resetPassword.php" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Contraseña Nueva</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="key" id="key" value="<?= $token ?>" />
                                        <input type="hidden" name="user" id="user" value="<?= $userGet ?>" />
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
                    <div class="row">
                        <div class="col-sm-12">
                            <a data-toggle="collapse" href="login.php" class="text-primary">Ir a Página Principal</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        Universidad Nacional  &copy; 2015-2016
    </div>



</body>
</html>
