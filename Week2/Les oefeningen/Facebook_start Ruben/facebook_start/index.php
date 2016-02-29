<?php
    //check if cookie exists
    if( isset( $_COOKIE['loggedin'] ) ) {
        $cookie = $_COOKIE['loggedin'];
        //joris@email.com,qdjfkqmfeijqdklmqfjdkqm

        $arrcookie = explode("," , $cookie);
        //deelt op in array, 0 = email, 1= laatste deel
        $username = $arrcookie[0]; //joris@email.com
        $hash = $arrcookie[1]; //fjkalmfdjkmkdmqjdfqkf
        $salt = "qsdfkaijlenm85DS!.xxx";
        $check = md5( $username . $salt );

        if( $check == $hash ){
            //WELCOME
        } else {
            header('Location: login.php');
        }
    } else {
        header('Location: login.php');
    }
    //if not, redirect to login.php

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook</title>
    <!-- LAYOUT BY ED BOND: http://codepen.io/edbond88/pen/yGjAu -->
    <link rel="stylesheet" href="css/facebook.css">
</head>
<body>
        <section class="login-form-wrap" style="height: 156px">
          <p class="message">Welcome back!</p>
          <a style="color: white" href="logout.php">Logout</a>
        </section>
</body>
</html>