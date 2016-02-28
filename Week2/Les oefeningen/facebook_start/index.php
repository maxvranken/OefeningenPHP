<?php
   //check if cookie exists
    session_start();
    if($_SESSION['loggedin'] == "yes"){



        /*$cookie =  $_COOKIE['loggedin'];

         $arrCookie = explode(",", $cookie);
        var_dump($arrCookie);
        $username = $arrCookie[0];
        $hash = $arrCookie[1];
        echo $username , $hash;

        $salt = "saltieeerandom56654654";
        $check = md5( $username . $salt);

        if($check == $hash){
        //welcome

        */ } else{
           header("Location: login.php");

    }
   //if not, redirect to login.php
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook</title>
    <!-- LAYOUT BY ED BOND: http://codepen.io/edbond88/pen/yGjAu -->
    <link rel="stylesheet" href="css/facebook.css">
</head>
<body>
        <section class="login-form-wrap" style="height: 156px">
          <p class="message"> Welcome back!</p>
          <a style="color: white" href="logout.php">Logout</a>
        </section>
</body>
</html>