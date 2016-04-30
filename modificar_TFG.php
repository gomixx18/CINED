<!DOCTYPE html>

<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Consulta Específica TFG</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
        <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/plugins/summernote/summernote.css" rel="stylesheet">
        <link href="css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
        <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
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
                        <h2>Modificar un TFG Específico </h2>
                        <?php
                        $codigo = $_POST["codigo"];
                        $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
                        if (!$connection) {
                            exit("<label class='error'>Error de conexión</label>");
                        }
                        ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1"> Título</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2">Estudiantes</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-3">Directores</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-4">Asesores</a></li>

                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <h4>Modificar Título</h4>
                                        <?php
                                        $consulta = "SELECT tfg.titulo FROM tfg where tfg.codigo = '$codigo'";
                                        $query = mysqli_query($connection, $consulta);
                                        $data = mysqli_fetch_assoc($query);
                                        $titulo = $data["titulo"];
                                        ?>
                                        <div class="col-lg-6 col-lg-offset-1">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="control-label">Titulo del tfg:</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group" id="">
                                                    <input id="nomProyecto" name="tituloTFG" type="text" value="<?php echo $titulo ?>" class="form-control required"> 
                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-lg-offset-2">
                                                <div class="form-group">
                                                    <input id="guardarTitulo" type="button" class="btn btn-primary" value="Guardar Título">
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="panel-body">
                                        <h4>Modificar Estudiantes</h4>

                                        <div class="col-lg-4" id="estudiantes">
                                            <?php
                                            $consulta = "select tfgestudiantes.id, concat(tfgestudiantes.nombre,' ',  tfgestudiantes.apellido1, ' ', tfgestudiantes.apellido2) as nombre 
                                                                  from tfg,tfgestudiantes, tfgrealizan where tfg.codigo = tfgrealizan.tfg and tfgrealizan.estudiante = tfgestudiantes.id and tfg.codigo ='" . $codigo . "'";
                                            $query2 = mysqli_query($connection, $consulta);

                                            while ($data2 = mysqli_fetch_assoc($query2)) {
                                                echo "<div class='row'>";
                                                echo "<div class='col-lg-10'>";
                                                echo "<label>Estudiante:</label>";
                                                echo "<input id='' name='' type='text' value='" . $data2['nombre'] . "' class='form-control input-sm m-b-xs required' disabled>";
                                                echo "</div>";

                                                echo "<div class = 'col-lg-5'>";
                                                echo "<label>Cedula:</label>";
                                                echo "<input id = '' name = '' type = 'text' value = " . $data2['id'] . " class = 'form-control input-sm m-b-xs required' disabled >";
                                                echo "</div>";


                                                echo "<div class='col-lg-3'> <br> <input type='radio' value='1' class='i-checks' name='activo" . $data2["id"] . "'>";
                                                echo "       ";
                                                echo "<input type='radio' value='0' class='ni-checks' name='activo" . $data2["id"] . "' checked='checked'>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            ?> 

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
                                                                            $query = mysqli_query($connection, "SELECT * FROM tfgestudiantes");


                                                                            while ($data = mysqli_fetch_assoc($query)) {
                                                                                echo "<tr>";
                                                                                echo "<td name = 'id'>" . $data["id"] . "</td>";
                                                                                echo "<td name = 'nombre'>" . $data["nombre"] . "</td>";
                                                                                echo "<td name = 'apellido1'>" . $data["apellido1"] . "</td>";
                                                                                echo "<td name = 'apellido2'>" . $data["apellido2"] . "</td>";
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
                                            <!--fin tabla estudiantes -->

                                        </div>
                                    </div>
                                </div>
                                <div id = "tab-3" class = "tab-pane">
                                    <div class = "panel-body">
                                        <h4>Modificar directores</h4>
                                        <div class="col-lg-4" id="asesores">
                                            <?php
                                            /* $consulta = "select tfgasesores.id,concat(tfgasesores.nombre,' ',  tfgasesores.apellido1, ' ', tfgasesores.apellido2) as nombre  from tfg,tfgasesores,"
                                              . "tfgasesoran where tfg.codigo = tfgasesoran.tfg and "
                                              . "tfgasesoran.asesor =  tfgasesores.id and tfg.codigo ='$codigo'";
                                              $query2 = mysqli_query($connection, $consulta);

                                              while ($data2 = mysqli_fetch_assoc($query2)) {
                                              echo "<div class='row'>";
                                              echo "<div class='col-lg-10'>";
                                              echo "<label>Asesor:</label>";
                                              echo "<input id='' name='' type='text' value='" . $data2['nombre'] . "' class='form-control input-sm m-b-xs required' disabled>";
                                              echo "</div>";

                                              echo "<div class = 'col-lg-5'>";
                                              echo "<label>Cedula:</label>";
                                              echo "<input id = '' name = '' type = 'text' value = " . $data2['id'] . " class = 'form-control input-sm m-b-xs required' disabled >";
                                              echo "</div>";


                                              echo "<div class='col-lg-3'> <br> <input type='radio' value='1' class='i-checks' name='activo" . $data2["id"] . "'>";
                                              echo "       ";
                                              echo "<input type='radio' value='0' class='ni-checks' name='activo" . $data2["id"] . "' checked='checked'>";
                                              echo "</div>";
                                              echo "</div>";
                                              } */
                                            ?> 

                                        </div>

                                        <div class="col-lg-8" id="directoresTabla">

                                            <!-- inicio tabla directores -->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="ibox float-e-margins">

                                                        <div class="ibox-title">
                                                            <h5>Consulta de Directores</h5>
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
                                                                            $query = mysqli_query($connection, "SELECT * FROM tfgdirectores");


                                                                            while ($data = mysqli_fetch_assoc($query)) {
                                                                                echo "<tr>";
                                                                                echo "<td name = 'id'>" . $data["id"] . "</td>";
                                                                                echo "<td name = 'nombre'>" . $data["nombre"] . "</td>";
                                                                                echo "<td name = 'apellido1'>" . $data["apellido1"] . "</td>";
                                                                                echo "<td name = 'apellido2'>" . $data["apellido2"] . "</td>";
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
                                                            <button name="btnSelectEstu"  class="btn btn-primary btn-rounded" onclick='selectEstudiantes()' type="button" placeholder='agregar'>Asignar Director</button>
                                                            <a data-toggle="modal" class="btn btn-primary btn-rounded" href="#modal-form">Registrar Director</a>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                            <!--fin tabla directores -->

                                        </div>
                                    </div>
                                </div>
                                <div id = "tab-4" class = "tab-pane">
                                    <div class = "panel-body">
                                        <h4>Modificar Asesores</h4>
                                        <div class="col-lg-4" id="asesores">
                                            <?php
                                            $consulta = "select tfgasesores.id,concat(tfgasesores.nombre,' ',  tfgasesores.apellido1, ' ', tfgasesores.apellido2) as nombre  from tfg,tfgasesores,"
                                                    . "tfgasesoran where tfg.codigo = tfgasesoran.tfg and "
                                                    . "tfgasesoran.asesor =  tfgasesores.id and tfg.codigo ='$codigo'";
                                            $query2 = mysqli_query($connection, $consulta);

                                            while ($data2 = mysqli_fetch_assoc($query2)) {
                                                echo "<div class='row'>";
                                                echo "<div class='col-lg-10'>";
                                                echo "<label>Asesor:</label>";
                                                echo "<input id='' name='' type='text' value='" . $data2['nombre'] . "' class='form-control input-sm m-b-xs required' disabled>";
                                                echo "</div>";

                                                echo "<div class = 'col-lg-5'>";
                                                echo "<label>Cedula:</label>";
                                                echo "<input id = '' name = '' type = 'text' value = " . $data2['id'] . " class = 'form-control input-sm m-b-xs required' disabled >";
                                                echo "</div>";


                                                echo "<div class='col-lg-3'> <br> <input type='radio' value='1' class='i-checks' name='activo" . $data2["id"] . "'>";
                                                echo "       ";
                                                echo "<input type='radio' value='0' class='ni-checks' name='activo" . $data2["id"] . "' checked='checked'>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                            ?> 

                                        </div>

                                        <div class="col-lg-8" id="asesoresTabla">

                                            <!-- inicio tabla asesores -->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="ibox float-e-margins">

                                                        <div class="ibox-title">
                                                            <h5>Consulta de Asesores</h5>
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
                                                                            $query = mysqli_query($connection, "SELECT * FROM tfgasesores");


                                                                            while ($data = mysqli_fetch_assoc($query)) {
                                                                                echo "<tr>";
                                                                                echo "<td name = 'id'>" . $data["id"] . "</td>";
                                                                                echo "<td name = 'nombre'>" . $data["nombre"] . "</td>";
                                                                                echo "<td name = 'apellido1'>" . $data["apellido1"] . "</td>";
                                                                                echo "<td name = 'apellido2'>" . $data["apellido2"] . "</td>";
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
                                                            <button name="btnSelectEstu"  class="btn btn-primary btn-rounded" onclick='selectEstudiantes()' type="button" placeholder='agregar'>Asignar Asesor</button>
                                                            <a data-toggle="modal" class="btn btn-primary btn-rounded" href="#modal-form">Registrar Asesor</a>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                            <!--fin tabla asesores -->

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>



                <div class = "footer">
                    Universidad Nacional &copy;
                    2015-2016
                </div>

            </div>
        </div>

        <script src = "js/jquery-2.1.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

        <script src="js/plugins/dataTables/datatables.min.js"></script>
        <script src="js/plugins/metisMenu/jquery.metisMenu.js" type="text/javascript"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <!-- Custom and plugin javascript -->
        <script src="js/inspinia.js"></script>
        <script src="js/plugins/pace/pace.min.js"></script>
        <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js"></script>
        <!-- Color picker -->
        <script src="js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
        <!-- Page-Level Scripts -->

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

        <script>
                                                                $('.i-checks').iCheck({
                                                                    checkboxClass: 'icheckbox_square-green',
                                                                    radioClass: 'iradio_square-green'
                                                                });
                                                                $('.ni-checks').iCheck({
                                                                    checkboxClass: 'icheckbox_square-red',
                                                                    radioClass: 'iradio_square-red'
                                                                });
                                                                $(document).ready(function () {
                                                                    guardarTitulo();
                                                                });
                                                                /* $(document).ready(function () {
                                                                 
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
                                                                 });*/

                                                                function guardarTitulo() {

                                                                    $("#guardarTitulo").click(function (evento) {
                                                                        evento.preventDefault();
                                                                        var cod = "<?php echo $codigo ?>";
                                                                        var titulo = $("#nomProyecto").val();

                                                                        $.get("funcionalidad/TFGTitulo.php", {titulo: titulo, tfg: cod}, function (data) {
                                                                            alert("asdasd");
                                                                        });
                                                                    });
                                                                }

        </script>
    </body>
</html>
