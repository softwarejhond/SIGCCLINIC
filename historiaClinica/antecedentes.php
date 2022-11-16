<? 
session_start(); 
  include "conexion.php";
  ?>
<?php if(isset($_SESSION['loggedin'])):?>
<?php 
    $title ="Dashboard - "; 

    $cantidadAhijados=mysqli_query($con, "select * from investigacion");
?>

<div class="card-body">
    <h4><b>Antecedentes personales</b></h4>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1">
            <div class="form-group">
                <div class="form-group">
                    <label class="bmd-label-floating">Quirúrgicos</label>
                    <textarea type="text" class="form-control" name="quirurgicos"
                        class="form-control" rows="3" cols="10" required="true" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label class="bmd-label-floating">Ginecobstetricos</label>
                    <textarea type="text" class="form-control" name="ginecobstetricos"
                        class="form-control" rows="3" cols="10" required="true" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label class="bmd-label-floating">Alérgicos y tóxicos</label>
                    <textarea type="text" class="form-control" name="alergicos"
                        class="form-control" rows="3" cols="10" required="true" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label class="bmd-label-floating">Farmacológicos</label>
                    <textarea type="text" class="form-control" name="farmacologicos"
                        class="form-control" rows="3" cols="10" required="true" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label class="bmd-label-floating">Familiares</label>
                    <textarea type="text" class="form-control" name="familiares"
                        class="form-control" rows="3" cols="10" required="true" ></textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1">
            <div class="form-group">
                <label class="bmd-label-floating">Traumáticos</label>
                <textarea type="text" class="form-control" name="traumaticos" class="form-control"
                    rows="3" cols="10" required="true" ></textarea>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label class="bmd-label-floating">Patológicos</label>
                    <textarea type="text" class="form-control" name="patologicos"
                        class="form-control" rows="3" cols="10" required="true" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label class="bmd-label-floating">Terapéuticos</label>
                    <textarea type="text" class="form-control" name="terapeuticos"
                        class="form-control" rows="3" cols="10" required="true" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label class="bmd-label-floating">Actividad deportiva</label>
                    <textarea type="text" class="form-control" name="actividad_deportiva"
                        class="form-control" rows="3" cols="10" required="true" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label class="bmd-label-floating">Diagnóstico clínico</label>
                    <textarea type="text" class="form-control" name="diagonosticoclinico"
                        class="form-control" rows="3" cols="10" required="true" ></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<script LANGUAGE="javascript">
location.href = "index.php";
</script>
<?php endif; ?>