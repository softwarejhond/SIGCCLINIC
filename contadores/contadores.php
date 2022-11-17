<?php
require_once "conexion.php";
$sql = mysqli_query($con,"SELECT * FROM patient");
$numero = mysqli_num_rows($sql);

$sqlMan = mysqli_query($con,"SELECT * FROM patient WHERE genero='Masculino'");
$numeroMan = mysqli_num_rows($sqlMan);
    ?>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card efecto alert-info">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <h1 class="card-text"><i class="fa fa-users"></i> <?php echo $numero?></h1>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card efecto alert-info">
                <div class="card-body">
                    <h5 class="card-title">Hombres</h5>
                     <h1 class="card-text"><i class="fa fa-male"></i> <?php echo $numeroMan?></h1>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card efecto alert-info">
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
<style>
  .efecto{
    background-image: url(images/efectocards.png);
    background-size: cover;
    border-radius: 30px;
  }
</style>