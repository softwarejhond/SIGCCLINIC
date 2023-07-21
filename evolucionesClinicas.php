<?php
// Initialize the session
session_start();
    // Establecer tiempo de vida de la sesión en segundos
    $inactividad = 86400;
    // Comprobar si $_SESSION["timeout"] está establecida
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            header("location: main.php");
            exit;
        }
    }
    // El siguiente key se crea cuando se inicia sesión
    $_SESSION["timeout"] = time();
// Include config file
require_once "conexion.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php
include("head.php");
?>
</head>
<?php include("nav2.php");?>

<body>
    <section class="home-section">
        <?php include('nav.php');?>
        <div class="container-fluid rounded">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                    <div class="card">

                        <div class="col col-md-12 md">

                            <div class="card-body">
                                <h2>Evoluciones Clínicas &raquo; Pacientes</h2>
                                <?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
			
			$sql = mysqli_query($con, "SELECT * FROM patient WHERE numeroIdentificacion='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
                                <?php
			if(isset($_POST['addEvolution'])){
                $codigo = mysqli_real_escape_string($con,(strip_tags($_POST["codigo"],ENT_QUOTES)));//Escanpando caracteres 
                $numeroIdentificacion = mysqli_real_escape_string($con,(strip_tags($_POST["numeroIdentificacion"],ENT_QUOTES)));//Escanpando caracteres 
                $descripcion = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion"],ENT_QUOTES)));//Escanpando caracteres 
                $doctorCreator = mysqli_real_escape_string($con,(strip_tags($_POST["identificacionDoctor"],ENT_QUOTES)));//Escanpando caracteres 
                $dataTime = date("Y-m-d H:i:s");
        
						$insert = mysqli_query($con, "INSERT INTO evolution ( 
                        codigo,
                        numeroIdentificacion, 
                        descripcion, 
                        doctorCreator,
                        fechaCreacion) VALUES (
                        '$codigo',
                        '$numeroIdentificacion',
                        '$descripcion',
                        '$doctorCreator',
                        '$dataTime')");

						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
					
			}
			?>
                                <form class="form-horizontal was-validated" action="" method="post">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-link active" id="nav-home-tab" data-toggle="tab"
                                                href="#nav-paciente" role="tab" aria-controls="nav-home"
                                                aria-selected="true">Información paciente</a>
                                            <a class="nav-link" id="nav-home-tab" data-toggle="tab"
                                                href="#nav-evolution" role="tab" aria-controls="nav-home"
                                                aria-selected="true">Evolución nueva</a>

                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-paciente" role="tabpanel"
                                            aria-labelledby="nav-paciente-tab">
                                            <?php include('./evolutions/infoUserEvolution.php');?>
                                        </div>

                                        <div class="tab-pane fade show" id="nav-evolution" role="tabpanel"
                                            aria-labelledby="nav-evolution-tab">
                                            <?php include('./evolutions/evolucionNew.php');?>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="addEvolution" class="btn btn-outline-success"
                                                value="Registrar evolución" require>
                                            <input type="reset" class="btn btn-outline-danger" value="Cancelar">
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>

        </div>
        </div>
        </div>
        <footer class="footer">
            <?php include('footer.php');?>
        </footer>
    </section>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>