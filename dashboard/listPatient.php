<div class="card text-center">
    <div class="card-header" style="background-image:url(images/footer.png); color:#fff">
        <i class="fas fa-user-injured"></i> LISTA DE PACIENTES <i class="fas fa-user-injured"></i>
    </div>
    <div class="card-body">

        <ul class="list-group">
            <li class="list-group-item">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">Curso</label>
                            <input required name="PalabraClave" type="text" class="form-control mb-2"
                                id="inlineFormInput" placeholder="Ingrese palabra clave">
                            <input name="buscar" type="hidden" class="form-control mb-2" id="inlineFormInput" value="v">
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Buscar Ahora</button>
                        </div>
                    </div>
                </form>
            </li>

        </ul>

        <?php
$buscar = $_POST["buscar"];

$buscarpaciente = mysqli_query($con, "SELECT * FROM patient WHERE numeroIdentificacion='$buscar'");
while ($pacienteEncontrado = mysqli_fetch_array($buscarpaciente)) {
 echo '<p class="text-right" style="font-size:12px">'.$pacienteEncontrado['nombre'].'</p>';
 }
?>
    </div>
    <div class="card-footer " style="background-image:url(images/footer.png); color:#fff">
        <i class="fas fa-clock"></i>
        <?php
                                        $DateAndTime = date('m-d-Y h:i:s a', time());
                                        echo "Actualizado $DateAndTime.";
                                    ?>
    </div>

</div>
<script>
$(document).ready(function() {
    $(".toastPatient").toast('show');
});
</script>