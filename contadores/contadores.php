<?php
require_once "conexion.php";
$sql = mysqli_query($con,"SELECT * FROM patient");
$numero = mysqli_num_rows($sql);

$sqlMan = mysqli_query($con,"SELECT * FROM patient WHERE genero='Masculino'");
$sqlMAN = mysqli_query($con,"SELECT * FROM patient WHERE genero='MASCULINO'");
$numeroMan = mysqli_num_rows($sqlMan);
$numeroMAN = mysqli_num_rows($sqlMAN);
$totalMan=$numeroMan+$numeroMAN;
$sqlFemale = mysqli_query($con,"SELECT * FROM patient WHERE genero='Femenino'");
$numeroFemale = mysqli_num_rows($sqlFemale);
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
                    <h5 class="card-title">Espacio en construcción</h5>
                     <h1 class="card-text"><i class="fa fa-construction"></i> 0</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
        <div class="card efecto alert-info">
                <div class="card-body">
                    <h5 class="card-title">Espacio en construcción</h5>
                     <h1 class="card-text"><i class="fa fa-construction"></i> 0</h1>
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