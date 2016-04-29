<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Registrar TFG</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/plugins/chosen/chosen.css" rel="stylesheet">
        <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
        <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
        <link href="css/plugins/select2/select2.min.css" rel="stylesheet">


        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

        <link href="css/plugins/iCheck/custom.css" rel="stylesheet">

        <link href="css/plugins/chosen/chosen.css" rel="stylesheet">

        <link href="css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">

        <link href="css/plugins/cropper/cropper.min.css" rel="stylesheet">

        <link href="css/plugins/switchery/switchery.css" rel="stylesheet">

        <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

        <link href="css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

        <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

        <link href="css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
        <link href="css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

        <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

        <link href="css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

        <link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

        <link href="css/plugins/select2/select2.min.css" rel="stylesheet">

        <link href="css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">


        <!-- FooTable -->
        <link href="css/plugins/footable/footable.core.css" rel="stylesheet">

        <link href="css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
        <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

        <?php
        include 'navegacion/nav-lateral.php';
        ?>

    </head>

    <body>

        <div id="wrapper">

            <div id="page-wrapper" class="gray-bg">        
                <?php require 'navegacion/nav-superior.php' ?>
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Administración TFG</h2>
                        <ol class="breadcrumb">

                            <li class="active">
                                <strong>Registrar TFG</strong>
                            </li>
                            <li>
                                <a href="admin_TFG.php">Consultar TFG</a>
                            </li>

                        </ol>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
                <div class="wrapper wrapper-content animated fadeInRightBig">   
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>Registrar Nuevo Trabajo Final de Graduación</h5>
                                </div>
                                <div class="ibox-content">

                                    <form id="form" method="POST" action="funcionalidad/crearTFG.php" class="wizard-big">
                                        <h1>TFG</h1>
                                        <fieldset>
                                            <h2>Información del Trabajo</h2>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Titulo de TFG</label>
                                                        <input id="nomProyecto" name="tituloTFG" type="text" class="form-control required">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Línea de Investigación</label>
                                                        <select id="lineaInvest" name='lineaInvest' class=" select2_investigacion form-control required" tabindex="-1" aria-required='true'>
                                                            <option></option>

                                                            <?php
                                                            $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
                                                            if (!$connection) {
                                                                exit("<label class='error'>Error de conexión</label>");
                                                            }

                                                            $query = mysqli_query($connection, "SELECT * FROM lineasinvestigacion");


                                                            while ($data = mysqli_fetch_assoc($query)) {

                                                                echo "<option value=" . $data["codigo"] . ">" . $data["nombre"]  . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">                                              
                                                        <label>Carrera</label>
                                                        <select id="carrera" name='carrera' aria-required='true' class="select2_carrera form-control required" tabindex="-1">
                                                            <option></option>
                                                            <?php
                                                            if (!$connection) {
                                                                exit("<label class='error'>Error de conexión</label>");
                                                            }

                                                            $query = mysqli_query($connection, "SELECT * FROM carreras");
                                                            while ($data = mysqli_fetch_assoc($query)) {
                                                                echo "<option value=" . $data["codigo"] . ">" . $data["nombre"] . "</option>";
                                                            }
                                                            ?>
                                                        </select>           
                                                    </div> 
                                                    <div class="form-group">                                              
                                                        <label>Modalidad</label>
                                                        <select id="modalidad" name='modalidad' aria-required='true' class="select2_modalidad form-control required" tabindex="-1">
                                                            <option></option>
                                                            <?php
                                                            if (!$connection) {
                                                                exit("<label class='error'>Error de conexión</label>");
                                                            }

                                                            $query = mysqli_query($connection, "SELECT * FROM modalidades");
                                                            while ($data = mysqli_fetch_assoc($query)) {
                                                                echo "<option value=" . $data["codigo"] . ">" . $data["nombre"] . "</option>";
                                                            }
                                                            ?>
                                                        </select>       
                                                        </select>           
                                                    </div> 
                                                </div>

                                            </div>

                                        </fieldset>
                                        <h1>Estudiantes</h1>
                                        <fieldset>
                                            <h2>Asignar Estudiantes</h2>
                                            <div class="row">

                                                <div class="col-lg-4" id="estudiantes">
                                                    <div id="divEstud1" class="form-group">
                                                        <label for='btnAgregar'>Cédula Estudiante:</label>
                                                        <input id="idEstudiante1" name="nameEstudiante1" type="text" class="form-control input-sm m-b-xs required" placeholder='Cédula Estudiante'>
                                                        <button name="btnEstudiante1"  class="btn btn-primary btn-rounded" onclick='agregarEstudiantes(this)' type="button" placeholder='agregar'>Agregar Nuevo Estudiante</button>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8" id="estudiantesTabla">

                                                    <!-- inicio tabla estudiantes -->
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="ibox float-e-margins">

                                                                <div class="ibox-title">
                                                                    <h5>Consulta de Estudiantes</h5>

                                                                    
                                                                </div>
                                                                <div class="ibox-content">

                                                                    <div class="table-responsive">
                                                                        <div id="tablaEstudiantes">
                                                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                                            <thead>


                                                                                <tr>
                                                                                    <th name="id">Identificación</th>
                                                                                    <th name="nombre">Nombre</th>
                                                                                    <th name="apellido1">Primer Apellido</th>
                                                                                    <th name="apellido2">Segundo Apellido</th>
                     
                                                                                    <th name="accion">Acción</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                               

                                                                                $query = mysqli_query($connection, "SELECT * FROM tfgestudiantes where estado =1");


                                                                                while ($data = mysqli_fetch_assoc($query)) {
                                                                                    echo "<tr>";
                                                                                    echo "<td name='id'>" . $data["id"] . "</td>";
                                                                                    echo "<td name='nombre'>" . $data["nombre"] . "</td>";
                                                                                    echo "<td name='apellido1'>" . $data["apellido1"] . "</td>";
                                                                                    echo "<td name='apellido2'>" . $data["apellido2"] . "</td>";
                                                                                    echo '<td class="center"><div class="i-checks"><input type="radio" value="' . $data["id"] . '" name="radEstudiante" ></div></td>';
                                                                                    echo "</tr>";
                                                                                }

                                                                                ?>


                                                                            </tbody>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th>Identificación</th>
                                                                                    <th>Nombre</th>
                                                                                    <th>Primer Apellido</th>
                                                                                    <th>Segundo Apellido</th>
                                                                                 
                                                                                    <th>Acción</th>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                       </div>
                                                                    </div>
                                                                    <button name="btnSelectEstu"  class="btn btn-primary btn-rounded" onclick='selectEstudiantes()' type="button" placeholder='agregar'>Asignar Estudiante</button>
                                                                    <a data-toggle="modal" class="btn btn-primary btn-rounded" href="#modal-form">Registrar Estudiante</a>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>

                                                    </div>
                                                    <!-- fin tabla estudiantes -->
                                                    

                                                </div>


                                            </div>
                                            <div class="row">

                                            </div>
                                        </fieldset>

                                        <!-- encargado -->

                                        <h1>Encargado de TFG</h1>
                                        <fieldset>
                                            <h2>Asignar Encargado de TFG</h2>
                                            <h3>Encargado: </h3>
                                            <div class="form-group">

                                                <div class="ibox-content">

                                                    <input type="text" class="form-control input-sm m-b-xs" id="filterCoord"
                                                           placeholder="Buscar Encargado">

                                                    <table class="footable table table-stripped" data-page-size="8" data-filter=#filterCoord>
                                                        <thead>
                                                            <tr>
                                                                <th>Identificación</th>
                                                                <th>Nombre</th>
                                                                <th>Primer Apellido</th>
                                                                <th>Segundo Apellido</th>                            
                                                                <th>Seleccionado</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            $query = mysqli_query($connection, "SELECT * FROM tfgencargados where estado =1");


                                                            while ($data = mysqli_fetch_assoc($query)) {
                                                                echo "<tr>";
                                                                echo "<td>" . $data["id"] . "</td>";
                                                                echo "<td>" . $data["nombre"] . "</td>";
                                                                echo "<td>" . $data["apellido1"] . "</td>";
                                                                echo "<td>" . $data["apellido2"] . "</td>";
                                                                echo '<td class="center"><div class="i-checks"><input type="radio" value="' . $data["id"] . '" name="radEncargado" required></div></td>';
                                                                echo "</tr>";
                                                            }
                                                            ?>


                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>


                                        <h1>Director TFG</h1>
                                        <fieldset>
                                            <h2>Agregar Director</h2>
                                            <h3>Director: </h3>
                                            <div class="form-group">

                                                <div class="ibox-content">

                                                    <input type="text" class="form-control input-sm m-b-xs" id="filterCoord"
                                                           placeholder="Buscar Director">

                                                    <table class="footable table table-stripped" data-page-size="8" data-filter=#filterCoord>
                                                        <thead>
                                                            <tr>
                                                                <th>Identificación</th>
                                                                <th>Nombre</th>
                                                                <th>Primer Apellido</th>
                                                                <th>Segundo Apellido</th>
                                                                <th>Titulo</th>
                                                                <th>Especialidad</th>                        
                                                                <th>Seleccionado</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            $query = mysqli_query($connection, "SELECT * FROM tfgdirectores where estado = 1");


                                                            while ($data = mysqli_fetch_assoc($query)) {
                                                                echo "<tr>";
                                                                echo "<td>" . $data["id"] . "</td>";
                                                                echo "<td>" . $data["nombre"] . "</td>";
                                                                echo "<td>" . $data["apellido1"] . "</td>";
                                                                echo "<td>" . $data["apellido2"] . "</td>";
                                                                echo "<td>" . $data["titulo"] . "</td>";
                                                                echo "<td>" . $data["especialidad"] . "</td>";
                                                                echo '<td class="center"><div class="i-checks"><input type="radio" value="' . $data["id"] . '" name="radCoord" required></div></td>';
                                                                echo "</tr>";
                                                            }
                                                            ?>


                                                    </table>
                                                </div>
                                            </div>



                                        </fieldset>

                                        <h1>Asesores del Trabajo</h1>
                                        <fieldset>
                                            <h2>Agregar Asesores</h2>
                                            <h3>Agregar Asesor 1: *</h3>
                                            <div class="form-group">

                                                <div class="ibox-content">

                                                    <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                                           placeholder="Buscar Asesor">

                                                    <table class=" table table-stripped" data-page-size="8" data-filter=#filter>
                                                        <thead>
                                                            <tr>
                                                                <th>Identificación</th>
                                                                <th>Nombre</th>
                                                                <th>Primer Apellido</th>
                                                                <th>Segundo Apellido</th>
                                                                <th>Titulo</th>
                                                                <th>Especialidad</th>                        
                                                                <th>Seleccionado</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $query = mysqli_query($connection, "SELECT * FROM tfgasesores where estado =1");


                                                            while ($data = mysqli_fetch_assoc($query)) {
                                                                echo "<tr>";
                                                                echo "<td>" . $data["id"] . "</td>";
                                                                echo "<td>" . $data["nombre"] . "</td>";
                                                                echo "<td>" . $data["apellido1"] . "</td>";
                                                                echo "<td>" . $data["apellido2"] . "</td>";
                                                                echo "<td>" . $data["titulo"] . "</td>";
                                                                echo "<td>" . $data["especialidad"] . "</td>";
                                                                echo '<td class="center"><div class="i-checks"><input type="radio" value="' . $data["id"] . '" name="radAsesor1" required></div></td>';
                                                                echo "</tr>";
                                                            }
                                                            ?>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h3>Agregar Asesor 2: </h3>
                                                <div class="ibox-content">
                                                    <input type="text" class="form-control input-sm m-b-xs" id="filter2" placeholder="Buscar Asesor">
                                                    <div class="i-checks"><br><label for="b">Ninguno: &nbsp;</label><input type="radio" value="ninguno" name="radAsesor2" checked>  </div>
                                                    <table class="footable table table-stripped" data-page-size="8" data-filter=#filter2>
                                                        <thead>
                                                            <?php
                                                            $query = mysqli_query($connection, "SELECT * FROM tfgasesores where estado = 1");


                                                            while ($data = mysqli_fetch_assoc($query)) {
                                                                echo "<tr>";
                                                                echo "<td>" . $data["id"] . "</td>";
                                                                echo "<td>" . $data["nombre"] . "</td>";
                                                                echo "<td>" . $data["apellido1"] . "</td>";
                                                                echo "<td>" . $data["apellido2"] . "</td>";
                                                                echo "<td>" . $data["titulo"] . "</td>";
                                                                echo "<td>" . $data["especialidad"] . "</td>";
                                                                echo '<td class="center"><div class="i-checks"><input type="radio" value="' . $data["id"] . '" name="radAsesor2" required></div></td>';
                                                                echo "</tr>";
                                                            }
                                                            
                                                            
                                                            mysqli_close($connection);
                                                            ?>
                                                    </table>
                                                </div>
                                            </div>            

                                        </fieldset>


                                        <?php
                                        
                                            $fecha_actual=date("d/m/Y");
                            
                                            $nuevafecha = date('d/m/Y', strtotime('+1 month'))
                                        
 

                                        ?>

                                        <h1>Finish</h1>
                                        <fieldset>
                                            <h2>Fechas de inicio y final</h2>
                                            <div class="row">

                                                <div class="col-lg-6" >
                                                    <div id="divEstud1" class="form-group">
                                                        <label>Fecha de inicio:</label>
                                                        <input class="form-control" type="text" name="daterange" value="<?php echo $fecha_actual . " - " . $nuevafecha ?> " />

                                                    </div>
                                                </div>


                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="footer">

                    <div>
                        <strong>Universidad Nacional</strong> 2015-2016
                    </div>
                </div>

            </div>
        </div>



        <!-- Mainly scripts -->
        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

        <script src="js/plugins/dataTables/datatables.min.js"></script>


        <!-- Custom and plugin javascript -->
        <script src="js/inspinia.js"></script>
        <script src="js/plugins/pace/pace.min.js"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Chosen -->
        <script src="js/plugins/chosen/chosen.jquery.js"></script>

        <!-- Steps -->
        <script src="js/plugins/staps/jquery.steps.min.js"></script>

        <!-- Jquery Validate -->
        <script src="js/plugins/validate/jquery.validate.min.js"></script>

        <script src="js/plugins/select2/select2.full.min.js"></script>

        <!-- FooTable -->
        <script src="js/plugins/footable/footable.all.min.js"></script>

        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js"></script>

        <!-- JSKnob -->
        <script src="js/plugins/jsKnob/jquery.knob.js"></script>

        <!-- Input Mask-->
        <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

        <!-- Data picker -->
        <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

        <!-- NouSlider -->
        <script src="js/plugins/nouslider/jquery.nouislider.min.js"></script>

        <!-- Switchery -->
        <script src="js/plugins/switchery/switchery.js"></script>

        <!-- IonRangeSlider -->
        <script src="js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

        <!-- MENU -->
        <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

        <!-- Color picker -->
        <script src="js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

        <!-- Clock picker -->
        <script src="js/plugins/clockpicker/clockpicker.js"></script>

        <!-- Image cropper -->
        <script src="js/plugins/cropper/cropper.min.js"></script>

        <!-- Date range use moment.js same as full calendar plugin -->
        <script src="js/plugins/fullcalendar/moment.min.js"></script>

        <!-- Date range picker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js"></script>

        <!-- Select2 -->
        <script src="js/plugins/select2/select2.full.min.js"></script>

        <!-- TouchSpin -->
        <script src="js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

        <script src="js/funciones.js"></script>


        <script>
            
            bandera = false;
                                                            $(document).ready(function () {
                                                                $("#wizard").steps();
                                                                $("#form").steps({
                                                                    labels: {
                                                                        current: "Paso actual:",
                                                                        pagination: "Paginacion",
                                                                        finish: "Finalizar",
                                                                        next: "Siguiente",
                                                                        previous: "Anterior",
                                                                        loading: "Cargando...",
                                                                        cancel: "Cancelar"
                                                                    },
                                                                    bodyTag: "fieldset",
                                                                    onStepChanging: function (event, currentIndex, newIndex)
                                                                    {
                                                                        // Always allow going backward even if the current step contains invalid fields!
                                                                        if (currentIndex > newIndex)
                                                                        {
                                                                            return true;
                                                                        }
                                                                        
                                                                        
                                                                        var form = $(this);

                                                                        // Clean up if user went backward before
                                                                        if (currentIndex < newIndex)
                                                                        {
                                                                            // To remove error styles
                                                                            $(".body:eq(" + newIndex + ") label.error", form).remove();
                                                                            $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                                                                        }

                                                                        // Disable validation on fields that are disabled or hidden.
                                                                        //  form.validate().settings.ignore = ":disabled,:hidden";

                                                                        // Start validation; Prevent going forward if false
                                                                        return form.valid();
                                                                    },
                                                                    onStepChanged: function (event, currentIndex, priorIndex)
                                                                    {
                                                                        // Suppress (skip) "Warning" step if the user is old enough.
                                                          
                                                                        if(currentIndex === 5){
                                                                            bandera = true;
                                                                        }
                                                                        alert(bandera);

                                                                        
                                                                    },
                                                                    onFinishing: function (event, currentIndex)
                                                                    {
                                                                        var form = $(this);

                                                                        // Disable validation on fields that are disabled.
                                                                        // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                                                                        //  form.validate().settings.ignore = ":disabled";

                                                                        // Start validation; Prevent form submission if false
                                                                        return form.valid();
                                                                    },
                                                                    onFinished: function (event, currentIndex)
                                                                    {
                                                                        var form = $(this);

                                                                        // Submit form input
                                                                        if(bandera){
                                                                            form.submit();
                                                                        }
                                                                    }
                                                                }).validate({
                                                                    errorPlacement: function (error, element)
                                                                    {
                                                                        element.before(error);
                                                                    }
                                                                });

                                                                $(".select2_carrera").select2({
                                                                    placeholder: "Seleccione Una Carrera",
                                                                    allowClear: true
                                                                });

                                                                $(".select2_investigacion").select2({
                                                                    placeholder: "Seleccione Una Línea de Investigación",
                                                                    allowClear: true
                                                                });

                                                                $(".select2_modalidad").select2({
                                                                    placeholder: "Seleccione una Modalidad",
                                                                    allowClear: true
                                                                });

                                                                $('.footable').footable();
                                                                $('.footable2').footable();

                                                                $('.i-checks').iCheck({
                                                                    checkboxClass: 'icheckbox_square-green',
                                                                    radioClass: 'iradio_square-green',
                                                                });
                                                            });
        </script>

        <script>
            $(document).ready(function () {








                $('#data_1 .input-group.date').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
                });

                $('#data_2 .input-group.date').datepicker({
                    startView: 1,
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true,
                    format: "dd/mm/yyyy"
                });

                $('#data_3 .input-group.date').datepicker({
                    startView: 2,
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true
                });

                $('#data_4 .input-group.date').datepicker({
                    minViewMode: 1,
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true,
                    todayHighlight: true
                });

                $('#data_5 .input-daterange').datepicker({
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true
                });

                var elem = document.querySelector('.js-switch');
                var switchery = new Switchery(elem, {color: '#1AB394'});

                var elem_2 = document.querySelector('.js-switch_2');
                var switchery_2 = new Switchery(elem_2, {color: '#ED5565'});

                var elem_3 = document.querySelector('.js-switch_3');
                var switchery_3 = new Switchery(elem_3, {color: '#1AB394'});









                $('input[name="daterange"]').daterangepicker();

                $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

                $('#reportrange').daterangepicker({
                    format: 'MM/DD/YYYY',
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    minDate: '01/01/2012',
                    maxDate: '12/31/2015',
                    dateLimit: {days: 60},
                    showDropdowns: true,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'right',
                    drops: 'down',
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-primary',
                    cancelClass: 'btn-default',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Submit',
                        cancelLabel: 'Cancel',
                        fromLabel: 'From',
                        toLabel: 'To',
                        customRangeLabel: 'Custom',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        firstDay: 1
                    }
                }, function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                });

                $(".select2_demo_1").select2();
                $(".select2_demo_2").select2();
                $(".select2_demo_3").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });


                $(".touchspin1").TouchSpin({
                    buttondown_class: 'btn btn-white',
                    buttonup_class: 'btn btn-white'
                });

                $(".touchspin2").TouchSpin({
                    min: 0,
                    max: 100,
                    step: 0.1,
                    decimals: 2,
                    boostat: 5,
                    maxboostedstep: 10,
                    postfix: '%',
                    buttondown_class: 'btn btn-white',
                    buttonup_class: 'btn btn-white'
                });

                $(".touchspin3").TouchSpin({
                    verticalbuttons: true,
                    buttondown_class: 'btn btn-white',
                    buttonup_class: 'btn btn-white'
                });


            });
            var config = {
                '.chosen-select': {},
                '.chosen-select-deselect': {allow_single_deselect: true},
                '.chosen-select-no-single': {disable_search_threshold: 10},
                '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
                '.chosen-select-width': {width: "95%"}
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }

            $("#ionrange_1").ionRangeSlider({
                min: 0,
                max: 5000,
                type: 'double',
                prefix: "$",
                maxPostfix: "+",
                prettify: false,
                hasGrid: true
            });

            $("#ionrange_2").ionRangeSlider({
                min: 0,
                max: 10,
                type: 'single',
                step: 0.1,
                postfix: " carats",
                prettify: false,
                hasGrid: true
            });

            $("#ionrange_3").ionRangeSlider({
                min: -50,
                max: 50,
                from: 0,
                postfix: "°",
                prettify: false,
                hasGrid: true
            });

            $("#ionrange_4").ionRangeSlider({
                values: [
                    "January", "February", "March",
                    "April", "May", "June",
                    "July", "August", "September",
                    "October", "November", "December"
                ],
                type: 'single',
                hasGrid: true
            });

            $("#ionrange_5").ionRangeSlider({
                min: 10000,
                max: 100000,
                step: 100,
                postfix: " km",
                from: 55000,
                hideMinMax: true,
                hideFromTo: false
            });

            $(".dial").knob();

            $("#basic_slider").noUiSlider({
                start: 40,
                behaviour: 'tap',
                connect: 'upper',
                range: {
                    'min': 20,
                    'max': 80
                }
            });

            $("#range_slider").noUiSlider({
                start: [40, 60],
                behaviour: 'drag',
                connect: true,
                range: {
                    'min': 20,
                    'max': 80
                }
            });

            $("#drag-fixed").noUiSlider({
                start: [40, 60],
                behaviour: 'drag-fixed',
                connect: true,
                range: {
                    'min': 20,
                    'max': 80
                }
            });


        </script>


        <script>
            $(document).ready(function () {

                function getFecha() {

                    var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                    $fecha = new Date();
                    $dia = $fecha.getDate();
                    $mes = $fecha.getMonth();
                    $anno = $fecha.getFullYear();
                    $hora = $fecha.getHours();
                    $minutos = $fecha.getMinutes();
                    $segundos = $fecha.getSeconds();
                    return $dia + "/" + meses[$mes] + '/' + $anno + ' ' + $hora + ':' + $minutos + ':' + $segundos;
                }
                ;

            
                table = $('.dataTables-example').DataTable({
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                        {extend: 'copy'},
                        {extend: 'csv'},
                        {extend: 'excel', title: 'Reporte de Estudiantes'},
                        {extend: 'pdf',
                            title: 'Estudiantes Reporte',
                            message: 'Reporte Generado el: ' + getFecha(),
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            },
                        },
                        {extend: 'print',
                            customize: function (win) {
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                            }
                        },
                    ]
                });



            });




        </script>
        
        
        <script >


            $(document).ready(function () {

                $("#btnAgregarEstudianteModal").click(function (evento) {
                    evento.preventDefault();
                    var idaux = $("#idRegistroEstudiante").val();
                    var nomaux = $("#nombreRegistroEstudiante").val();
                    var ape1aux = $("#apellido1RegistroEstudiante").val();
                    var ape2aux = $("#apellido2RegistroEstudiante").val();
                    var correoaux = $("#correoRegistroEstudiante").val();
                    table.destroy();
                    $("#tablaEstudiantes").load("tablas/tablaEstudiantes.php", {id: idaux, nombre: nomaux, apellido1: ape1aux, apellido2: ape2aux, correo: correoaux}, function () {

                        
                    });
                });
            });
        </script>
        
        
        <div id="modal-form" class="modal fade" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class=""><h3 class="m-t-none m-b"> <i class="fa fa-plus-square-o"></i> Agregar Estudiante</h3>
                               
                                    <div class="form-group"> <i class="fa fa-exclamation-circle"> <label>Identificación</label></i> <input required type="text" placeholder="Identificacion" class="form-control" id="idRegistroEstudiante"></div>
                                    <div class="form-group"> <i class="fa fa-exclamation-circle"> <label>Nombre</label> </i> <input required type="text" placeholder="Nombre" class="form-control" id="nombreRegistroEstudiante"></div>
                                    <div class="form-group"> <i class="fa fa-exclamation-circle"> <label>Primer Apellido</label></i> <input required type="text" placeholder="Primer Apellido" class="form-control" id="apellido1RegistroEstudiante"></div>
                                    <div class="form-group"> <i class="fa fa-exclamation-circle"> <label>Segundo Apellido</label></i> <input required type="text" placeholder="Segundo Apellido" class="form-control" id="apellido2RegistroEstudiante"></div>
                                    <div class="form-group"> <i class="fa fa-exclamation-circle"> <label>Correo</label></i> <input required type="email" placeholder="Correo" class="form-control" id="correoRegistroEstudiante"></div>

                                    <div>
                                        <label class=""> <i class="fa fa-exclamation-circle"> Rellene los datos obligatorios.</i></label><br> 
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button" id="btnAgregarEstudianteModal" data-dismiss="modal"><strong>Registrar</strong></button>
                                        <button type="button" data-dismiss="modal" class="btn btn-sm btn-secundary pull-right m-t-n-xs" style="margin-right: 20px;" ><strong>Cancelar</strong></button>


                                    </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>

</html>
