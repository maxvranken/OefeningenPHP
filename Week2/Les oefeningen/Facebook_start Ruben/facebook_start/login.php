<?php
function canLogin( $p_username, $p_password )
{
    if ( $p_username == "joris@email.com" && $p_password == "secret" ) {
        return true;
    } else {
        return false;
    }
};

if ( !empty( $_POST ) ) {
    $username = $_POST['email'];
    $password = $_POST['password'];

    if ( canLogin($username, $password)  ) {
        //cookie, remember user login
        $salt = "qsdfkaijlenm85DS!.xxx";
        $secret = $username . "," . md5( $username . $salt );
        //joris, qjdfklqmfiejkqdlmfqj
        setcookie("loggedin", $secret, time()+60*60);
          //redirect to index.php
            header('Location: index.php');
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


    <form class="login-form" method="POST" action="">
        <label>
            <input type="email" name="email" placeholder="Email">
        </label>
        <label>
            <input type="password" name="password" placeholder="Password">
        </label>
        <input type="submit" value="Login">
    </form>
    <h5><a href="#">Forgot password</a></h5>
</section>
</body>
</html>