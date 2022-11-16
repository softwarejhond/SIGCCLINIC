<?php
require_once "conexion.php";
$sql = mysqli_query($con,"SELECT * FROM patient");
$numero = mysqli_num_rows($sql);
    ?>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card efecto alert-info">
                <div class="card-body">
                    <h5 class="card-title">Cantidad de Usuarios</h5>
                    <h1 class="card-text"><?php echo $numero?></h1>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card efecto">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card efecto">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
  .efecto{
    background-image: url(images/efectocards.png);
  }
</style>