<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Administración de TFG</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

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
                    <div class="col-lg-10">
                        <h2>Administración de TFG</h2>
                        <ol class="breadcrumb">

                            <li class="active">
                                <strong>Consulta de TFG</strong>
                            </li>
                            <li>
                                <a href="agregar_proyecto_tfg.php">Registrar Proyecto de TFG</a>
                            </li>

                        </ol>
                    </div>

                </div>
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">

                                <div class="ibox-title">
                                    <h5>Consulta de Trabajos de TFG</h5>

                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#">Config option 1</a>
                                            </li>
                                            <li><a href="#">Config option 2</a>
                                            </li>
                                        </ul>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <div class="table-responsive">
									<div id="divTabla">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Título</th>
                                                    <th>Carrera</th>
                                                    <th>Línea de Investigación</th>
                                                    <th>Modalidad</th>
                                                    <th>Estado</th>
                                                    <th>Acción</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            
                                            <row>
                                                <div class="form-group">
                                                    Busqueda por identificación de estudiante
                                                    <input id="estudiante" name="estudiante" type="text" >
                                                    <input id="btnestudiante" name="btnestudiante" type="button" value="Buscar" >
                                                </div>
                                            </row>
                                            <tbody>

                                                
                                                
                                                
                                                <?php
                                                $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
                                                if (!$connection) {
                                                    exit("<label class='error'>Error de conexión</label>");
                                                }

                                                $query = mysqli_query($connection, "SELECT tfg.codigo, tfg.titulo, lineasinvestigacion.nombre as lineainvestigacion, 
                                                                                    carreras.nombre as carrera, tfg.estado, modalidades.nombre as modalidad
                                                                                    FROM tfg, lineasinvestigacion, carreras, modalidades
                                                                                    where tfg.lineainvestigacion = lineasinvestigacion.codigo and
                                                                                    tfg.carrera = carreras.codigo and tfg.modalidad = modalidades.codigo");


                                                while ($data = mysqli_fetch_assoc($query)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $data["codigo"] . "</td>";
                                                    echo "<td>" . $data["titulo"] . "</td>";
                                                    echo "<td>" . $data["carrera"] . "</td>";
                                                    echo "<td>" . $data["lineainvestigacion"] . "</td>";
                                                    echo "<td>" . $data["modalidad"] . "</td>";
                                                    echo "<td>" . $data["estado"] . "</td>";
                                                    echo "<td>" . "<button type='submit' data-toggle='modal' class='btn btn-primary'
                                                                 id = '" . $data["codigo"] . "' > Modificar</button></td> ";


                                                    echo "<form method= 'GET' action = 'consulta_TFG.php'>";
                                                    echo "<input type='hidden' name='codigo' value= '" . $data["codigo"] . "'/> ";
                                                    echo "<td>" . "<button type='submit' data-toggle='modal' class='btn btn-primary'
                                                                 id = '" . $data["codigo"] . "' > Consultar</button></td> ";
                                                    echo "</tr>";
                                                    echo "</form>";
                                                }

                                                mysqli_close($connection);
                                                ?>    

                                            </tbody>
                                            
                                           

                                          
                                            <tfoot>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Título</th>
                                                    <th>Carrera</th>
                                                    <th>Línea de Investigación</th>
                                                    <th>Modalidad</th>
                                                    <th>Estado</th>
                                                    <th>Acción</th> 
                                                    <th>Acción</th> 
                                                </tr>
                                            </tfoot>
                                        </table>
										</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-10"></div>
                    <a href="agregar_proyecto_tfg.php" class="btn btn-primary" href="#modal-form">Registrar Trabajo de Graduación Final</a>

                </div>

                <div class="footer">
                    Universidad Nacional  &copy; 2015-2016
                </div>

            </div>
        </div>

        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

        <script src="js/plugins/dataTables/datatables.min.js"></script>

        <!-- Custom and plugin javascript -->
        <script src="js/inspinia.js"></script>
        <script src="js/plugins/pace/pace.min.js"></script>

        <!-- Page-Level Scripts -->
        <script>
            $(document).ready(function () {
                $('.dataTables-example').DataTable({
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                        {extend: 'copy'},
                        {extend: 'csv'},
                        {extend: 'excel', title: 'ExampleFile'},
                        {extend: 'pdf', title: 'ExampleFile'},
                        {extend: 'print',
                            customize: function (win) {
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                            }
                        }
                    ]

                });

                /* Init DataTables */
                var oTable = $('#editable').DataTable();

                /* Apply the jEditable handlers to the table */
                oTable.$('td').editable('../example_ajax.php', {
                    "callback": function (sValue, y) {
                        var aPos = oTable.fnGetPosition(this);
                        oTable.fnUpdate(sValue, aPos[0], aPos[1]);
                    },
                    "submitdata": function (value, settings) {
                        return {
                            "row_id": this.parentNode.getAttribute('id'),
                            "column": oTable.fnGetPosition(this)[2]
                        };
                    },
                    "width": "90%",
                    "height": "100%"
                });


            });

            function fnClickAddRow() {
                $('#editable').dataTable().fnAddData([
                    "Custom row",
                    "New row",
                    "New row",
                    "New row"
                ]);

            }
        </script>
		<script >


            $(document).ready(function () {

                $("#btnestudiante").click(function (evento) {
                    evento.preventDefault();
                    var val = $("#estudiante").val();
                    $("#divTabla").load("tablas/tablaTFG.php", {estudiante: val}, function () {

                        
                    });
                });
            });
        </script>

    </body>

</html>