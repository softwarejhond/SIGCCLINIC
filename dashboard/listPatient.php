<div class="card text-center">
    <div class="card-header" style=" background-color: #123960; color:#ffffff">
        <i class="fas fa-user-injured"></i> BUSQUEDA DE PACIENTES <i class="fas fa-user-injured"></i>
    </div>
    <div class="card-body">
        <form action="" method="GET">
            <div class="input-group input-group-lg mb-3">
                <input type="number" name="search" required
                    value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control text-center"
                    placeholder="DOCUMENTO DE IDENTIDAD">
                <button type="submit" class="btn btn-lg" style=" background-color: #123960; color:#ffffff" title="Buscar paciente"><i class="fa fa-search"></i></button>
            </div>
        </form>
        <div class="col-md-12">

            <?php 
                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM patient WHERE numeroIdentificacion LIKE '%$filtervalues%' LIMIT 1 ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                echo '
                                                <div class="card" style="width: 100%; border:0; background-color: #123960; COLOR:#ffffff">
                                                  <div class="row no-gutters">
                                                     <div class="col-md-4 text-left">
                                                        <img src="images/doc.png" alt="avatar" style="width:100%"> 
                                                     </div>
                                                     <div class="col-md-8">
                                                       <div class="card-body text-left">
                                                         <h2 class="card-title"><b>'.$items['nombre'] . ' ' . $items['apellidos'] .'</b></h2>
                                                         <h4 class="card-text">Documento de identificación: '.$items['numeroIdentificacion'].'</h4>
                                                         <h4 class="card-text">Teléfono: '.$items['telefonoCelular'].'</h4>
                                                         </br>
                                                         <button class="btn btn-outline-danger btn-lg" title="Tipo de sangre"><b><i class="fa fa-dna"></i> '.$items['rh'] . '</b></button>
                                                         <button class="btn btn-outline-info btn-lg" title="Fecha de nacimiento"><b><i class="fa fa-calendar"></i> '.$items['fechaNacimiento'] . '</b></button>
                                                         </br>
                                                         <h5>Acciones a realizar</h5>
                                                         <td><a href="historiaClinica.php?nik=' . $items['numeroIdentificacion'] . '"title="Realizar historia clínica" class="btn btn-outline-success btn-lg"><span class="fa fa-laptop-medical" aria-hidden="true"></span></a></td>
                                                         <td><a href="evolucionesClinicas.php?nik=' . $items['numeroIdentificacion'] . '" title="Realizar valoración clínica" class="btn btn-outline-info btn-lg"><span class="fa fa-feather-alt" aria-hidden="true"></span></a></td>
                                                         <td><a href="upd_paciente.php?nik=' . $items['numeroIdentificacion'] . '" title="Editar paciente" class="btn btn-outline-warning btn-lg"><span class="fa fa-edit" aria-hidden="true"></span></a></td>
                                                         <td><a href="main.php?aksi=delete&nik=' . $items['numeroIdentificacion'] . '" title="Eliminar paciente" onclick="return confirm(\'Esta seguro de borrar al paciente ' . $items['nombre'] . " " . $items['apellidos'] . '?\')" class="btn btn-outline-danger btn-lg"><span class="fa fa-trash" aria-hidden="true"></span></a></td>
                                                         </br>
                                                         <p class="card-text"><small class="text-muted">Fecha de ingreso: '.$items['dataTime'].'</small></p>
                                                       </div>
                                                    </div>
                                                 
                                                </div>
                                              </div>
                      
                                              ';
                                                ?>

            <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
            <tr>
                <td colspan="4">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Paciente no encontrado
                </td>
            </tr>
            <?php
                                        }
                                    }
                                ?>

        </div>
        </body>
    </div>
    <div class="card-footer " style=" background-color: #123960; color:#ffffff">
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

<!--<tr style="font-size:12px">
                                                  <td>' . $items['numeroIdentificacion'] . '</td>
                                                  <td></td>
                                                  <td>' . $items['telefonoCelular'] . '</td>
                                                  <td>' . $items['doctorAsignado'] . '</td>
                      
                                                  <td><a href="historiaClinica.php?nik=' . $items['numeroIdentificacion'] . '"title="Realizar historia clínica" class="btn btn-outline-success btn-sm"><span class="fa fa-laptop-medical" aria-hidden="true"></span></a></td>
                                                  <td><a href="evolucionesClinicas.php?nik=' . $items['numeroIdentificacion'] . '" title="Realizar valoración clínica" class="btn btn-outline-info btn-sm"><span class="fa fa-feather-alt" aria-hidden="true"></span></a></td>
                                                  <td><a href="upd_paciente.php?nik=' . $items['numeroIdentificacion'] . '" title="Editar paciente" class="btn btn-outline-warning btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></a></td>
                                                  <td><a href="main.php?aksi=delete&nik=' . $items['numeroIdentificacion'] . '" title="Eliminar paciente" onclick="return confirm(\'Esta seguro de borrar al paciente ' . $items['nombre'] . " " . $items['apellidos'] . '?\')" class="btn btn-outline-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"></span></a></td>
                      
                                                </tr>

-->