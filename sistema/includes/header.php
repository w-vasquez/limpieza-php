<?php
	session_start();
	if(empty($_SESSION['active']))
	{
		header('location: ../');
	}

	$msj = '';

	switch ($_SESSION['rol']) {
		case 1:
			$msj = 'ADMIN';
			break;
		case 2:
			$msj = 'RESPONSABLE';
		default:
			$msj = 'ORDENANZA';
			break;
	}	
	
?>
<header>
	<div class="header">
		
		<h1>Sistema de Limpieza</h1>
		<div class="optionsBar">
			<p>El Salvador, <?php echo fechaC(); ?></p>
			<span>|</span>
			<span class="user"><?php echo $_SESSION['nombre']; ?></span>
			<span>|</span>
			<span class="user"><?php echo $msj ?></span>
			<img class="photouser" src="img/user.png" alt="Usuario">
			<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
		</div>
	</div>
	<?php require 'nav.php'; ?>
</header>