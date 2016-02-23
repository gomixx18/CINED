<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reportes de TFG</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <?php
        include 'navegacion/nav-lateral.php';
        ?>
    </head>

    <body class="">
        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg">

                <?php require 'navegacion/nav-superior.php' ?>

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-sm-4">
                        <h1>Reportes - TFG</h1>

                    </div>

                </div>

                <div class="wrapper wrapper-content">

                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div id="ReporteTFG">
                                <form role="form" method="POST" action="redirecciones.php">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label>Carrera</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <select class="form-control">
                                                    <option>Carrera 1</option>
                                                    <option>Carrera 2</option>
                                                    <option>Carrera 3</option>
                                                    <option>Carrera 4</option>
                                                    <option>Carrera 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label>Linea de Investigación</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <select class="form-control">
                                                    <option>Linea de Investigación 1</option>
                                                    <option>Linea de Investigación 2</option>
                                                    <option>Linea de Investigación 3</option>
                                                    <option>Linea de Investigación 4</option>
                                                    <option>Linea de Investigación 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label>Modalidad</label>
                                            </div><div class="col-lg-6">
                                                <select class="form-control">
                                                    <option>Modalidad 1</option>
                                                    <option>Modalidad 2</option>
                                                    <option>Modalidad 3</option>
                                                    <option>Modalidad 4</option>
                                                    <option>Modalidad 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label>Director</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <select class="form-control">
                                                    <option>Director 1</option>
                                                    <option>Director 2</option>
                                                    <option>Director 3</option>
                                                    <option>Director 4</option>
                                                    <option>Director 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label>Asesores</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <select class="form-control">
                                                    <option>Asesores 1</option>
                                                    <option>Asesores 2</option>
                                                    <option>Asesores 3</option>
                                                    <option>Asesores 4</option>
                                                    <option>Asesores 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label>Código</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control">
                                            </div>
                                        </div>
                                        </br>
                                        <div class="row">
                                            <div class="col-lg-3">

                                            </div>
                                            <div class="col-lg-2">
                                                <button type="submit" name="reportesTFG"  class="btn btn-lg btn-default">Generar Reporte</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div>
                        Universidad Nacional  &copy; 2015-2016
                    </div>
                </div>
            </div>
        </div>



        <!-- Mainly scripts -->
        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Custom and plugin javascript -->
        <script src="js/inspinia.js"></script>
        <script src="js/plugins/pace/pace.min.js"></script>


    </body>

</html>


