<?php include("conexion.php");

$buscardor=mysqli_query($con, "SELECT * FROM patient WHERE numeroIdentificacion LIKE LOWER('%".$_POST["buscar"]."%')"); 
$numero = mysqli_num_rows($buscardor); ?>


<h5 class="card-tittle">Resultados encontrados (<?php echo $numero; ?>):</h5>

<?php while($resultado = mysqli_fetch_assoc($buscardor)){ ?>


<p class="card-text"><?php echo $resultado["numeroIdentificacion"]; ?>
</p>


<?php } ?>