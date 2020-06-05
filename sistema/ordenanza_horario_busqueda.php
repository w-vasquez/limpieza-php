<?php 
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

		<?php 
			$id_laboratorio = $_REQUEST['id_laboratorio'];
			if(empty($id_laboratorio)){
				header('location: ordenanza_programas.php');
			}
			$data_lab=($_SESSION['data_lab']);
			
			foreach ($data_lab as $laboratorio => $info) {
				if ($data_lab[$laboratorio]['idLaboratorio'] == $id_laboratorio) {
					$lab_activo = $data_lab[$laboratorio]['nombre'];
				} 
				
			}
		 ?>
		

		<h1>Lista de horarios</h1>



		<form action="ordenanza_horario_busqueda.php" method="get" class="form_search">
			<select name="id_laboratorio" id="id_laboratorio" class="notItemOne">
				<option value="<?php echo $id_laboratorio ?>" selected><?php echo $lab_activo ?></option>
				<?php foreach ($data_lab as $key) {
					echo "<option value=".$key['idLaboratorio'].">".$key['nombre']."</option>";
				} ?>
			</select>
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

			$link = "http://limpieza.azurewebsites.net/ws/api/vistaHorario/mostrarOrdenanzaLaboratorio.php?idOrdenanza=".$_SESSION['idUser']."&idLaboratorio=".$id_laboratorio;

			//ejecutamos la API de conexión y enviamos los parámetros
			$data = $modelo -> sentenciaSelect($link);
			$_SESSION['data'] = $data;
			
			if(empty($data[0]["idHorario"])){
				echo '<p class="msg_error">No existen horarios asignados al laboratorio </p>';
			}else{ 
			
				foreach ($data as $key) {

				echo '<td>'.$key['idHorario'].'</td>';
				echo '<td>'.$key['nomHorario'].'</td>';
				echo '<td>'.$key['fCrea'].'</td>';
				echo '<td>'.$key['fIni'].'</td>';
				echo '<td>'.$key['fFin'].'</td>';
				echo '<td>'.$key['hIni'].'</td>';
				echo '<td>'.$key['hFin'].'</td>';
				echo '<td>';
				echo '<a class="link_edit" href="ordenanza_cronometro.php?idHorario='.$key['idHorario'].'&nomLab='.$key['nomLab'].'&nomHorario='.$key['nomHorario'].'">Cronometrar</a>';
				echo '<input type="hidden" name="nom_lab" value='.$key['nomLab'].'>';

			?>
				</td>
			</tr>

			<?php } } ?>		
				
		</table>
	</section>

	<?php include 'includes/footer.php' ?>
</body>
</html>