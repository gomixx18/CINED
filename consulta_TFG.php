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

        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/plugins/summernote/summernote.css" rel="stylesheet">
        <link href="css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

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
                        <h2>Consulta Específica TFG</h2>

                    </div>

                </div>
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">

                                <div class="ibox-title panel-heading panel-success">
                                    <h5>Consulta Específica TFG</h5>

                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>

                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <?php
                                    $codigo = $_GET["codigo"];
                                    $consulta = "select tfg.titulo, concat(tfgdirectores.nombre,' ',tfgdirectores.apellido1,' ',tfgdirectores.apellido2)as directortfg, 
                                                concat(tfgencargados.nombre,' ',tfgencargados.apellido1,' ',tfgencargados.apellido2) as encargadotfg,
                                                lineasinvestigacion.nombre as lineainvestigacion, carreras.nombre as carrera, modalidades.nombre as modalidad, tfg.estado
                                                from tfgdirectores, tfg, tfgencargados,lineasinvestigacion,carreras,modalidades 
                                                where tfgdirectores.id = directortfg and tfgencargados.id = encargadotfg and 
                                                lineasinvestigacion.codigo = lineainvestigacion and carreras.codigo = carrera and modalidades.codigo = modalidad
                                                and tfg.codigo ='". $codigo. "'";

                                    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
                                    if (!$connection) {
                                        exit("<label class='error'>Error de conexión</label>");
                                    }

                                    $query = mysqli_query($connection, $consulta );
                                    $data = mysqli_fetch_assoc($query);
                                    etapas($codigo, $connection);
                                    //echo $data["estado"];
                                    ?> 

                                    <div class="row">
                                        <div class="col-lg-4 col-lg-offset-1">

                                            <form role="form" >


                                                <div class='form-group'>
                                                    <label>Titulo</label>
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
                                                    <label>Linea de Investigación</label>
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
                                                    $consulta2 = "select tfgestudiantes.id, concat(tfgestudiantes.nombre,' ',  tfgestudiantes.apellido1, ' ', tfgestudiantes.apellido2) as nombre 
                                                                  from tfg,tfgestudiantes, tfgrealizan where tfg.codigo = tfgrealizan.tfg and tfgrealizan.estudiante = tfgestudiantes.id and tfg.codigo ='". $codigo. "'";
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
                                                    }
                                                    ?> 

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fin estudiantes -->

                                    <?php
                                    asesores($codigo, $connection);
                                    ?>


                                    <!-- etapa 1 -->
                                    <div  class="wrapper wrapper-content animated fadeIn">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div  class="ibox collapsed">
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
                                                                <div class="panel panel-default">
                                                                    <div class="panel-body">
                                                                        <form action="funcionalidad/CargarArchivoBlobTFG.php" method="post" enctype="multipart/form-data" id="directorForm">
                                                                        <div class="row">

                                                                            <div class="col-lg-12 ">
                                                                                <label>Archivos</label>
                                                                                <br/><br/>

                                                                            </div>
                                                                            <div class="col-lg-5 col-lg-offset-1">
                                                                                <div class="form-group">
                                                                                    
                                                                                    <label class="control-label">Comisión TFG</label>
                                                                                    <input class = 'form-control' name = 'codigoTFG' id='codigoTFG' type="hidden" value='<?php echo $codigo ?>'>
                                                                                    <input class = 'form-control' name = 'etapa' id = 'etapa' value ='1' type="hidden">   
                                                                                    <input class = 'form-control' name = 'tipo' id = 'tipo' value ='archivoDirector' type="hidden">   

                                                                                    <input accept=".docx,.doc,.pdf" type="file" name="archivoDirector" id="archivoDirector" onchange="uploadFile()" class ="btn btn-primary btn-outline">
                                                                                    <div hidden id="divProgress" class="progress progress-striped active">
                                                                                        <div  id="progressBar"   aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar progress-bar-danger ">
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                   
                                                                                    <h2 id="status"></h2>
                                                                                    <p id="loaded_n_total"></p>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label">Director TFG</label>
                                                                                    <input id="input-1" type="file" class ="btn btn-primary btn-outline">
                                                                                </div>

                                                                            </div>
                                                                            <div class="col-lg-5 col-lg-offset-1">

                                                                                <div class="form-group">
                                                                                    <label class="control-label">Asesor 2</label>
                                                                                    <input id="input-1" type="file" class=" btn btn-primary btn-outline">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label">Asesor 1</label>
                                                                                    <input id="input-1" type="file"  class ="btn btn-primary btn-outline">
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="row">

                                                                            <div class="col-lg-offset-8">
                                                                                <div class="form-group">
                                                                                    <input id="guardarArchivo1" type="submit" class="btn btn-primary btn-outline disabled" value="Guardar Archivo"disabled >
                                                                                    <input id="input-1" type="button" class="btn btn-primary btn-outline" value="Registro de Archivos">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- fin archivos -->

                                                            <!-- comentarios -->
                                                            <div class="col-lg-12">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-body">

                                                                        <div class="row">

                                                                            <div class="col-lg-12 ">
                                                                                <label>Comentarios</label>
                                                                                <br/><br/>

                                                                            </div>

                                                                            <div class="col-lg-4">
                                                                                <div class="ibox float-e-margins">
                                                                                    <div class="ibox-title">
                                                                                        <h5>Comision TFG</h5>

                                                                                        <button class="btn btn-primary btn-xs m-l-sm" onclick="edit1()" type="button">Edit</button>
                                                                                        <button id="BM11" etapa="1" comentario="CM11" class="btn btn-primary  btn-xs" onclick="save1()" type="button">Save</button>
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
                                                                                        <button class="btn btn-primary btn-xs m-l-sm" onclick="edit2()" type="button">Edit</button>
                                                                                        <button id="BA11" etapa="1" comentario="CA11" class="btn btn-primary  btn-xs" onclick="save2()" type="button">Save</button>
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
                                                                            <div class="col-lg-4">
                                                                                <div class="ibox float-e-margins">
                                                                                    <div class="ibox-title">
                                                                                        <h5>Asesor 2</h5>
                                                                                        <button class="btn btn-primary btn-xs m-l-sm" onclick="edit3()" type="button">Edit</button>
                                                                                        <button id="BA21" etapa="1" comentario="CA21" class="btn btn-primary  btn-xs" onclick="save3()" type="button">Save</button>
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


                                                                        <select id="estado1" class="form-control m-b" name="account" onchange="pintandoPanels()">
                                                                            <option value="Aprobada">Aprobada</option>
                                                                            <option value="Aprobada con Observaciones">Aprobada con Observaciones</option>
                                                                            <option value="No Aprobada">No Aprobada</option>    
                                                                            <option value="En ejecución">En ejecución</option>  
                                                                            <option value="Inactivo">Inactivo</option>
                                                                        </select> 

                                                                    </div>
                                                                </div>  
                                                            </div>
                                                            <div class="row"> 
                                                                <div class="col-lg-2 col-lg-offset-9">
                                                                    <div class="form-group">
                                                                        <input id="BE1" estado="estado1" etapa="1" type="button" class="btn btn-primary" value="Guardar Estado">
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
                                                    </div>
                                                    <div class="ibox-content">
                                                        <!-- archivos -->
                                                        <div class="col-lg-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-body">

                                                                    <div class="row">

                                                                        <div class="col-lg-12 ">
                                                                            <label>Archivos</label>
                                                                            <br/><br/>

                                                                        </div>
                                                                        <div class="col-lg-5 col-lg-offset-1">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Comisión TFG</label>
                                                                                <input id="input-1" type="file" class ="btn btn-primary btn-outline">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Director TFG</label>
                                                                                <input id="input-1" type="file" class ="btn btn-primary btn-outline">
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-lg-5 col-lg-offset-1">

                                                                            <div class="form-group">
                                                                                <label class="control-label">Asesor 2</label>
                                                                                <input id="input-1" type="file" class ="btn btn-primary btn-outline">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Asesor 1</label>
                                                                                <input id="input-1" type="file" class ="btn btn-primary btn-outline">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="col-lg-offset-8">
                                                                            <div class="form-group">
                                                                                <input id="input-1" type="button" class="btn btn-primary btn-outline" value="Guardar Archivo">
                                                                                <input id="input-1" type="button" class="btn btn-info btn-outline" value="Registro de Archivos">
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- fin archivos -->
                                                        <!-- comentarios -->
                                                        <div class="col-lg-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-body">

                                                                    <div class="row">

                                                                        <div class="col-lg-12 ">
                                                                            <label>Comentarios</label>
                                                                            <br/><br/>

                                                                        </div>

                                                                        <div class="col-lg-4">
                                                                            <div class="ibox float-e-margins">
                                                                                <div class="ibox-title">
                                                                                    <h5>Comision TFG</h5>
                                                                                    <button  class="btn btn-primary btn-xs m-l-sm" onclick="edit1()" type="button">Edit</button>
                                                                                    <button id="BM12" etapa="2" comentario="CM12" class="btn btn-primary  btn-xs" onclick="save1()" type="button">Save</button>
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
                                                                                    <button  class="btn btn-primary btn-xs m-l-sm" onclick="edit2()" type="button">Edit</button>
                                                                                    <button id="BA12" etapa="2" comentario="CA12" class="btn btn-primary  btn-xs" onclick="save2()" type="button">Save</button>
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
                                                                        <div class="col-lg-4">
                                                                            <div class="ibox float-e-margins">
                                                                                <div class="ibox-title">
                                                                                    <h5>Asesor 2</h5>
                                                                                    <button  class="btn btn-primary btn-xs m-l-sm" onclick="edit3()" type="button">Edit</button>
                                                                                    <button id="BA22" etapa="2" comentario="CA22" class="btn btn-primary  btn-xs" onclick="save3()" type="button">Save</button>
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


                                                                    <select id="estado2" class="form-control m-b" name="account" onchange="pintandoPanels()">
                                                                        <option value="Aprobada">Aprobada</option>
                                                                        <option value="Aprobada con Observaciones">Aprobada con Observaciones</option>
                                                                        <option value="No Aprobada">No Aprobada</option>    
                                                                        <option value="En ejecución">En ejecución</option>  
                                                                        <option value="Inactivo">Inactivo</option>
                                                                    </select> 

                                                                </div>
                                                            </div>  
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="col-lg-2 col-lg-offset-9">
                                                                <div class="form-group">
                                                                    <input id="BE2" estado="estado2" etapa="2" type="button" class="btn btn-primary" value="Guardar Estado">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- fin estado -->

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
                                                    </div>
                                                    <div class="ibox-content">
                                                        <!-- archivos -->
                                                        <div class="col-lg-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-body">

                                                                    <div class="row">

                                                                        <div class="col-lg-12 ">
                                                                            <label>Archivos</label>
                                                                            <br/><br/>

                                                                        </div>
                                                                        <div class="col-lg-5 col-lg-offset-1">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Comisión TFG</label>
                                                                                <input id="input-1" type="file" class ="btn btn-primary btn-outline">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Director TFG</label>
                                                                                <input id="input-1" type="file" class ="btn btn-primary btn-outline">
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-lg-5 col-lg-offset-1">

                                                                            <div class="form-group">
                                                                                <label class="control-label">Asesor 2</label>
                                                                                <input id="input-1" type="file" class ="btn btn-primary btn-outline">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Asesor 1</label>
                                                                                <input id="input-1" type="file" class ="btn btn-primary btn-outline">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="col-lg-offset-8">
                                                                            <div class="form-group">
                                                                                <input id="input-1" type="button" class="btn btn-primary btn-outline" value="Guardar Archivo">
                                                                                <input id="input-1" type="button" class="btn btn-primary btn-outline" value="Registro de Archivos">
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- fin archivos -->
                                                        <!-- comentarios -->
                                                        <div class="col-lg-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-body">

                                                                    <div class="row">

                                                                        <div class="col-lg-12 ">
                                                                            <label>Comentarios</label>
                                                                            <br/><br/>

                                                                        </div>

                                                                        <div class="col-lg-4">
                                                                            <div class="ibox float-e-margins">
                                                                                <div class="ibox-title">
                                                                                    <h5>Comision TFG</h5>
                                                                                    <button  class="btn btn-primary btn-xs m-l-sm" onclick="edit1()" type="button">Edit</button>
                                                                                    <button id="BM13" etapa="3" comentario="CM13" class="btn btn-primary  btn-xs" onclick="save1()" type="button">Save</button>
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
                                                                                    <button  class="btn btn-primary btn-xs m-l-sm" onclick="edit2()" type="button">Edit</button>
                                                                                    <button id="BA13" etapa="3" comentario="CA13" class="btn btn-primary  btn-xs" onclick="save2()" type="button">Save</button>
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
                                                                            <div class="ibox float-e-margins">
                                                                                <div class="ibox-title">
                                                                                    <h5>Asesor 2</h5>
                                                                                    <button  class="btn btn-primary btn-xs m-l-sm" onclick="edit3()" type="button">Edit</button>
                                                                                    <button id="BA23" etapa="3" comentario="CA23" class="btn btn-primary  btn-xs" onclick="save3()" type="button">Save</button>
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


                                                                    <select id="estado3" class="form-control m-b" name="account" onchange="pintandoPanels()">

                                                                        <option value="Aprobada">Aprobada</option>
                                                                        <option value="Aprobada con Observaciones">Aprobada con Observaciones</option>
                                                                        <option value="No Aprobada">No Aprobada</option>    
                                                                        <option value="En ejecución">En ejecución</option>  
                                                                        <option value="Inactivo">Inactivo</option>
                                                                    </select> 

                                                                </div>
                                                            </div>  
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="col-lg-2 col-lg-offset-9">
                                                                <div class="form-group">
                                                                    <input id="BE3" estado="estado3" etapa="3" type="button" class="btn btn-primary" value="Guardar Estado">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- fin estado -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- fin etapa 2 -->



                                    <!-- estado final -->
                                    <div class="row">
                                        <div class="col-lg-2 col-lg-offset-4">
                                            <div class="form-group">
                                                <label class="control-label">Estado del TFG:</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <select id="estadotfg" class="form-control m-b" name="estadotfg">
                                                    <option >Activo</option>
                                                    <option>Inactivo</option>
                                                    <option>Finalizado</option>
                                                </select> 

                                            </div>
                                        </div>  
                                    </div>
                                    <div class="row"> 
                                        <div class="col-lg-2 col-lg-offset-6">
                                            <div class="form-group">
                                                <input id="BTFG" estado="estadotfg" type="button" class="btn btn-primary" value="Guardar Estado">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fin estado final -->


                                    <!--fin adentro panel mas grande -->
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-10"></div>

                    </div>

                    <div class="footer">
                        Universidad Nacional  &copy; 2015-2016
                    </div>

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

            <!-- SUMMERNOTE -->
            <script src="js/plugins/summernote/summernote.min.js"></script>

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

            function asesores($cod, $conn) {
                $consulta = "select tfgasesores.id from tfg,tfgasesores,"
                        . "tfgasesoran where tfg.codigo = tfgasesoran.tfg and "
                        . "tfgasesoran.asesor =  tfgasesores.id and tfg.codigo ='$cod'";

                $query = mysqli_query($conn, $consulta);
                $cont = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                    $asesores = "asesor$cont";
                    global $$asesores;
                    $$asesores = $data["id"];
                    $cont++;
                }
            }

            function estadoTFG($cod, $conn) {
                $consulta = "select comentario from tfgcomentariosasesores where etapa = $eta and tfg ='$cod' and asesor = $ide";
                $query = mysqli_query($conn, $consulta);
                $data = mysqli_fetch_assoc($query);
            }
            ?>
<script>
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
    
       document.getElementById("divProgress").removeAttribute('hidden');

	var file = _("archivoDirector").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("archivo", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "funcionalidad/parser_File.php");
	ajax.send(formdata);
        

}
function progressHandler(event){
    
        $("#guardarArchivo1").addClass('disabled');
        $("#guardarArchivo1").attr('disabled','true');
	_("loaded_n_total").innerHTML = "Subido "+event.loaded+" bytes de "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").style.width = Math.round(percent)+"%"; 
        
        if(parseInt(_("progressBar").style.width) < 40){
            $("#progressBar").removeClass("progress-bar-success").addClass("progress-bar-danger");
        }
        if(parseInt(_("progressBar").style.width) > 40){
            $("#progressBar").removeClass("progress-bar-danger").addClass("progress-bar-warning");
        }
        if(parseInt(_("progressBar").style.width) > 70){
            $("#progressBar").removeClass("progress-bar-warning").addClass("progress-bar-default");
        }
        if(parseInt(_("progressBar").style.width) === 100){
            $("#progressBar").removeClass("progress-bar-default").addClass("progress-bar-success");
        }
	_("status").innerHTML = Math.round(percent)+"% Subido... por favor espere";
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	$("#guardarArchivo1").removeClass('disabled');
        $("#guardarArchivo1").removeAttr('disabled')
}
function errorHandler(event){
	_("status").innerHTML = "Subida Fallida";
}
function abortHandler(event){
	_("status").innerHTML = "Subida Abortada";
}


</script>
<script>
                                                                        String.prototype.trim = function () {
                                                                            return this.replace(/^\s+|\s+$/g, "");
                                                                        };
                                                                        $(document).ready(function () {
                                                                            $('.summernote').summernote();
                                                                        });
                                                                        var edit1 = function () {
                                                                            $('.click1edit').summernote({focus: true});
                                                                        };
                                                                        var save1 = function () {
                                                                            var aHTML = $('.click1edit').code(); //save HTML If you need(aHTML: array).
                                                                            $('.click1edit').destroy();
                                                                        };
                                                                        var edit2 = function () {
                                                                            $('.click2edit').summernote({focus: true});
                                                                        };
                                                                        var save2 = function () {
                                                                            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
                                                                            $('.click2edit').destroy();
                                                                        };
                                                                        var edit3 = function () {
                                                                            $('.click3edit').summernote({focus: true});
                                                                        };
                                                                        var save3 = function () {
                                                                            var aHTML = $('.click3edit').code(); //save HTML If you need(aHTML: array).
                                                                            $('.click3edit').destroy();
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
                                                                            //init de panels y otras cosas 
                                                                            initSelects();
                                                                            pintandoPanels();
                                                                            inac(1);inac(2);inac(3);
                                                                        });
                                                                        //sets de informacion a la base de datos
                                                                        function guardarComentarioAsesor(btn) { // btn boton del save para asesores
                                                                            $("#" + btn).click(function (evento) {
                                                                                evento.preventDefault();
                                                                                var cod = "<?php echo $codigo?>";
                                                                                var ide = <?php echo $usuarioSesion->getId() ?>;
                                                                                var eta = $("#" + btn).attr("etapa");
                                                                                var coment = $("#" + btn).attr("comentario");
                                                                                var com = $("#" + coment).text();
                                                                                com = com.trim();
                                                                                $.get("funcionalidad/ComentarioAsesor.php", {comentario: com, tfg: cod, etapa: eta, id: ide}, function (data) {
                                                                                    //alert(data);
                                                                                }).fail(function () {
                                                                                    //alert("error");
                                                                                });
                                                                            });
                                                                        }

                                                                        function guardarComentarioMiembro(btn) {
                                                                            $("#" + btn).click(function (evento) {
                                                                                evento.preventDefault();  
                                                                                var cod = "<?php echo $codigo?>";
                                                                                var ide = <?php echo $usuarioSesion->getId() ?>;
                                                                                var eta = $("#" + btn).attr("etapa");
                                                                                var coment = $("#" + btn).attr("comentario");
                                                                                var com = $("#" + coment).text();
                                                                                com = com.trim();
                                                                                $.get("funcionalidad/ComentarioMiembro.php", {comentario: com, tfg: cod, etapa: eta, id: ide}, function (data) {
                                                                                    //alert(data);
                                                                                }).fail(function () {
                                                                                    //alert("error");
                                                                                });
                                                                            });
                                                                        }

                                                                        function guardarEstado(btn) { // btn boton de guardar la etapa 
                                                                            $("#" + btn).click(function (evento) {
                                                                                evento.preventDefault();
                                                                                //alert("<?php echo $codigo ?>");
                                                                                var cod = "<?php echo $codigo?>";
                                                                                var eta = $("#" + btn).attr("etapa");
                                                                                var est = $("#" + btn).attr("estado");
                                                                                var estad = $("#" + est).val();
                                                                                $.get("funcionalidad/TFGestado.php", {estado: estad, tfg: cod, etapa: eta}, function (data) {
                                                                                    //alert(data);
                                                                                }).fail(function () {
                                                                                    //alert("error");
                                                                                });
                                                                                //etapa(estad, eta);
                                                                            });
                                                                        }

                                                                        function guardarEstadoFin(btn) { // btn boton del guardar estado final
                                                                            $("#" + btn).click(function (evento) {
                                                                                evento.preventDefault();
                                                                                var cod = "<?php echo $codigo?>";
                                                                                var est = $("#" + btn).attr("estado");
                                                                                var estad = $("#" + est).val();
                                                                                $.get("funcionalidad/TFGestadoFin.php", {estado: estad, tfg: cod}, function (data) {
                                                                                    //alert(data);
                                                                                }).fail(function () {
                                                                                    //alert("error");
                                                                                });
                                                                            });
                                                                        }


                                                                        //pintar panels
                                                                        var estados = {Aprobada: "panel-primary", AprobadaconObservaciones: "panel-warning",
                                                                            NoAprobada: "panel-danger", Enejecución: "panel-success", Inactivo: "panel"};
                                                                        var estadosant = {ant1: "<?php echo $etapa1 ?>", ant2: "<?php echo $etapa2 ?>", ant3: "<?php echo $etapa3 ?>"};
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
                                                                            $("#estado"+etapa).focus(function () {
                                                                                $("#estado"+etapa + " option[value='Inactivo']").remove();
                                                                                
                                                                            });
                                                                            $("#estado"+etapa).focus();
                                                                            $("#estado"+etapa).focusout(function () {
                                                                                $("#estado"+etapa).append("<option value='Inactivo'>Inactivo</option>");
                                                                                
                                                                            });
                                                                        }
                                                                        //metodo para habilitar/deshabilitar la siguiente etapa 
                                                                        function etapa(opcion, etapasig) {

                                                                            etapasig++;
                                                                            if (opcion === "Aprobada" || opcion === "Aprobada con Observaciones") {
                                                                                alert("col" + etapasig);
                                                                                
                                                                                //$("#col" + etapasig).html("<i class='fa fa-chevron-up'> </i>");


                                                                                /* $('#col'+etapasig).on('show hide', function () {
                                                                                 $(this).css('height', 'auto');
                                                                                 });
                                                                                 $('#col'+etapasig).collapse({parent: true, toggle: true});*/

                                                                            } else {
                                                                                $("#col" + etapasig).remove();
                                                                            }

                                                                        }
                                                                        

            </script>    

        
    </body>
</html>
