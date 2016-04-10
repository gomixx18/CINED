<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reportes de TFG</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery-2.1.1.js"></script>
        <?php
        include 'navegacion/nav-lateral.php';
        ?>
    </head>

    <body class="">
        <script>

            $(function () {
                $("form#reporte").submit(function () {
                   

                    $('*').css('cursor', 'progress');
                    $.ajax({
                        url: "funcionalidad/reportesTFG.php",
                        type: "POST",
                        data: "",
                        dataType: "json",
                        success: function (data) {
                            for (var i in data)
                            {
                                var row = data[i];

                                var id = row[0];
                                var vname = row[1];
                                alert(id);
                            }


                            $('*').css('cursor', 'default');
                        }
                    });
                    return false;
                });
            });</script>
        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg">

                <?php require 'navegacion/nav-superior.php' ?>

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-sm-4">
                        <h1>Reportes - TFG</h1>

                    </div>

                </div>

                <div class="wrapper wrapper-content">

                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div id="ReporteTFG">
                                <form role="form" id="reporte" name="reporte" action="funcionalidad/reportesTFG.php">
                                    <div class="form-group">
                                        <div class="row">

                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4>Filtrar por</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">

                                                <label>
                                                    Carrera
                                                </label>

                                            </div>
                                            <div class="col-md-4">
                                                <select name="carrera" id="carrera" class="form-control">
                                                    <option value="todas">Todas</option>
                                                    <?php
                                                    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
                                                    if (!$connection) {
                                                        exit("<label class='error'>Error de conexión</label>");
                                                    }
                                                    $query = mysqli_query($connection, "SELECT * FROM carreras");
                                                    while ($data = mysqli_fetch_assoc($query)) {
                                                        echo "<option value=" . $data["codigo"] . ">" . $data["nombre"] . "</option>";
                                                    }

                                                    mysqli_close($connection);
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="row">
                                            <div class="col-md-2">


                                                <label >
                                                    Línea de Investigación
                                                </label>


                                            </div>
                                            <div class="col-md-4">
                                                <select name="lineaInvest" id="linea" class="form-control">
                                                    <option value="todas">Todas</option>
                                                    <?php
                                                    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
                                                    if (!$connection) {
                                                        exit("<label class='error'>Error de conexión</label>");
                                                    }
                                                    $query = mysqli_query($connection, "SELECT * FROM lineasinvestigacion");
                                                    while ($data = mysqli_fetch_assoc($query)) {
                                                        echo "<option value=" . $data["codigo"] . ">" . $data["nombre"] . "</option>";
                                                    }

                                                    mysqli_close($connection);
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="row">
                                            <div class="col-md-2">

                                                <label>
                                                    Modalidad
                                                </label>


                                            </div>
                                            <div class="col-md-4">
                                                <select name="modalidad" id="modalidad" class="form-control">
                                                    <option value="todas">Todas</option>
                                                    <?php
                                                    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
                                                    if (!$connection) {
                                                        exit("<label class='error'>Error de conexión</label>");
                                                    }
                                                    $query = mysqli_query($connection, "SELECT * FROM modalidades");
                                                    while ($data = mysqli_fetch_assoc($query)) {
                                                        echo "<option value=" . $data["codigo"] . ">" . $data["nombre"] . "</option>";
                                                    }

                                                    mysqli_close($connection);
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>
                                                    Director
                                                </label>

                                            </div>
                                            <div class="col-md-4">
                                                <select name="director" class="form-control">
                                                    <option></option>
                                                    <?php
                                                    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
                                                    if (!$connection) {
                                                        exit("<label class='error'>Error de conexión</label>");
                                                    }
                                                    $query = mysqli_query($connection, "SELECT * FROM tfgdirectores");
                                                    while ($data = mysqli_fetch_assoc($query)) {
                                                        echo "<option value=" . $data["id"] . ">" . $data["nombre"] . " " . $data["apellido1"] . " " . $data["apellido2"] . "</option>";
                                                    }

                                                    mysqli_close($connection);
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="row">
                                            <div class="col-md-2">

                                                <label>
                                                    Asesores
                                                </label>
                                            </div>

                                            <div class="col-md-4">
                                                <select name="asesor" class="form-control">
                                                    <option></option>
                                                    <?php
                                                    $connection = mysqli_connect("localhost", "root", "cined123", "uned_db");
                                                    if (!$connection) {
                                                        exit("<label class='error'>Error de conexión</label>");
                                                    }
                                                    $query = mysqli_query($connection, "SELECT * FROM tfgasesores");
                                                    while ($data = mysqli_fetch_assoc($query)) {
                                                        echo "<option value=" . $data["id"] . ">" . $data["nombre"] . " " . $data["apellido1"] . " " . $data["apellido2"] . "</option>";
                                                    }

                                                    mysqli_close($connection);
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Código</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control">
                                            </div>
                                        </div>
                                        </br>
                                        <div class="row">
                                            <div class="col-lg-3">

                                            </div>
                                            <div class="col-lg-2">
                                                <button type="submit" class="btn btn-outline btn-success">Generar Reporte</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div>
                        Universidad Nacional  &copy; 2015-2016
                    </div>
                </div>
            </div>
        </div>



        <!-- Mainly scripts -->

        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

        <!-- Custom and plugin javascript -->
        <script src="js/inspinia.js"></script>
        <script src="js/plugins/pace/pace.min.js"></script>


    </body>

</html>


