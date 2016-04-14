<?php
	include_once ('classes/Booking.class.php');

	if(!empty($_POST)) {
		try{
		$booking = new Booking();
		$booking->Firstname = $_POST['firstname'];
		$booking->Lastname = $_POST['lastname'];
		$booking->Hotel = $_POST['hotel'];
		$booking->CheckinDay = $_POST['checkinday'];
		$booking->CheckinMonth = $_POST['checkinmonth'];
		$booking->CheckoutDay = $_POST['checkoutday'];
		$booking->CheckoutMonth = $_POST['checkoutmonth'];
		$booking->Save();
		$feedback = "Thanks for booking with us";
	}catch (Exception $e) {
			$feedback = $e->getMessage();

		}
	}
	
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Voorbereiding test</title>
<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/screen.css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.2.1.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#firstname").on("keyup", function(e){
				var firstname = $("#firstname").val();
				$(".usernameFeedback").show();

				$.post("ajax/check_username.php" , {firstname: firstname} )
					.done(function(response){
						$("#loadingImage").show();
						$('.usernameFeedback span').text(response.message);

						if(response.status === 'error'){
							$('#btnSubmit').prop('disabled', true);
							$("#loadingImage").hide();
							$("#firstname").addClass("notok");
						}
						else{
							$('#btnSubmit').prop('disabled', false);
							$("#firstname").removeClass("notok");
							$("#firstname").addClass("ok");
							$(".notok").show();

						}


					});
				e.preventDefault();
			});

		});



	</script>



</head>
<body>
<div>
	<?php if(isset($feedback)): ?>

		<div class="feedback"><?php echo $feedback ?></div>

	<?php else : ?>

	<div class="feedback">Gelieve alle velden in te vullen</div>
	<?php endif; ?>

	<form method="post" action="">
		<fieldset>
		<legend>Book-a-hotel</legend>
			<label for="firstname">First Name</label>
			<input class="enlarge" type="text" id="firstname" name="firstname" />
			<div class="usernameFeedback"><img id="loadingImage" src="images/loading.gif" /><span id="feedback">checking</span></div>
			
			<label for="lastname">Last Name</label>
			<input class="enlarge" type="text" id="lastname" name="lastname" />
		
			<label for="hotel">Pick a hotel</label>
			<select class="enlarge" name="hotel" id="hotel">
				<option value="luxury">IMD Luxury Mechelen</option>
				<option value="medium">IMD Medium Mechelen</option>
				<option value="cheapo">IMD Cheapo Mechelen</option>
			</select>
			
			<label for="checkinday">Check-in date</label>
			<select class="enlarge" id="checkinday" name="checkinday">
				<option value="1">mo 1</option>
				<option value="2">tu 2</option>
				<option value="3">we 3</option>
				<option value="4">th 4</option>
				<option value="5">fr 5</option>
				<option value="6">sa 6</option>
				<option value="7">su 7</option>
			</select>
			
			<select class="enlarge" id="checkinmonth" name="checkinmonth">
				<option value="1">january</option>
				<option value="2">february</option>
				<option value="3">march</option>
				<option value="4">april</option>
				<option value="5">may</option>
				<option value="6">june</option>
				<option value="7">july</option>
				<option value="8">august</option>
				<option value="9">september</option>
				<option value="10">october</option>
				<option value="11">november</option>
				<option value="12">december</option>
			</select>
			
			<label for="checkoutday">Check-out date</label>
			<select class="enlarge" id="checkoutday" name="checkoutday">
				<option value="1">mo 1</option>
				<option value="2">tu 2</option>
				<option value="3">we 3</option>
				<option value="4">th 4</option>
				<option value="5">fr 5</option>
				<option value="6">sa 6</option>
				<option value="7">su 7</option>
			</select>
			
			<select class="enlarge" id="checkoutmonth" name="checkoutmonth">
				<option value="1">january</option>
				<option value="2">february</option>
				<option value="3">march</option>
				<option value="4">april</option>
				<option value="5">may</option>
				<option value="6">june</option>
				<option value="7">july</option>
				<option value="8">august</option>
				<option value="9">september</option>
				<option value="10">october</option>
				<option value="11">november</option>
				<option value="12">december</option>
			</select>
		
			<br />
		
			<input class="submit" type="submit" id="btnSubmit" value="Confirm reservation" />
		
		</fieldset>
	</form>
</div>
</body>
</html>