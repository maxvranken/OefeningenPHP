<?php
	include_once('../classes/User.class.php');
if(!empty($_POST["username"]))
{
	echo "Tis ni empty";
	$mysqli = new mysqli('localhost' , 'root', '', 'imd');
	if ($mysqli->connect_error){
		die('Could not connect to database!');
	}

	$sql = "SELECT * FROM tblusers WHERE user_login = 'username'";
	$result = mysqli_query($con,$query);
	if(mysqli_num_rows($result)>=1)
	{
		$response['status'] = 'succes';
		$response['message']= 'Naam beschikbaar';
	}else{
		$response['status'] = 'error';
		$response['message'] = 'Naam niet beschikbaar';
	}
	header('Content-Type: application/json');
	echo json_encode($response); // {status: 'error', message:''}
}
else echo "ist empty????";

	?>

