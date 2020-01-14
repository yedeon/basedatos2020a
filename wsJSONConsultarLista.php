
<?PHP
$hostname_localhost ="localhost";
$database_localhost ="id681993_yedeon12";
$username_localhost ="id681993_yedeon12";
$password_localhost ="semenor1";
$json=array();
				
	$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
	$consulta="select documento,nombre,profesion FROM id681993_yedeon13";
	$resultado=mysqli_query($conexion,$consulta);
		
		while($registro=mysqli_fetch_array($resultado)){
			$json['usuario'][]=$registro;
			//echo $registro['id'].' - '.$registro['nombre'].'<br/>';
		}
		mysqli_close($conexion);
		echo json_encode($json);
?>