<?php 
	include '../conexion/string.php';
	include '../conexion/modelo.php';
	$modelo = new Curl();
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include 'includes/scripts.php' ?>
	<title>Horarios asignados</title>
</head>
<body>
	<?php include 'includes/header.php';?>

	<section id="container">
		<h1>Lista de horarios</h1>

		<?php 
			//$_SESSION['data_lab'] = $data_lab;
			$usuario = $_SESSION['idUser'];
			$sql = "select idLaboratorio from laboratorio where responsable = $usuario";
			$query = mysqli_query($cnn,$sql);
			$result = mysqli_num_rows($query);

			if($result>0)
			{
				$row = mysqli_fetch_assoc($query);
				
				$link = "http://limpieza.azurewebsites.net/ws/api/vistaHorario/mostrarLaboratorio.php?idLaboratorio=".$row['idLaboratorio'];
				
				$horario_arr = $modelo -> sentenciaSelect($link);
				$_SESSION['horario_arr']=$horario_arr;
				
			}

			
		 ?>

		<form action="ordenanza_horario_busqueda.php" method="get" class="form_search">
			<select name="id_laboratorio" id="id_laboratorio">
				<option value="0">Filtrar por laboratorio</option>
				<?php 
					// foreach ($data_lab as $key) {
					// 	echo "<option value=".$key['idLaboratorio'].">".$key['nombre']."</option>";
					// } 
				?>
			</select>
			<input type="hidden" name="nomLab" value="">
			<!-- <input type="text" name="busqueda" id="busqueda" placeholder="busqueda"> -->
			<input type="submit" value="Buscar" class="btn_search">
		</form>

		<table>
			<tr>
				<th>ID</th>
				<th>Nombre horario</th>
				<th>Fecha de creación</th>
				<th>Fecha inicio</th>	
				<th>Fecha fin</th>
				<th>Hora inicio</th>
				<th>Hora fin</th>
				<th>Acción</th>
			</tr>
			<tr>
			
			<?php 

			foreach ($horario_arr as $key) {
				echo '<td>'.$key['idHorario'].'</td>';
				echo '<td>'.$key['nomHorario'].'</td>';
				echo '<td>'.$key['fCrea'].'</td>';
				echo '<td>'.$key['fIni'].'</td>';
				echo '<td>'.$key['fFin'].'</td>';
				echo '<td>'.$key['hIni'].'</td>';
				echo '<td>'.$key['hFin'].'</td>';
				echo '<td>';
				echo '<a class="link_edit" href="reponsable_programas.php?idHorario='.$key['idHorario'].'">Mostrar</a>';
			?>
				</td>
			</tr>

			<?php } ?>		
				
		</table>
	</section>

	<?php include 'includes/footer.php' ?>
</body>
</html>