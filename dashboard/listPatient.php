
    <div class="container">
        <h4 class="mt-5">Buscador avanzado con PHP & MySQL</h4>
        <hr>

        <div class="row">
            <div class="col-12 col-md-12">
                <!-- Contenido -->



                <ul class="list-group">
                    <li class="list-group-item">
                        <form method="post">
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInput">Curso</label>
                                    <input required name="PalabraClave" type="text" class="form-control mb-2"
                                        id="inlineFormInput" placeholder="Ingrese palabra clave">
                                    <input name="buscar" type="hidden" class="form-control mb-2" id="inlineFormInput"
                                        value="v">
                                </div>

                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2">Buscar Ahora</button>
                                </div>
                            </div>
                        </form>
                    </li>

                </ul>


                <?php
 
if(!empty($_POST))
{
      $aKeyword = explode(" ", $_POST['PalabraClave']);
      $query = mysqli_query($con, "SELECT * FROM patient WHERE numeroIdentificacion like '%$aKeyword%' ORDER BY nombre ASC");
      
     for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR descripcion like '%" . $aKeyword[$i] . "%'";
        }
      }
     
     $result = $db->query($query);
     echo "<br>Has buscado la palabra clave:<b> ". $_POST['PalabraClave']."</b>";
                     
     if(mysqli_num_rows($result) > 0) {
        $row_count=0;
        echo "<br><br>Resultados encontrados: ";
        echo "<br><table class='table table-striped'>";
        While($row = $result->fetch_assoc()) {   
            $row_count++;                         
            echo "<tr><td>".$row_count." </td><td>". $row['numeroIdentificacion'] . "</td><td>". $row['nombre'] . "</td></tr>";
        }
        echo "</table>";
	
    }
    else {
        echo "<br>Resultados encontrados: Ninguno";
		
    }
}
 
?>




                <!-- Fin Contenido -->
            </div>
        </div><!-- Fin row -->
    </div><!-- Fin container -->

<script>
$(document).ready(function() {
    $(".toastPatient").toast('show');
});
</script>