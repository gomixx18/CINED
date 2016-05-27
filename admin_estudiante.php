<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Administración de Estudiantes</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <?php
        require 'navegacion/nav-lateral.php';
        ?>
    </head>

    <body class="">

        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg">
                <?php require 'navegacion/nav-superior.php' ?>

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Administración de Estudiantes</h2>
                        <ol class="breadcrumb">

                            <li class="active">
                                <strong>Consulta de Estudiantes</strong>
                            </li>
                            <li>
                                <a data-toggle="modal" href="#modal-form">Registrar Estudiante</a>
                            </li>

                        </ol>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
                <div class="wrapper wrapper-content animated fadeInRight">
				
					<a data-toggle="modal" class="btn btn-primary" href="#modal-form">Registrar Estudiante</a>
					<br/>
					<br/>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">

                                <div class="ibox-title">
                                    <h5>Consulta de Estudiantes</h5>

                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>


                                                <tr>
                                                    <th name="id">Identificación</th>
                                                    <th name="nombre">Nombre</th>
                                                    <th name="apellido1">Primer Apellido</th>
                                                    <th name="apellido2">Segundo Apellido</th>
                                                    <th name="correo">Correo</th>
                                                    <th name='estado'>Estado</th>
                                                    <th name="accion">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
                                                if (!$connection) {
                                                    exit("<label class='error'>Error de conexión</label>");
                                                }

                                                $query = mysqli_query($connection, "SELECT * FROM tfgestudiantes");


                                                while ($data = mysqli_fetch_assoc($query)) {
                                                    echo "<tr>";
                                                    echo "<td name='id'>" . $data["id"] . "</td>";
                                                    echo "<td name='nombre'>" . $data["nombre"] . "</td>";
                                                    echo "<td name='apellido1'>" . $data["apellido1"] . "</td>";
                                                    echo "<td name='apellido2'>" . $data["apellido2"] . "</td>";
                                                    echo "<td name= 'correo'>" . $data["correo"] . "</td>";
                                                    if ($data["estado"] == '1') {
                                                        echo "<td>Activo</td>";
                                                    } else {
                                                        echo "<td>Inactivo</td>";
                                                    }
                                                    echo "<td>" . "<button type='submit' data-toggle='modal' class='btn btn-primary'
                                                                data-target='#mod-form' id = '" . $data["id"] . "' nombre = '" . $data["nombre"] . "' apellido1 = '" . $data["apellido1"] .
                                                    "' apellido2 = '" . $data["apellido2"] . "'activo = '" . $data["estado"] . "' correo = '" . $data["correo"] . "' > Modificar</button></td> ";
                                                    echo "</tr>";
                                                }

                                                mysqli_close($connection);
                                                ?>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Identificación</th>
                                                    <th>Nombre</th>
                                                    <th>Primer Apellido</th>
                                                    <th>Segundo Apellido</th>
                                                    <th>Correo</th>
                                                    <th>Estado</th>
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
        <script src="js/cambiarEstadoUsuario.js" type="text/javascript"></script>
        <!-- Custom and plugin javascript -->
        <script src="js/inspinia.js"></script>
        <script src="js/plugins/pace/pace.min.js"></script>

        <!-- Page-Level Scripts -->
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

                $('.dataTables-example').DataTable({
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
                        }

                    ]
                });
            });

        </script>
        <div id="modal-form" class="modal fade" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class=""><h3 class="m-t-none m-b"> <i class="fa fa-plus-square-o"></i> Agregar Estudiante</h3>
                                <form role="form" id="frm_agregar_estudiante" method="POST" action="funcionalidad/TFGagregar.php">
                                    <div class="form-group"> <i class="fa fa-exclamation-circle"> <label>Identificación</label></i> <input required type="text" placeholder="Identificacion" class="form-control" name="id"></div>
                                    <div class="form-group"> <i class="fa fa-exclamation-circle"> <label>Nombre</label> </i> <input required type="text" placeholder="Nombre" class="form-control" name="nombre"></div>
                                    <div class="form-group"> <i class="fa fa-exclamation-circle"> <label>Primer Apellido</label></i> <input required type="text" placeholder="Primer Apellido" class="form-control" name="apellido1"></div>
                                    <div class="form-group"> <i class="fa fa-exclamation-circle"> <label>Segundo Apellido</label></i> <input required type="text" placeholder="Segundo Apellido" class="form-control" name="apellido2"></div>
                                    <div class="form-group"> <i class="fa fa-exclamation-circle"> <label>Correo</label></i> <input required type="email" placeholder="Correo" class="form-control" name="correo"></div>

                                    <div>
                                        <label class=""> <i class="fa fa-exclamation-circle"> Rellene los datos obligatorios.</i></label><br> 
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="TFGagregarEstudiante"><strong>Registrar</strong></button>
                                        <button type="button" data-dismiss="modal" class="btn btn-sm btn-secundary pull-right m-t-n-xs" style="margin-right: 20px;" ><strong>Cancelar</strong></button>


                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="mod-form" class="modal fade" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class=""><h3 class="m-t-none m-b"> <i class="fa fa-plus-square-o"></i> Modificar Estudiante</h3>
                                <h4 id="tituloEstado" style='color: red'>Usuario inactivo</h4>
                                <form role="form" id="frm_agregar_estudiante" method="POST" action="funcionalidad/TFGModificar.php">
                                    <div class="form-group"> <i class="fa fa-exclamation-circle"> <label>Identificación</label></i> <input name="id" id="id" required type="text" placeholder="Identificacion" class="form-control" readonly></div>
                                    <div class="form-group"> <i class="fa fa-exclamation-circle"> <label>Nombre</label> </i> <input name="nombre" id="nombre" required type="text" placeholder="Nombre" class="form-control"></div>
                                    <div class="form-group"> <i class="fa fa-exclamation-circle"> <label>Primer Apellido</label></i> <input name="apellido1" id="apellido1" required type="text" placeholder="Primer Apellido" class="form-control"></div>
                                    <div class="form-group"> <i class="fa fa-exclamation-circle"> <label>Segundo Apellido</label></i> <input name="apellido2" id="apellido2" required type="text" placeholder="Segundo Apellido" class="form-control"></div>
                                    <div class="form-group"> <i class="fa fa-exclamation-circle"> <label>Correo</label></i> <input name="correo" id="correo" required type="email" placeholder="Correo" class="form-control"></div>

                                    <div>
                                        <label class=""> <i class="fa fa-exclamation-circle"> Rellene los datos obligatorios.</i></label><br> <br>
                                        <button class="btn btn-sm btn-danger pull-left m-t-n-xs" type="button" cod="" id="desactivar" name="desactivarEstudiante"><i class="fa fa-warning"></i><strong> Desactivar</strong></button>
                                        <button class="btn btn-sm btn-info pull-left m-t-n-xs" type="button" cod="" id="activar" name="activarEstudiante"  ><i class="fa fa-check-circle"></i><strong> Activar</strong></button>
                                        <input name="estado" id="estado" type="text" hidden>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="TFGModificarEstudiante"><strong>Guardar Cambios</strong></button>
                                        <button type="button" data-dismiss="modal" class="btn btn-sm btn-secundary pull-right m-t-n-xs" style="margin-right: 20px;" ><strong>Cancelar</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            //guardarEstadoUsuario("desactivar");
            //guardarEstadoUsuario("activar");

            $('#mod-form').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
                btn1 = modal.find('#desactivar');
                btn2 = modal.find('#activar');
                estado = modal.find('#estado');
                t = modal.find('#tituloEstado');

                var recipient = button.attr('id');
                modal.find('#id').val(recipient);

                recipient = button.attr('nombre');
                modal.find('#nombre').val(recipient);

                recipient = button.attr('apellido1');
                modal.find('#apellido1').val(recipient);

                recipient = button.attr('apellido2');
                modal.find('#apellido2').val(recipient);

                recipient = button.attr('correo');
                modal.find('#correo').val(recipient);

                recipient = button.attr('activo');

                if (recipient === '1') {
                    t.hide();
                    btn1.show();
                    btn2.hide();
                    estado.val('1');
                } else {
                    t.show();
                    btn1.hide();
                    btn2.show();
                    estado.val('0');
                }
                btn1.click(function (evento) {
                    t.show();
                    btn1.hide();
                    btn2.show();
                    estado.val('0');
                });
                btn2.click(function (evento) {
                    t.hide();
                    btn1.show();
                    btn2.hide();
                    estado.val('1');
                });

            });


        </script>

    </body>

</html>