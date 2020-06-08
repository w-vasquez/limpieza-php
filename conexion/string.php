<?php
    
    class StringConexion
    {
        //parametros de la DB
        private $host = 'limpieza3.mysql.database.azure.com';
        private $port = 3306;
        private $db_name = 'limpieza';
        //private $db_name = 'laboratorio';
        private $usuario = 'principal@limpieza3';
        private $clave = '4t3c_2020';

        //variable para la conexion
        private $conex;

        //conectar a la base de datos

        public function conectar()
		{
			$mysqli = @new mysqli($this->host, $this->usuario, $this->clave,$this->db_name);

			if ($mysqli->connect_errno)
			{
				//printf("Connect failed: %s\n", mysqli_connect_error());
				die("Mensaje de conexión: ". $mysqli->connect_errno." - ".$mysqli->connect_error);

			}
			
			mysqli_set_charset( $mysqli, 'utf8');
			$this->conex = $mysqli;

			return $mysqli;
		}

		public function cerrar()
		{
			mysqli_close($this->conex);
		}

    }

    $cnnString = new StringConexion();
    $cnn = $cnnString->conectar();


 //    if (!$cnn) {
 //    	die("Connection failed: " . mysqli_connect_error());
	// }
	// echo "Connected successfully";
	// mysqli_close($cnn);






?>