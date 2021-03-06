<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>CINED | Recuperar Contraseña</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <script src="js/jquery-2.1.1.js"></script>
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

    </head>

    <body class="gray-bg">
        <script type="text/javascript">
            $(function () {
                
                $("form#passwordForm").submit(function () {
                    var cedula = $("#cedula").val();
                    var err = $("#result");
                   
                    err = err.hide();
                    $('*').css('cursor','progress');
                    $.ajax({
                        url: "funcionalidad/recuperarContrasena.php",
                        type: "POST",
                        data: {cedula: cedula},
                        dataType: "json",
                        success: function (data) {
                           
                            if (data.status === 'success') {      
                                err = err.text("Correo enviado!").css('color' , 'green');
                            } else if (data.status === 'error') {        
                               err = err.text("El usuario no existe, vuelva a ingresar la cédula.").css('color', 'red');
                            } else if (data.status === 'db_conn_error'){
                                err = err.text("No se puede establecer conexión con la base de datos. Comuníquese con el encargado.");
                            }
                           err.fadeIn();
                           $('*').css('cursor','default');
                        }
                    });
                    return false;
                });
            });
        </script>
               
        <div class="passwordBox animated fadeInDown" style="padding-top: 0px">
            
            <div class="middle-box text-center ">
            <div>
                <h1 class="logo-name">CINED</h1>
            </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox-content">

                        <h2 class="font-bold">Recuperar Contraseña</h2>
                        <p>
                            Ingrese su cédula de identidad y una contraseña nueva le será enviada.
                        </p>
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="m-t" role="form" id="passwordForm" name="passwordForm" action="funcionalidad/recuperarContrasena.php">
                                    <div class="form-group">
                                        <input type="text" name="cedula" id="cedula" class="form-control" placeholder= "Cédula de Identidad" required="">
                                    </div>

                                    <button id="recuperarContrasena" type="submit" name="recuperarContrasena" class="btn btn-primary block full-width m-b">Enviar nueva contraseña</button>

                                </form>
                                <p id="result">
                                   
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            
        </div>
        <div class="footer">
                Universidad Nacional  &copy; 2015-2016
        </div>

    </body>

</html>

