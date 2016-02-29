<?php
setcookie("loggedin", "", time()-1);
header('Location: login.php');
?>