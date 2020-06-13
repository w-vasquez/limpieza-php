<?php
    include ("./cone.php");
    //Llamar a la clase
    $u=new potencial();
    $p=$_POST["btnGuardar"];
    //Variables que resiven nuestro formulario
    $a=$_POST["nombre"];
    $b=$_POST["apellido"];
    $c=$_POST["fecha_inicio"];
    $d=$_POST["correo"];
    $e=$_POST["cel"];
    $f=$_POST["pas"];
    $i=$_POST["estus"];
    //El campo es de tipo int en la base de datos por eso ponemos intval
    $g=$_POST["est"];
    $h=$_POST["id"];
    switch($p){
        case "Guardar":      
            $sentencia=$g.",'".$a."','".$b."','".$c."','".$d."','".$i."','".$e."','".$f."'";            
            $action=$u->insertar($sentencia);            
            if($action){
            echo "Datos ingresados correctamente ";
            header("Location:../Crear_Usuario.php");
            }else if(!$action){
            echo "No insertado";
            }
        break;
        default:
            echo "Error datos mal usados";
        break;
    }
?>