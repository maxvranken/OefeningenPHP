<?php

//message ophamen $_POST
//new Activity
//->Save();

//antwoorden in JSON

//Eerst bouwen we onze applicatie uit zodat ze werkt, ook zonder JavaScript

include_once("../classes/Activity.class.php");
$activity = new Activity();

//controleer of er een update wordt verzonden
if (!empty($_POST['message'])) {
    $activity->Text = $_POST['message'];
    try {
        $activity->Save();
        $response['status'] = 'succes';
        $response['message']= 'Update succesful';

    } catch (Exception $e) {
        $feedback = $e->getMessage();
        $response['status'] = 'error';
        $response['message'] = $feedback;
    }
    header('Content-Type: application/json');
    echo json_encode($response); // {status: 'error', message:''}
}


?>