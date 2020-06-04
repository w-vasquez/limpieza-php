<?php 

	include '../conexion/modelo.php';
	$modelo = new Curl();

	$link = "https://limpieza.azurewebsites.net/WS/API/usuario/mostrarO.php";
	$orde_arr = $modelo->sentenciaSelect($link);

	if(!empty($_POST)) //si es vacío
	{
		$alert="";
		
		if($_POST['select_ordenanza'] == 0){
			$alert = '<p class="msg_error">Agregar un ordenanza para continuar</p>';
		}else{
			$idLab = $_POST['idLab'];
			$nombre_horario = $_POST['nombre_horario'];
			$select_ordenanza = $_POST['select_ordenanza'];
			$fecha_inicio = date('Y-m-d',strtotime($_POST['fecha_inicio']));
			$hora_inicio = $_POST['hora_inicio'];
			$fecha_fin = date('Y-m-d',strtotime($_POST['fecha_fin']));
			$hora_fin = $_POST['hora_fin'];
			$lunes = !empty($_POST['lunes']) ? $_POST['lunes'] : 0;
			$martes = !empty($_POST['martes']) ? $_POST['martes'] : 0;
			$miercoles = !empty($_POST['miercoles']) ? $_POST['miercoles'] : 0;
			$jueves = !empty($_POST['jueves']) ? $_POST['jueves'] : 0;
			$viernes = !empty($_POST['viernes']) ? $_POST['viernes'] : 0;
			$sabado = !empty($_POST['sabado']) ? $_POST['sabado'] : 0;
			$domingo = !empty($_POST['domingo']) ? $_POST['domingo'] : 0;

			$data_array=array(
		        'lunes' => $lunes,
		        'martes' => $martes,
		        'miercoles' => $miercoles,
		        'jueves' => $jueves,
		        'viernes' => $viernes,
		        'sabado' => $sabado,
		        'domingo' => $domingo,
		        'fechaInicio' => $fecha_inicio,
		        'fechaFin' => $fecha_fin,
		        'horaInicio' => $hora_inicio,
		        'horaFin' => $hora_fin,
		        'nombre' => $nombre_horario,
		        'ordenanza' => $select_ordenanza,
		        'laboratorio' => $idLab
    	    );

    	    $metodo='POST';
			$accion='insertar.php';
			$url = 'https://limpieza.azurewebsites.net/WS/API/horario/';
			$elJson=json_encode($data_array);
			
			$rs = $modelo->sentenciaAccion($metodo,$url.$accion,$elJson);
			//$response = json_decode($rs, true);
		
			if($rs){
				$alert = '<p class="msg_save">Horario creado con exito</p>';
			}else{
				$alert = '<p class="msg_error">Un error totalmente exitoso</p>';
			}    	    
		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include 'includes/scripts.php' ?>
	<title>Crear programa</title>
</head>
<body>
	<?php include 'includes/header.php' ?>

	<section id="container">
		<div class="form_horario">
			<h1>Crear horario</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
			<form method="POST" action="" name ="form_horario" id="form_horario">
				

				<?php
					$link = "https://limpieza.azurewebsites.net/WS/API/laboratorio/mostrarLabResponsable.php?idUsuario=".$_SESSION['idUser'];
					$lab_arr = $modelo->sentenciaSelect($link);
				?>
				<div class="caja"> 
					<input type="hidden" name="idLab" value="<?php echo $lab_arr[0]['idLaboratorio'] ?>">
					<label for="nombre_horario">Nombre del horario:</label>
					<input type="text" name="nombre_horario">

					<label for="select_ordenanza">Seleccionar ordenanza: </label>
					<select name="select_ordenanza" id="select_ordenanza">
						<option value="0">Seleccionar ordenanza</option>
						<?php 
							foreach($orde_arr as $key){
							echo "<option value=".$key['idUsuario'].">".$key['nombre']." ".$key['apellido']."</option>";
							}
						?>
					</select>
				
					<fieldset class="grupo_horario">
						<legend align="left">Horario del programa</legend>
						<label for="fecha_inicio">Fecha de inicio:</label>
						<input type="date" name="fecha_inicio"> <!-- required='required' -->
						
						<label for="hora_inicio">Hora de inicio:</label>
						<input type="time" name="hora_inicio">
						<br>
						<label for="fecha_fin">Fecha de fin:</label>
						<input type="date" name="fecha_fin">
						
						<label for="hora_fin">Hora de fin:</label>
						<input type="time" name="hora_fin">
						</select>
					</fieldset>
				</div>
				<div class="caja"> 
					<fieldset class="grupo_dias">
						<legend align="left">Dia: </legend>
						<label>
							<input type="checkbox" id="lunes" name="lunes" value="1"> Lunes
						</label>
						<label>
							<input type="checkbox" id="martes" name="martes" value="1"> Martes
						</label>
						<label>
							<input type="checkbox" id="miercoles" name="miercoles" value="1"> Miércoles
						</label>
						<label>
							<input type="checkbox" id="jueves" name="jueves" value="1"> Jueves
						</label>
						<label>
							<input type="checkbox" id="viernes" name="viernes" value="1"> Viernes
						</label>
						<label>
							<input type="checkbox" id="sabado" name="sabado" value="1">Sábado
						</label>
						<label>
							<input type="checkbox" id="domingo" name="domingo" value="1">Domingo
						</label>
					</fieldset>
				</div>

				<input type="submit" name="btn_save" value="Guardar" class="btn_save">
			</form>
		</div>
	</section>



	<?php include 'includes/footer.php' ?>
</body>
</html>