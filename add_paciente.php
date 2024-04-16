<?php
// Initialize the session
session_start();
// Establecer tiempo de vida de la sesión en segundos
$inactividad = 86400;
// Comprobar si $_SESSION["timeout"] está establecida
if (isset($_SESSION["timeout"])) {
    // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
    $sessionTTL = time() - $_SESSION["timeout"];
    if ($sessionTTL > $inactividad) {
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
    <?php include('head.php'); ?>
</head>
<?php include('nav2.php'); ?>

<body>
    <section class="home-section ">
        <?php include('nav.php'); ?>
        <div class="container-fluid rounded">
            <div class="row">
                
                <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                    
                    <div class=" border-info shadow p-3 mb-5 bg-white rounded p-3 m-3">
                   
                        <?php
                        if (isset($_POST['addPaciente'])) {
                            $tipoIdentificacion = mysqli_real_escape_string($con, (strip_tags($_POST["tipoIdentificacion"], ENT_QUOTES))); //Escanpando caracteres 
                            $numeroIdentificacion = mysqli_real_escape_string($con, (strip_tags($_POST["numeroIdentificacion"], ENT_QUOTES))); //Escanpando caracteres 
                            $nombre = mysqli_real_escape_string($con, (strip_tags($_POST["nombre"], ENT_QUOTES))); //Escanpando caracteres 
                            $apellidos = mysqli_real_escape_string($con, (strip_tags($_POST["apellidos"], ENT_QUOTES))); //Escanpando caracteres 
                            $fechaNacimiento = mysqli_real_escape_string($con, (strip_tags($_POST["fechaNacimiento"], ENT_QUOTES))); //Escanpando caracteres 
                            $edad = mysqli_real_escape_string($con, (strip_tags($_POST["edad"], ENT_QUOTES))); //Escanpando caracteres 
                            $estadoCivil = mysqli_real_escape_string($con, (strip_tags($_POST["estadoCivil"], ENT_QUOTES))); //Escanpando caracteres 
                            $genero = mysqli_real_escape_string($con, (strip_tags($_POST["genero"], ENT_QUOTES))); //Escanpando caracteres
                            $departamento = mysqli_real_escape_string($con, (strip_tags($_POST["departamento"], ENT_QUOTES))); //Escanpando caracteres 
                            $ciudad = mysqli_real_escape_string($con, (strip_tags($_POST["ciudad"], ENT_QUOTES))); //Escanpando caracteres 
                            $direccion = mysqli_real_escape_string($con, (strip_tags($_POST["direccion"], ENT_QUOTES))); //Escanpando caracteres 
                            $telefonoFijo = mysqli_real_escape_string($con, (strip_tags($_POST["telefonoFijo"], ENT_QUOTES))); //Escanpando caracteres 
                            $telefonoCelular = mysqli_real_escape_string($con, (strip_tags($_POST["telefonoCelular"], ENT_QUOTES))); //Escanpando caracteres 
                            $email = mysqli_real_escape_string($con, (strip_tags($_POST["email"], ENT_QUOTES))); //Escanpando caracteres 
                            $eps = mysqli_real_escape_string($con, (strip_tags($_POST["eps"], ENT_QUOTES))); //Escanpando caracteres 
                            $ips = mysqli_real_escape_string($con, (strip_tags($_POST["ips"], ENT_QUOTES))); //Escanpando caracteres 
                            $ocupacion = mysqli_real_escape_string($con, (strip_tags($_POST["ocupacion"], ENT_QUOTES))); //Escanpando caracteres 
                            $nombreAcudiente = mysqli_real_escape_string($con, (strip_tags($_POST["nombreAcudiente"], ENT_QUOTES))); //Escanpando caracteres 
                            $apellidoAcudiente = mysqli_real_escape_string($con, (strip_tags($_POST["apellidoAcudiente"], ENT_QUOTES))); //Escanpando caracteres 
                            $numeroIdentificacionAcudiente = mysqli_real_escape_string($con, (strip_tags($_POST["numeroIdentificacionAcudiente"], ENT_QUOTES))); //Escanpando caracteres 
                            $telefonoAcudiente = mysqli_real_escape_string($con, (strip_tags($_POST["telefonoAcudiente"], ENT_QUOTES))); //Escanpando caracteres 
                            $doctorAsignado = mysqli_real_escape_string($con, (strip_tags($_POST["doctorAsignado"], ENT_QUOTES))); //Escanpando caracteres 
                            $rh = mysqli_real_escape_string($con, (strip_tags($_POST["rh"], ENT_QUOTES))); //Escanpando caracteres 
                            $dataTime = date("Y-m-d H:i:s");
                            $cek = mysqli_query($con, "SELECT * FROM patient WHERE numeroIdentificacion='$numeroIdentificacion'");
                            if (mysqli_num_rows($cek) == 0) {
                                $insert = mysqli_query($con, "INSERT INTO patient(tipoIdentificacion, 
                        numeroIdentificacion, nombre, apellidos, fechaNacimiento, edad,
                        estadoCivil, genero, departamento, ciudad,direccion,telefonoFijo, telefonoCelular,
                        email, eps, ips, ocupacion, nombreAcudiente, apellidoAcudiente,
                        numeroIdentificacionAcudiente, telefonoAcudiente,
                        doctorAsignado, rh,fechaCreacionPatient) VALUES ('$tipoIdentificacion',
                        '$numeroIdentificacion','$nombre','$apellidos',
                        '$fechaNacimiento','$edad','$estadoCivil','$genero','$departamento',
                        '$ciudad','$direccion','$telefonoFijo','$telefonoCelular','$email',
                        '$eps','$ips','$ocupacion','$nombreAcudiente',
                        '$apellidoAcudiente','$numeroIdentificacionAcudiente','$telefonoAcudiente',
                        '$doctorAsignado','$rh','$dataTime')");
                                if ($insert) {
                                    echo '
                            <div class="toastPaciente" style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                <div class="toast-header ">
                                    <strong class="mr-auto"><i class="fa fa-bell" aria-hidden="true"
                                            style=color:green></i> Notificación</strong>
                                  
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toastPaciente-body alert-success">
                                    <h5> <b>Paciente Registrado Correctamente</b></h5>
                               
                                </div>
                            </div>
                       ';
                                } else {
                                    echo '
                            <div class="toast " style="position: absolute; top: 0; right: 0;" data-delay="4000">
                                <div class="toast-header  ">
                                    <strong class="mr-auto"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red"></i> Notificación</strong>
                                  
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toast-body alert-danger">
                                    <h5> <b>Hubo problemas en el registro del paciente intenta nuevamente</b></h5>
                               
                                </div>
                            </div>
                       ';
                                }
                            } else {
                                echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. Paciente ya existe!</div>';
                            }
                        }
                        ?>
                        <div class="">
                      
                            <br>
                            <h2>Añadir nuevo paciente</h2>
                            <p>Complete este formulario para registrar un nuevo paciente. <br>
                                <b style="color:red">Todos los datos con * son obligatorios</b>
                            </p>

                            <form action="" method="post" class="was-validated">

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1">
                                   

                                        <div class="form-group">
                                            <label style="color:#000">Tipo de identificación *</label>
                                            <select class="form-control" name="tipoIdentificacion" required="true">
                                                <option value="">Seleccionar</option>
                                                <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                                                <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                                <option value="Registro civil">Registro civil</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label style="color:#000">Número de identificación *</label>
                                            <input type="number" name="numeroIdentificacion" class="form-control" placeholder="Numero de identificación" value="<?php echo $username; ?>" required="true">
                                            <span class="help-block alert-danger"><?php echo $username_err; ?></span>
                                        </div>

                                        <div class="form-group">
                                            <label style="color:#000">Nombre *</label>
                                            <input type="text" name="nombre" class="form-control" style="text-transform: capitalize;" placeholder="Nombre" required="true">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Apellidos *</label>
                                            <input type="text" name="apellidos" style="text-transform: capitalize;" placeholder="Apellidos" class="form-control" required="true">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Fecha de nacimiento *</label>
                                            <input type="date" name="fechaNacimiento" placeholder="Apellidos" class="form-control" value="1994-01-01" required="true">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Edad *</label>
                                            <input type="number" name="edad" placeholder="Edad" class="form-control" min="0" max="100" required="true">
                                        </div>
                                        <div class="form-group">
                                            <label style="color:#000">Estado civil *</label>
                                            <select class="form-control" name="estadoCivil" required="true">
                                                <option value="">Seleccionar</option>
                                                <option value="Soltero">Soltero</option>
                                                <option value="Casado">Casado</option>
                                                <option value="Unión libre">Unión libre</option>
                                                <option value="Viudo">Viudo</option>
                                                <option value="Divorciado">Divorciado</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label style="color:#000">Género *</label>
                                            <select class="form-control" name="genero" required="true">
                                                <option value="">Seleccionar</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label style="color:#000">RH *</label>
                                            <select class="form-control" name="rh" required="true">
                                                <option value="">Seleccionar</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 px-2 mt-1">

                                        <div class="form-group ">
                                            <label style="color:#000">Departamento *</label>
                                            <input type="text" name="departamento" placeholder="Departamento" style="text-transform: capitalize;" class="form-control" min="0" max="100" required="true">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Ciudad *</label>
                                            <input type="text" name="ciudad" placeholder="Ciudad" class="form-control" style="text-transform: capitalize;" min="0" max="100" required="true">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Dirección *</label>
                                            <input type="text" name="direccion" placeholder="Dirección" class="form-control" style="text-transform: capitalize;" min="0" max="100" required="true">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Teléfono fijo *</label>
                                            <input type="text" name="telefonoFijo" placeholder="Teléfono fijo" class="form-control" min="0" max="100" required="true">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Teléfono celular *</label>
                                            <input type="text" name="telefonoCelular" placeholder="Teléfono celular" class="form-control" min="0" max="100" required="true">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Correo electrónico *</label>
                                            <input type="email" name="email" placeholder="Correo electrónico" class="form-control" min="0" max="100" required="true">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">EPS *</label>
                                            <input type="text" name="eps" placeholder="EPS" class="form-control" min="0" style="text-transform: capitalize;" max="100" required="true">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">IPS *</label>
                                            <input type="text" name="ips" placeholder="IPS" class="form-control" min="0" style="text-transform: capitalize;" max="100" required="true">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Ocupación *</label>
                                            <input type="text" name="ocupacion" placeholder="Ocupación" class="form-control" min="0" max="100" required="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 px-2 mt-1">
                                        <h4>Datos acudiente o acompañante</h4>
                                        <div class="form-group ">
                                            <label style="color:#000">Nombre acudiente</label>
                                            <input type="text" name="nombreAcudiente" placeholder="Nombre acudiente" style="text-transform: capitalize;" class="form-control" min="0" max="100">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Apellidos acudiente</label>
                                            <input type="text" name="apellidoAcudiente" placeholder="Apellidos acudiente" style="text-transform: capitalize;" class="form-control" min="0" max="100">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Número identificacion acudiente</label>
                                            <input type="number" name="numeroIdentificacionAcudiente" placeholder="Número identificacion acudiente" class="form-control" min="0" max="100">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Teléfono acudiente</label>
                                            <input type="text" name="telefonoAcudiente" placeholder="Teléfono acudiente" class="form-control" min="0" max="100">
                                        </div>
                                        <div class="form-group ">
                                            <label style="color:#000">Doctor asignado</label>
                                            <select class="form-control" name="doctorAsignado" require>
                                                <option value="">Seleccionar</option>
                                                <?php
                                                $doctorSeleccionado = $_POST['doctorAsignado'];
                                                $query = mysqli_query($con, "SELECT nombre FROM users WHERE dependencia='Ingeniero' or dependencia='Especialista'");
                                                while ($doctorSeleccionado = mysqli_fetch_array($query)) {

                                                    echo '<option value="' . $doctorSeleccionado['nombre'] . '">' . $doctorSeleccionado['nombre'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="addPaciente" class="btn btn-outline-success" value="Registrar paciente" require>
                                            <input type="reset" class="btn btn-outline-danger" value="Cancelar">
                                        </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        </div>

        </div>
        </div>
     <br>
        <footer class="footer">
            <?php include('footer.php'); ?>
        </footer>
    </section>
      
</body>
<style>
    .container-fluid {
        margin-top: 1em;
    }


    .login__label {
        display: block;
        padding-left: 1rem;
    }

    .login__label,
    .login__label--checkbox {
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        font-size: .75rem;
        margin-bottom: 1rem;
    }

    .login__label--checkbox {
        display: inline-block;
        position: relative;
        padding-left: 1.5rem;
        margin-top: 2rem;
        margin-left: 1rem;
        color: #ffffff;
        font-size: .75rem;
        text-transform: inherit;
    }

    .login__input {
        color: white;
        font-size: 1.15rem;
        width: 100%;
        padding: .5rem 1rem;
        border: 2px solid transparent;
        outline: none;
        border-radius: 1.5rem;
        background-color: rgba(255, 255, 255, 0.25);
        letter-spacing: 1px;
    }

    .login__input:hover,
    .login__input:focus {
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.5);
        background-color: transparent;
    }

    .login__input+.login__label {
        margin-top: 1.5rem;
    }

    .login__input--checkbox {
        position: absolute;
        top: .1rem;
        left: 0;
        margin: 0;
    }

    .login__submit {
        color: #ffffff;
        font-size: 1rem;
        font-family: 'Montserrat', sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 1rem;
        padding: .75rem;
        border-radius: 2rem;
        display: block;
        width: 100%;
        background-color: rgba(17, 97, 237, .75);
        border: none;
        cursor: pointer;
    }

    .login__submit:hover {
        background-color: rgba(17, 97, 237, 1);
    }

    .login__forgot {
        display: block;
        margin-top: 3rem;
        text-align: center;
        color: rgba(255, 255, 255, 0.75);
        font-size: .75rem;
        text-decoration: none;
        position: relative;
        z-index: 1;
    }

    .login__forgot:hover {
        color: rgb(17, 97, 237);
    }
</style>
<script>
    $(document).ready(function() {
        $(".toastPaciente").toast('show');
    });
</script>

</html>