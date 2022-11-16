<?php 
include("conexion.php");
$universidades=$_POST['universidades'];

	$sql="SELECT id,
			 nombre,
			 universidad_id 
		FROM facultades 
		WHERE universidad_id='$universidades'";

	$result=mysqli_query($con,$sql);

	$cadena="
			<select id='facultadd' name='facultadd'>";

	while ($facultadEncontrada=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$facultadEncontrada[nombre].'>'.$facultadEncontrada[universidad_id].'</option>';
	}

	echo  $cadena."</select>";
	

?>