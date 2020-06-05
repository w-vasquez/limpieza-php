<?php 
	

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="js/cronometro2.js"></script>
    <link rel="StyleSheet" href="css/cronometr2o.css" TYPE="text/css">
   
	<meta charset="UTF-8">
	<?php include 'includes/scripts.php' ?>
	<title>Crear Usuario</title>
</head>
<body>
	<?php include 'includes/header.php' ?>

	<section id="container">
		<div class="form_horario">
			
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
			<form method="POST" action="" name ="form_horario" id="form_horario">
            <h1>Registrar Usuario</h1>

				<?php
					$link = "https://limpieza.azurewebsites.net/WS/API/laboratorio/mostrarLabResponsable.php?idUsuario=".$_SESSION['idUser'];
					
				?>
				<div > 
                    <input type="text" class="material-control tooltips-general" placeholder="Nombre " required="" maxlength="70" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" data-toggle="Nombre" data-placement="top" title="Escribe el nombre del administrador">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>
                <div > 
                    <input type="text" class="material-control tooltips-general" placeholder="Apellido" required="" maxlength="70" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" data-toggle="apellido" data-placement="top" title="Escribe el nombre del administrador">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label for="fecha_inicio">Fecha de Nacimiento:</label>                    
                    <input type="date" name="fecha_inicio"> <!-- required='required' -->
                    
                </div>

                <div > 
                    <input type="text" class="material-control tooltips-general" placeholder="Correo " required="" maxlength="70" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" data-toggle="correo" data-placement="top" title="Escribe el nombre del administrador">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>

                   
                    <div >
                        <label >Estado </label> 
                        
                        <select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige el estado">
                            <option value="">Seleccione</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                              
                        </select>
                 </div>
              <div > 
                    <input type="text" class="material-control tooltips-general" placeholder="Telefono " required="" maxlength="70" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del administrador">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>
                <div > 
                    <input type="password" class="material-control tooltips-general" placeholder="Contraseña " required="" maxlength="70" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del administrador">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>

                <div >
                        <label > Tipo de Usuario </label>
                        
                        <select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige el estado">
                            <option value="">Seleccione</option>
                            <option value=1>Administrador</option>
                            <option value=2>Ordenanza   </option>
                            <option value=3>Encargado de laboratorio   </option>
                              
                        </select>
                 </div>
                
                
                <input type="submit" name="btn_save" value="Guardar" class="buttonG">
                <input type="submit" name="btn_save" value="Cancelar" class="buttonC">
                
            
			</form>
		</div>
	</section>



	<?php include './includes/footer.php' ?>
</body>
</html>
