<div class="card text-center">
     <div class="card-header" style="background-image:url(images/footer.png); color:#fff">
         <i class="fas fa-user-injured"></i> LISTA DE PACIENTES <i class="fas fa-user-injured"></i>
     </div>
     <div class="card-body">
     <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>How to make Search box & filter data in HTML Table from Database in PHP MySQL </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>IDENTIFICACIÓN</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDOS</th>
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
                                                  <td>' . $no . '</td>
                                                  <td>' . $items['numeroIdentificacion'] . '</td>
                                                  <td>' . $items['nombre'] . '</td>
                                                  <td>' . $items['apellidos'] . '</td>
                                                  <td>' . $items['telefonoCelular'] . '</td>
                                                  <td>' . $items['doctorAsignado'] . '</td>
                      
                                                  <td><a href="historiaClinica.php?nik=' . $items['numeroIdentificacion'] . '"title="Realizar historia clínica" class="btn btn-outline-success btn-sm" "><span class="fa fa-laptop-medical" aria-hidden="true"></span></a></td>
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
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
         <table id="myTable" class=" table table-hover table-bordered table-lg table-responsive">
             <thead class="thead-dark">
                 <tr>
                     <th>#</th>
                     <th>Documento</th>
                     <th class="w-25">Nombre</th>
                     <th class="w-25">Apellidos</th>
                     <th class="w-10">Celular</th>
                     <th class="w-50">Doctor</th>
                     <td><a href="historiaClinica.php?nik=' . $row['numeroIdentificacion'] . '"title="Realizar historia clínica" class="btn btn-outline-success btn-sm" "><span class="fa fa-laptop-medical" aria-hidden="true"></span></a></td>
                            <td><a href="evolucionesClinicas.php?nik=' . $row['numeroIdentificacion'] . '" title="Realizar valoración clínica" class="btn btn-outline-info btn-sm"><span class="fa fa-feather-alt" aria-hidden="true"></span></a></td>
                            <td><a href="upd_paciente.php?nik=' . $row['numeroIdentificacion'] . '" title="Editar paciente" class="btn btn-outline-warning btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></a></td>
                            <td><a href="main.php?aksi=delete&nik=' . $row['numeroIdentificacion'] . '" title="Eliminar paciente" onclick="return confirm(\'Esta seguro de borrar al paciente ' . $row['nombre'] . " " . $row['apellidos'] . '?\')" class="btn btn-outline-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"></span></a></td>

             </thead>
             <tbody>
                 <?php

$buscar = $_POST["buscador"];
$usaurio = htmlspecialchars($_SESSION["numeroIdentificacion"]);
if ($filter) {
    $sql = mysqli_query($con, "SELECT * FROM patient WHERE numeroIdentificacion like '%$buscar%' ORDER BY nombre ASC");
} else {
    $sql = mysqli_query($con, "SELECT * FROM patient WHERE numeroIdentificacion like '%$buscar%' ORDER BY nombre ASC");
}
if (mysqli_num_rows($sql) == 0) {
    echo '<tr><td colspan="8">No hay datos.</td></tr>';
} else {
    $no = 1;
    while ($row = mysqli_fetch_assoc($sql)) {
        echo '

						  <tr style="font-size:12px">
						    <td>' . $no . '</td>
                            <td>' . $row['numeroIdentificacion'] . '</td>
                            <td>' . $row['nombre'] . '</td>
                            <td>' . $row['apellidos'] . '</td>
                            <td>' . $row['telefonoCelular'] . '</td>
                            <td>' . $row['doctorAsignado'] . '</td>

                            <td><a href="historiaClinica.php?nik=' . $row['numeroIdentificacion'] . '"title="Realizar historia clínica" class="btn btn-outline-success btn-sm" "><span class="fa fa-laptop-medical" aria-hidden="true"></span></a></td>
                            <td><a href="evolucionesClinicas.php?nik=' . $row['numeroIdentificacion'] . '" title="Realizar valoración clínica" class="btn btn-outline-info btn-sm"><span class="fa fa-feather-alt" aria-hidden="true"></span></a></td>
                            <td><a href="upd_paciente.php?nik=' . $row['numeroIdentificacion'] . '" title="Editar paciente" class="btn btn-outline-warning btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></a></td>
                            <td><a href="main.php?aksi=delete&nik=' . $row['numeroIdentificacion'] . '" title="Eliminar paciente" onclick="return confirm(\'Esta seguro de borrar al paciente ' . $row['nombre'] . " " . $row['apellidos'] . '?\')" class="btn btn-outline-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"></span></a></td>

                          </tr>


						';
        $no++;
    }
}
?>
             </tbody>
         </table>
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