<?php 
	include '../conexion/modelo.php';
	include '../conexion/string.php';
	$modelo = new Curl();

	$link = "https://limpieza.azurewebsites.net/WS/API/tipoUsuario/mostrar.php";
	$tipo_arr = $modelo->sentenciaSelect($link);

	if($_POST)
	{
		if($_POST['pwd'] == $_POST['pwd1'])
		{
			$usr = $_POST['usuario'];
			$sql = "select * from usuario where correo = '".$usr."'";
			$query = mysqli_query($cnn,$sql);
			$result = mysqli_num_rows($query);

			if($result>0)
			{
				$alert = '<p class="msg_error">Usuario ya existe</p>';
			}
			else
			{
				$nombre = $_POST['nombre'];
				$apellido = $_POST['apellido'];
				$telefono = $_POST['telefono'];
				$pwd = $_POST['pwd'];
				$tipo = $_POST['tipo'];
				$fecha_inicio = date('Y-m-d',strtotime($_POST['fecha_inicio']));

				$data_array=array(
			        'nombre' => $nombre,
			        'apellido' => $apellido,
			        'telefono' => $telefono,
			        'estado' => 'Activo',
			        'correo' => $usr,
			        'password' => $pwd,
			        'idTipoUsuario' => $tipo,
			        'f_noc' => $fecha_inicio
	    	    );

	    	    $metodo='POST';
				$url = 'https://limpieza.azurewebsites.net/WS/API/usuario/insertar.php';
				$elJson=json_encode($data_array);
				
				$rs = $modelo->sentenciaAccion($metodo,$url,$elJson);
				//$response = json_decode($rs, true);
			
				if($rs){
					$alert = '<p class="msg_save">Usuario creado con exito</p>';
				}else{
					$alert = '<p class="msg_error">Un error totalmente exitoso</p>';
				}    	    
			}
		}
		else
		{
			$alert = '<p class="msg_error">Contraseña no coinciden</p>';;
		}
		
	}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include 'includes/scripts.php' ?>
	<title>Sistema Limpieza</title>
</head>
<body>
	<?php include 'includes/header.php' ?>

	<section id="container">
		<div class="form_register">
			<h1>Registro de usuario</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : "" ; ?></div>

			<form action="" method="POST" enctype="multipart/form-data">

				<label for="nombre">Nombres:</label>
				<input type="text"name="nombre" id="nombre" placeholder="Ingresa el nombre del usuario" required="required">

				<label for="apellido">Apellidos:</label>
				<input type="text"name="apellido" id="apellido" placeholder="Ingresa el apellido del usuario" required="required">
				
				<label for="usuario">Usuario:</label>
				<input type="text"name="usuario" id="usuario" placeholder="Ingresa el usuario" required="required">

				<label for="telefono">Teléfono:</label>
				<input type="text"name="telefono" id="telefono" placeholder="Ingresa el número de teléfono" required="required">

				<label for="pwd">Contraseña:</label>
				<input type="password"name="pwd" id="pwd" placeholder="Ingresa una clave" required="required">
				<label for="pwd">confirmar contraseña:</label>
				<input type="password"name="pwd1" id="pwd1" placeholder="Ingresa una clave" required="required">

				<label for="tipo">Tipo de usuario:</label>
				<select name="tipo" class="">
					<option value="0">Seleccionar tipo de usuario</option>
					<?php 

						foreach ($tipo_arr as $key) 
						{
							echo "<option value=".$key['idTipoUsuario'].">".$key['Tipo']."</option>";
						}
					 ?>
				</select>

				<label for="fecha_naci">Fecha de nacimiento:</label>
				<input type="date" name="fecha_inicio">
				
				
				<input type="submit" value="Guardar" class="btn_save">
			</form>
			
		</div>
	</section>

	<?php include 'includes/footer.php' ?>
</body>
</html>
