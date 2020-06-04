<?php 
	
	include '../conexion/modelo.php';
	$modelo = new Curl();
	$link = "http://limpieza.azurewebsites.net/ws/api/laboratorio/mostrar.php";

	//ejecutamos la API de conexión y enviamos los parámetros
	$data_lab = $modelo -> sentenciaSelect($link);
	//print_r($data_lab);
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
		 ?>
		

		<h1>Lista de horarios</h1>



		<form action="buscar_horario_porLab.php" method="get" class="form_search">
			<select name="id_laboratorio" id="id_laboratorio" class="notItemOne">
				<option value="<?php echo $id_laboratorio ?>" selected></option>
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
				echo '<a class="link_edit" href="index.php?acc=editar_estante&idEstante='.$key['idHorario'].'">Cronometrar</a>';

			?>
				</td>
			</tr>

			<?php } } ?>		
				
		</table>
	</section>

	<?php include 'includes/footer.php' ?>
</body>
</html>