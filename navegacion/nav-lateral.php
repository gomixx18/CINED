
<?php
include 'clases/UsuarioSimple.php';
include 'clases/UsuarioComplejo.php';
include 'clases/UsuarioPermisos.php';
include 'clases/UsuarioInvestigadorSimple.php';
include 'clases/UsuarioInvestigadorComplejo.php';
@session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
$usuarioSesion = $_SESSION["user"];
$usuarioPermisos = $_SESSION['permisos'];
?>
<head>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
</head>
<nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element"> <span>
                                    <img alt="image" class="center-block" src="img/uned_logo.png" style="height: 75px; width: 75px">
                                </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="clear"> 
                                        <span class="block m-t-xs"> <strong class="font-bold">
                                            <?php
                                                echo $usuarioSesion->getNombre() . " " . $usuarioSesion->getApellido1();
                                            ?>
                                            </strong>
                                        </span> <span class="text-muted text-xs block">Usuario <b class="caret"></b></span> </span> </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a href="profile.html">Perfil</a></li>
                                    
                                    <li class="divider"></li>
                                    <li><a href="login.html">Cerrar Sesión</a></li>
                                </ul>
                            </div>
                            <div class="logo-element">
                                CINED
                            </div>
                        </li>
                        <li>
                              <?php if($usuarioPermisos->getEncargadotfg() || $usuarioPermisos->getCoordinadorinvestigacion() || $usuarioPermisos->getEstudiante()||
                                             $usuarioPermisos->getDirectortfg()|| $usuarioPermisos->getAsesortfg() || $usuarioPermisos->getMiembrocomisiontfg()){ ?>
                            <a href="index.php"><i class="fa fa-fw fa-book"></i> <span class="nav-label">TFG</span> <span class="fa arrow"></span></a>
                            <ul id="tfg_principal" class="nav nav-second-level collapse">
                                 <?php if($usuarioPermisos->getEncargadotfg() || $usuarioPermisos->getCoordinadorinvestigacion()){?>
                                <li>
                                  
                                    <a href="javascript:;" data-toggle="collapse" data-target="#tfg_admin"> Administración de Usuarios<i class="fa fa-fw fa-caret-down"></i></a>                                  
                                    <ul id="tfg_admin" class="nav nav-third-level collapse">
                                        <li>
                                            <a href="admin_estudiante.php">Estudiantes</a>
                                        </li>
                                        <li>
                                            <a href="admin_directores.php">Directores de TFG</a>
                                        </li>
                                        <li>
                                            <a href="admin_encargados.php">Encargados de TFG</a>
                                        </li>
                                        <li>
                                            <a href="admin_asesores.php">Asesores</a>
                                        </li>
                                        <li>
                                            <a href="admin_comisionTFG.php">Miembros de Comisión de TFG</a>
                                        </li>
                                    </ul>
                                            
                                </li>
                                 <?php }?>
                               
                                <?php if($usuarioPermisos->getEncargadotfg() || $usuarioPermisos->getCoordinadorinvestigacion() || $usuarioPermisos->getEstudiante() ||
                                        $usuarioPermisos->getAsesortfg()|| $usuarioPermisos->getDirectortfg()||$usuarioPermisos->getMiembrocomisiontfg()){ ?>     
                                <li>
                                    <a href="admin_TFG.php">Administración de TFG</a>
                                </li>
                                <?php } ?>
                                <?php if($usuarioPermisos->getEncargadotfg() || $usuarioPermisos->getCoordinadorinvestigacion()) {?>
                                <li>
                                    <a href="admin_Modalidad.php" > Modalidades </a>

                                </li>
                                <?php }?>
                            </ul>
                             
                            <?php } ?>
                        <li>
                            <?php if($usuarioPermisos->getCoordinadorinvestigacion() || $usuarioPermisos->getInvestigador()||
                                             $usuarioPermisos->getEvaluador()|| $usuarioPermisos->getMiembrocomiex()){ ?>
                            <a href="index.html"><i class="fa fa-fw fa-book"></i> <span class="nav-label">Proyectos de Investigación</span> <span class="fa arrow"></span></a>
                            <ul id="inv_principal" class="nav nav-second-level collapse">
                                <li>
                                    <?php if($usuarioPermisos->getCoordinadorinvestigacion()){ ?>
                                    <a href="javascript:;" data-toggle="collapse" data-target="#inv_admin"> Administración de Usuarios<i class="fa fa-fw fa-caret-down"></i></a>                                  
                                    <ul id="inv_admin" class="nav nav-third-level collapse">
                                        <li>
                                            <a href="admin_investigador.php">Investigador</a>
                                        </li>
                                        <li>
                                            <a href="admin_coordinadorInv.php">Coordinador de Investigación</a>
                                        </li>

                                        <li>
                                            <a href="admin_evaluador.php">Evaluadores</a>
                                        </li>
                                        <li>
                                            <a href="admin_MiembroComiex.php">Miembros de COMIEX</a>
                                        </li>

                                    </ul>
                                    <?php } ?>
                                </li>
                                
                                <li>
                                    <a href="admin_Investigacion.php">Administración de Proyectos de Investigación</a>
                                </li>

                            </ul>
                            <?php }?>
                        </li>
                        <li>
                               <?php if($usuarioPermisos->getCoordinadorinvestigacion() || $usuarioPermisos->getInvestigador()||
                                             $usuarioPermisos->getEvaluador()|| $usuarioPermisos->getMiembrocomiex()){ ?>
                            <a href="index.html"><i class="fa fa-fw fa-book"></i> <span class="nav-label">Proyectos de Extensión</span> <span class="fa arrow"></span></a>
                            <ul id="ext_principal" class="nav nav-second-level collapse">
                                <li>
                                     <?php if($usuarioPermisos->getCoordinadorinvestigacion()){ ?>
                                    <a href="javascript:;" data-toggle="collapse" data-target="#ext_admin"> Administración de Usuarios<i class="fa fa-fw fa-caret-down"></i></a>                                  
                                    <ul id="ext_admin" class="nav nav-third-level collapse">
                                        <li>
                                            <a href="admin_investigador.php">Investigador</a>
                                        </li>
                                        <li>
                                            <a href="admin_coordinadorInv.php">Coordinador de Investigación</a>
                                        </li>

                                        <li>
                                            <a href="admin_evaluador.php">Evaluadores</a>
                                        </li>
                                        <li>
                                            <a href="admin_MiembroComiex.php">Miembros de COMIEX</a>
                                        </li>

                                    </ul>
                                     <?php }?>
                                </li>
                                <li>
                                    <a href="admin_Extension.php">Administración de Proyectos de Extensión</a>
                                </li>
                            </ul>
                             <?php } ?>
                        </li>
                        <li>
                            <?php if($usuarioPermisos->getCoordinadorinvestigacion()){ ?>
                            <a href="index.html"><i class="fa fa-fw fa-list"></i> <span class="nav-label">General</span> <span class="fa arrow"></span></a>
                            <ul id="ext_principal" class="nav nav-second-level collapse">
                                <li>
                                    <a href="admin_LineasInvestigacion.php">Administrar Líneas de Investigación </a>
                                </li>
                                <li>
                                  
                                    <a href="admin_Carreras.php">Administrar Carreras </a>
                                </li>
                                 <li>
                                    <a href="admin_Catedras.php">Administrar Catedras</a>
                                </li>
                                
                            </ul>
                            <?php } ?>
                        </li>
                        <li>
                           <?php if($usuarioPermisos->getEncargadotfg() || $usuarioPermisos->getCoordinadorinvestigacion() || $usuarioPermisos->getMiembrocomiex()||
                               $usuarioPermisos->getDirectortfg()|| $usuarioPermisos->getAsesortfg() || $usuarioPermisos->getMiembrocomisiontfg()|| $usuarioPermisos->getEvaluador()) {?>
                            <a href="index.html"><i class="fa fa-fw fa-list-alt"></i> <span class="nav-label">Reportes</span> <span class="fa arrow"></span></a>
                           <ul id="reportes" class="nav nav-second-level collapse">
                                <li>
                                    <a href="ReportesTFG.php">TFG</a>
                                </li>
                                <li>
                                    <a href="ReportesInvestigacion.php">Proyectos de Investigación</a>
                                </li>
                                <li>
                                    <a href="ReportesExtension.php">Proyectos de Extensión</a>
                                </li>
                            </ul>
                            <?php } ?>
                        </li>
                        </div>
                        </nav>

