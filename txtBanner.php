<? 
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
  include "conexion.php";
  ?>
<div class="card bg-dark text-white">
    <div class="container">
        <div class="card-img-overlay ">
            <img src="vista.php?id='<?php echo'9'?>'" alt='Perfil' class="rounded mr-1"
               style="float:left; padding:10px; width:100px" />
            <?php
                               $usaurio= htmlspecialchars($_SESSION["username"]);
                               $query = mysqli_query($con,"SELECT * FROM users WHERE username like '%$usaurio%'");
                               while ($userLog = mysqli_fetch_array($query)) {
                                echo '<h6  class="card-text px-2 mt-1" style="color:#000;text-transform: uppercase;">'.$userLog['nombre'].'</h6>';  
                                echo '<h6  class="card-text px-2" style="color:#000;text-transform: uppercase;">'.$userLog['profesion'].'</h6>';
                                echo '<h6  class="card-text px-2" style="color:#000;text-transform: uppercase;">'.$userLog['dependencia'].'</h6>';
                                    
                              }
                                ?>
     
            <h6 id="Identificacion" class="ccard-text" style="color:#000">
                <?php echo htmlspecialchars($_SESSION["username"]); ?></h6>
           </h6>
        </div>
    </div>
</div>