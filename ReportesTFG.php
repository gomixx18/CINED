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
        <script src="js/jquery-2.1.1.js"></script>
        <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
        <link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
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

                                <div class="form-group">
                                    <div class="row">

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <h4>Filtrar por</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">

                                            <label>
                                                Estado del TFG <input type="checkbox" id="ETFG" name="ETFG" value="" onchange="estado(this);">
                                            </label>

                                        </div>
                                        <div class="col-md-4" id="divETFG">

                                        </div>
                                    </div>
                                    </br>
                                    <div class="row">
                                        <div class="col-md-2">

                                            <label>
                                                Etapa #1 <input type="checkbox" id="ETFG1" name="ETFG1" value="" onchange="estadoEtapa(this);">
                                            </label>

                                        </div>
                                        <div class="col-md-4" id="divETFG1">

                                        </div>
                                    </div>
                                    </br>
                                    <div class="row">
                                        <div class="col-md-2">

                                            <label>
                                                Etapa #2 <input type="checkbox" id="ETFG2" name="ETFG2" value="" onchange="estadoEtapa(this);">
                                            </label>

                                        </div>
                                        <div class="col-md-4" id="divETFG2">

                                        </div>
                                    </div>
                                    </br>
                                    <div class="row">
                                        <div class="col-md-2">

                                            <label>
                                                Etapa #3 <input type="checkbox" id="ETFG3" name="ETFG3" value="" onchange="estadoEtapa(this);">
                                            </label>

                                        </div>
                                        <div class="col-md-4" id="divETFG3">

                                        </div>
                                    </div>
                                    </br>
                                    <div class="row">
                                        <div class="col-md-2">

                                            <label>
                                                Fechas de inicio y final
                                            </label>
                                            <?php
                                            $fecha_actual = date("Y-m-d");
                                            $nuevafecha = date('Y-m-d', strtotime('+1 month'))
                                            ?>
                                        </div>
                                        <div class="col-md-4">
                                            <div id="" class="form-group">
                                                <input class="form-control" type="text" name="daterange" value="<?php echo $fecha_actual . " - " . $nuevafecha ?> " />

                                            </div>
                                        </div>
                                    </div>
                                    </br>
                                    <div class="row">
                                        <div class="col-md-2">

                                            <label>
                                                Carrera
                                            </label>

                                        </div>
                                        <div class="col-md-4">
                                            <select name="carrera" id="carrera" class="form-control">
                                                <option value="Ninguna">Ninguna</option>
                                                <?php
                                                $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
                                                if (!$connection) {
                                                    exit("<label class='error'>Error de conexión</label>");
                                                }
                                                $query = mysqli_query($connection, "SELECT * FROM carreras");
                                                while ($data = mysqli_fetch_assoc($query)) {
                                                    echo "<option value=" . $data["codigo"] . ">" . $data["nombre"] . "</option>";
                                                }

                                                mysqli_close($connection);
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    </br>
                                    <div class="row">
                                        <div class="col-md-2">


                                            <label >
                                                Línea de Investigación
                                            </label>


                                        </div>
                                        <div class="col-md-4">
                                            <select name="lineaInvest" id="linea" class="form-control">
                                                <option value="Ninguna">Ninguna</option>
                                                <?php
                                                $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
                                                if (!$connection) {
                                                    exit("<label class='error'>Error de conexión</label>");
                                                }
                                                $query = mysqli_query($connection, "SELECT * FROM lineasinvestigacion");
                                                while ($data = mysqli_fetch_assoc($query)) {
                                                    echo "<option value=" . $data["codigo"] . ">" . $data["nombre"] . "</option>";
                                                }

                                                mysqli_close($connection);
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    </br>
                                    <div class="row">
                                        <div class="col-md-2">

                                            <label>
                                                Modalidad
                                            </label>


                                        </div>
                                        <div class="col-md-4">
                                            <select name="modalidad" id="modalidad" class="form-control">
                                                <option value="Ninguna">Ninguna</option>
                                                <?php
                                                $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
                                                if (!$connection) {
                                                    exit("<label class='error'>Error de conexión</label>");
                                                }
                                                $query = mysqli_query($connection, "SELECT * FROM modalidades");
                                                while ($data = mysqli_fetch_assoc($query)) {
                                                    echo "<option value=" . $data["codigo"] . ">" . $data["nombre"] . "</option>";
                                                }

                                                mysqli_close($connection);
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    </br>

                                    <div class="row">
                                        <div class="col-lg-3">

                                        </div>
                                        <div class="col-lg-2">
                                            <button id="report" type="" class="btn btn-primary">Generar Reporte</button>
                                        </div>
                                    </div>

                                </div>

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

        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
        <!-- Data picker -->
        <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>   

        <!-- Date range use moment.js same as full calendar plugin -->
        <script src="js/plugins/fullcalendar/moment.min.js"></script>

        <!-- Date range picker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Custom and plugin javascript -->
        <script src="js/inspinia.js"></script>
        <script src="js/plugins/pace/pace.min.js"></script>


    </body>
    <script>
                                                    reporte();
                                                    var estadoTFG = {};
                                                    var estadosE1 = {};
                                                    var estadosE2 = {};
                                                    var estadosE3 = {};
                                                    function reporte() {
                                                        $("#report").click(function (evento) {
                                                            evento.preventDefault();
                                                            parametros();
                                                            var carrera = $("#carrera").val();
                                                            var linea = $("#linea").val();
                                                            var modalidad = $("#modalidad").val();
                                                            var datarange = $("#datarange").startDate;
                                                            alert(datarange);
                                                            var Etfg = {};
                                                            Etfg = JSON.stringify(estadoTFG);
                                                            var Etfg1 = {};
                                                            Etfg1 = JSON.stringify(estadosE1);
                                                            var Etfg2 = {};
                                                            Etfg2 = JSON.stringify(estadosE2);
                                                            var Etfg3 = {};
                                                            Etfg3 = JSON.stringify(estadosE3);
                                                            $.get("funcionalidad/reportesTFG.php", {Etfg: Etfg, Etfg1: Etfg1, Etfg2: Etfg2, Etfg3: Etfg3, carrera: carrera, linea: linea, modalidad: modalidad, datarange: datarange}, function (data) {
                                                                alert(data);
                                                            }).fail(function () {

                                                            });
                                                            //alert("ksjadsa");

                                                        });
                                                    }

                                                    function parametros() {
                                                        if (ischeck("ETFG")) {
                                                            est();
                                                        }
                                                        for (var i = 1; i < 4; i++) {
                                                            if (ischeck("ETFG" + i)) {
                                                                esteta(i);
                                                            }

                                                        }

                                                    }

                                                    function esteta(n) {
                                                        for (var i = 1; i < 5; i++) {
                                                            if (ischeck("ETFG" + n + i)) {
                                                                //alert("ETFG" + n + i);
                                                                var x = $("#ETFG" + n + i).prop("value");
                                                                eval("estadosE" + n + ".ETFG" + n + i + "=\"" + x + "\";");
                                                                alert(eval("estadosE" + n + ".ETFG" + n + i));
                                                            }
                                                        }
                                                    }

                                                    function est() {
                                                        for (var i = 1; i < 5; i++) {
                                                            if (ischeck("ETFG" + i)) {
                                                                var x = $("#ETFG" + i).prop("value");
                                                                eval("estadoTFG" + ".ETFG" + i + "=\"" + x + "\";");
                                                                // alert(eval("estadoTFG" + ".ETFG" + i));

                                                            }
                                                        }
                                                    }


                                                    $('input[name="daterange"]').daterangepicker({
                                                        //locale: {
                                                        format: 'YYYY-MM-DD',
                                                        separator: " / ",
                                                        startDate: moment().subtract('days', 29),
                                                        endDate: moment()
                                                        //}
                                                    }, function (start, end, label) {

                                                        startDate = start;
                                                        endDate = end;
                                                    });
                                                    /*
                                                     $(function () {
                                                     $("form#reporte").submit(function () {
                                                     
                                                     
                                                     $('*').css('cursor', 'progress');
                                                     $.ajax({
                                                     url: "funcionalidad/reportesTFG.php",
                                                     type: "POST",
                                                     data: "",
                                                     dataType: "json",
                                                     success: function (data) {
                                                     for (var i in data)
                                                     {
                                                     var row = data[i];
                                                     
                                                     var id = row[0];
                                                     var vname = row[1];
                                                     alert(id);
                                                     }
                                                     
                                                     
                                                     $('*').css('cursor', 'default');
                                                     }
                                                     });
                                                     return false;
                                                     });
                                                     });
                                                     */

                                                    function estado(checkbox) {

                                                        if (checkbox.checked) {
                                                            $("#div" + checkbox.id).append("<input type='checkbox' id='" + checkbox.id + "1' name='" + checkbox.id + "1' value='Activo' onchange=''><label>Activo</label><br>"
                                                                    + "<input type='checkbox' id='" + checkbox.id + "2' name='" + checkbox.id + "2' value='Inactivo' onchange=''><label>Inactivo</label><br>"
                                                                    + "<input type='checkbox' id='" + checkbox.id + "3' name='" + checkbox.id + "3' value='Aprobada para defensa' onchange=''><label>Aprobada para defensa</label><br>"
                                                                    + "<input type='checkbox' id='" + checkbox.id + "4' name='" + checkbox.id + "4' value='Finalizado' onchange=''><label>Finalizado</label><br>");
                                                        } else {
                                                            $("#div" + checkbox.id).empty();
                                                        }
                                                    }
                                                    function estadoEtapa(checkbox) {
                                                        if (checkbox.checked) {
                                                            $("#div" + checkbox.id).append("<input type='checkbox' id='" + checkbox.id + "1' name='" + checkbox.id + "1' value='Aprobada' onchange=''><label>Aprobada</label><br>"
                                                                    + "<input type='checkbox' id='" + checkbox.id + "2' name='" + checkbox.id + "2' value='Aprobada con Observaciones' onchange=''><label>Aprobada con Observaciones</label><br>"
                                                                    + "<input type='checkbox' id='" + checkbox.id + "3' name='" + checkbox.id + "3' value='No Aprobada' onchange=''><label>No Aprobada</label><br>"
                                                                    + "<input type='checkbox' id='" + checkbox.id + "4' name='" + checkbox.id + "4' value='En ejecución' onchange=''><label>En ejecución</label><br>");
                                                        } else {
                                                            $("#div" + checkbox.id).empty();
                                                        }
                                                    }
                                                    function ischeck(checkbox) {
                                                        return $("#" + checkbox).is(':checked');
                                                    }



    </script>

</html>


