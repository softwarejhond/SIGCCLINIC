<?php
require_once "conexion.php";
$sql = mysqli_query($con,"SELECT * FROM patient");
$numero = mysqli_num_rows($sql);

$sqlh = mysqli_query($con,"SELECT * FROM history");
$history = mysqli_num_rows($sqlh);

$sqle = mysqli_query($con,"SELECT * FROM evolution");
$evoluciones = mysqli_num_rows($sqle);
    ?>
<div class="container">
    <div class="row">
        <div class="col col-sm-12 col-md-4 col-lg-4 p-1">
            <div class="card efecto btn-outline-info">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <h1 class="card-text"><i class="fa fa-users"></i> <?php echo $numero?></h1>
                </div>
            </div>
        </div>
        <div class="col col-sm-12 col-md-4 col-lg-4 p-1">
            <div class="card efecto btn-outline-info">
                <div class="card-body">
                    <h5 class="card-title">Historias</h5>
                     <h1 class="card-text"><i class="fa-solid fa-file-medical"></i> <?php echo $history?></h1>
                </div>
            </div>
        </div>
        <div class="col col-sm-12 col-md-4 col-lg-4 p-1">
        <div class="card efecto btn-outline-info">
                <div class="card-body">
                <h5 class="card-title">Evoluciones</h5>
                     <h1 class="card-text"><i class="fa-solid fa-notes-medical"></i> <?php echo $evoluciones?></h1>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<style>
  .efecto{
    background-image: url(images/efectocards.png);
    background-size: cover;
    border-radius: 10px;
  }
</style>