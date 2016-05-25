<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

        <?php
        if (!isset($_POST['codigo'])) {
            header("Location: admin_TFG.php");
        }
        require 'navegacion/nav-lateral.php';
        ?>
    </head>
    <body class="">

        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg">
                <?php require 'navegacion/nav-superior.php' ?>
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Consulta Específica TFG</h2>

                    </div>

                </div>
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">

                                <div class="ibox-title panel-heading panel" id="panelEstadoFinal">
                                    <h5>Consulta Específica TFG</h5>

                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>

                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <?php
                                    $codigo = $_POST["codigo"];
                                    $arrayEstCorreos = array();


                                    $consulta = "select tfg.titulo, concat(tfgdirectores.nombre,' ',tfgdirectores.apellido1,' ',tfgdirectores.apellido2)as directortfg,
                                                tfgdirectores.correo as correodirector,
                                                concat(tfgencargados.nombre,' ',tfgencargados.apellido1,' ',tfgencargados.apellido2) as encargadotfg,
                                                lineasinvestigacion.nombre as lineainvestigacion, carreras.nombre as carrera, modalidades.nombre as modalidad, tfg.estado, tfg.fechaFinal, tfg.directortfg as directorId
                                                from tfgdirectores, tfg, tfgencargados,lineasinvestigacion,carreras,modalidades 
                                                where tfgdirectores.id = directortfg and tfgencargados.id = encargadotfg and 
                                                lineasinvestigacion.codigo = lineainvestigacion and carreras.codigo = carrera and modalidades.codigo = modalidad
                                                and tfg.codigo ='" . $codigo . "'";

                                    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
                                    if (!$connection) {
                                        exit("<label class='error'>Error de conexión</label>");
                                    }

                                    $query = mysqli_query($connection, $consulta);
                                    $data = mysqli_fetch_assoc($query);
                                    etapas($codigo, $connection);
                                    //echo $data["estado"];
                                    ?> 

                                    <div class="row">
                                        <div class="col-lg-4 col-lg-offset-1">

                                            <form role="form" >


                                                <div class='form-group'>
                                                    <label>Título</label>
                                                    <input class = 'form-control' name = 'titulo' id = 'titulo' value ='<?php echo $data["titulo"] ?>' disabled>
                                                </div>

                                                <div class='form-group'>
                                                    <label>Carrera</label>
                                                    <input class = 'form-control' name = 'carrera' id = 'carrera' value ='<?php echo $data["carrera"] ?>' disabled>
                                                </div>

                                                <div class='form-group'>
                                                    <label>Modalidad</label>
                                                    <input class = 'form-control' name = 'modalidad' id = 'modalidad' value ='<?php echo $data["modalidad"] ?>' disabled>
                                                </div>

                                                <div class='form-group'>
                                                    <label>Director de TFG</label>
                                                    <input class = 'form-control' name = 'director' id = 'director' value ='<?php echo $data["directortfg"] ?>' disabled>
                                                </div>


                                            </form>

                                        </div>

                                        <div class="col-lg-4 col-lg-offset-1">

                                            <form role="form">

                                                <div class="form-group">
                                                    <label>Encargado de TFG</label>
                                                    <input class="form-control" name="Encargado" id="encargado" value= '<?php echo $data["encargadotfg"] ?>' disabled>

                                                </div>

                                                <div class="form-group">
                                                    <label>Línea de Investigación</label>
                                                    <input class="form-control" placeholder="" name="linea" id="linea" value='<?php echo $data["lineainvestigacion"] ?>' disabled>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <!--fin primera informacion -->

                                    <!-- estudiantes -->
                                    <div class="row">

                                        <div class="col-lg-9 col-lg-offset-1">
                                            <div class="panel panel-default">
                                                <div class="panel-body">

                                                    <label>Estudiantes</label>
                                                    <br/>
                                                    <br/>
                                                    <?php
                                                    $consulta2 = "select tfgestudiantes.id, concat(tfgestudiantes.nombre,' ',  tfgestudiantes.apellido1, ' ', tfgestudiantes.apellido2) as nombre, tfgestudiantes.correo as correo
                                                                  from tfg,tfgestudiantes, tfgrealizan where tfgrealizan.estado = 1 and tfg.codigo = tfgrealizan.tfg and tfgrealizan.estudiante = tfgestudiantes.id and tfg.codigo ='" . $codigo . "'";
                                                    $query2 = mysqli_query($connection, $consulta2);

                                                    while ($data2 = mysqli_fetch_assoc($query2)) {
                                                        echo "<div class='row'>";
                                                        echo "<div class='col-lg-6 col-lg-offset-1'>";
                                                        echo "<label>Nombre: " . $data2["nombre"] . "</label>";
                                                        echo "</div>";
                                                        echo "<div class='col-lg-5'>";
                                                        echo "<label>Cedula: " . $data2["id"] . "</label>";
                                                        echo "</div>";
                                                        echo "</div>";

                                                        array_push($arrayEstCorreos, $data2['correo']);
                                                    }
                                                    ?> 

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fin estudiantes -->

                                    <?php
                                    cantidadAsesores($codigo, $connection);
                                    asesores($codigo, $connection);
                                    ?>



                                    <!-- etapa 1 -->
                                    <div  class="wrapper wrapper-content animated fadeIn">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div  class="ibox collapsed in">
                                                    <div id="panelEstado1" class="ibox-title panel">
                                                        <h5>Etapa #1. Tema</h5>
                                                        <div id="collapse1" class="ibox-tools">
                                                            <a id="col1" class="collapse-link">
                                                                <i class="fa fa-chevron-up"></i>
                                                            </a>
                                                        </div>
                                                        <div id="etapa1" class="ibox-content">
                                                            <!-- etapa 1 -->
                                                            <!-- archivos -->
                                                            <div class="col-lg-12">
                                                                <div class="ibox collapsed">
                                                                    <div class="ibox-title panel panel-success">
                                                                        <h5>Archivos</h5>
                                                                        <div id="collapse1" class="ibox-tools">
                                                                            <a id="col1" class="collapse-link">
                                                                                <i class="fa fa-chevron-up"></i>
                                                                            </a>
                                                                        </div>
                                                                        <div class="ibox-content" style="display: block;">
                                                                            <form action="funcionalidad/CargarArchivoBlobTFG.php" method="post" enctype="multipart/form-data" id="directorForm">
                                                                                <div class="row">

                                                                                    <div class="col-lg-12 ">
                                                                                        <label>Archivos</label>
                                                                                        <br/><br/>

                                                                                    </div>

                                                                                    <div class="col-lg-12 ">
                                                                                        <div class="col-lg-5 col-lg-offset-1">
                                                                                            <label class="form-label">Comisión TFG</label><br>


                                                                                            <?php
                                                                                            $consulta3 = "SELECT * FROM tfgarchivoscomision where tfg = '" . $codigo . "' and etapa = 1 order by fecha desc limit 1;";
                                                                                            $query3 = mysqli_query($connection, $consulta3);
                                                                                            if ($data3 = mysqli_fetch_assoc($query3)) {
                                                                                                echo " <div class=' file-box'>";
                                                                                                echo " <div class='file'>";
                                                                                                echo " <a href='" . $data3['ruta'] . "'>";
                                                                                                echo "  <span class='corner'></span> ";
                                                                                                echo " <div class='icon'>
                                                                                                <i class='fa fa-file'></i>
                                                                                                </div>";
                                                                                                echo " <div class='file-name'style= 'word-wrap: break-word;'> " . $data3['nom_archivo'] . "<br>";

                                                                                                echo "<small>Agregado: " . $data3['fecha'] . "</small>";
                                                                                                echo "</div>";
                                                                                                echo "</a>";
                                                                                                echo "</div>";
                                                                                                echo "</div>";
                                                                                            } else {
                                                                                                echo "<span class='label label-warning big'>No existen archivos recientes.</span><br>";
                                                                                            }
                                                                                            ?>
                                                                                            <?php if ($usuarioPermisos->getMiembrocomisiontfg() && $usuarioSesion->getId() != $data["directorId"] && !verificarAsesor($usuarioSesion->getId())) { ?>
                                                                                                <div class="form-group"> 
                                                                                                    <input class = 'form-control' name = 'codigoTFG' id='codigoTFG' type="hidden" value='<?php echo $codigo ?>'>
                                                                                                    <input class = 'form-control' name = 'etapa' id = 'etapa' value ='1' type="hidden">   
                                                                                                    <input class = 'form-control' name = 'tipo' id = 'tipo' value ='archivoMiembroComision' type="hidden">   
                                                                                                    <label>Adjuntar Documento:</label>
                                                                                                    <input accept=".docx,.doc,.pdf" type="file" name="archivo" id="archivo" onchange="uploadFile()" class ="btn btn-primary btn-outline permiso">
                                                                                                    <div hidden id="divProgress" class="progress progress-striped active">
                                                                                                        <div  id="progressBar"   aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar progress-bar-danger ">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <h3 id="status"></h3>
                                                                                                    <p id="loaded_n_total"></p>
                                                                                                </div>
                                                                                            <?php } ?>
                                                                                        </div>


                                                                                        <div class="col-lg-5 col-lg-offset-1">
                                                                                            <label class="form-label">Director TFG</label><br>
                                                                                            <?php
                                                                                            $consulta3 = "SELECT * FROM tfgarchivosdirectores where tfg ='" . $codigo . "' and director = '" . $data['directorId'] . "' and etapa = 1 order by fecha desc limit 1;";
                                                                                            $query3 = mysqli_query($connection, $consulta3);
                                                                                            if ($data3 = mysqli_fetch_assoc($query3)) {
                                                                                                echo " <div class=' file-box'>";
                                                                                                echo " <div class='file'>";
                                                                                                echo " <a href='" . $data3['ruta'] . "'>";
                                                                                                echo "  <span class='corner'></span> ";
                                                                                                echo " <div class='icon'>
                                                                                                <i class='fa fa-file'></i>
                                                                                                </div>";
                                                                                                echo " <div class='file-name'style= 'word-wrap: break-word;'> " . $data3['nom_archivo'] . "<br>";

                                                                                                echo "<small>Agregado: " . $data3['fecha'] . "</small>";
                                                                                                echo "</div>";
                                                                                                echo "</a>";
                                                                                                echo "</div>";
                                                                                                echo "</div>";
                                                                                            } else {
                                                                                                echo "<span class='label label-warning big'>No existen archivos recientes.</span><br>";
                                                                                            }
                                                                                            ?>

                                                                                            <?php if ($usuarioSesion->getId() == $data["directorId"]) { ?>
                                                                                                <div class="form-group">
                                                                                                    <input class = 'form-control' name = 'codigoTFG' id='codigoTFG' type="hidden" value='<?php echo $codigo ?>'>
                                                                                                    <input class = 'form-control' name = 'etapa' id = 'etapa' value ='1' type="hidden">   
                                                                                                    <input class = 'form-control' name = 'tipo' id = 'tipo' value ='archivoDirector' type="hidden">   
                                                                                                    <label>Adjuntar Documento:</label>
                                                                                                    <input accept=".docx,.doc,.pdf" type="file" name="archivo" id="archivo" onchange="uploadFile()" class ="btn btn-primary btn-outline permiso">
                                                                                                    <div hidden id="divProgress" class="progress progress-striped active">
                                                                                                        <div  id="progressBar"   aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar progress-bar-danger ">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <h3 id="status"></h3>
                                                                                                    <p id="loaded_n_total"></p>
                                                                                                </div>
                                                                                            <?php } ?>
                                                                                        </div>


                                                                                    </div>
                                                                                    <div class="col-lg-12 ">
                                                                                        <div class="col-lg-5 col-lg-offset-1">

                                                                                            <label class="control-label">Asesor 1</label><br>
                                                                                            <?php
                                                                                            $consulta3 = "SELECT * FROM tfgarchivosasesores where tfg = '" . $codigo . "' and asesor = '" . $asesor1 . "' and etapa = 1 order by fecha desc limit 1;";
                                                                                            $query3 = mysqli_query($connection, $consulta3);
                                                                                            if ($data3 = mysqli_fetch_assoc($query3)) {
                                                                                                echo " <div class=' file-box'>";
                                                                                                echo " <div class='file'>";
                                                                                                echo " <a href='" . $data3['ruta'] . "'>";
                                                                                                echo "  <span class='corner'></span> ";
                                                                                                echo " <div class='icon'>
                                                                                                <i class='fa fa-file'></i>
                                                                                                </div>";
                                                                                                echo " <div class='file-name'style= 'word-wrap: break-word;'> " . $data3['nom_archivo'] . "<br>";

                                                                                                echo "<small>Agregado: " . $data3['fecha'] . "</small>";
                                                                                                echo "</div>";
                                                                                                echo "</a>";
                                                                                                echo "</div>";
                                                                                                echo "</div>";
                                                                                            } else {
                                                                                                echo "<span class='label label-warning big'>No existen archivos recientes.</span><br>";
                                                                                            }
                                                                                            ?>

                                                                                            <?php if ($usuarioSesion->getId() == $asesor1) { ?>
                                                                                                <div class="form-group">
                                                                                                    <input class = 'form-control' name = 'codigoTFG' id='codigoTFG' type="hidden" value='<?php echo $codigo ?>'>
                                                                                                    <input class = 'form-control' name = 'etapa' id = 'etapa' value ='1' type="hidden">   
                                                                                                    <input class = 'form-control' name = 'tipo' id = 'tipo' value ='archivoAsesor' type="hidden">
                                                                                                    <label>Adjuntar Documento:</label>
                                                                                                    <input accept=".docx,.doc,.pdf" type="file" name="archivo" id="archivo" onchange="uploadFile()" class ="btn btn-primary btn-outline permiso">
                                                                                                    <div hidden id="divProgress" class="progress progress-striped active">
                                                                                                        <div  id="progressBar"   aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar progress-bar-danger ">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <h3 id="status"></h3>
                                                                                                    <p id="loaded_n_total"></p>
                                                                                                </div>
                                                                                            <?php } ?>


                                                                                        </div>
                                                                                        <?php if ($GLOBALS['cantAsesor'] == 2) { ?>
                                                                                            <div class="col-lg-5 col-lg-offset-1">


                                                                                                <label class="control-label">Asesor 2</label><br>
                                                                                                <?php
                                                                                                $consulta3 = "SELECT * FROM tfgarchivosasesores where tfg = '" . $codigo . "' and asesor = '" . $asesor2 . "' and etapa = 1 order by fecha desc limit 1;";
                                                                                                $query3 = mysqli_query($connection, $consulta3);
                                                                                                if ($data3 = mysqli_fetch_assoc($query3)) {
                                                                                                    echo " <div class=' file-box'>";
                                                                                                    echo " <div class='file'>";
                                                                                                    echo " <a href='" . $data3['ruta'] . "'>";
                                                                                                    echo "  <span class='corner'></span> ";
                                                                                                    echo " <div class='icon'>
                                                                                                <i class='fa fa-file'></i>
                                                                                                </div>";
                                                                                                    echo " <div class='file-name'style= 'word-wrap: break-word;'> " . $data3['nom_archivo'] . "<br>";

                                                                                                    echo "<small>Agregado: " . $data3['fecha'] . "</small>";
                                                                                                    echo "</div>";
                                                                                                    echo "</a>";
                                                                                                    echo "</div>";
                                                                                                    echo "</div>";
                                                                                                } else {
                                                                                                    echo "<span class='label label-warning '>No existen archivos recientes.</span><br>";
                                                                                                }
                                                                                                ?>

                                                                                                <?php if ($usuarioSesion->getId() == $asesor2) { ?>
                                                                                                    <div class="form-group">
                                                                                                        <input class = 'form-control' name = 'codigoTFG' id='codigoTFG' type="hidden" value='<?php echo $codigo ?>'>
                                                                                                        <input class = 'form-control' name = 'etapa' id = 'etapa' value ='1' type="hidden">   
                                                                                                        <input class = 'form-control' name = 'tipo' id = 'tipo' value ='archivoAsesor' type="hidden">   
                                                                                                        <label>Adjuntar Documento:</label>
                                                                                                        <input accept=".docx,.doc,.pdf" type="file" name="archivo" id="archivo" onchange="uploadFile()" class ="btn btn-primary btn-outline">
                                                                                                        <div hidden id="divProgress" class="progress progress-striped active">
                                                                                                            <div  id="progressBar"   aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar progress-bar-danger ">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <h3 id="status"></h3>
                                                                                                        <p id="loaded_n_total"></p>
                                                                                                    </div>
                                                                                                <?php } ?>

                                                                                            </div>
                                                                                        <?php } ?>

                                                                                    </div>
                                                                                    <div class="col-lg-offset-10">
                                                                                        <div class="form-group">
                                                                                            <input id="guardarArchivo1" type="submit" class="btn btn-primary btn-outline disabled" value="Guardar Archivo" disabled >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                            <div class="col-lg-offset-10">
                                                                                <form method="post" action='registro_archivos_tfg.php'>
                                                                                    <div class="form-group" >
                                                                                        <input type="hidden" name='codigo' value='<?php echo $codigo ?>'>
                                                                                        <input type='hidden' name='etapa' value='1'>
                                                                                        <input type='hidden' name='director' value='<?php echo $data['directorId'] ?>'>
                                                                                        <input type="hidden" name='asesor1' value="<?php echo $asesor1 ?>">
                                                                                        <input id="input-1" type="submit"  class="btn btn-primary" value="Registro de Archivos">
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <!-- fin archivos -->

                                                            <!-- comentarios -->
                                                            <div class="col-lg-12">
                                                                <div class="ibox collapsed">
                                                                    <div class="ibox-title panel panel-success">
                                                                        <h5>Comentarios</h5>
                                                                        <div id="collapse1" class="ibox-tools">
                                                                            <a id="col1" class="collapse-link">
                                                                                <i class="fa fa-chevron-up"></i>
                                                                            </a>
                                                                        </div>
                                                                        <div class="ibox-content" style="display: block;">
                                                                            <div class="row">

                                                                                <div class="col-lg-12 ">

                                                                                </div>

                                                                                <div class="col-lg-4">
                                                                                    <div class="ibox float-e-margins">
                                                                                        <div class="ibox-title">
                                                                                            <h5>Comisión TFG</h5>

                                                                                            <?php if ($usuarioPermisos->getMiembrocomisiontfg()) { ?>
                                                                                                <button comentario="CM11" class="btn btn-primary btn-xs m-l-sm permiso" onclick="edit1('CM11')" type="button">Editar</button>
                                                                                                <button id="BM11" etapa="1" comentario="CM11" class="btn btn-primary btn-xs permiso" onclick="save1('CM11')" type="button">Guardar</button>
                                                                                            <?php } ?>
                                                                                            <div class="ibox-tools">
                                                                                                <a class="collapse-link">
                                                                                                    <i class="fa fa-chevron-up"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="ibox-content no-padding">
                                                                                            <div id="CM11" class="click1edit wrapper p-md">
                                                                                                <?php
                                                                                                comentarioMiembro($codigo, 1, $connection);
                                                                                                ?> 

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                    <div class="ibox float-e-margins">
                                                                                        <div class="ibox-title">
                                                                                            <h5>Asesor 1</h5>
                                                                                            <?php if ($usuarioPermisos->getId() == $asesor1) { ?>
                                                                                                <button comentario="CA11" class="btn btn-primary btn-xs m-l-sm permiso" onclick="edit2('CA11')" type="button">Editar</button>
                                                                                                <button id="BA11" etapa="1" comentario="CA11" class="btn btn-primary  btn-xs permiso" onclick="save2('CA11')" type="button">Guardar</button>
                                                                                            <?php } ?>
                                                                                            <div class="ibox-tools">
                                                                                                <a class="collapse-link">
                                                                                                    <i class="fa fa-chevron-up"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="ibox-content no-padding">

                                                                                            <div id="CA11" class="click2edit wrapper p-md">
                                                                                                <?php
                                                                                                comentarioAsesor($codigo, 1, $asesor1, $connection);
                                                                                                ?>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?php if ($GLOBALS['cantAsesor'] == 2) { ?>
                                                                                    <div class="col-lg-4">
                                                                                        <div class="ibox float-e-margins">
                                                                                            <div class="ibox-title">
                                                                                                <h5>Asesor 2</h5>
                                                                                                <?php
                                                                                                if ($usuarioPermisos->getId() == $asesor2) {
                                                                                                    ?>
                                                                                                    <button comentario="CA21" class="btn btn-primary btn-xs m-l-sm permiso" onclick="edit3('CA21')" type="button">Editar</button>
                                                                                                    <button id="BA21" etapa="1" comentario="CA21" class="btn btn-primary  btn-xs permiso" onclick="save3('CA21')" type="button">Guardar</button>
                                                                                                    <?php
                                                                                                }
                                                                                                ?>
                                                                                                <div class="ibox-tools">
                                                                                                    <a class="collapse-link">
                                                                                                        <i class="fa fa-chevron-up"></i>
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="ibox-content no-padding">

                                                                                                <div id="CA21" class="click3edit wrapper p-md">
                                                                                                    <?php
                                                                                                    comentarioAsesor($codigo, 1, $asesor2, $connection);
                                                                                                    ?>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- fin comentarios -->

                                                            <!-- Estado  -->
                                                            <div class="row">


                                                                <div class="col-lg-2 col-lg-offset-7">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Estado de Etapa:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <div class="form-group">


                                                                        <select id="estado1" class="form-control m-b" name="account" onchange="pintandoPanels()" <?php
                                                                        if (!$usuarioPermisos->getEncargadotfg()) {
                                                                            echo "disabled"
                                                                            ?> <?php } ?>>
                                                                            <option value="Aprobada">Aprobada</option>
                                                                            <option value="Aprobada con Observaciones">Aprobada con Observaciones</option>
                                                                            <option value="No Aprobada">No Aprobada</option>    
                                                                            <option value="En ejecución">En ejecución</option>  
                                                                            <option value="Inactiva">Inactiva</option>
                                                                        </select> 

                                                                    </div>
                                                                </div>  
                                                            </div>
                                                            <div class="row"> 
                                                                <div class="col-lg-2 col-lg-offset-9">
                                                                    <div class="form-group">
                                                                        <?php if ($usuarioPermisos->getEncargadotfg()) { ?> 
                                                                            <input id="BE1" estado="estado1" etapa="1" type="button" class="btn btn-primary" value="Guardar Estado">
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- fin estado -->


                                                            <!-- fin etapa 1 -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fin etapa 1 -->

                                    <!-- etapa 2 -->
                                    <div class="wrapper wrapper-content animated fadeIn">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="ibox collapsed">
                                                    <div id="panelEstado2" class="ibox-title panel ">
                                                        <h5>Etapa #2. Ante Proyecto o Propuesta</h5>
                                                        <div id="collapse2" class="ibox-tools">
                                                            <a id="col2" class="collapse-link">
                                                                <i class="fa fa-chevron-up"></i>
                                                            </a>

                                                        </div>
                                                        <div class="ibox-content">
                                                            <!-- archivos Etapa 2 -->
                                                            <div class="col-lg-12">
                                                                <div class="ibox collapsed">
                                                                    <div class="ibox-title panel panel-success">
                                                                        <h5>Archivos</h5>
                                                                        <div id="collapse1" class="ibox-tools">
                                                                            <a id="col1" class="collapse-link">                                               
                                                                                <i class="fa fa-chevron-up"></i>
                                                                            </a>
                                                                        </div>
                                                                        <div class="ibox-content" style="display: block;">
                                                                            <form action="funcionalidad/CargarArchivoBlobTFG.php" method="post" enctype="multipart/form-data" id="directorForm">
                                                                                <div class="row">

                                                                                    <div class="col-lg-12 ">

                                                                                    </div>

                                                                                    <div class="col-lg-12 ">
                                                                                        <div class="col-lg-5 col-lg-offset-1">
                                                                                            <label class="form-label">Comisión TFG</label><br>


                                                                                            <?php
                                                                                            $consulta3 = "SELECT * FROM tfgarchivoscomision where tfg = '" . $codigo . "' and etapa = 2 order by fecha desc limit 1;";
                                                                                            $query3 = mysqli_query($connection, $consulta3);
                                                                                            if ($data3 = mysqli_fetch_assoc($query3)) {
                                                                                                echo " <div class=' file-box'>";
                                                                                                echo " <div class='file'>";
                                                                                                echo " <a href='" . $data3['ruta'] . "'>";
                                                                                                echo "  <span class='corner'></span> ";
                                                                                                echo " <div class='icon'>
                                                                                                <i class='fa fa-file'></i>
                                                                                                </div>";
                                                                                                echo " <div class='file-name'style= 'word-wrap: break-word;'> " . $data3['nom_archivo'] . "<br>";

                                                                                                echo "<small>Agregado: " . $data3['fecha'] . "</small>";
                                                                                                echo "</div>";
                                                                                                echo "</a>";
                                                                                                echo "</div>";
                                                                                                echo "</div>";
                                                                                            } else {
                                                                                                echo "<span class='label label-warning big'>No existen archivos recientes.</span><br>";
                                                                                            }
                                                                                            ?>
                                                                                            <?php if ($usuarioPermisos->getMiembrocomisiontfg() && $usuarioSesion->getId() != $data["directorId"] && !verificarAsesor($usuarioSesion->getId())) { ?>
                                                                                                <div class="form-group"> 
                                                                                                    <input class = 'form-control' name = 'codigoTFG' id='codigoTFG' type="hidden" value='<?php echo $codigo ?>'>
                                                                                                    <input class = 'form-control' name = 'etapa' id = 'etapa' value ='2' type="hidden">   
                                                                                                    <input class = 'form-control' name = 'tipo' id = 'tipo' value ='archivoMiembroComision' type="hidden">   
                                                                                                    <label>Adjuntar Documento:</label>
                                                                                                    <input accept=".docx,.doc,.pdf" type="file" name="archivo2" id="archivo" onchange="uploadFile2()" class ="btn btn-primary btn-outline permiso">
                                                                                                    <div hidden id="divProgress2" class="progress progress-striped active">
                                                                                                        <div  id="progressBar2"   aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar progress-bar-danger ">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <h3 id="status2"></h3>
                                                                                                    <p id="loaded_n_total2"></p>
                                                                                                </div>
                                                                                            <?php } ?>
                                                                                        </div>


                                                                                        <div class="col-lg-5 col-lg-offset-1">
                                                                                            <label class="form-label">Director TFG</label><br>
                                                                                            <?php
                                                                                            $consulta3 = "SELECT * FROM tfgarchivosdirectores where tfg ='" . $codigo . "' and director = '" . $data['directorId'] . "' and etapa = 2 order by fecha desc limit 1;";
                                                                                            $query3 = mysqli_query($connection, $consulta3);
                                                                                            if ($data3 = mysqli_fetch_assoc($query3)) {
                                                                                                echo " <div class=' file-box'>";
                                                                                                echo " <div class='file'>";
                                                                                                echo " <a href='" . $data3['ruta'] . "'>";
                                                                                                echo "  <span class='corner'></span> ";
                                                                                                echo " <div class='icon'>
                                                                                                <i class='fa fa-file'></i>
                                                                                                </div>";
                                                                                                echo " <div class='file-name'style= 'word-wrap: break-word;'> " . $data3['nom_archivo'] . "<br>";

                                                                                                echo "<small>Agregado: " . $data3['fecha'] . "</small>";
                                                                                                echo "</div>";
                                                                                                echo "</a>";
                                                                                                echo "</div>";
                                                                                                echo "</div>";
                                                                                            } else {
                                                                                                echo "<span class='label label-warning big'>No existen archivos recientes.</span><br>";
                                                                                            }
                                                                                            ?>

                                                                                            <?php if ($usuarioSesion->getId() == $data["directorId"]) { ?>
                                                                                                <div class="form-group">
                                                                                                    <input class = 'form-control' name = 'codigoTFG' id='codigoTFG' type="hidden" value='<?php echo $codigo ?>'>
                                                                                                    <input class = 'form-control' name = 'etapa' id = 'etapa' value ='2' type="hidden">   
                                                                                                    <input class = 'form-control' name = 'tipo' id = 'tipo' value ='archivoDirector' type="hidden">   
                                                                                                    <label>Adjuntar Documento:</label>
                                                                                                    <input accept=".docx,.doc,.pdf" type="file" name="archivo" id="archivo2" onchange="uploadFile2()" class ="btn btn-primary btn-outline permiso">
                                                                                                    <div hidden id="divProgress2" class="progress progress-striped active">
                                                                                                        <div  id="progressBar2"   aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar progress-bar-danger ">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <h3 id="status2"></h3>
                                                                                                    <p id="loaded_n_total2"></p>
                                                                                                </div>
                                                                                            <?php } ?>
                                                                                        </div>


                                                                                    </div>
                                                                                    <div class="col-lg-12 ">
                                                                                        <div class="col-lg-5 col-lg-offset-1">

                                                                                            <label class="control-label">Asesor 1</label><br>
                                                                                            <?php
                                                                                            $consulta3 = "SELECT * FROM tfgarchivosasesores where tfg = '" . $codigo . "' and asesor = '" . $asesor1 . "' and etapa = 2 order by fecha desc limit 1;";
                                                                                            $query3 = mysqli_query($connection, $consulta3);
                                                                                            if ($data3 = mysqli_fetch_assoc($query3)) {
                                                                                                echo " <div class=' file-box'>";
                                                                                                echo " <div class='file'>";
                                                                                                echo " <a href='" . $data3['ruta'] . "'>";
                                                                                                echo "  <span class='corner'></span> ";
                                                                                                echo " <div class='icon'>
                                                                                                <i class='fa fa-file'></i>
                                                                                                </div>";
                                                                                                echo " <div class='file-name'style= 'word-wrap: break-word;'> " . $data3['nom_archivo'] . "<br>";

                                                                                                echo "<small>Agregado: " . $data3['fecha'] . "</small>";
                                                                                                echo "</div>";
                                                                                                echo "</a>";
                                                                                                echo "</div>";
                                                                                                echo "</div>";
                                                                                            } else {
                                                                                                echo "<span class='label label-warning big'>No existen archivos recientes.</span><br>";
                                                                                            }
                                                                                            ?>

                                                                                            <?php if ($usuarioSesion->getId() == $asesor1) { ?>
                                                                                                <div class="form-group">
                                                                                                    <input class = 'form-control' name = 'codigoTFG' id='codigoTFG' type="hidden" value='<?php echo $codigo ?>'>
                                                                                                    <input class = 'form-control' name = 'etapa' id = 'etapa' value ='2' type="hidden">   
                                                                                                    <input class = 'form-control' name = 'tipo' id = 'tipo' value ='archivoAsesor' type="hidden">
                                                                                                    <label>Adjuntar Documento:</label>
                                                                                                    <input accept=".docx,.doc,.pdf" type="file" name="archivo" id="archivo2" onchange="uploadFile2()" class ="btn btn-primary btn-outline permiso">
                                                                                                    <div hidden id="divProgress2" class="progress progress-striped active">
                                                                                                        <div  id="progressBar2"   aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar progress-bar-danger ">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <h3 id="status2"></h3>
                                                                                                    <p id="loaded_n_total2"></p>
                                                                                                </div>
                                                                                            <?php } ?>


                                                                                        </div>
                                                                                        <?php if ($GLOBALS['cantAsesor'] == 2) { ?>
                                                                                            <div class="col-lg-5 col-lg-offset-1">


                                                                                                <label class="control-label">Asesor 2</label><br>
                                                                                                <?php
                                                                                                $consulta3 = "SELECT * FROM tfgarchivosasesores where tfg = '" . $codigo . "' and asesor = '" . $asesor2 . "' and etapa = 2 order by fecha desc limit 1;";
                                                                                                $query3 = mysqli_query($connection, $consulta3);
                                                                                                if ($data3 = mysqli_fetch_assoc($query3)) {
                                                                                                    echo " <div class=' file-box'>";
                                                                                                    echo " <div class='file'>";
                                                                                                    echo " <a href='" . $data3['ruta'] . "'>";
                                                                                                    echo "  <span class='corner'></span> ";
                                                                                                    echo " <div class='icon'>
                                                                                                <i class='fa fa-file'></i>
                                                                                                </div>";
                                                                                                    echo " <div class='file-name'style= 'word-wrap: break-word;'> " . $data3['nom_archivo'] . "<br>";

                                                                                                    echo "<small>Agregado: " . $data3['fecha'] . "</small>";
                                                                                                    echo "</div>";
                                                                                                    echo "</a>";
                                                                                                    echo "</div>";
                                                                                                    echo "</div>";
                                                                                                } else {
                                                                                                    echo "<span class='label label-warning big'>No existen archivos recientes.</span><br>";
                                                                                                }
                                                                                                ?>

                                                                                                <?php if ($usuarioSesion->getId() == $asesor2) { ?>
                                                                                                    <div class="form-group">
                                                                                                        <input class = 'form-control' name = 'codigoTFG' id='codigoTFG' type="hidden" value='<?php echo $codigo ?>'>
                                                                                                        <input class = 'form-control' name = 'etapa' id = 'etapa' value ='2' type="hidden">   
                                                                                                        <input class = 'form-control' name = 'tipo' id = 'tipo' value ='archivoAsesor' type="hidden">   
                                                                                                        <label>Adjuntar Documento:</label>
                                                                                                        <input accept=".docx,.doc,.pdf" type="file" name="archivo" id="archivo2" onchange="uploadFile2()" class ="btn btn-primary btn-outline permiso">
                                                                                                        <div hidden id="divProgress2" class="progress progress-striped active">
                                                                                                            <div  id="progressBar2"   aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar progress-bar-danger ">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <h3 id="status2"></h3>
                                                                                                        <p id="loaded_n_total2"></p>
                                                                                                    </div>
                                                                                                <?php } ?>

                                                                                            </div>
                                                                                        <?php } ?>
                                                                                    </div>



                                                                                    <div class="col-lg-offset-10">
                                                                                        <div class="form-group">
                                                                                            <input id="guardarArchivo2" type="submit" class="btn btn-primary btn-outline disabled" value="Guardar Archivo" disabled >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                            <div class="col-lg-offset-10">
                                                                                <form method="post" action='registro_archivos_tfg.php'>
                                                                                    <div class="form-group" >
                                                                                        <input type="hidden" name='codigo' value='<?php echo $codigo ?>'>
                                                                                        <input type='hidden' name='etapa' value='2'>
                                                                                        <input type='hidden' name='director' value='<?php echo $data['directorId'] ?>'>
                                                                                        <input id="input-1" type="submit"  class="btn btn-primary" value="Registro de Archivos">
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>    
                                                            </div>
                                                            <!-- fin archivos -->
                                                            <!-- comentarios -->
                                                            <div class="col-lg-12">
                                                                <div class="ibox collapsed">
                                                                    <div class="ibox-title panel panel-success">
                                                                        <h5>Comentarios</h5>
                                                                        <div id="collapse1" class="ibox-tools">
                                                                            <a id="col1" class="collapse-link">                                               
                                                                                <i class="fa fa-chevron-up"></i>
                                                                            </a>
                                                                        </div>
                                                                        <div class="ibox-content" style="display: block;">
                                                                            <div class="row">

                                                                                <div class="col-lg-12 ">

                                                                                </div>

                                                                                <div class="col-lg-4">
                                                                                    <div class="ibox float-e-margins">
                                                                                        <div class="ibox-title">

                                                                                            <h5>Comision TFG</h5>
                                                                                            <?php if ($usuarioPermisos->getMiembrocomisiontfg()) { ?>
                                                                                                <button comentario="CM12" class="btn btn-primary btn-xs m-l-sm permiso" onclick="edit1('CM12')" type="button">Editar</button>
                                                                                                <button id="BM12" etapa="2" comentario="CM12" class="btn btn-primary  btn-xs permiso" onclick="save1('CM12')" type="button">Guardar</button>
                                                                                            <?php } ?>

                                                                                            <div class="ibox-tools">
                                                                                                <a class="collapse-link">
                                                                                                    <i class="fa fa-chevron-up"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="ibox-content no-padding">

                                                                                            <div id="CM12" class="click1edit wrapper p-md">
                                                                                                <?php
                                                                                                comentarioMiembro($codigo, 2, $connection);
                                                                                                ?> 
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                    <div class="ibox float-e-margins">
                                                                                        <div class="ibox-title">
                                                                                            <h5>Asesor 1</h5>
                                                                                            <?php if ($usuarioPermisos->getId() == $asesor1) { ?>
                                                                                                <button comentario="CA12"  class="btn btn-primary btn-xs m-l-sm permiso" onclick="edit2('CA12')" type="button">Editar</button>
                                                                                                <button id="BA12" etapa="2" comentario="CA12" class="btn btn-primary  btn-xs permiso" onclick="save2('CA12')" type="button">Guardar</button>
                                                                                            <?php } ?>
                                                                                            <div class="ibox-tools">
                                                                                                <a class="collapse-link">
                                                                                                    <i class="fa fa-chevron-up"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="ibox-content no-padding">

                                                                                            <div id="CA12" class="click2edit wrapper p-md">
                                                                                                <?php
                                                                                                comentarioAsesor($codigo, 2, $asesor1, $connection);
                                                                                                ?>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?php if ($GLOBALS['cantAsesor'] == 2) { ?>
                                                                                    <div class="col-lg-4">
                                                                                        <div class="ibox float-e-margins">
                                                                                            <div class="ibox-title">
                                                                                                <h5>Asesor 2</h5>
                                                                                                <?php
                                                                                                if ($usuarioPermisos->getId() == $asesor2) {
                                                                                                    ?>
                                                                                                    <button comentario="CA22" class="btn btn-primary btn-xs m-l-sm permiso" onclick="edit3('CA22')" type="button">Editar</button>
                                                                                                    <button id="BA22" etapa="2" comentario="CA22" class="btn btn-primary  btn-xs permiso" onclick="save3('CA22')" type="button">Guardar</button>
                                                                                                    <?php
                                                                                                }
                                                                                                ?>
                                                                                                <div class="ibox-tools">
                                                                                                    <a class="collapse-link">
                                                                                                        <i class="fa fa-chevron-up"></i>
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="ibox-content no-padding">

                                                                                                <div id="CA22" class="click3edit wrapper p-md">
                                                                                                    <?php
                                                                                                    comentarioAsesor($codigo, 2, $asesor2, $connection);
                                                                                                    ?>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?>



                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- fin comentarios -->
                                                            <!-- Estado  -->
                                                            <div class="row">


                                                                <div class="col-lg-2 col-lg-offset-7">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Estado de Etapa:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <div class="form-group">


                                                                        <select id="estado2" class="form-control m-b" name="account" onchange="pintandoPanels()" <?php
                                                                        if (!$usuarioPermisos->getEncargadotfg()) {
                                                                            echo "disabled"
                                                                            ?> <?php } ?>>
                                                                            <option value="Aprobada">Aprobada</option>
                                                                            <option value="Aprobada con Observaciones">Aprobada con Observaciones</option>
                                                                            <option value="No Aprobada">No Aprobada</option>    
                                                                            <option value="En ejecución">En ejecución</option>  
                                                                            <option value="Inactiva">Inactiva</option>
                                                                        </select> 

                                                                    </div>
                                                                </div>  
                                                            </div>
                                                            <div class="row"> 
                                                                <div class="col-lg-2 col-lg-offset-9">
                                                                    <div class="form-group">
                                                                        <?php if ($usuarioPermisos->getEncargadotfg()) { ?> 
                                                                            <input id="BE2" estado="estado2" etapa="2" type="button" class="btn btn-primary" value="Guardar Estado">
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- fin estado -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fin etapa 2 -->

                                    <!-- etapa 3 -->
                                    <div class="wrapper wrapper-content animated fadeIn">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="ibox collapsed">
                                                    <div id="panelEstado3" class="ibox-title panel ">
                                                        <h5>Etapa #3. Entrega Final</h5>
                                                        <div id="collapse3" class="ibox-tools">
                                                            <a id="col3" class="collapse-link">
                                                                <i class="fa fa-chevron-up"></i>
                                                            </a>
                                                        </div>

                                                        <div class="ibox-content">
                                                            <!-- archivos -->
                                                            <div class="col-lg-12">
                                                                <div class="ibox collapsed">
                                                                    <div class="ibox-title panel panel-success">
                                                                        <h5>Archivos</h5>
                                                                        <div id="collapse1" class="ibox-tools">
                                                                            <a id="col1" class="collapse-link">                                               
                                                                                <i class="fa fa-chevron-up"></i>
                                                                            </a> 
                                                                        </div>
                                                                        <div class="ibox-content" style="display: block;">
                                                                            <form action="funcionalidad/CargarArchivoBlobTFG.php" method="post" enctype="multipart/form-data" id="directorForm">
                                                                                <div class="row">

                                                                                    <div class="col-lg-12 ">

                                                                                    </div>

                                                                                    <div class="col-lg-12">
                                                                                        <div class="col-lg-5 col-lg-offset-1">
                                                                                            <label class="form-label">Comisión TFG</label><br>


                                                                                            <?php
                                                                                            $consulta3 = "SELECT * FROM tfgarchivoscomision where tfg = '" . $codigo . "' and etapa = 3 order by fecha desc limit 1;";
                                                                                            $query3 = mysqli_query($connection, $consulta3);
                                                                                            if ($data3 = mysqli_fetch_assoc($query3)) {
                                                                                                echo " <div class=' file-box'>";
                                                                                                echo " <div class='file'>";
                                                                                                echo " <a href='" . $data3['ruta'] . "'>";
                                                                                                echo "  <span class='corner'></span> ";
                                                                                                echo " <div class='icon'>
                                                                                                <i class='fa fa-file'></i>
                                                                                                </div>";
                                                                                                echo " <div class='file-name'style= 'word-wrap: break-word;'> " . $data3['nom_archivo'] . "<br>";

                                                                                                echo "<small>Agregado: " . $data3['fecha'] . "</small>";
                                                                                                echo "</div>";
                                                                                                echo "</a>";
                                                                                                echo "</div>";
                                                                                                echo "</div>";
                                                                                            } else {
                                                                                                echo "<span class='label label-warning big'>No existen archivos recientes.</span><br>";
                                                                                            }
                                                                                            ?>
                                                                                            <?php if ($usuarioPermisos->getMiembrocomisiontfg() && $usuarioSesion->getId() != $data["directorId"] && !verificarAsesor($usuarioSesion->getId())) { ?>
                                                                                                <div class="form-group"> 
                                                                                                    <input class = 'form-control' name = 'codigoTFG' id='codigoTFG' type="hidden" value='<?php echo $codigo ?>'>
                                                                                                    <input class = 'form-control' name = 'etapa' id = 'etapa' value ='3' type="hidden">   
                                                                                                    <input class = 'form-control' name = 'tipo' id = 'tipo' value ='archivoMiembroComision' type="hidden">   
                                                                                                    <label>Adjuntar Documento:</label>
                                                                                                    <input accept=".docx,.doc,.pdf" type="file" name="archivo" id="archivo3" onchange="uploadFile3()" class ="btn btn-primary btn-outline permiso">
                                                                                                    <div hidden id="divProgress3" class="progress progress-striped active">
                                                                                                        <div  id="progressBar3"   aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar progress-bar-danger ">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <h3 id="status3"></h3>
                                                                                                    <p id="loaded_n_total3"></p>
                                                                                                </div>
                                                                                            <?php } ?>
                                                                                        </div>


                                                                                        <div class="col-lg-5 col-lg-offset-1">
                                                                                            <label class="form-label">Director TFG</label><br>
                                                                                            <?php
                                                                                            $consulta3 = "SELECT * FROM tfgarchivosdirectores where tfg ='" . $codigo . "' and director = '" . $data['directorId'] . "' and etapa = 3 order by fecha desc limit 1;";
                                                                                            $query3 = mysqli_query($connection, $consulta3);
                                                                                            if ($data3 = mysqli_fetch_assoc($query3)) {
                                                                                                echo " <div class=' file-box'>";
                                                                                                echo " <div class='file'>";
                                                                                                echo " <a href='" . $data3['ruta'] . "'>";
                                                                                                echo "  <span class='corner'></span> ";
                                                                                                echo " <div class='icon'>
                                                                                                <i class='fa fa-file'></i>
                                                                                                </div>";
                                                                                                echo " <div class='file-name'style= 'word-wrap: break-word;'> " . $data3['nom_archivo'] . "<br>";

                                                                                                echo "<small>Agregado: " . $data3['fecha'] . "</small>";
                                                                                                echo "</div>";
                                                                                                echo "</a>";
                                                                                                echo "</div>";
                                                                                                echo "</div>";
                                                                                            } else {
                                                                                                echo "<span class='label label-warning big'>No existen archivos recientes.</span><br>";
                                                                                            }
                                                                                            ?>

                                                                                            <?php if ($usuarioSesion->getId() == $data["directorId"]) { ?>
                                                                                                <div class="form-group">
                                                                                                    <input class = 'form-control' name = 'codigoTFG' id='codigoTFG' type="hidden" value='<?php echo $codigo ?>'>
                                                                                                    <input class = 'form-control' name = 'etapa' id = 'etapa' value ='3' type="hidden">   
                                                                                                    <input class = 'form-control' name = 'tipo' id = 'tipo' value ='archivoDirector' type="hidden">   
                                                                                                    <label>Adjuntar Documento:</label>
                                                                                                    <input accept=".docx,.doc,.pdf" type="file" name="archivo" id="archivo3" onchange="uploadFile3()" class ="btn btn-primary btn-outline permiso">
                                                                                                    <div hidden id="divProgress3" class="progress progress-striped active">
                                                                                                        <div  id="progressBar3"   aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar progress-bar-danger ">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <h3 id="status3"></h3>
                                                                                                    <p id="loaded_n_total3"></p>
                                                                                                </div>
                                                                                            <?php } ?>
                                                                                        </div>


                                                                                    </div>
                                                                                    <div class="col-lg-12 ">
                                                                                        <div class="col-lg-5 col-lg-offset-1">

                                                                                            <label class="control-label">Asesor 1</label><br>
                                                                                            <?php
                                                                                            $consulta3 = "SELECT * FROM tfgarchivosasesores where tfg = '" . $codigo . "' and asesor = '" . $asesor1 . "' and etapa = 3 order by fecha desc limit 1;";
                                                                                            $query3 = mysqli_query($connection, $consulta3);
                                                                                            if ($data3 = mysqli_fetch_assoc($query3)) {
                                                                                                echo " <div class=' file-box'>";
                                                                                                echo " <div class='file'>";
                                                                                                echo " <a href='" . $data3['ruta'] . "'>";
                                                                                                echo "  <span class='corner'></span> ";
                                                                                                echo " <div class='icon'>
                                                                                                <i class='fa fa-file'></i>
                                                                                                </div>";
                                                                                                echo " <div class='file-name'style= 'word-wrap: break-word;'> " . $data3['nom_archivo'] . "<br>";

                                                                                                echo "<small>Agregado: " . $data3['fecha'] . "</small>";
                                                                                                echo "</div>";
                                                                                                echo "</a>";
                                                                                                echo "</div>";
                                                                                                echo "</div>";
                                                                                            } else {
                                                                                                echo "<span class='label label-warning big'>No existen archivos recientes.</span><br>";
                                                                                            }
                                                                                            ?>

                                                                                            <?php if ($usuarioSesion->getId() == $asesor1) { ?>
                                                                                                <div class="form-group">
                                                                                                    <input class = 'form-control' name = 'codigoTFG' id='codigoTFG' type="hidden" value='<?php echo $codigo ?>'>
                                                                                                    <input class = 'form-control' name = 'etapa' id = 'etapa' value ='3' type="hidden">   
                                                                                                    <input class = 'form-control' name = 'tipo' id = 'tipo' value ='archivoAsesor' type="hidden">
                                                                                                    <label>Adjuntar Documento:</label>
                                                                                                    <input accept=".docx,.doc,.pdf" type="file" name="archivo" id="archivo3" onchange="uploadFile()" class ="btn btn-primary btn-outline permiso">
                                                                                                    <div hidden id="divProgress3" class="progress progress-striped active">
                                                                                                        <div  id="progressBar3"   aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar progress-bar-danger ">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <h3 id="status3"></h3>
                                                                                                    <p id="loaded_n_total3"></p>
                                                                                                </div>
                                                                                            <?php } ?>


                                                                                        </div>
                                                                                        <div class="col-lg-5 col-lg-offset-1">

                                                                                            <?php if ($GLOBALS['cantAsesor'] == 2) { ?>
                                                                                                <label class="control-label">Asesor 2</label><br>
                                                                                                <?php
                                                                                                $consulta3 = "SELECT * FROM tfgarchivosasesores where tfg = '" . $codigo . "' and asesor = '" . $asesor2 . "' and etapa = 3 order by fecha desc limit 1;";
                                                                                                $query3 = mysqli_query($connection, $consulta3);
                                                                                                if ($data3 = mysqli_fetch_assoc($query3)) {
                                                                                                    echo " <div class=' file-box'>";
                                                                                                    echo " <div class='file'>";
                                                                                                    echo " <a href='" . $data3['ruta'] . "'>";
                                                                                                    echo "  <span class='corner'></span> ";
                                                                                                    echo " <div class='icon'>
                                                                                                <i class='fa fa-file'></i>
                                                                                                </div>";
                                                                                                    echo " <div class='file-name'style= 'word-wrap: break-word;'> " . $data3['nom_archivo'] . "<br>";

                                                                                                    echo "<small>Agregado: " . $data3['fecha'] . "</small>";
                                                                                                    echo "</div>";
                                                                                                    echo "</a>";
                                                                                                    echo "</div>";
                                                                                                    echo "</div>";
                                                                                                } else {
                                                                                                    echo "<span class='label label-warning '>No existen archivos recientes.</span><br>";
                                                                                                }
                                                                                                ?>

                                                                                                <?php if ($usuarioSesion->getId() == $asesor2) { ?>
                                                                                                    <div class="form-group">
                                                                                                        <input class = 'form-control' name = 'codigoTFG' id='codigoTFG' type="hidden" value='<?php echo $codigo ?>'>
                                                                                                        <input class = 'form-control' name = 'etapa' id = 'etapa' value ='3' type="hidden">   
                                                                                                        <input class = 'form-control' name = 'tipo' id = 'tipo' value ='archivoAsesor' type="hidden">   
                                                                                                        <label>Adjuntar Documento:</label>
                                                                                                        <input accept=".docx,.doc,.pdf" type="file" name="archivo" id="archivo3" onchange="uploadFile3()" class ="btn btn-primary btn-outline permiso">
                                                                                                        <div hidden id="divProgress3" class="progress progress-striped active">
                                                                                                            <div  id="progressBar3"   aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar progress-bar-danger ">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <h3 id="status3"></h3>
                                                                                                        <p id="loaded_n_total3"></p>
                                                                                                    </div>
                                                                                                <?php } ?>


                                                                                            <?php } ?>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-lg-offset-10">
                                                                                        <div class="form-group">
                                                                                            <input id="guardarArchivo3" type="submit" class="btn btn-primary btn-outline disabled" value="Guardar Archivo"  >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                            <div class="col-lg-offset-10">
                                                                                <form method="post" action='registro_archivos_tfg.php'>
                                                                                    <div class="form-group" >
                                                                                        <input type="hidden" name='codigo' value='<?php echo $codigo ?>'>
                                                                                        <input type='hidden' name='etapa' value='3'>
                                                                                        <input type='hidden' name='director' value='<?php echo $data['directorId'] ?>'>
                                                                                        <input id="input-1" type="submit"  class="btn btn-primary" value="Registro de Archivos">
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- fin archivos -->
                                                            <!-- comentarios -->
                                                            <div class="col-lg-12">
                                                                <div class="ibox collapsed">
                                                                    <div class="ibox-title panel panel-success">
                                                                        <h5>Comentrios</h5>
                                                                        <div id="collapse1" class="ibox-tools">
                                                                            <a id="col1" class="collapse-link">                                               
                                                                                <i class="fa fa-chevron-up"></i>
                                                                            </a> 
                                                                        </div>
                                                                        <div class="ibox-content" style="display: block;">
                                                                            <div class="row">

                                                                                <div class="col-lg-12">


                                                                                </div>


                                                                                <div class="col-lg-4">
                                                                                    <div class="ibox float-e-margins">
                                                                                        <div class="ibox-title">
                                                                                            <h5>Comision TFG</h5>
                                                                                            <?php if ($usuarioPermisos->getMiembrocomisiontfg()) { ?>

                                                                                                <button comentario="CM13" class="btn btn-primary btn-xs m-l-sm permiso" onclick="edit1('CM13')" type="button">Editar</button>
                                                                                                <button id="BM13" etapa="3" comentario="CM13" class="btn btn-primary  btn-xs permiso" onclick="save1('CM13')" type="button">Guardar</button>
                                                                                            <?php } ?>
                                                                                            <div class="ibox-tools">
                                                                                                <a class="collapse-link">
                                                                                                    <i class="fa fa-chevron-up"></i>
                                                                                                </a>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="ibox-content no-padding">

                                                                                            <div id="CM13" class="click1edit wrapper p-md">
                                                                                                <?php
                                                                                                comentarioMiembro($codigo, 3, $connection);
                                                                                                ?> 
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                    <div class="ibox float-e-margins">
                                                                                        <div class="ibox-title">
                                                                                            <h5>Asesor 1</h5>
                                                                                            <?php if ($usuarioPermisos->getId() == $asesor1) { ?>
                                                                                                <button comentario="CA13" class="btn btn-primary btn-xs m-l-sm permiso" onclick="edit2('CA13')" type="button">Editar</button>
                                                                                                <button id="BA13" etapa="3" comentario="CA13" class="btn btn-primary  btn-xs permiso" onclick="save2('CA13')" type="button">Guardar</button>
                                                                                            <?php } ?>
                                                                                            <div class="ibox-tools">
                                                                                                <a class="collapse-link">
                                                                                                    <i class="fa fa-chevron-up"></i>
                                                                                                </a>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="ibox-content no-padding">

                                                                                            <div id="CA13" class="click2edit wrapper p-md">
                                                                                                <?php
                                                                                                comentarioAsesor($codigo, 3, $asesor1, $connection);
                                                                                                ?>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-lg-4">
                                                                                    <?php if ($GLOBALS['cantAsesor'] == 2) { ?>
                                                                                        <div class="ibox float-e-margins">
                                                                                            <div class="ibox-title">
                                                                                                <h5>Asesor 2</h5>
                                                                                                <?php
                                                                                                if ($usuarioPermisos->getId() == $asesor2) {
                                                                                                    ?>
                                                                                                    <button comentario="CA23" class="btn btn-primary btn-xs m-l-sm permiso" onclick="edit3('CA23')" type="button">Editar</button>
                                                                                                    <button id="BA23" etapa="3" comentario="CA23" class="btn btn-primary  btn-xs permiso" onclick="save3('CA23')" type="button">Guardar</button>
                                                                                                    <?php
                                                                                                }
                                                                                                ?>
                                                                                                <div class="ibox-tools">
                                                                                                    <a class="collapse-link">
                                                                                                        <i class="fa fa-chevron-up"></i>
                                                                                                    </a>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="ibox-content no-padding">

                                                                                                <div id="CA23" class="click3edit wrapper p-md">
                                                                                                    <?php
                                                                                                    comentarioAsesor($codigo, 3, $asesor2, $connection);
                                                                                                    ?>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>

                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>    
                                                                </div>
                                                            </div>

                                                            <!-- fin comentarios -->
                                                            <!-- Estado  -->
                                                            <div class="row">
                                                                <div class="col-lg-2 col-lg-offset-7">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Estado de Etapa:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <div class="form-group">



                                                                        <select id="estado3" class="form-control m-b" name="account" onchange="pintandoPanels()" <?php
                                                                        if (!$usuarioPermisos->getEncargadotfg()) {
                                                                            echo "disabled"
                                                                            ?> <?php } ?>>

                                                                            <option value="Aprobada">Aprobada</option>
                                                                            <option value="Aprobada con Observaciones">Aprobada con Observaciones</option>
                                                                            <option value="No Aprobada">No Aprobada</option>    
                                                                            <option value="En ejecución">En ejecución</option>  
                                                                            <option value="Inactiva">Inactiva</option>
                                                                        </select> 

                                                                    </div>
                                                                </div>  
                                                            </div>
                                                            <div class="row"> 
                                                                <div class="col-lg-2 col-lg-offset-9">
                                                                    <div class="form-group">

                                                                        <?php if ($usuarioPermisos->getEncargadotfg()) { ?> 
                                                                            <input id="BE3" estado="estado3" etapa="3" type="button" class="btn btn-primary" value="Guardar Estado">
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- fin estado -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fin etapa 3 -->



                                    <!-- estado final -->
                                    <div class="row">
                                        <div class="col-lg-5 col-lg-offset-1">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label">Estado del TFG:</label>
                                                </div>
                                            </div>


                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <select id="estadotfg" class="form-control m-b" name="estadotfg" <?php
                                                    if (!$usuarioPermisos->getEncargadotfg()) {
                                                        echo "disabled"
                                                        ?> <?php } ?>>
                                                        <option>Activo</option>
                                                        <option>Aprobado para defensa</option>
                                                        <option>Inactivo</option>
                                                        <option>Finalizado</option>
                                                    </select> 

                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-lg-offset-2">
                                                <div class="form-group">
                                                    <?php if ($usuarioPermisos->getEncargadotfg()) { ?> 
                                                        <input id="BTFG" estado="estadotfg" type="button" class="btn btn-primary" value="Guardar Estado">
                                                    <?php } ?>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-5 col-lg-offset-1">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="control-label">Fecha de finalizacion:</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group" id="">
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input <?php
                                                        if (!$usuarioPermisos->getEncargadotfg()) {
                                                            echo "disabled"
                                                            ?> <?php } ?>
                                                            type="text" id="fecha" class="form-control" value="<?php echo substr($data['fechaFinal'], 0, 11) ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ($usuarioPermisos->getEncargadotfg()) { ?>
                                                <div class="col-lg-3 col-lg-offset-2">
                                                    <div class="form-group">
                                                        <input id="FTFG" estado="fechatfg" type="button" class="btn btn-primary" value="Guardar Fecha">
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                </div>

                                <!-- fin estado final -->
                                <!--fin adentro panel mas grande -->
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
        <script src="js/plugins/metisMenu/jquery.metisMenu.js" type="text/javascript"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <!-- Custom and plugin javascript -->
        <script src="js/inspinia.js"></script>
        <script src="js/plugins/pace/pace.min.js"></script>
        <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
        <!-- SUMMERNOTE -->
        <script src="js/plugins/summernote/summernote.min.js"></script>
        <script src="js/fileUpload.js" type="text/javascript"></script>
        <!-- Page-Level Scripts -->
        <?php

        function comentarioMiembro($cod, $eta, $conn) {
            $consulta = "select comentario from tfgcomentarioscomision where etapa = " . $eta . " and tfg ='$cod'";
            $query = mysqli_query($conn, $consulta);
            $data = mysqli_fetch_assoc($query);
            echo " " . $data["comentario"] . " ";
        }

        function comentarioAsesor($cod, $eta, $ide, $conn) {
            $consulta = "select comentario from tfgcomentariosasesores where etapa = $eta and tfg ='$cod' and asesor = $ide";
            $query = mysqli_query($conn, $consulta);
            $data = mysqli_fetch_assoc($query);
            echo " " . $data["comentario"] . " ";
        }

        function etapas($cod, $conn) {
            $consulta = "select numero,estado from tfgetapas where tfg ='$cod'";
            $query = mysqli_query($conn, $consulta);
            while ($data = mysqli_fetch_assoc($query)) {
                $etapas = "etapa" . $data["numero"];
                global $$etapas;
                $$etapas = $data['estado'];
            }
        }

        function cantidadAsesores($cod, $conn) {

            $cantAsesor = "select count(*) as asesores from tfg,tfgasesores,
                               tfgasesoran where tfg.codigo = tfgasesoran.tfg and 
                               tfgasesoran.asesor =  tfgasesores.id and tfg.codigo ='$cod' and tfgasesoran.estado = 1";
            $query = mysqli_query($conn, $cantAsesor);
            $data = mysqli_fetch_assoc($query);
            global $cantAsesor;
            $cantAsesor = $data['asesores'];
        }

        function asesores($cod, $conn) {
            global $asesoresCorreos;
            $asesoresCorreos = array();
            $consulta = "select tfgasesores.id, tfgasesores.correo from tfg,tfgasesores,"
                    . "tfgasesoran where tfg.codigo = tfgasesoran.tfg and "
                    . "tfgasesoran.asesor =  tfgasesores.id and tfg.codigo ='$cod' and tfgasesoran.estado = 1";

            $query = mysqli_query($conn, $consulta);
            $cont = 1;
            while ($data = mysqli_fetch_assoc($query)) {
                $asesores = "asesor$cont";
                global $$asesores;
                $$asesores = $data["id"];
                $cont++;

                array_push($asesoresCorreos, $data["correo"]);
            }
        }

        function verificarAsesor($usuarioId) {//valida si es asesor
            global $asesor1;
            global $asesor2;
            if (isset($asesor1)) {
                if ($usuarioId == $asesor1) {
                    return true;
                }
            }
            if (isset($asesor2)) {
                if ($usuarioId == $asesor2) {
                    return true;
                }
            }

            return false;
        }
        ?>

        <div id="mod-info" class="modal fade" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="text-center"><h3 id="titulo-modal" class="m-t-none m-b"></h3>
                                <div class="text-center">
                                    <label id="texto-modal"></label>
                                    <br>
                                    <button class="btn btn-sm btn-primary" id="cerrar" type="button" name="cerrar" data-dismiss="modal">Cerrar</button>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
                                                                            String.prototype.trim = function () {
                                                                                return this.replace(/^\s+|\s+$/g, "");
                                                                            };
                                                                            $(document).ready(function () {
                                                                                $('.summernote').summernote();
                                                                            });
                                                                            $('#fecha').datepicker({
                                                                                format: 'yyyy-mm-dd',
                                                                                todayBtn: "linked",
                                                                                keyboardNavigation: false,
                                                                                forceParse: false,
                                                                                calendarWeeks: true,
                                                                                autoclose: true
                                                                            });
                                                                            var edit1 = function (comen) {
                                                                                $('#' + comen + '.click1edit').summernote({focus: true});
                                                                            };
                                                                            var save1 = function (comen) {
                                                                                var aHTML = $('#' + comen + '.click1edit').code(); //save HTML If you need(aHTML: array).
                                                                                $('#' + comen + '.click1edit').destroy();
                                                                            };
                                                                            var edit2 = function (comen) {
                                                                                $('#' + comen + '.click2edit').summernote({focus: true});
                                                                            };
                                                                            var save2 = function (comen) {
                                                                                var aHTML = $('#' + comen + '.click2edit').code(); //save HTML If you need(aHTML: array).
                                                                                $('#' + comen + '.click2edit').destroy();
                                                                            };
                                                                            var edit3 = function (comen) {
                                                                                $('#' + comen + '.click3edit').summernote({focus: true});
                                                                            };
                                                                            var save3 = function (comen) {
                                                                                var aHTML = $('#' + comen + '.click3edit').code(); //save HTML If you need(aHTML: array).
                                                                                $('#' + comen + '.click3edit').destroy();
                                                                            };
                                                                            $(document).ready(function () {
                                                                                //init de botones
                                                                                guardarComentarioMiembro("BM11");
                                                                                guardarComentarioAsesor("BA11");
                                                                                guardarComentarioAsesor("BA21");
                                                                                guardarComentarioAsesor("BA12");
                                                                                guardarComentarioAsesor("BA13");
                                                                                guardarComentarioAsesor("BA22");
                                                                                guardarComentarioAsesor("BA23");
                                                                                guardarComentarioMiembro("BM12");
                                                                                guardarComentarioMiembro("BM13");
                                                                                guardarEstado("BE1");
                                                                                guardarEstado("BE2");
                                                                                guardarEstado("BE3");
                                                                                guardarEstadoFin("BTFG");
                                                                                guardarFecha();
                                                                                //init de panels y otras cosas 
                                                                                initSelects();
                                                                                pintandoPanels();
                                                                                inac(1);
                                                                                inac(2);
                                                                                inac(3);
                                                                                permiso = "<?php echo $usuarioPermisos->getEncargadotfg() ?>";
                                                                                etapa(1);
                                                                                etapa(2);
                                                                            });
                                                                            //sets de informacion a la base de datos
                                                                            function guardarComentarioAsesor(btn) { // btn boton del save para asesores
                                                                                $("#" + btn).click(function (evento) {
                                                                                    evento.preventDefault();
                                                                                    var cod = "<?php echo $codigo ?>";
                                                                                    var ide = <?php echo $usuarioSesion->getId() ?>;
                                                                                    var eta = $("#" + btn).attr("etapa");
                                                                                    var coment = $("#" + btn).attr("comentario");
                                                                                    var com = $("#" + coment).text();
                                                                                    com = com.trim();
                                                                                    $.get("funcionalidad/ComentarioAsesor.php", {comentario: com, tfg: cod, etapa: eta, id: ide}, function (data) {
                                                                                        modal(" Se guardo el comentario con exito", data);
                                                                                    }).fail(function (data) {
                                                                                        modal("Ocurrio algun problema", data);
                                                                                    });
                                                                                });
                                                                            }

                                                                            function guardarComentarioMiembro(btn) {
                                                                                $("#" + btn).click(function (evento) {
                                                                                    evento.preventDefault();
                                                                                    var cod = "<?php echo $codigo ?>";
                                                                                    var ide = "<?php echo $usuarioSesion->getId() ?>";
                                                                                    var eta = $("#" + btn).attr("etapa");
                                                                                    var coment = $("#" + btn).attr("comentario");
                                                                                    var com = $("#" + coment).text();
                                                                                    com = com.trim();
                                                                                    $.get("funcionalidad/ComentarioMiembro.php", {comentario: com, tfg: cod, etapa: eta, id: ide}, function (data) {
                                                                                        modal(" Se guardo el comentario con exito", data);
                                                                                    }).fail(function (data) {
                                                                                        modal("Ocurrio algun problema", data);
                                                                                    });
                                                                                });
                                                                            }

                                                                            function guardarEstado(btn) { // btn boton de guardar la etapa 
                                                                                $("#" + btn).click(function (evento) {
                                                                                    evento.preventDefault();
                                                                                    etapa(1);
                                                                                    etapa(2);
                                                                                    var cod = "<?php echo $codigo ?>";
                                                                                    var titulo = "<?php echo $data['titulo'] ?>";
                                                                                    var dir = "<?php echo $data["correodirector"] ?>";
                                                                                    var eta = $("#" + btn).attr("etapa");
                                                                                    var est = $("#" + btn).attr("estado");
                                                                                    var estad = $("#" + est).val();

                                                                                    var estudiantesC = <?php echo '["' . implode('", "', $arrayEstCorreos) . '"]' ?>;
                                                                                    var asesores = <?php echo '["' . implode('", "', $asesoresCorreos) . '"]' ?>;

                                                                                    var asesoresC = {};
                                                                                    asesoresC = JSON.stringify(asesores);

                                                                                    var estC = {};
                                                                                    estC = JSON.stringify(estudiantesC);

                                                                                    $.get("funcionalidad/TFGestado.php", {estado: estad, tfg: cod, titulo: titulo, etapa: eta, estCorreos: estC, director: dir, asesores: asesoresC}, function (data) {
                                                                                        modal(" Se guardó el estado de la etapa con éxito.", data);
                                                                                    }).fail(function (data) {
                                                                                        modal("Ocurrió algún problema.", data);
                                                                                    });

                                                                                });
                                                                            }

                                                                            function guardarEstadoFin(btn) { // btn boton del guardar estado final
                                                                                $("#" + btn).click(function (evento) {
                                                                                    evento.preventDefault();
                                                                                    var cod = "<?php echo $codigo ?>";
                                                                                    var est = $("#" + btn).attr("estado");
                                                                                    var estad = $("#" + est).val();
                                                                                    var etapa = "Final";
                                                                                    var titulo = "<?php echo $data['titulo'] ?>";
                                                                                    var estudiantesC = <?php echo '["' . implode('", "', $arrayEstCorreos) . '"]' ?>;
                                                                                    var asesores = <?php echo '["' . implode('", "', $asesoresCorreos) . '"]' ?>;
                                                                                    var dir = "<?php echo $data["correodirector"] ?>";

                                                                                    var estC = {};
                                                                                    estC = JSON.stringify(estudiantesC);

                                                                                    var asesoresC = {};
                                                                                    asesoresC = JSON.stringify(asesores);

                                                                                    $.get("funcionalidad/TFGestadoFin.php", {estado: estad, tfg: cod, titulo: titulo, etapa: etapa, director: dir, estCorreos: estC, asesores: asesoresC}, function (data) {
                                                                                        modal(" Se guardó el estado final con exito", data);
                                                                                    }).fail(function (data) {
                                                                                        modal("Ocurrió algún problema", data);
                                                                                    });
                                                                                });
                                                                            }
                                                                            function guardarFecha() {
                                                                                $("#FTFG").click(function (evento) {
                                                                                    evento.preventDefault();
                                                                                    var cod = "<?php echo $codigo ?>";
                                                                                    var fecha = $("#fecha").val();
                                                                                    $.get("funcionalidad/TFGfecha.php", {fecha: fecha, tfg: cod}, function (data) {
                                                                                        modal(" Se guardó la fecha con exito", data);
                                                                                    }).fail(function (data) {
                                                                                        modal("Ocurrió algún problema", data);
                                                                                    });
                                                                                });
                                                                            }
                                                                            function modal(titulo, msj) {
                                                                                $('#mod-info').modal('show');
                                                                                $("#titulo-modal").text(titulo);
                                                                                $("#texto-modal").text(msj);

                                                                            }


                                                                            //pintar panels
                                                                            var estados = {Aprobada: "panel-primary", AprobadaconObservaciones: "panel-warning",
                                                                                NoAprobada: "panel-danger", Enejecución: "panel-success", Inactiva: "panel", Activo: "panel-success",
                                                                                Aprobadaparadefensa: "panel-primary", Inactivo: "panel-danger", Finalizado: "panel-primary"};
                                                                            var estadosant = {ant1: "<?php echo $etapa1 ?>", ant2: "<?php echo $etapa2 ?>", ant3: "<?php echo $etapa3 ?>", ant4: "<?php echo $data["estado"] ?>"};
                                                                            function pintando(estado, panel, estadoan, n) {
                                                                                estado = estado.replace(/\s/g, "");
                                                                                estadoan = estado.replace(/\s/g, "");
                                                                                $("#" + panel).removeClass(estados[estadosant["ant" + n]] + "").addClass(estados[estado]);
                                                                                //elimino el color anterior y inserto la clase del nuevo
                                                                                estadosant["ant" + n] = estado;
                                                                            }
                                                                            function pintandoPanels() {
                                                                                pintando($("#estado1").val(), "panelEstado1", estadosant["ant1"], 1);
                                                                                pintando($("#estado2").val(), "panelEstado2", estadosant["ant2"], 2);
                                                                                pintando($("#estado3").val(), "panelEstado3", estadosant["ant3"], 3);
                                                                                pintando($("#estadotfg").val(), "panelEstadoFinal", estadosant["ant4"], 4);
                                                                            }
                                                                            function initSelects() {
                                                                                // alert("<?php echo $etapa1 ?>");
                                                                                $("#estado1").val("<?php echo $etapa1 ?>");
                                                                                $("#estado2").val("<?php echo $etapa2 ?>");
                                                                                $("#estado3").val("<?php echo $etapa3 ?>");
                                                                                $("#estadotfg").val("<?php echo $data["estado"] ?>");
                                                                            }
                                                                            //metodo para que el usuario no pueda marcar la opcion de inactivo en una etapa
                                                                            function inac(etapa) {
                                                                                //alert(etapa);
                                                                                $("#estado" + etapa).focus(function () {
                                                                                    $("#estado" + etapa + " option[value='Inactiva']").remove();
                                                                                });
                                                                                $("#estado" + etapa).focus();
                                                                                $("#estado" + etapa).focusout(function () {
                                                                                    $("#estado" + etapa).append("<option value='Inactiva'>Inactiva</option>");

                                                                                });
                                                                            }
                                                                            //metodo para habilitar/deshabilitar la siguiente etapa 

                                                                            var permiso;
                                                                            function etapa(etapa) {
                                                                                
                                                                                var estado = $("#estado" + etapa).val();
                                                                                var etapasig = etapa + 1;

                                                                                if (estado === "Aprobada" || estado === "Aprobada con Observaciones") {
                                                                                    if (permiso === "1") {
                                                                                        $("#estado" + etapasig).prop('disabled', false);
                                                                                        $("#BE" + etapasig).prop('disabled', false);
                                                                                    }
                                                                                    $("#panelEstado" + etapasig + " .permiso").prop('disabled', false);

                                                                                } else {
                                                                                    if (permiso === "1") {
                                                                                        $("#estado" + etapasig).prop('disabled', true);
                                                                                        $("#BE" + etapasig).prop('disabled', true);
                                                                                    }
                                                                                    $("#panelEstado" + etapasig + " .permiso").prop('disabled', true);
                                                                                }
                                                                            }




        </script>    


    </body>
</html>
