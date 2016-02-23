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

                                <div class="ibox-title">
                                    <h5>Consulta Específica TFG</h5>

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

                                    <!--aca lo de adentro del panel mas grande -->

                                    <!--primera informacion -->
                                    <div class="row">
                                        <div class="col-lg-4 col-lg-offset-1">

                                            <form role="form" >

                                                <div class="form-group">
                                                    <label>Titulo</label>
                                                    <input class="form-control" name="titulo" id="titulo" disabled>

                                                </div>

                                                <div class="form-group">
                                                    <label>Carrera</label>
                                                    <input class="form-control" placeholder="" name="carrera" id="carrera" disabled>
                                                </div>

                                                <div class="form-group">
                                                    <label>Modalidad</label>
                                                    <input class="form-control" placeholder="" name="papellido" id="papellido" disabled>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Director de TFG</label>
                                                    <input class="form-control" placeholder="" name="papellido" id="papellido" disabled>
                                                </div>


                                            </form>

                                        </div>

                                        <div class="col-lg-4 col-lg-offset-1">

                                            <form role="form">

                                                <div class="form-group">
                                                    <label>Encargado de TFG</label>
                                                    <input class="form-control" name="titulo" id="titulo" disabled>

                                                </div>

                                                <div class="form-group">
                                                    <label>Catedra</label>
                                                    <input class="form-control" placeholder="" name="carrera" id="carrera" disabled>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Linea de Investigación</label>
                                                    <input class="form-control" placeholder="" name="carrera" id="carrera" disabled>
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


                                                    <label>Investigadores</label>
                                                    <br/>
                                                    <br/>

                                                    <div class="row">
                                                        <div class="col-lg-6 col-lg-offset-1">
                                                            <label>Nombre: Jose Pablo Villalobos </label>  

                                                        </div>
                                                        <div class="col-lg-5" >

                                                            <label>Cedula: 45345</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-lg-offset-1">
                                                            <label>Nombre: Jose Pablo Villalobos </label>  

                                                        </div>
                                                        <div class="col-lg-5" >

                                                            <label>Cedula: 45345</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fin estudiantes -->


                                    <!-- etapa 1 -->
                                    <div class="wrapper wrapper-content animated fadeIn">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="ibox collapsed">
                                                    <div class="ibox-title">
                                                        <h5>Etapa #1. Tema</h5>
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
                                                                                <input id="input-1" type="file" class="file">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Director TFG</label>
                                                                                <input id="input-1" type="file" class="file">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        <div class="col-lg-5 col-lg-offset-1">

                                                                            <div class="form-group">
                                                                                <label class="control-label">Asesor 2</label>
                                                                                <input id="input-1" type="file" class="file">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Asesor 1</label>
                                                                                <input id="input-1" type="file" class="file">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="col-lg-offset-8">
                                                                            <div class="form-group">
                                                                                <input id="input-1" type="button" class="btn btn-primary" value="Guardar Archivo">
                                                                                <input id="input-1" type="button" class="btn btn-primary" value="Registro de Archivos">
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
                                                                                    <button id="edit" class="btn btn-primary btn-xs m-l-sm" onclick="edit1()" type="button">Edit</button>
                                                                                    <button id="save" class="btn btn-primary  btn-xs" onclick="save1()" type="button">Save</button>
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
                                                                                <div class="ibox-content no-padding">

                                                                                    <div class="click1edit wrapper p-md">

                                                                                        Escriba aqui su comentario...

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="ibox float-e-margins">
                                                                                <div class="ibox-title">
                                                                                    <h5>Asesor 1</h5>
                                                                                    <button id="edit" class="btn btn-primary btn-xs m-l-sm" onclick="edit2()" type="button">Edit</button>
                                                                                    <button id="save" class="btn btn-primary  btn-xs" onclick="save2()" type="button">Save</button>
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
                                                                                <div class="ibox-content no-padding">

                                                                                    <div class="click2edit wrapper p-md">

                                                                                        Escriba aqui su comentario...

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="ibox float-e-margins">
                                                                                <div class="ibox-title">
                                                                                    <h5>Asesor 2</h5>
                                                                                    <button id="edit" class="btn btn-primary btn-xs m-l-sm" onclick="edit3()" type="button">Edit</button>
                                                                                    <button id="save" class="btn btn-primary  btn-xs" onclick="save3()" type="button">Save</button>
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
                                                                                <div class="ibox-content no-padding">

                                                                                    <div class="click3edit wrapper p-md">

                                                                                        Escriba aqui su comentario...

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">

                                                                            <div class="col-lg-3 col-lg-offset-9">
                                                                                <div class="form-group">

                                                                                    <input id="input-1" type="button" class="btn btn-primary" value="Guardar Comentario">
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


                                                                    <select class="form-control m-b" name="account">
                                                                        <option>Aprobada</option>
                                                                        <option>Aprobada con Observaciones</option>
                                                                        <option>No Aprobada</option>    
                                                                        <option>En ejecución</option>  
                                                                    </select> 

                                                                </div>
                                                            </div>  
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="col-lg-2 col-lg-offset-9">
                                                                <div class="form-group">
                                                                    <input id="input-1" type="button" class="btn btn-primary" value="Guardar Cambios">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- fin estado -->

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
                                                    <div class="ibox-title">
                                                        <h5>Etapa #2. Ante Proyecto</h5>
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
                                                                                <input id="input-1" type="file" class="file">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Director TFG</label>
                                                                                <input id="input-1" type="file" class="file">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        <div class="col-lg-5 col-lg-offset-1">

                                                                            <div class="form-group">
                                                                                <label class="control-label">Asesor 2</label>
                                                                                <input id="input-1" type="file" class="file">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Asesor 1</label>
                                                                                <input id="input-1" type="file" class="file">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="col-lg-offset-8">
                                                                            <div class="form-group">
                                                                                <input id="input-1" type="button" class="btn btn-primary" value="Guardar Archivo">
                                                                                <input id="input-1" type="button" class="btn btn-primary" value="Registro de Archivos">
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
                                                                                    <button id="edit" class="btn btn-primary btn-xs m-l-sm" onclick="edit1()" type="button">Edit</button>
                                                                                    <button id="save" class="btn btn-primary  btn-xs" onclick="save1()" type="button">Save</button>
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
                                                                                <div class="ibox-content no-padding">

                                                                                    <div class="click1edit wrapper p-md">

                                                                                        Escriba aqui su comentario...

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="ibox float-e-margins">
                                                                                <div class="ibox-title">
                                                                                    <h5>Asesor 1</h5>
                                                                                    <button id="edit" class="btn btn-primary btn-xs m-l-sm" onclick="edit2()" type="button">Edit</button>
                                                                                    <button id="save" class="btn btn-primary  btn-xs" onclick="save2()" type="button">Save</button>
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
                                                                                <div class="ibox-content no-padding">

                                                                                    <div class="click2edit wrapper p-md">

                                                                                        Escriba aqui su comentario...

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="ibox float-e-margins">
                                                                                <div class="ibox-title">
                                                                                    <h5>Asesor 2</h5>
                                                                                    <button id="edit" class="btn btn-primary btn-xs m-l-sm" onclick="edit3()" type="button">Edit</button>
                                                                                    <button id="save" class="btn btn-primary  btn-xs" onclick="save3()" type="button">Save</button>
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
                                                                                <div class="ibox-content no-padding">

                                                                                    <div class="click3edit wrapper p-md">

                                                                                        Escriba aqui su comentario...

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">

                                                                            <div class="col-lg-3 col-lg-offset-9">
                                                                                <div class="form-group">

                                                                                    <input id="input-1" type="button" class="btn btn-primary" value="Guardar Comentario">
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


                                                                    <select class="form-control m-b" name="account">
                                                                        <option>Aprobada</option>
                                                                        <option>Aprobada con Observaciones</option>
                                                                        <option>No Aprobada</option>    
                                                                        <option>En ejecución</option>  
                                                                    </select> 

                                                                </div>
                                                            </div>  
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="col-lg-2 col-lg-offset-9">
                                                                <div class="form-group">
                                                                    <input id="input-1" type="button" class="btn btn-primary" value="Guardar Cambios">
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
                                                    <div class="ibox-title">
                                                        <h5>Etapa #3. Entrega Final</h5>
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
                                                                                <input id="input-1" type="file" class="file">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Director TFG</label>
                                                                                <input id="input-1" type="file" class="file">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        <div class="col-lg-5 col-lg-offset-1">

                                                                            <div class="form-group">
                                                                                <label class="control-label">Asesor 2</label>
                                                                                <input id="input-1" type="file" class="file">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label">Asesor 1</label>
                                                                                <input id="input-1" type="file" class="file">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="col-lg-offset-8">
                                                                            <div class="form-group">
                                                                                <input id="input-1" type="button" class="btn btn-primary" value="Guardar Archivo">
                                                                                <input id="input-1" type="button" class="btn btn-primary" value="Registro de Archivos">
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
                                                                                    <button id="edit" class="btn btn-primary btn-xs m-l-sm" onclick="edit1()" type="button">Edit</button>
                                                                                    <button id="save" class="btn btn-primary  btn-xs" onclick="save1()" type="button">Save</button>
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
                                                                                <div class="ibox-content no-padding">

                                                                                    <div class="click1edit wrapper p-md">

                                                                                        Escriba aqui su comentario...

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="ibox float-e-margins">
                                                                                <div class="ibox-title">
                                                                                    <h5>Asesor 1</h5>
                                                                                    <button id="edit" class="btn btn-primary btn-xs m-l-sm" onclick="edit2()" type="button">Edit</button>
                                                                                    <button id="save" class="btn btn-primary  btn-xs" onclick="save2()" type="button">Save</button>
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
                                                                                <div class="ibox-content no-padding">

                                                                                    <div class="click2edit wrapper p-md">

                                                                                        Escriba aqui su comentario...

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="ibox float-e-margins">
                                                                                <div class="ibox-title">
                                                                                    <h5>Asesor 2</h5>
                                                                                    <button id="edit" class="btn btn-primary btn-xs m-l-sm" onclick="edit3()" type="button">Edit</button>
                                                                                    <button id="save" class="btn btn-primary  btn-xs" onclick="save3()" type="button">Save</button>
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
                                                                                <div class="ibox-content no-padding">

                                                                                    <div class="click3edit wrapper p-md">

                                                                                        Escriba aqui su comentario...

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">

                                                                            <div class="col-lg-3 col-lg-offset-9">
                                                                                <div class="form-group">

                                                                                    <input id="input-1" type="button" class="btn btn-primary" value="Guardar Comentario">
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


                                                                    <select class="form-control m-b" name="account">
                                                                        <option>Aprobada</option>
                                                                        <option>Aprobada con Observaciones</option>
                                                                        <option>No Aprobada</option>    
                                                                        <option>En ejecución</option>  
                                                                    </select> 

                                                                </div>
                                                            </div>  
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="col-lg-2 col-lg-offset-9">
                                                                <div class="form-group">
                                                                    <input id="input-1" type="button" class="btn btn-primary" value="Guardar Cambios">
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


                                                <select class="form-control m-b" name="estadoGeneral">
                                                    <option>Activo</option>
                                                    <option>Inactivo</option>
                                                    <option>Finalizado</option>
                                                </select> 

                                            </div>
                                        </div>  
                                    </div>
                                    <div class="row"> 
                                        <div class="col-lg-2 col-lg-offset-6">
                                            <div class="form-group">
                                                <input id="input-1" type="button" class="btn btn-primary" value="Guardar Cambios">
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

            <script src="js/jquery-2.1.1.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
            <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
            <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

            <script src="js/plugins/dataTables/datatables.min.js"></script>

            <!-- Custom and plugin javascript -->
            <script src="js/inspinia.js"></script>
            <script src="js/plugins/pace/pace.min.js"></script>





            <!-- SUMMERNOTE -->
            <script src="js/plugins/summernote/summernote.min.js"></script>

            <!-- Page-Level Scripts -->
            <script>

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


            </script>



    </body>
</html>
