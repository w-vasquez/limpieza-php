<nav>
	
	<?php
		switch ($_SESSION['rol']) {
			case 1: //INICIO MENÚ ADMIN
	?>
				<ul>
					<li><a href="index.php">Inicio</a></li>
					<li class="principal">
						<a href="#">Usuarios</a>
						<ul>
							<li><a href="#">Nuevo Usuario</a></li>
							<li><a href="#">Lista de Usuarios</a></li>
							<li><a href="#">Asignar Ordenanza</a></li>
						</ul>
					</li>
					<li class="principal">
						<a href="#">Laboratorios</a>
						<ul>
							<li><a href="#">Nuevo Laboratorio</a></li>
							<li><a href="#">Lista de Laboratorios</a></li>
						</ul>
					</li>
					<li class="principal">
						<a href="#">Edificio</a>
						<ul>
							<li><a href="#">Nuevo Edificio</a></li>
							<li><a href="#">Lista de Edificios</a></li>
						</ul>
					</li>
					<li class="principal">
						<a href="#">Programas</a>
						<ul>
							<li><a href="#">Historial</a></li>
						</ul>
					</li>
				</ul>

			<?php	
				break;
			case 2:	//INICIO MENÚ RESPONSABLE

			?>
				<ul>
					<li><a href="index.php">Inicio</a></li>
					<li class="principal">
						<a href="#">Horarios</a>
						<ul>
							<li><a href="responsable_crear_horario.php">Nuevo Horarios</a></li>
							<li><a href="#">Lista de Horarios</a></li>
						</ul>
					</li>
					<li class="principal">
						<a href="#">Programas</a>
						<ul>
							<li><a href="#">Nuevo Programa</a></li>
							<li><a href="#">Lista de Programas</a></li>
						</ul>
					</li>
					<li class="principal">
						<a href="#">Calificación</a>
						<ul>
							<li><a href="responsable_lista_programa.php">Nueva Calificación</a></li>
							<li><a href="#">Lista de calificaciones</a></li>
						</ul>
					</li>
				</ul>
			<?php
				break;
			case 3: //INICIO MENÚ ORDENZA

			?>
				<ul>
					<li><a href="index.php">Inicio</a></li>
					<li class="principal">
						<a href="#">Programaciones</a>
						<ul>
							<li><a href="ordenanza_programas.php">Asignaturas</a></li>
						</ul>
					</li>
					<li class="principal">
						<a href="#">Historial</a>
						<ul>
							<li><a href="#">Lista de Historial</a></li>
						</ul>
					</li>
				</ul>
			<?php	
				break;
		}
	 ?>
	
		
</nav>