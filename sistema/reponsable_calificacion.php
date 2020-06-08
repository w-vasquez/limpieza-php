<?php 
	include '../conexion/modelo.php';
	$modelo = new Curl();
	$idProgramacion = $_GET['idProgramacion'];

	if ($_POST) 
	{
		if(!empty($_POST['calificacion']))
		{
			$data_array=array(
		        'calificacion' => $_POST['calificacion'],
		        'comentarios' => $_POST['comentario'],
		        'programacion' => $idProgramacion
    		);

			$metodo='POST';
            $url = 'https://limpieza.azurewebsites.net/WS/API/calificacion/insertar.php';
            $elJson=json_encode($data_array,true);
            
            $rs = $modelo->sentenciaAccion($metodo,$url,$elJson);
            //$response = json_decode($rs, true);
        
            if($rs){
                $alert = '<p class="msg_save">Datos guardados</p>';

            }else{
                $alert = '<p class="msg_error">Un error totalmente exitoso</p>';
            }
		}else{
			$alert = '<div class="alert"><p>Completar los campos</p></div>';
		}
		
	} 

	
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include 'includes/scripts.php' ?>
	<title>Calificación</title>
</head>
<body>
	<?php include 'includes/header.php' ?>

	<section id="container">
		<div class="form_register">
			<h1>Registro calificación</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : "" ; ?></div>

			<form action="" method="POST" enctype="multipart/form-data">

				<label for="calificacion">Calificación otrogada:</label>
				<input type="number" min=0 max=10 name="calificacion" id="calificacion" placeholder="Calificación entre 1 - 10" required="required">

				<label for="comentario">Comentario</label>
				<textarea name="comentario" id="comentario" required="required" rows="8" cols="38" placeholder="Escriba una ubicación física"></textarea>
				
				
				<input type="submit" value="Guardar calificación" class="btn_save">
			</form>
			
		</div>
	</section>

	<?php include 'includes/footer.php' ?>
</body>
</html>