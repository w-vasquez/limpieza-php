<?php 

	require '../../conexion/string.php';

	if(!empty($_POST))
	{
		if($_POST['action'] == 'searchUser')
		{
			//print_r($_POST);
			if (!empty($_POST['usr'])) 
			{
				$usr=$_POST['usr'];
				$sql = "select * from usuario where correo = ".$usr;
				$query = mysqli_query($cnn,$sql);
				


				mysqli_close($cnn);
				print_r($query);
				//$result = mysqli_num_rows($query);
				
				// $data = '';
				// if ($result>0) 
				// {
				// 	$data = mysqli_fetch_assoc($query);
				// }
				// else
				// {
				// 	$data = 0;
				// }
				// echo json_encode($data,JSON_UNESCAPED_UNICODE);
			}
			exit;
		}
		
	}

	


 ?>