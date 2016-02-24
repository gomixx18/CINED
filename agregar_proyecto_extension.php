<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administración Extensión</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">
    
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
                        <h2>Administración de Proyectos de Extensión</h2>
                        <ol class="breadcrumb">

                            <li class="active">
                                <strong>Registrar Proyecto de Extensión</strong>
                            </li>
                            <li>
                                <a href="admin_Investigacion.php">Consultar Proyectos de Extensión</a>
                            </li>

                        </ol>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
        <div class="wrapper wrapper-content animated fadeInRight">   
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Registrar Nuevo Proyecto de Extensión</h5>
                        </div>
                        <div class="ibox-content">

                            <form id="form" action="#" class="wizard-big">
                                <h1>Proyecto</h1>
                                <fieldset>
                                    <h2>Información del Proyecto</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nombre Proyecto</label>
                                                <input id="nomProyecto" name="nomProyecto" type="text" class="form-control required">
                                            </div>
                                                   
                                        <div class="form-group">
                                            <label>Linea de Investigación</label>
                                                       <select id="lineaInvest" name='lineaInvest' class=" select2_investigacion form-control required" tabindex="-1" aria-required='true'>
                                                            <option></option>
                                                            <option value="lineaInvest1">Línea de Investigación</option>
                                                            <option value="lineaInvest2">Línea de Investigación 2</option>
                                                            <option value="lineaInvest3">Línea de Investigación 3</option>
                                                            <option value="lineaInvest4">Línea de Investigación 4</option>
                                                         </select>
                                        </div>
                                            
                                             <div class="form-group">                                              
                                                <label>Carrera</label>
                                                <select id="carrera" name='carrera' aria-required='true' class="select2_carrera form-control required" tabindex="-1">
                                                    <option></option>
                                                    <option value="Carrera1">Carrera 1</option>
                                                    <option value="Carrera2">Carrera 2</option>
                                                    <option value="Carrera3">Carrera 3</option>
                                                    <option value="Carrera4">Carrera 4</option>
                                                </select>           
                                        </div>   
                                        </div>
                                      
                                    </div>

                                </fieldset>
                                <h1>Investigadores</h1>
                                <fieldset>
                                    <h2>Agregar Investigadores</h2>
                                    <div class="row">
                                         
                                        <div class="col-lg-6" id="investidadores">
                                            <div class="form-group">
                                                <label for='btnAgregar'>Cédula Investigador:</label>
                                                <input id="idInvest"  name="inputInvest" type="text" class="form-control input-sm m-b-xs required" placeholder='cédula investidador'/>
                                                <button  class="btn btn-primary btn-rounded" onclick='agregarInvest(this)' type="button" placeholder='agregar'>Agregar Nuevo Investigador</button>

                                            </div>
                                        </div>
                                          
                                    </div>
                                </fieldset>
                                
                                 <h1>Coordinador del Proyecto</h1>
                                <fieldset>
                                    <h2>Agregar Coordinador</h2>
                                    <h3>Coordinador: *</h3>
                                    <div class="form-group">
                                
                       <div class="ibox-content">
                          
                             <input type="text" class="form-control input-sm m-b-xs" id="filterCoord"
                                   placeholder="Buscar Coordinador">

                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filterCoord>
                                <thead>
                                <tr>
                                    <th>Identificación</th>
                                    <th>Nombre</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apelido</th>
                                    <th>Seleccionado</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr >
                                    <td>7894562123</td>
                                    <td>Sara</td>
                                    <td>Casas</td>
                                    <td class="center">Ulloa</td>
                                    <td>
                                        <div class="i-checks center"><input type="radio" value="7894562123" name="radCoord" required></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2456784648</td>
                                    <td>Mauricio</td>
                                    <td>Flores</td>
                                    <td class="center">Díaz</td>
                                    <td class="center"><div class="i-checks"><input type="radio" value="2456784648" name="radCoord"></div></td>
                                </tr>
                            </table>
                        </div>
                                    </div>
                        
                                              
                                  
                                </fieldset>

                                <h1>Asesores del Proyecto</h1>
                                <fieldset>
                                    <h2>Agregar Asesores</h2>
                                    <h3>Agregar Asesor 1: *</h3>
                                    <div class="form-group">
                                
                       <div class="ibox-content">
                          
                             <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Buscar Asesor">

                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                <tr>
                                    <th>Identificación</th>
                                    <th>Nombre</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apelido</th>
                                    <th>Seleccionado</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr >
                                    <td>4056789456</td>
                                    <td>Ana</td>
                                    <td>Castro</td>
                                    <td class="center">Mora</td>
                                    <td>
                                        <div class="i-checks center"><input type="radio" value="40567894456" name="a" required></div>
                                    </td>
                                </tr>
                                <tr class="gradeC">
                                    <td>115845613</td>
                                    <td>Hellen
                                    </td>
                                    <td>Mata</td>
                                    <td class="center">Barboza</td>
                                    <td class="center"><div class="i-checks"><input type="radio" value="40567894456" name="a"></div></td>
                                </tr>
                            </table>
                        </div>
                                    </div>
                         <div class="form-group">
                             <h3>Agregar Asesor 2: </h3>
                       <div class="ibox-content">
                             <input type="text" class="form-control input-sm m-b-xs" id="filter2" placeholder="Buscar Asesor">
                             <div class="i-checks"><br><label for="b">Ninguno: &nbsp;</label><input type="radio" value="ninguno" name="b" checked>  </div>
                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter2>
                                <thead>
                                <tr>
                                    <th>Identificación</th>
                                    <th>Nombre</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apelido</th>
                                    <th>Seleccionado</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>74561235</td>
                                    <td>Miguel</td>
                                    <td>Villalobos</td>
                                    <td class="center">Pérez</td>
                                    <td>
                                        <div class="i-checks center"><input type="radio" value="40567894456" name="b" required></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>115845613</td>
                                    <td>Juan</td>
                                    <td>Portuguez</td>
                                    <td class="center">Montiel</td>
                                    <td class="center"><div class="i-checks"><input type="radio" value="40567894456" name="b"></div></td>
                                </tr>
                            </table>
                            </div>
                                    </div>            
                                  
                                </fieldset>
                                
                                
                                

                                <h1>Finish</h1>
                                <fieldset>
                                    <h2>Terms and Conditions</h2>
                                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
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

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="js/plugins/staps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>
    
    <script src="js/plugins/select2/select2.full.min.js"></script>
    
    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>
    
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    
    <script src="js/funciones.js"></script>


    <script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                
                 labels: {
        current: "current step:",
        pagination: "Pagination",
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
                    form.submit();
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
                placeholder: "Seleccione Una Línea de investigaión",
                allowClear: true
            });
            
             $('.footable').footable();
             
             $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
       });
    </script>

</body>

</html>
