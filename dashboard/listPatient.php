<div class="card text-center">
    <div class="card-header" style="background-image:url(images/footer.png); color:#fff">
        <i class="fas fa-user-injured"></i> BUSQUEDA DE PACIENTES <i class="fas fa-user-injured"></i>
    </div>
    <div class="card-body">
        <form action="" method="GET">
            <div class="input-group input-group-lg mb-3">
                <input type="number" name="search" required
                    value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control text-center"
                    placeholder="BUSCAR PACIENTE">
                <button type="submit" class="btn btn-primary">BUSCAR</button>
            </div>
        </form>
        <div class="col-md-12">
            <div class="card mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>IDENTIFICACIÓN</th>
                                <th>NOMBRE</th>
                                <th>TELÉFONO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM patient WHERE numeroIdentificacion LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                echo '
                                                <tr style="font-size:12px">
                                                  <td>' . $items['numeroIdentificacion'] . '</td>
                                                  <td>' . $items['nombre'] . ' ' . $items['apellidos'] . '</td>
                                                  <td>' . $items['telefonoCelular'] . '</td>
                                                  <td>' . $items['doctorAsignado'] . '</td>
                      
                                                  <td><a href="historiaClinica.php?nik=' . $items['numeroIdentificacion'] . '"title="Realizar historia clínica" class="btn btn-outline-success btn-sm"><span class="fa fa-laptop-medical" aria-hidden="true"></span></a></td>
                                                  <td><a href="evolucionesClinicas.php?nik=' . $items['numeroIdentificacion'] . '" title="Realizar valoración clínica" class="btn btn-outline-info btn-sm"><span class="fa fa-feather-alt" aria-hidden="true"></span></a></td>
                                                  <td><a href="upd_paciente.php?nik=' . $items['numeroIdentificacion'] . '" title="Editar paciente" class="btn btn-outline-warning btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></a></td>
                                                  <td><a href="main.php?aksi=delete&nik=' . $items['numeroIdentificacion'] . '" title="Eliminar paciente" onclick="return confirm(\'Esta seguro de borrar al paciente ' . $items['nombre'] . " " . $items['apellidos'] . '?\')" class="btn btn-outline-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"></span></a></td>
                      
                                                </tr>
                      
                      
                                              ';
                                                ?>

                            <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                            <tr>
                                <td colspan="4">Paciente no encontrado</td>
                            </tr>
                            <?php
                                        }
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>
        </div>
        </body>
    </div>
    <div class="card-footer " style="background-image:url(images/footer.png); color:#fff">
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