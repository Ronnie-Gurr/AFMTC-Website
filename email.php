<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$lastName = $_POST['lastName'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'AFMTC Contact Form!'; 
		$to = 'ronniegurr7@gmail.com'; 
		$subject = 'Message from Contact Form AFMTC';
		
		$body ="From: $name\n Last Name: $lastName\n E-Mail: $email\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}

		// Check if last name has been entered
		if (!$_POST['lastName']) {
			$errlastName = 'Please enter your last name';
		}	
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}
// If there are no errors, send the email
if (!$errName && !$errlastName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		echo ('<script>alert("Thank you for your message, we will contact you soon!"); window.location = "contact.html"</script>');
	} else {
		echo('<script>alert("Sorry there was an error sending your message. Please try again later!"); window.location = "contact.html"</script>');
	}
}
	}
?>