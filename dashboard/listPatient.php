<div class="card text-center">
     <div class="card-header minibar">
         <i class="fas fa-user-injured"></i> LISTA DE PACIENTES <i class="fas fa-user-injured"></i>
     </div>
     <div class="card-body">
         <table id="myTable" class=" table table-hover table-bordered table-lg table-responsive">
             <thead class="thead-dark">
                 <tr>
                     <th>#</th>
                     <th>Documento</th>
                     <th class="w-25">Nombre</th>
                     <th class="w-25">Apellidos</th>
                     <th class="w-10">Celular</th>
                     <th class="w-50">Doctor</th>
                     <th class="w-50"> </th>
                     <th class="w-50"> </th>
                     <th class="w-50"> </th>
                     <th class="w-50"> </th>
                 </tr>
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
     <div class="card-footer minibar">
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
<style>
        .minibar{
        background-image:url(images/footer.png);
        color: #fff;
    }
  </style>