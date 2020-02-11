<?php

//This stuff triggers the form submission, customizes where the email goes and what shows up in the subject line.	

	if (isset($_POST['submit']))//match the name of your submit button
	{
		$to = 'jordanmattmiller@gmail.com'; //use your email address you want to get the messages at
		$subject = 'Website inquiry'; //The subject line in received messages

//This stuff shows up in the body of the email you get when someone fill out and submits a form.	
		
		$message = 'name: ' . $_POST['name'] . "\r\n\r\n"; //match the 'name' attribute in the formfield	
		$message .= 'email address: ' . $_POST['email'] . "\r\n\r\n";
		$message .= 'email sign up: ' . $_POST['optin'] . "\r\n\r\n";
		$message .= 'Communication method: ' . $_POST['preferred'] . "\r\n\r\n";
		$message .= 'comments: ' . $_POST['comments'];
		
		$headers = "From: email@email.com\r\n"; // reccommended to use an email address from the sites domain the form lives on.
		$headers = "From: email@email.com\r\n"; // reccommended to use an email address from the sites domain the form lives on.
		$headers .= 'Content-Type: text/plain; charset=utf-8'; //makes sure text loads in your email
		$success = mail($to, $subject, $message, $headers); //Triggers submission.
	}
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Confirmation Page</title>
		<link href="../form/main.css" rel="stylesheet" type="text/css">

		<style>
			.custom-text
			{
				color:red;
			}
		</style>
	</head>

	<body>
		<div class="page-wrap">
			
		<!--These messages display to the user after submiting the form.
		notice after "Post" the name attribute of the desired filled out form element is typed  It's a way to customize your message back to the person who filled out the form-->	
			
			<h2> Thank you, <span class="custom-text"><?php echo $_POST["name"]; ?></span>, for your submission.</h2>

			<h3>The coupon code will be sent to <span class="custom-text"><?php echo $_POST["email"]; ?></span> within the next 24 hours.</h3>

			<p>Your message is: <strong><?php echo $_POST["comments"]; ?></strong></p>

			<h4>Why don't you check out some other great deals while you wait!</h4>
		</div>	
	</body>
</html>