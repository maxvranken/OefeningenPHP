<?php

include_once('../classes/Booking.class.php');
$booking = new Booking();
if(!empty($_POST['firstname'])) {
    $booking->Firstname = $_POST['firstname'];
    if($booking->UsernameAvailable()) {
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

