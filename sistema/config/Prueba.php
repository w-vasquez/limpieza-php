 <?php $host="limpieza3.mysql.database.azure.com";
         $user="principal@limpieza3";
         $clav="4t3c_2020";
         $db="limpieza";
         $conexion= new mysqli($host,$user,$clav,$db);
         if($conex->connect_errno){
            die ("Fallo al conectar a MySQL: (" . $conex->connect_errno . ") " . $conex->connect_error);
        }else{        
            echo "troliado";
            $a=$_POST["nombre"];
            $b=$_POST["apellido"];
            $c=$_POST["fecha_inicio"];
            $d=$_POST["correo"];
            $e=$_POST["cel"];
            $f=$_POST["pas"];
            $i=$_POST["estus"];
            $g=intval($_POST["est"]);
            $h=intval($_POST["id"]);
            $tabla="usuario";
            $sentencia="".$g.",'".$a."','".$b."','".$c."','".$d."','".$i."','".$e."','".$f."'";
            $insert="INSERT into ".$tabla." values(null,".$sentencia.")";
            echo $insert;
        }
            

?>