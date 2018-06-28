<?php 
	
	// your email
	$user_email = "mail@companyname.com";

	$mail = array(
		"name" => htmlspecialchars($_POST['cf-name']),
		"email" => htmlspecialchars($_POST['cf-email']),
		"subject" => htmlspecialchars($_POST['cf-subject']),
		"phone" => htmlspecialchars($_POST['cf-phone']),
		"message" => htmlspecialchars($_POST['cf-message'])
	);
	
	function validate($arr){

		return !empty($arr['name']) && strlen($arr['message']) > 20 && filter_var($arr['email'],FILTER_VALIDATE_EMAIL);

	}

	if(validate($mail)){

		echo mail($user_email, $mail['subject'], 
			"Name : {$mail['name']}\n" 
			."E-mail : {$mail['email']}\n"
			."Phone : {$mail['phone']}\n"
			."Message : {$mail['message']}" 
		);

	}


?>