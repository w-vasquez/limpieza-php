<?php
	session_start();
	if(!empty($_SESSION['active']))
	{

		header('location: sistema/');

	}else{
		$alert='';
		if(!empty($_POST))
		{
			if (empty($_POST['usuario']) || empty($_POST['clave'])) 
			{
				$alert = 'Ingrese su usuario y su clave';
			}else{
				//incluimos el archivo donde esta a API de conexión
				require_once "conexion/modelo.php";
				//instanciamos la clase
				$modelo = new Curl();
				
				//caputramos datos del formulario
				$user = $_POST['usuario'];
				$pass = $_POST['clave'];

				//configuramos la url
				$url = 'https://limpieza.azurewebsites.net/WS/API/usuario/mostrarP.php?';
				$par1 = 'correo='.$user; 
				$par2 = '&clave='.$pass;
				$link = $url.$par1.$par2;
				//echo $url;
				
				//ejecutamos la API de conexión y enviamos los parámetros
				$data = $modelo -> sentenciaSelect($link);
				
				//print_r($data);

				//extraemos los datos 
				if (isset($data['idUsuario']))
				{
					
					$_SESSION['active'] = true;
					$_SESSION['idUser'] = $data['idUsuario'];
					$_SESSION['nombre'] = $data['nombre']." ".$data['apellido'];
					$_SESSION['rol'] = $data['idTipoUsuario'];
					header('location: sistema/');
					
				}else{
					$alert = 'El usuario o clave son incorrectos';
					session_destroy();
				}
				
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login | Sistema de limpieza</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<section id="container">
		
		<form action="" method="post">
			
			<h3>Iniciar Sesión</h3>
			<img src="img/login.png" alt="login">
			<input type="text" name="usuario" placeholder="usuario" required='required'>
			<input type="password" name="clave" placeholder="contraseña" required='required'>
			<p class="alert"><?php echo isset($alert) ? $alert : ''; ?></p>
			<input type="submit" value="INGRESAR">
		</form>

	</section>
</body>
</html>