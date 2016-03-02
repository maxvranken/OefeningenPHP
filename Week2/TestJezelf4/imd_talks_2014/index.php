<?php
$feedbackname = "";
$feedbackemail = "";
$feedbackpassword = "";

$_SESSION['loggedin'] = "false";


function canLogin( $p_username, $p_password, $p_fullname)
{
	if ( !empty($p_username && $p_password && $p_fullname)) {
		return true;
	} else {
		return false;
	}
};

if ( !empty( $_POST ) ) {
	$username = $_POST['email'];
	$password = $_POST['password'];
	$fullname = $_POST['name'];

	if ( canLogin($username, $password, $fullname)  ) {
		session_start();
		$_SESSION['loggedin'] = "yes";

		header('Location: createpost.php');
	} else {
		if(empty($_POST['name'])) {
			$feedbackname = "vul een  geldige naam in.";
		}
		if(empty($_POST['email'])) {
			$feedbackemail = "vul een geldige email in.";
		}
		if(empty($_POST['password'])) {
			$feedbackpassword = "vul een geldig wachtwoord in.";
		}
	}
}
?>






<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>IMD Talks</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/twitter.css">

</head>
<body>
<?php if(($_SESSION['loggedin'] == "false")): ?>

<?php else: ?>
	<nav>

		<a href="logout.php">Logout</a>


	</nav>
<?php endif; ?>

	<header>
		<h1>Welcome to IMD-Talks</h1>
		<h2>Find out what other IMD'ers are building around you.</h2>
	</header>

	<div id="rightside">


	<section id="signup">

		<h2>New to IMD-Talks? <span>Sign Up</span></h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<span><?php echo $feedbackname ?></span>
			<input type="text" name="name" placeholder="Full name" value="<?php if(isset($_POST['name'])) {echo $_POST['name'];}?>"/>
			<span><?php echo $feedbackemail ?></span>
			<input type="email" name="email" placeholder="Email" value="<?php if(isset($_POST['name'])) {echo $_POST['email'];}?>"/>
			<span><?php echo $feedbackpassword ?></span>
			<input type="password" name="password" placeholder="Password" value="<?php if(isset($_POST['name'])) {echo $_POST['password'];}?>"/>
			<input type="submit" name="btnSignup" value="Sign up for IMD Talks"/>
		</form>

	</section>
	</div>

</body>
</html>