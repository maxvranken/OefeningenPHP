<?php
// var_dump($_GET); //superglobal array $GET[]
/*if(!empty($_GET)){
    $mail = $_GET['myemail'];
    echo $mail;
}
 GET haalt je naam uit de url, bij method=get gebruiken*/
if(!empty($_POST)){
    $mail = $_POST['myemail'];
    echo $mail;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Froms</title>
</head>
<body>
<form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="email">Email</label>
    <input type="text" id="email" placeholder="Email" name="myemail">
    <input type="submit" value="sign me up">

</form>
</body>
</html>