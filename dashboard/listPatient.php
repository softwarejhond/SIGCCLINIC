<div class="card text-center">
    <div class="card-header" style="background-image:url(images/footer.png); color:#fff">
        <i class="fas fa-user-injured"></i> LISTA DE PACIENTES <i class="fas fa-user-injured"></i>
    </div>
    <div class="card-body">
        <?php
include 'connect_test_db.php';
$searchErr = '';
$employee_details='';
if(isset($_POST['save']))
{
	if(!empty($_POST['search']))
	{
		$search = $_POST['search'];
		$stmt = $con->prepare("SELECT * FROM patient WHERE numeroIdentificacion like '%$search%'");
		$stmt->execute();
		$employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}
	else
	{
		$searchErr = "Please enter the information";
	}
   
}

?>
        <h3><u>PHP MySQL search database and display results</u></h3>
        <br /><br />
        <form class="form-horizontal" action="#" method="post">
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email"><b>Search Employee Information:</b>:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="search" placeholder="search here">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" name="save" class="btn btn-success btn-sm">Submit</button>
                    </div>
                </div>
                <div class="form-group">
                    <span class="error" style="color:red;">* <?php echo $searchErr;?></span>
                </div>

            </div>
        </form>
        <br /><br />
        <h3><u>Search Result</u></h3><br />
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Employee Name</th>
                        <th>Phone No</th>
                        <th>Age</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
		    	 if(!$employee_details)
		    	 {
		    		echo '<tr>No data found</tr>';
		    	 }
		    	 else{
		    	 	foreach($employee_details as $key=>$value)
		    	 	{
		    	 		?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $value['nombre'];?></td>
                        <td><?php echo $value['phone_no'];?></td>
                        <td><?php echo $value['age'];?></td>
                        <td><?php echo $value['department'];?></td>
                    </tr>

                    <?php
		    	 	}
		    	 	
		    	 }
		    	?>

                </tbody>
            </table>

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
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
} 
if (mysqli_num_rows($sql) == 0) {
    echo '<tr><td colspan="8">No hay datos.</td></tr>';
} else {
    $no = 1;
    while ($row = mysqli_fetch_array($sql)) {
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