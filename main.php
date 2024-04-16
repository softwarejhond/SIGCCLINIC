<?php
include "conexion.php";
?>
<?
session_set_cookie_params(60 * 60 * 24 * 15); //determinamos el tiempo de la sesion iniciada
//iniciamos la sesion
session_start(); ?>
<?php if (isset($_SESSION['loggedin'])) : ?>
    <?php
    $filtro = htmlspecialchars($_SESSION["username"]);
    $query = mysqli_query($con, "SELECT nombre FROM users WHERE username like '%$filtro%'");
    while ($userLog = mysqli_fetch_array($query)) {
        $pacient = $userLog['nombre'];
    }
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <?php include 'head.php'; ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
        <style>
            th {
                width: 100px;
            }

            #links {
                background-color: #123960;
                text-decoration: none;
            }
        </style>
        <script type="text/javascript" charset="utf8" src="js/dataTables.min.js">
        </script>
    </head>
    <?php include 'nav2.php'; ?>

    <body>
        <section class="home-section mr-3">
            <?php include 'nav.php'; ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">


                    <div class="container">
                        <!--MENSAJES DE ELIMINAR EN CADA TABLA-->
                        <?php include './dashboard/alertEvolucionDelete.php'; ?>
                        <?php include './dashboard/alertHistoryDelete.php'; ?>
                        <?php include './dashboard/alertPatientDelete.php'; ?>
                    </div>
                    </br>

                    </br>
                    <div class="container">
                    <?php include "contadores/contadores.php"; ?>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active links" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pacientes</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link links" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Historias</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link links" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Evoluciones</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <?php include './dashboard/listPatient.php'; ?>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <?php include './dashboard/listHistor.php'; ?>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                <?php include './dashboard/listEvolution.php'; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </br></br>
            <?php include 'footer.php'; ?>
        </section>
        <!-- MENSAJE DE BIENVENIDA TOAST-->

    </body>


<?php else :
?>
    <script LANGUAGE="javascript">
        location.href = "index.php";
    </script>
<?php endif;
?>
<script>
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