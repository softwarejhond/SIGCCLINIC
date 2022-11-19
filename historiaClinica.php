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
                <div class="col-lg-9 col-md-12 col-sm-12 px-2 mt-1">
                    <div class="card">
                    
                        <div class="col col-md-12 md">

                            <div class="card-body">
                                <h2>Historia Clínica &raquo; Pacientes</h2>
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
			if(isset($_POST['addHistory'])){
                $codigo = mysqli_real_escape_string($con,(strip_tags($_POST["codigo"],ENT_QUOTES)));//Escanpando caracteres 
                $numeroIdentificacion = mysqli_real_escape_string($con,(strip_tags($_POST["numeroIdentificacion"],ENT_QUOTES)));//Escanpando caracteres 
                $quirurgicos = mysqli_real_escape_string($con,(strip_tags($_POST["quirurgicos"],ENT_QUOTES)));//Escanpando caracteres 
                $traumaticos = mysqli_real_escape_string($con,(strip_tags($_POST["traumaticos"],ENT_QUOTES)));//Escanpando caracteres 
                $ginecobstetricos = mysqli_real_escape_string($con,(strip_tags($_POST["ginecobstetricos"],ENT_QUOTES)));//Escanpando caracteres 
                $patologicos = mysqli_real_escape_string($con,(strip_tags($_POST["patologicos"],ENT_QUOTES)));//Escanpando caracteres 
                $alergicos = mysqli_real_escape_string($con,(strip_tags($_POST["alergicos"],ENT_QUOTES)));//Escanpando caracteres 
                $terapeuticos = mysqli_real_escape_string($con,(strip_tags($_POST["terapeuticos"],ENT_QUOTES)));//Escanpando caracteres 
                $farmacologicos = mysqli_real_escape_string($con,(strip_tags($_POST["farmacologicos"],ENT_QUOTES)));//Escanpando caracteres 
                $actividad_deportiva = mysqli_real_escape_string($con,(strip_tags($_POST["actividad_deportiva"],ENT_QUOTES)));//Escanpando caracteres 
                $familiares = mysqli_real_escape_string($con,(strip_tags($_POST["familiares"],ENT_QUOTES)));//Escanpando caracteres 
                $diagonosticoclinico = mysqli_real_escape_string($con,(strip_tags($_POST["diagonosticoclinico"],ENT_QUOTES)));//Escanpando caracteres 
                $tensionArterial = mysqli_real_escape_string($con,(strip_tags($_POST["tensionArterial"],ENT_QUOTES)));//Escanpando caracteres 
                $frecuenciaCardiaca = mysqli_real_escape_string($con,(strip_tags($_POST["frecuenciaCardiaca"],ENT_QUOTES)));//Escanpando caracteres 
                $frecuenciaRespiratoria = mysqli_real_escape_string($con,(strip_tags($_POST["frecuenciaRespiratoria"],ENT_QUOTES)));//Escanpando caracteres 
                $torno = mysqli_real_escape_string($con,(strip_tags($_POST["torno"],ENT_QUOTES)));//Escanpando caracteres 
                $tonel = mysqli_real_escape_string($con,(strip_tags($_POST["tonel"],ENT_QUOTES)));//Escanpando caracteres 
                $excavatum = mysqli_real_escape_string($con,(strip_tags($_POST["excavatum"],ENT_QUOTES)));//Escanpando caracteres 
                $quilla = mysqli_real_escape_string($con,(strip_tags($_POST["quilla"],ENT_QUOTES)));//Escanpando caracteres 
                $toraxSimetrico = mysqli_real_escape_string($con,(strip_tags($_POST["toraxSimetrico"],ENT_QUOTES)));//Escanpando caracteres 
                $toraxAsimetrico = mysqli_real_escape_string($con,(strip_tags($_POST["toraxAsimetrico"],ENT_QUOTES)));//Escanpando caracteres 
                $dificultadRespiratoria = mysqli_real_escape_string($con,(strip_tags($_POST["dificultadRespiratoria"],ENT_QUOTES)));//Escanpando caracteres 
                $inspeccionObservacion = mysqli_real_escape_string($con,(strip_tags($_POST["inspeccionObservacion"],ENT_QUOTES)));//Escanpando caracteres 
                $estadoPiel = mysqli_real_escape_string($con,(strip_tags($_POST["estadoPiel"],ENT_QUOTES)));//Escanpando caracteres 
                $lenguaje = mysqli_real_escape_string($con,(strip_tags($_POST["lenguaje"],ENT_QUOTES)));//Escanpando caracteres 
                $edema = mysqli_real_escape_string($con,(strip_tags($_POST["edema"],ENT_QUOTES)));//Escanpando caracteres 
                $palpacion = mysqli_real_escape_string($con,(strip_tags($_POST["palpacion"],ENT_QUOTES)));//Escanpando caracteres 
                $observaciones = mysqli_real_escape_string($con,(strip_tags($_POST["observaciones"],ENT_QUOTES)));//Escanpando caracteres 
                $superficial = mysqli_real_escape_string($con,(strip_tags($_POST["superficial"],ENT_QUOTES)));//Escanpando caracteres 
                $profunda = mysqli_real_escape_string($con,(strip_tags($_POST["profunda"],ENT_QUOTES)));//Escanpando caracteres 
                $dolorMovimiento = mysqli_real_escape_string($con,(strip_tags($_POST["dolorMovimiento"],ENT_QUOTES)));//Escanpando caracteres 
                $pruebaSemiologica = mysqli_real_escape_string($con,(strip_tags($_POST["pruebaSemiologica"],ENT_QUOTES)));//Escanpando caracteres 
                $reaccionesAsociadas = mysqli_real_escape_string($con,(strip_tags($_POST["reaccionesAsociadas"],ENT_QUOTES)));//Escanpando caracteres 
                $sinergias = mysqli_real_escape_string($con,(strip_tags($_POST["sinergias"],ENT_QUOTES)));//Escanpando caracteres 
                $controlPostural = mysqli_real_escape_string($con,(strip_tags($_POST["controlPostural"],ENT_QUOTES)));//Escanpando caracteres 
                $tonoMuscular = mysqli_real_escape_string($con,(strip_tags($_POST["tonoMuscular"],ENT_QUOTES)));//Escanpando caracteres 
                $observacion = mysqli_real_escape_string($con,(strip_tags($_POST["observacion"],ENT_QUOTES)));//Escanpando caracteres 
                $manipulacionPasiva = mysqli_real_escape_string($con,(strip_tags($_POST["manipulacionPasiva"],ENT_QUOTES)));//Escanpando caracteres 
                $palpacionMovilidad = mysqli_real_escape_string($con,(strip_tags($_POST["palpacionMovilidad"],ENT_QUOTES)));//Escanpando caracteres 
                $retraccionesMusculares = mysqli_real_escape_string($con,(strip_tags($_POST["retraccionesMusculares"],ENT_QUOTES)));//Escanpando caracteres 
                $examenMuscular = mysqli_real_escape_string($con,(strip_tags($_POST["examenMuscular"],ENT_QUOTES)));//Escanpando caracteres 
                $trofismoMuscular = mysqli_real_escape_string($con,(strip_tags($_POST["trofismoMuscular"],ENT_QUOTES)));//Escanpando caracteres 
                $medidasReales = mysqli_real_escape_string($con,(strip_tags($_POST["medidasReales"],ENT_QUOTES)));//Escanpando caracteres 
                $medidasAparentes = mysqli_real_escape_string($con,(strip_tags($_POST["medidasAparentes"],ENT_QUOTES)));//Escanpando caracteres 
                $reflejosOsteotendinosos = mysqli_real_escape_string($con,(strip_tags($_POST["reflejosOsteotendinosos"],ENT_QUOTES)));//Escanpando caracteres 
                $reflejosPatologicos = mysqli_real_escape_string($con,(strip_tags($_POST["reflejosPatologicos"],ENT_QUOTES)));//Escanpando caracteres 
                $oculo_manual = mysqli_real_escape_string($con,(strip_tags($_POST["oculo_manual"],ENT_QUOTES)));//Escanpando caracteres 
                $oculo_pedica = mysqli_real_escape_string($con,(strip_tags($_POST["oculo_pedica"],ENT_QUOTES)));//Escanpando caracteres 
                $motricidad_fina = mysqli_real_escape_string($con,(strip_tags($_POST["motricidad_fina"],ENT_QUOTES)));//Escanpando caracteres 
                $motricidad_gruesa = mysqli_real_escape_string($con,(strip_tags($_POST["motricidad_gruesa"],ENT_QUOTES)));//Escanpando caracteres 
                $marcha = mysqli_real_escape_string($con,(strip_tags($_POST["marcha"],ENT_QUOTES)));//Escanpando caracteres 
                $ayudas_externas = mysqli_real_escape_string($con,(strip_tags($_POST["ayudas_externas"],ENT_QUOTES)));//Escanpando caracteres 
                $anterior = mysqli_real_escape_string($con,(strip_tags($_POST["anterior"],ENT_QUOTES)));//Escanpando caracteres 
                $posterior = mysqli_real_escape_string($con,(strip_tags($_POST["posterior"],ENT_QUOTES)));//Escanpando caracteres 
                $lateral = mysqli_real_escape_string($con,(strip_tags($_POST["lateral"],ENT_QUOTES)));//Escanpando caracteres 
                $equilibrio = mysqli_real_escape_string($con,(strip_tags($_POST["equilibrio"],ENT_QUOTES)));//Escanpando caracteres 
                $actividadesBasicas = mysqli_real_escape_string($con,(strip_tags($_POST["actividadesBasicas"],ENT_QUOTES)));//Escanpando caracteres 
                $actividadesVidaDiaria = mysqli_real_escape_string($con,(strip_tags($_POST["actividadesVidaDiaria"],ENT_QUOTES)));//Escanpando caracteres 
                $otrasObservaciones = mysqli_real_escape_string($con,(strip_tags($_POST["otrasObservaciones"],ENT_QUOTES)));//Escanpando caracteres 
                $diagnosticoFisioterapeutico = mysqli_real_escape_string($con,(strip_tags($_POST["diagnosticoFisioterapeutico"],ENT_QUOTES)));//Escanpando caracteres 
                $ayudasDiagnosticas = mysqli_real_escape_string($con,(strip_tags($_POST["ayudasDiagnosticas"],ENT_QUOTES)));//Escanpando caracteres 
                $remisionServicio = mysqli_real_escape_string($con,(strip_tags($_POST["remisionServicio"],ENT_QUOTES)));//Escanpando caracteres 
                $listaServicios = mysqli_real_escape_string($con,(strip_tags($_POST["listaServicios"],ENT_QUOTES)));//Escanpando caracteres 
                $observaciones_muscular = mysqli_real_escape_string($con,(strip_tags($_POST["observaciones_muscular"],ENT_QUOTES)));//Escanpando caracteres 
                $doctorCreator = mysqli_real_escape_string($con,(strip_tags($_POST["identificacionDoctor"],ENT_QUOTES)));//Escanpando caracteres 
                $dataTime = date("Y-m-d H:i:s");
        
						$insert = mysqli_query($con, "INSERT INTO history ( 
                        codigo,
                        numeroIdentificacion, 
                        quirurgicos, 
                        traumaticos,
                        ginecobstetricos, 
                        patologicos,
                        alergicos, 
                        terapeuticos, 
                        farmacologicos,
                        actividad_deportiva,
                        familiares,
                        diagnostico_clinico, 
                        tensionArterial, 
                        frecuenciaCardiaca, 
                        frecuenciaRespiratoria, 
                        torno,
                        tonel, 
                        excavatum,
                        quilla, 
                        toraxSimetrico,
                        toraxAsimetrico,
                        dificultadRespiratoria, 
                        inspeccionObservacion,
                        estadoPiel, 
                        lenguaje, 
                        edema, 
                        palpacion,
                        observaciones, 
                        superficial, 
                        profunda,
                        dolorMovimiento, 
                        pruebaSemiologica,
                        reaccionesAsociadas, 
                        sinergias, 
                        controlPostural, 
                        tonoMuscular, 
                        observacion,
                        manipulacionPasiva, 
                        palpacionMovilidad,
                        retraccionesMusculares, 
                        examenMuscular,
                        trofismoMuscular,
                        medidasReales, 
                        medidasAparentes, 
                        reflejosOsteotendinosos, 
                        reflejosPatologicos, 
                        oculo_manual, 
                        oculo_pedica,
                        motricidad_fina, 
                        motricidad_gruesa, 
                        marcha,
                        ayudas_externas, 
                        anterior,
                        posterior, 
                        lateral, 
                        equilibrio, 
                        actividadesBasicas, 
                        actividadesVidaDiaria, 
                        otrasObservaciones,
                        diagnosticoFisioterapeutico, 
                        ayudasDiagnosticas,
                        remisionServicio, 
                        listaServicios,
                        observaciones_muscular,
                        doctorCreator,
                        fechaCreacion) VALUES (
                        '$codigo',
                        '$numeroIdentificacion',
                        '$quirurgicos',
                        '$traumaticos',
                        '$ginecobstetricos',
                        '$patologicos',
                        '$alergicos',
                        '$terapeuticos',
                        '$farmacologicos',
                        '$actividad_deportiva',
                        '$familiares',
                        '$diagonosticoclinico',
                        '$tensionArterial',
                        '$frecuenciaCardiaca',
                        '$frecuenciaRespiratoria',
                        '$torno',
                        '$tonel',
                        '$excavatum',
                        '$quilla',
                        '$toraxSimetrico',
                        '$toraxAsimetrico',
                        '$dificultadRespiratoria',
                        '$inspeccionObservacion',
                        '$estadoPiel',
                        '$lenguaje',
                        '$edema',
                        '$palpacion',
                        '$observaciones',
                        '$superficial',
                        '$profunda',
                        '$dolorMovimiento',
                        '$pruebaSemiologica',
                        '$reaccionesAsociadas',
                        '$sinergias',
                        '$controlPostural',
                        '$tonoMuscular',
                        '$observacion',
                        '$manipulacionPasiva',
                        '$palpacionMovilidad',
                        '$retraccionesMusculares',
                        '$examenMuscular',
                        '$trofismoMuscular',
                        '$medidasReales',
                        '$medidasAparentes',
                        '$reflejosOsteotendinosos',
                        '$reflejosPatologicos',
                        '$oculo_manual',
                        '$oculo_pedica',
                        '$motricidad_fina',
                        '$motricidad_gruesa',
                        '$marcha',
                        '$ayudas_externas',
                        '$anterior',
                        '$posterior',
                        '$lateral',
                        '$equilibrio',
                        '$actividadesBasicas',
                        '$actividadesVidaDiaria',
                        '$otrasObservaciones',
                        '$diagnosticoFisioterapeutico',
                        '$ayudasDiagnosticas',
                        '$remisionServicio',
                        '$listaServicios',
                        '$observaciones_muscular',
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
                                                href="#nav-anamnesis" role="tab" aria-controls="nav-home"
                                                aria-selected="true">ANAMNESIS</a>
                                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab"
                                                href="#nav-antecedentes" role="tab" aria-controls="nav-profile"
                                                aria-selected="false">ANTECEDENTES PERSONALES</a>
                                            <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-1"
                                                role="tab" aria-controls="nav-contact"
                                                aria-selected="false">EVA.FISIOTERAPÉUTICA - 1</a>
                                            <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-2"
                                                role="tab" aria-controls="nav-contact"
                                                aria-selected="false">EVA.FISIOTERAPÉUTICA - 2</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-anamnesis" role="tabpanel"
                                            aria-labelledby="nav-anamnesis-tab">
                                            <?php include('./historiaClinica/infoUser.php');?></div>
                                        <div class="tab-pane fade" id="nav-antecedentes" role="tabpanel"
                                            aria-labelledby="nav-antecedentes-tab">
                                            <?php include('./historiaClinica/antecedentes.php');?></div>
                                        <div class="tab-pane fade" id="nav-1" role="tabpanel"
                                            aria-labelledby="nav-1-tab">
                                            <?php include('./historiaClinica/evaluacionFisioterapeutaUno.php');?></div>
                                        <div class="tab-pane fade" id="nav-2" role="tabpanel"
                                            aria-labelledby="nav-2-tab">
                                            <?php include('./historiaClinica/evaluacionFisioterapeutaDos.php');?></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="addHistory" class="btn btn-outline-success"
                                            value="Registrar historia" require>
                                        <input type="reset" class="btn btn-outline-danger" value="Cancelar">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 px-2 mt-1">
                <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php  include("txtBanner.php");
                        ?>
                    </div>
                    <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php include('reloj.php');?>
                    </div>
                    <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php include('calendar.php');?>
                    </div>
                  

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