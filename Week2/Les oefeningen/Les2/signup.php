<?php

if( !empty( $_POST ) ){
    $email = $_POST['email'];
    $username =$_POST['username'];
    $options = $options = [
        'cost' => 12
    ];

    //$password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);
    $password = hash('SHA256', $_POST['password']);

    // connectie
    $conn = new mysqli("46.21.173.241", "rubenpd169_Admin", "MaxVincentRuben", "rubenpd169_DiveAdvisor");
    if( $conn->connect_errno ){
        die("No database connection");
    }

    // query
    $query = "insert into USER (Username, Password, Email) values ('$email' , '$password','$username');";
    if( $conn->query( $query ) ){
        $success = "Welcome aboard!";
    }
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook</title>
    <!-- LAYOUT BY ED BOND: http://codepen.io/edbond88/pen/yGjAu -->
    <link rel="stylesheet" href="css/facebook.css">
</head>
<body>
<section class="login-form-wrap">
    <h1>Facebook</h1>

    <?php
    if( isset($success) ){
        echo "<p class='message'>$success</p>";
    }
    ?>

    <form class="login-form" method="POST" action="">
        <label>
            <input type="text" name="username" placeholder="Username">
        </label
        <label>
            <input type="email" name="email" placeholder="Email">
        </label>
        <label>
            <input required type="password" name="password" placeholder="Password">
        </label>
        <input type="submit" value="Sign up">
    </form>
    <h5><a href="#">Forgot password</a></h5>
</section>
</body>
</html>