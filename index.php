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
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese su usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: main.php");
                        } else{
                            // Display an error message if password is not valid
                            echo '<div class="alert alert-danger alert-dismissable text-center" style="text-aling:center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Contraseña incorrecta</b></div>';
               
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
					echo '<div class="alert alert-danger alert-dismissable text-center" style="text-aling:center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Usuario no existe</b></div>';
                }
            } else{
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'head.php';

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<body>
    <div id="wrapper">
        <div id="left">
            <div id="signin">
                <div class="logo">
                    <img src="images/logoo.png" alt="logo" width="130px" style='text-aling:center;'>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div>
                        <label>Usuario ID </label>
                        <input type="number" name="username" placeholder="1234567890" class="text-input text-center form-control-lg" />
                    </div>
                    <div>
                        <label>Contraseña</label>
                        <input type="password" name="password" placeholder="*******" class="text-input text-center form-control-lg" />
                        <div class="input-group-append">
            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
          </div>
                    </div>
                    <button type="submit" class="primary-btn"><b>Iniciar sesión</b></button>
                </form>
            </div>
            <footer id="main-footer">
            <p class="text-center login__forgot">SIGC &copy; Copyright <?php echo date("Y");?></p>
         <a href="https://agenciaeaglesoftware.com/" target="_blank" class="login__forgot">Made by Agencia de Desarrollo
            Eagle Software</a>
            </footer>
        </div>
        <div id="right">
            <div id="showcase">
                <div class="showcase-content">
               
                </div>
            </div>
        </div>
    </div>
</body>
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto:300');

* {
    box-sizing: border-box;
}

body {
    font-family: 'Roboto', sans-serif;
    font-weight: 300;
    background: #E35658;
    color: #fff;
    overflow: hidden;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-weight: 300;
}

#wrapper {
    display: flex;
    flex-direction: row;
}

#left {
    display: flex;
    flex-direction: column;
    flex: 1;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: rgba(0, 197, 255, 0.9);
}
#right {
    flex: 1;
}

/* Sign In */
#signin {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 80%;
    padding-bottom: 1rem;
}

#signin form {
    width: 80%;
    padding-bottom: 3rem;
}

#signin .logo {
    margin-bottom: 8vh;
}

#signin .logo img {
    width: 300px;
}

#signin label {
    font-size: 0.9rem;
    line-height: 2rem;
    font-weight: 500;
}

#signin .text-input {
    margin-bottom: 1.3rem;
    width: 100%;
    border-radius: 2px;
    background: #181818;
    border: 1px solid #555;
    color: #ccc;
    padding: 0.5rem 1rem;
    line-height: 1.3rem;
}

#signin .primary-btn {
    width: 100%;
}

#signin .secondary-btn,
.or,
.links {
    width: 60%;
}

#signin .links a {
    display: block;
    color: #fff;
    text-decoration: none;
    margin-bottom: 1rem;
    text-align: center;
    font-size: 0.9rem;
}

#signin .or {
    display: flex;
    flex-direction: row;
    margin-bottom: 1.2rem;
    align-items: center;
}


#signin .or span {
    color: #000000;
    padding: 0 0.8rem;
}

/* Showcase */
#showcase {
    display: flex;
    justify-content: center;
    align-items: center;
   height: 100vh;
    text-align: center;
}
.imageCycle1{
    background:url(images/fond.png);
    background-repeat:no-repeat;
    background-size:cover;
    -webkit-background-size: cover;
    -moz-background-size:cover;
    filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/fond.png',sizingMethod='scale');
    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/fond.png',sizingMethod='scale')";
}
.imageCycle2{
    background:url(images/back.png);
    background-repeat:no-repeat;
    background-size:cover;
    -webkit-background-size: cover;
    -moz-background-size:cover;
    filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/back.png',sizingMethod='scale');
    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/back.png',sizingMethod='scale')";
}


#showcase .showcase-text {
    font-size: 3rem;
    width: 100%;
    color: #F9DA5A;
    margin-bottom: 1.5rem;
}

#showcase .secondary-btn {
    width: 60%;
    margin: auto;
}

/* Footer */
#main-footer {
    color: #000000;
    text-align: center;
    font-size: 0.8rem;
    max-width: 80%;
    padding-top: 5rem;
}

#main-footer a {
    color: #000000;
    text-decoration: underline;
}

/* Button */
.primary-btn {
    padding: 0.7rem 1rem;
    height: 2.7rem;
    display: block;
    border: 0;
    border-radius: 2px;
    font-weight: 500;
    background: #F9DA5A;
    color: #000000;
    text-decoration: none;
    cursor: pointer;
    text-align: center;
    transition: all 0.5s;
}

.primary-btn:hover {
    background-color: #F9DA5A;
}

.secondary-btn {
    padding: 0.7rem 1rem;
    height: 2.7rem;
    display: block;
    border: 1px solid #F9DA5A;
    border-radius: 2px;
    font-weight: 500;
    background: none;
    color: #F9DA5A;
    text-decoration: none;
    cursor: pointer;
    text-align: center;
    transition: all 0.5s;
}

.secondary-btn:hover {
    border-color: #F9DA5A;
    color: #F9DA5A;
}

/* Media Queries */
@media (min-width: 1200px) {
    #left {
        flex: 4;
    }

    #right {
        flex: 6;
    }
}

@media (max-width: 768px) {
    body {
        overflow: auto;
    }

    #right {
        display: none;
    }

    #left {
        justify-content: start;
        margin-top: 4vh;
    }

    #signin .logo {
        margin-bottom: 2vh;
    }

    #signin .text-input {
        margin-bottom: 0.7rem;
    }

    #main-footer {
        padding-top: 1rem;
    }
}
</style>
<script>
	//funcion para imagenes aleatorias
$(document).ready(function(){
    var classCycle=['imageCycle1','imageCycle2'];

    var randomNumber = Math.floor(Math.random() * classCycle.length);
    var classToAdd = classCycle[randomNumber];
    
    $('body').addClass(classToAdd);

});
</script>
<script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>
</html>