<?php
include "conexion.php";
?>
<?
session_set_cookie_params(60*60*24*15); //determinamos el tiempo de la sesion iniciada
//iniciamos la sesion
session_start();?>
<?php if (isset($_SESSION['loggedin'])): ?>
<?php
$filtro = htmlspecialchars($_SESSION["username"]);
$query = mysqli_query($con,"SELECT nombre FROM users WHERE username like '%$filtro%'");
while ($userLog = mysqli_fetch_array($query)) {
 $pacient=$userLog['nombre'];
 }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'head.php';?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <style>
    th {
        width: 100px;
    }
    </style>
    <script type="text/javascript" charset="utf8" src="js/dataTables.min.js">
    </script>
</head>
<?php include 'nav2.php';?>

<body>
    <section class="home-section mr-3">
        <?php include 'nav.php';?>
        <h4 id="datos"></h4>
        <div class="container-fluid rounded">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 px-2 mt-1">
                    <div class="card">
                      
                        <div class="container">
                            <!--MENSAJES DE ELIMINAR EN CADA TABLA-->
                            <?php include './dashboard/alertEvolucionDelete.php';?>
                            <?php include './dashboard/alertHistoryDelete.php';?>
                            <?php include './dashboard/alertPatientDelete.php';?>
                        </div>
                        </br>

                        <?php //muy importante
                         include "contadores/contadores.php";?>
                        </br>
                        <div class="container">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Pacientes</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Historias</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                        aria-controls="contact" aria-selected="false">Evoluciones</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <?php include './dashboard/listPatient.php';?>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <?php include './dashboard/listHistor.php';?>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                    <?php include './dashboard/listEvolution.php';?></div>
                            </div>
                        </div>
                        </br>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 px-2 mt-1">
                <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php  include("txtBanner.php");
                        ?>
                    </div>
                    <div class="card">
                        <?php include 'reloj.php';?>
                    </div>
                    </br>
                    <div class="card">
                        <?php include 'calendar.php';?>
                    </div>
                </div>
            </div>
            </br></br>
        </div>
        <?php include 'footer.php';?>
    </section>
    <!-- MENSAJE DE BIENVENIDA TOAST-->

</body>

<!-- Codigo para exportar tablas a excel -->
<script type="text/javascript">
var tableToExcel = (function() {
    var uri = 'data:application/vnd.ms-excel;base64,',
        template =
        '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
        base64 = function(s) {
            return window.btoa(unescape(encodeURIComponent(s)))
        },
        format = function(s, c) {
            return s.replace(/{(\w+)}/g, function(m, p) {
                return c[p];
            })
        }
    return function(table, name) {
        if (!table.nodeType) table = document.getElementById(table)
        var ctx = {
            worksheet: name || 'Worksheet',
            table: table.innerHTML
        }
        window.location.href = uri + base64(format(template, ctx))
    }
})()
</script>

<?php else:
?>
<script LANGUAGE="javascript">
location.href = "index.php";
</script>
<?php endif;
?>
<script>
1
2
3
$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>

<script>
$(document).ready(function() {
    $('table.display').DataTable();
});
</script>

</html>