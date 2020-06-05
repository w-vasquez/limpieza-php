<?php 

    include '../conexion/modelo.php';
    $modelo = new Curl();

    $idHorario = $_GET['idHorario'];
    $nomLab = $_GET['nomLab'];
    $nomHorario = $_GET['nomHorario'];

    /*print_r($_POST);
    exit;*/
    if(!empty($_POST)) //si es vacío
    {
        $alert="";
        //print_r($_POST);
        if(!isset($_POST['tiempo'])){
            $alert = '<p class="msg_error">Contabilizar el tiempo para continuar</p>';
        }else{
            
            //$tmpTrans = isset($_POST['txt_tiempo']) ? $_POST['txt_tiempo'] : '';
            $tiempo = $_POST['tiempo'];
            $dia = date('Y-m-d');
            $comentario = $_POST['txt_comentario'];
            $stt = "concluido";

            //echo $tiempo;
            //echo($tmpTrans);
            //echo($idHorario);

            $data_array=array(
                'tiempoTranscurrido' => $tiempo,
                'horario' => $idHorario,
                'estadoLimpieza' => $stt,
                'comentario' => $comentario,
                'fecha_programada' => $dia
            );


            $metodo='POST';
            $accion='insertar.php';
            $url = 'http://limpieza.azurewebsites.net/WS/API/programacion/';
            $elJson=json_encode($data_array);
            
            $rs = $modelo->sentenciaAccion($metodo,$url.$accion,$elJson);
            //$response = json_decode($rs, true);
        
            if($rs){
                $alert = '<p class="msg_save">Dia de limpieza creado con exito</p>';
            }else{
                $alert = '<p class="msg_error">Un error totalmente exitoso</p>';
            }           
        }
    }else{
        $alert = '<p class="msg_save">Presionar el botón iniciar para manejar el cronómetro</p>';
    }

    
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include 'includes/scripts.php' ?>
	<title>Ordenanza | Cronómetro</title>
</head>
<body>
<?php include 'includes/header.php' ?>

<section id="container">
    <h1>Cronómetro de limpieza</h1>
    <div id="contenedor_reloj">
        
        <div class="reloj" id="Horas">00</div>
        <div class="reloj" id="Minutos">:00</div>
        <div class="reloj" id="Segundos">:00</div>
        <div class="reloj" id="Centesimas">:00</div>
    </div>
    <div id="contenedor_reloj">
        <input type="button" class="boton" id="inicio" value="Inicio " onclick="inicio();">
        <input type="button" class="boton" id="parar" value="Parar " onclick="parar();" disabled>
        <input type="button" class="boton" id="continuar" value="Reanudar" onclick="inicio();" disabled>
        <input type="button" class="boton" id="reinicio" value="Reiniciar " onclick="reinicio();" disabled>
    </div>
    
     <!-- <div class="" id="txt_tiempo"></div> -->
    
    <div class="form_cronometro">
        <h2>DATOS DE LA LIMPIEZA</h2>
        <hr>
        <div class="alert"><?php echo isset($alert) ? $alert : "" ; ?></div>

        <form action="" method="POST" enctype="multipart/form-data">

            <label for="laboratorio">Nombre del laboratorio</label>
            <input type="text" name="laboratorio" id="laboratorio" value="<?php echo $nomLab ?>" disabled>
            
            <label for="dia_limpieza">Día limpieza</label>
            <input type="text" name="dia_limpieza" id="dia_limpieza" value="<?php echo date('F j, Y, g:i a'); ?>" disabled>

            <label for="ordenanza">Ordenanza</label>
            <input type="text" name="ordenanza" id="ordenanza" value="<?php echo $_SESSION['nombre'] ?>" disabled>
            
            <label for="txt_tiempo">Minutos finales transcurridos (HH:MM:SS)</label>
            <input type="text" name="txt_tiempo" id="txt_tiempo" value="" disabled>
            <input type="hidden" name="tiempo" id="tiempo" value="">

            <label for="txt_comentario">Comentarios:</label>
            <textarea type="text" name="txt_comentario" id="txt_comentario" value=""></textarea>
            
            <input type="submit" value="Finalizar" class="btn_save">
        </form>        
    </div>
</section>
        <?php include 'includes/footer.php' ?>
</body>
</html>