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

	<?php 
		include 'includes/header.php';

		$data_horario=($_SESSION['horario_arr']);
		// echo '<pre>';
		// print_r($data_horario);
		// echo '</pre>';
		$idHorario = $_GET['idHorario'];
		
		foreach ($data_horario as $horario => $info) 
		{
			if ($data_horario[$horario]['idHorario'] == $idHorario) 
			{
				$nomHorario = $data_horario[$horario]['nomHorario'];
				$nomOrdenaza = $data_horario[$horario]['apeUsuario'];
				$nombLab = $data_horario[$horario]['nomLab'];
			} 
		}

		$link = "http://limpieza.azurewebsites.net/ws/api/programacion/mostrarP.php?horario=".$idHorario;
				
		$programas_arr = $modelo -> sentenciaSelect($link);

	?>
	


	<section id="container">
		<h1>Lista de horarios</h1>

		

		<table>
			<tr>
				<th>ID</th>
				<th>Tiempo Transcurrido</th>
				
				<th>Estado Calificación</th>	
				<th>Estado Limpieza</th>
				<th>Comentario</th>
				<th>Acción</th>
			</tr>
			<tr>
			
			<?php 
				// echo '<pre>';
				// print_r($programas_arr);
				// echo '</pre>';

				if(!empty($programas_arr['mensaje: ']))
				{
					echo '<div class="alert"><p>No existen programas creados</p></div>';
				}
				else
				{
					foreach ($programas_arr as $programa => $value) 
					{
						if($value['estadoCalificacion'] == 'Sin calificar'){
							$data[] = $value;
						}
					}
					foreach ($data as $key) {
						echo '<td>'.$key['idProgramacion'].'</td>';
						echo '<td>'.$key['tiempoTranscurrido'].'</td>';
						echo '<td>'.$key['estadoLimpieza'].'</td>';
						echo '<td>'.$key['estadoCalificacion'].'</td>';
						echo '<td>'.$key['comentario'].'</td>';
						echo '<td>';
						echo '<a class="link_edit" href="reponsable_calificacion.php?idProgramacion='.$key['idProgramacion'].'">Calificar</a>';
			?>

				</td>
			</tr>

			<?php } }?>		
				
		</table>
	</section>

	<?php include 'includes/footer.php' ?>
</body>
</html>