<?php 
	

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="js/cronometro2.js"></script>
    <link rel="StyleSheet" href="./css/cronometr2o.css" TYPE="text/css">
    <link rel="StyleSheet" href="./css/style.css" type="text/css">
	<meta charset="UTF-8">
	<?php include './includes/functions.php' ?>
	<title>Crear Usuario</title>
</head>
<body>
	<?php include './includes/header.php' ?>

	<section id="container">
		<div class="form_horario">
			
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
			<form method="POST" action="./config/Us.php" name ="form_usuario" id="form_horario">
            <h1>Registrar Usuario</h1>

				<?php
					
					
				?>
				<div > 
                    <input type="text" class="material-control tooltips-general" placeholder="Nombre " required="" maxlength="70" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" data-toggle="Nombre" data-placement="top" title="Escribe el nombre del usuario" name="nombre">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>
                <div > 
                    <input type="text" class="material-control tooltips-general" placeholder="Apellido" required="" maxlength="70" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" data-toggle="apellido" data-placement="top" title="Escribe el nombre del usuario" name="apellido">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label for="fecha_inicio">Fecha de Nacimiento:</label>                    
                    <input type="date" name="fecha_inicio"> <!-- required='required' -->                    
                </div>

                <div > 
                    <input type="text" class="material-control tooltips-general" placeholder="Correo " required="" maxlength="70" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ@. ]{1,70}" data-toggle="correo" data-placement="top" title="Escribe el correo" name="correo">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>

                   
                    <div >
                        <label >Estado </label> 
                        
                        <select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige el estado" name="estus">
                            <option value="">Seleccione</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>                              
                        </select>
                 </div>
              <div > 
                    <input type="text" class="material-control tooltips-general" placeholder="Telefono " required="" maxlength="70" pattern="[0-9]{1,70}" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del administrador" name="cel">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>
                <div > 
                    <input type="password" class="material-control tooltips-general" placeholder="Contraseña " required="" maxlength="70" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del administrador" name="pas">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>

                <div >
                        <label > Tipo de Usuario </label>
                        
                        <select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige el estado" name="est">
                            <option value=1>Administrador</option>
                            <option value=2>Ordenanza</option>
                            <option value=3>Encargado de laboratorio</option>                              
                        </select>
                 </div>
                
                
                <input type="submit" name="btnGuardar" value="Guardar" class="buttonG">
                <input type="submit" name="btnGuardar" value="Cancelar" class="buttonC">
                
            
			</form>
		</div>
	</section>



	
</body>
</html>
