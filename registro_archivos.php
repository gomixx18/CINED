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
        include 'navegacion/nav-lateral.php';
        ?>
    </head>

    <body class="">

        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg">
                <?php require 'navegacion/nav-superior.php' ?>

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Registro de Arhivos </h2>
                    
                    </div>
                </div>  

                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">

                                <div class="ibox-title">
                                    <?php
                                                
                                            $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
                                            if (!$connection) {
                                                    exit("<label class='error'>Error de conexión</label>");
                                            }
                                            $query = mysqli_query($connection, "SELECT * FROM tfgarchivosasesores");
                                            $query1 = mysqli_query($connection, "SELECT ruta,   DATE_FORMAT(fecha, '%d/%m/%Y %H:%m:%s')  as fecha,'no especificado', nom_archivo FROM uned_db.tfgarchivosasesores;");
                                            $data = mysqli_fetch_assoc($query);
                                            $nombreTFG = mysqli_query($connection, "SELECT titulo, codigo FROM tfg where codigo = ".$data['tfg']);
                                            $tfg = mysqli_fetch_assoc($nombreTFG);
                                           
                                    ?>
                                    <h5>Registro de Archivos: <?php echo $tfg['titulo']. " (". $tfg['codigo']. ")" ?></h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php
                                            while ($array = mysqli_fetch_array($query1)){
                                                 
                                                 echo " <div class='file-box'>";
                                                 echo " <div class='file'>";
                                                 echo " <a href='". $array['ruta']. "'>";
                                                 echo "  <span class='corner'></span> ";
                                                 echo " <div class='icon'>
                                                            <i class='fa fa-file'></i>
                                                        </div>";
                                                 echo " <div class='file-name'>". $array['nom_archivo'] ."<br>";
                                                 
                                                 echo "<small>Agregado:" .$array['fecha']. "</small>";
                                                 echo "</div>";
                                                 echo "</a>";
                                                 echo "</div>";
                                                 echo "</div>";
                                             }
                                            ?>
                                            
                                        </div>
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
                    $('.file-box').each(function () {
                        animationHover(this, 'pulse');
                    });
                });
            </script>



    </body>

</html>

