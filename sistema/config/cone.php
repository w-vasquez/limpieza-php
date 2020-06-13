<?php
    class potencial{
        private $host="limpieza3.mysql.database.azure.com";
        private $user="principal@limpieza3";
        private $clav="4t3c_2020";
        private $db="limpieza";
        public $conexion;

        public function __construct(){
            $this->conexion= new mysqli($this->host,$this->user,$this->clav,$this->db) or die(mysqli_error());
            $this->conexion->set_charset("utf8");
        }

        public function insertar($datos){    
            $insert=$this->conexion->query("INSERT INTO usuario(idTipoUsuario,nombre,apellido,f_noc,correo,estado,telefono,password) VALUES (".$datos.")");     
            if ($insert){
                return true;
            }else{
                return false;
            }
        }

        public function buscar($tabla, $condicion){
            $buscar = $this->conexion->query("SELECT * FROM $tabla WHERE $condicion") or die($this->conexion->error);
            if($buscar)
                return $buscar->fetch_all(MYSQLI_ASSOC);
            return false;
        } 

        public function actualizar($tabla,$campos,$condicion){              
                $resultado  =   $this->conexion->query("UPDATE $tabla SET $campos WHERE $condicion") or die($this->conexion->error);
                if($resultado)
                    return true;
                return false;             
        }

        public function bloquear($id){
                $block=$this->conexion->query("UPDATE usuario SET estado='Inactivo' where idUsuario=$id");
                if($block)
                    return true;
                return false;  
        }

        public function desbloquear($id){
            $block=$this->conexion->query("UPDATE usuario SET estado='Activo' where idUsuario=$id");
            if($block)
                return true;
            return false;  
        }

        public function Desconectar(){
            $adios=$this->conexion->close;
            if($adios)
                return true;
            return false;
        }
    }
?>