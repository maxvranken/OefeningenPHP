<?php

	include_once('../classes/User.class.php');
$user = new User();
if(!empty($_POST['username'])) {
	$user->Username = $_POST['username'];
	if($user->UsernameAvailable()) {
		$response['status'] = 'success';
		$response['message'] = 'Congrats, u found an original Username!';
	} else {
		$response['status'] = "error";
		$response['message'] = 'Sorry, u will have to be more creative!';
	}

	header('Content-type: application/json');
	echo json_encode($response);
}

	?>

