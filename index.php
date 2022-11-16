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

<head>
    <?php include('head.php');?>

</head>

<body>
    <div class="login-container container">
        <div class="form-login">
            <ul class="login-nav text-center">
                <li class="login-nav__item active">
                    <a href="index.php">Iniciar sesión</a>
                </li>
            </ul>
            <div style="text-align:center;">
                <img src="images/logoo.png" alt="logo" width="150px" style='text-aling:center;'>

            </div>
            <br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label style="color:#fff">Usuario</label>
                    <input type="number" name="username" class="form-control text-center" placeholder="1234567890" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label style="color:#fff">Contraseña</label>
                    <input type="password" name="password" placeholder="*******" class="form-control text-center">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success w-100" value="Ingresar">
                </div>
            </form>
        </div>
        <br>
        <p class="text-center login__forgot">SIGC &copy; Copyright <?php echo date("Y");?></p>
        <a href="https://agenciaeaglesoftware.com/" target="_blank" class="login__forgot">Made by Agencia de Desarrollo
            Eagle Software</a>
        <br>
        <br>
    </div>
</body>
<style>

body{background-size:cover;}
.content {width:200px; margin:auto; border-radius:20px;height:400px;background:#333}
.content p{color:white;font-size:20px;padding:40px;margin:auto;text-align:center;}
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



* {
    box-sizing: border-box;
    transition: .25s all ease;
}

.help-block {
    color: #ffffff;
}

.login-container {
    display: block;
    position: relative;
    z-index: 0;
    margin: 1rem auto 0;
    padding: 5rem 4rem 0 4rem;
    width: 100%;
    max-width: 525px;
    background-image: url(images/fondo.png);
    box-shadow: 0 50px 70px -20px rgba(0, 0, 0, 0.85);
    background-size: cover;
	border-radius: 40px;

}

.login-container:after {
    content: '';
    display: inline-block;
    position: absolute;
    z-index: 0;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-image: radial-gradient(ellipse at left bottom, rgba(1, 184, 253) 0%, rgba(38, 20, 72, .9) 59%, rgba(1, 184, 253) 100%);
    box-shadow: 0 -20px 150px -20px rgba(0, 0, 0, 0.5);
	border-radius: 40px;
}

.form-login {
    position: relative;
    z-index: 1;
    padding-bottom: 4.5rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.25);
}

.login-nav {
    position: relative;
    padding: 0;
    margin: 0 0 3em 1rem;
}

.login-nav__item {
    list-style: none;
    display: inline-block;
}

.login-nav__item+.login-nav__item {
    margin-left: 2.25rem;
}

.login-nav__item a {
    position: relative;
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 500;
    font-size: 1.25rem;
    padding-bottom: .5rem;
    transition: .20s all ease;
}

.login-nav__item.active a,
.login-nav__item a:hover {
    color: #ffffff;
    transition: .15s all ease;
}

.login-nav__item a:after {
    content: '';
    display: inline-block;
    height: 10px;
    background-color: rgb(255, 255, 255);
    position: absolute;
    right: 100%;
    bottom: -1px;
    left: 0;
    border-radius: 50%;
    transition: .15s all ease;
}

.login-nav__item a:hover:after,
.login-nav__item.active a:after {
    background-color: rgb(17, 97, 237);
    height: 2px;
    right: 0;
    bottom: 2px;
    border-radius: 0;
    transition: .20s all ease;
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
    margin-top: 1rem;
    text-align: center;
    color: rgba(255, 255, 255, 0.75);
    font-size: .75rem;
    text-decoration: none;
    position: relative;
    z-index: 1;
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

</html>