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
<html lang="en">

<head>
    <?php include('head.php');
    ?>
    <style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 12px;
    }

    th,
    td {
        padding: 5px;
        text-align: left;
    }

    #areaImprimir {
        background-image: url('./images/backPrint.png');
        background-origin: content-box;
        background-size: 100% 50%;
    }
    </style>
</head>
<?php include('nav2.php');?>

<body>
    <section class="home-section">
        <?php include('nav.php');
        ?>
        <div class="container-fluid rounded">
            <div class="row" style="margin-top:5px">
                <div class="col-lg-9 col-md-12 col-sm-12 px-2 mt-1">
                    <div class="card border-info shadow p-3 mb-5 bg-white rounded">
                        <?php //muy importante
                    include("txtBanner.php");?>
                        <div class="card-body">

                            <!--ACTUALIZAR DATOS USUARIO-->
                            <h2>Evolución clínica</h2>
                            <?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
            $code = mysqli_real_escape_string($con,(strip_tags($_GET["code"],ENT_QUOTES)));
            $idDoct = mysqli_real_escape_string($con,(strip_tags($_GET["idDoct"],ENT_QUOTES)));
            $sqlPaciente = mysqli_query($con, "SELECT * FROM patient WHERE numeroIdentificacion='$nik'");//muy importante el CROSS JOIN
			if(mysqli_num_rows($sqlPaciente) == 0){
				header("Location: index.php");
			}else{
				$rowPaciente = mysqli_fetch_assoc($sqlPaciente);
                header("./vistaFirmaHistoria.php?proceso=$nik");
			}

			$sqlHisotria = mysqli_query($con, "SELECT * FROM evolution WHERE numeroIdentificacion='$rowPaciente[numeroIdentificacion]' AND codigo='$code'");
			if(mysqli_num_rows($sqlHisotria) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sqlHisotria);
                $var= $row['doctorCreator'];
			}
			?>       

            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1 border border-dark"
                                    id="areaImprimir">
                                    <div style="text-align: center;">
                                        <?php
                              $queryCompany = mysqli_query($con,"SELECT nombre,nit FROM company");
                              while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                               echo '<p class="text-right" style="font-size:12px">'.$empresaLog[nombre].'</p>';
                               }
                               ?>
                                        <div class="row">
                                            <div class="text-left col-6"><b>Fecha de impresión:</b>
                                                <?php echo date('d-m-Y');?></div>
                                            <div class="text-right col-6"><b>Evolución clínica #:</b>
                                                <?php echo $row['id'];?></div>
                                        </div>

                                        <img src="vistaLogo.php?id=1" alt='Logo' width="200px">
                                        <br>
                                        <?php
                              
                              $queryCompany = mysqli_query($con,"SELECT nombre,nit FROM company");
                              while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                               echo '<h3  class="card-text">'.$empresaLog[nombre].'</h3>';
                               echo '<h4  class="card-text">NIT: '.$empresaLog[nit].'</h4>';
                               }
                               ?>
                                    </div>
                                    <!--separador inicio-->
                                    <hr style="border-color:black;">
                                    <u>
                                        <h3 style="text-align: center;">EVOLUCIÓN CLÍNICA</h3>
                                    </u>
                                    <u>
                                        <h5 style="color: black;">DATOS PERSONALES:</h5>
                                    </u>
                                    <table class="border border-dark" style="width: 100%;border: 1px solid black;"
                                        id="print">
                                        <tr>
                                            <th class="historiaClinica">FECHA Y HORA DE LA VALORACIÓN:</th>
                                            <td class="historiaClinica"><?php echo $row['fechaCreacion'];?></label>
                                            </td>
                                            <th class="historiaClinica">IDENTIFICACIÓN:</th>
                                            <td class="historiaClinica">
                                                <?php echo $rowPaciente['numeroIdentificacion'];?>
                                            </td>
                                            <th class="historiaClinica">NOMBRE Y APELLIDOS:</th>
                                            <td class="historiaClinica">
                                                <?php echo $rowPaciente['nombre'];echo " "; echo $rowPaciente['apellidos'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="historiaClinica">FECHA DE NACIMIENTO:</th>
                                            <td class="historiaClinica">
                                                <?php echo $rowPaciente['fechaNacimiento'];?>
                                            </td>
                                            <th class="historiaClinica">EDAD:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['edad'];?>
                                            </td>
                                            <th class="historiaClinica">SEXO:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['genero'];?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="historiaClinica">ESTADO CIVIL:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['estadoCivil'];?>
                                            </td>
                                            <th class="historiaClinica">OCUPACIÓN:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['ocupacion'];?>
                                            </td>
                                            <th class="historiaClinica">DIRECCIÓN:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['direccion'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="historiaClinica">TELÉFONO:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['telefonoFijo'];?>
                                            </td>
                                            <th class="historiaClinica">CELULAR:</th>
                                            <td class="historiaClinica">
                                                <?php echo $rowPaciente['telefonoCelular'];?>
                                            </td>
                                            <th class="historiaClinica">E-MAIL:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['email'];?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="historiaClinica">EPS:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['eps'];?>
                                            </td>
                                            <th class="historiaClinica">IPS:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['ips'];?>
                                            </td>
                                            <th class="historiaClinica">ESPECIALISTA:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['doctorAsignado'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="historiaClinica">RH:</th>
                                            <td class="historiaClinica"><?php echo $rowPaciente['rh'];?>
                                            </td>
                                        </tr>

                                        <!------------------------------------------>
                                        <tr>
                                            <th class="historiaClinica">NOMBRE Y APELLIDOS ACOMPANANTE:</th>
                                            <td class="historiaClinica">
                                                <?php echo $rowPaciente['nombreAcudiente'];echo " "; echo $rowPaciente['apellidoAcudiente'];?>
                                            </td>
                                            <th class="historiaClinica">IDENTIFICACIÓN ACOMPANANTE:</th>
                                            <td class="historiaClinica">
                                                <?php echo $rowPaciente['numeroIdentificacionAcudiente'];?> </td>
                                            <th class="historiaClinica">TELÉFONO ACOMPANANTE:</th>
                                            <td class="historiaClinica">
                                                <?php echo $rowPaciente['telefonoAcudiente'];?>
                                            </td>
                                        </tr>
                                        <!------------------------------------------>
                                    </table>
                                    <br>
                                    <u>
                                        <h5 style="color: black;">DESCRIPCIÓN DE LA EVOLUCIÓN:</h5>
                                    </u>
                                    <table style="width: 100%;border: 1px solid black;" id="print">
                                        <tr>
                                            <th class="historiaClinica">DESCRIPCIÓN:</th>
                                            <td class="historiaClinica" style="width: 100%;">
                                                <?php echo $row['descripcion'];?>
                                            </td>
                                        </tr>
                                       
                                    </table>
                                    <table style="width: 100%;border: 1px solid black;" id="print">
                                   
                                            <br>
                                            <div class="form-group">
                                                <h5 style="color:#000"><b>Firma del especialista:</b></h5>
                                                <br>
                                                <img src="vistaFirmaHistoria.php?id='<?php echo '9'?>'" alt='Perfil'
                                                    class="rounded p-1" width="300px" />
                                            </div>

                                            <?php
                              
                              $queryCompany = mysqli_query($con,"SELECT * FROM company");
                              while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                               echo '<p  class="text-center">'.$empresaLog[nombre].'</p>';
                               echo '<p class="text-center">NIT: '.$empresaLog[nit].' Teléfono: '.$empresaLog[telefono].'</p>';
                              echo '<p class="text-center"><b>SIGC © Copyright '.date("Y").'</b></p>';
                             }
                               ?>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <h6 class="text-center"><b> Información protegida por la Ley
                                                                2015 31 ENE 2020
                                                                HISTORIA ClíNICA ELECTRÓNICA</b></h6>

                                                        "La presente ley tiene por objeto regular la
                                                        Interoperabilidad
                                                        de la Historia Clínica Electrónica - IHCE, a través de la
                                                        cual
                                                        se intercambiarán los elementos de datos clínicos
                                                        relevantes,
                                                        así como los documentos y expedientes clínicos del curso de
                                                        vida
                                                        de cada persona.
                                                        A través de la Historia Clínica Electrónica se facilitará,
                                                        agilizará y garantizará el acceso y ejercicio de los
                                                        derechos a
                                                        la salud y a la información de las personas, respetando el
                                                        Hábeas Data y la reserva de la misma."<sub>Ley 2015 31 ENE
                                                            2020</sub>
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <p class="text-center">
                                                Reporte generado y soportado por Sistema Integral de Gestión Clínica
                                                <br>By Agencia de Desarrollo Eagle Software<br>

                                                <?php echo 'Todos los derechos reservados © Copyright '.date("Y")?>
                                            </p>
                                            <?php
                              $queryCompany = mysqli_query($con,"SELECT * FROM company");
                              while ($empresaLog = mysqli_fetch_array($queryCompany)) {
                               echo '<p class="text-right" style="font-size:12px">'.$empresaLog[direccion].'</p>';
                               }
                               ?>
                                </div>
                            </div>

                            <br>
                            <a onclick="jQuery('#areaImprimir').print()" class="btn btn-outline-info"
                                style="border-radius: 0;"><i class="fa fa-print"></i> IMPRIMIR</a>
                            <a href="main.php" class="btn btn-outline-danger" style="border-radius: 0;"><i
                                    class="fa fa-sync"></i> CANCELAR</a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 px-2 mt-1">
                    <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php include('reloj.php');?>
                    </div>
                    <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php include('calendar.php');?>
                    </div>
                    <div class="card shadow p-2 mb-1 bg-white rounded">
                        <?php include('soporte.php');?>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <?php include('footer.php');?>
        </footer>
    </section>
    <script src="js/jQuery.print.min.js"></script>
    <!--Muy importante libreria que se encuentra en la carpeta js-->
    <script src="js/jQuery.print.js"></script>
    <!--Muy importante libreria que se encuentra en la carpeta js-->

    <script>

    </script>

</body>
</html>