<?php 

	require '../conexion/modelo.php';

	if(!empty($_POST))
	{
		//buscar producto
		if($_POST['action'] == 'searchProdc')
		{
			//print_r($_POST);
			if (!empty($_POST['producto'])) 
			{
				$cod=$_POST['producto'];
				$sql = "CALL sp_consultaProductosCP_wvp ($cod)";
				$query = mysqli_query($cnnAux1,$sql);
				mysqli_close($cnnAux);
				$result = mysqli_num_rows($query);
				$data = '';
				if ($result>0) 
				{
					$data = mysqli_fetch_assoc($query);
					//mysqli_fetch_assoc
					//mysqli_fetch_array
				}
				else
				{
					$data = 0;
				}
				echo json_encode($data,JSON_UNESCAPED_UNICODE);
			}
			//echo 'buscar producto';
			exit;
		}
		
	}

	function unique_multidim_array($array, $key) 
	{
		    $temp_array = array();
		    $i = 0;
		    $key_array = array();
		   
		    foreach($array as $val) {
		        if (!in_array($val[$key], $key_array)) {
		            $key_array[$i] = $val[$key];
		            $temp_array[$i] = $val;
		        }
		        $i++;
		    }
		    return $temp_array;
	}


 ?>