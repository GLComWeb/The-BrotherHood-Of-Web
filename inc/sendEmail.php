<?php

// Replace this with your own email address
$siteOwnersEmail = 'gerard.lerandy@gmail.com';
$message = '';

if($_POST) {
	//Tu peux modifier ça si tu veux Depuis glcomweb.com -
	$subject = "Depuis glcomweb.com/Apolearn2";
   	$name = trim(stripslashes($_POST['name']));
   	$firstname = trim(stripslashes($_POST['firstname']));
   	$email = trim(stripslashes($_POST['email']));
   	$subject .= trim(stripslashes($_POST['subject']));
   	$contact_message = trim(stripslashes($_POST['message']));

	   	// Check Name
		if (strlen($name) < 2){
			$error['name'] = "Entrer votre nom, s'il vous plaît.";
		}
		//Check FirstName
		if (strlen($firstname) < 2){
			$error['firstname'] = "Entrer votre prénom, s'il vous plaît.";
		}
		// Check Email
		if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)){
			$error['email'] = "Entrer un email valide, s'il vous plaît.";
		}
		// Subject
		if ($subject == '') { $subject = "Contact Form Submission";
		}
		// Check Message
		if (strlen($contact_message) < 15){
			$error['message'] = "Entrer votre message, s'il vous plaît. Il devrait avoir au moins 15 caractères.";
		}

   // Set Message
   $message .= "Email from: " . $name . " ". $firstname . "<br />";
   $message .= "Email address: " . $email . "<br />";
   $message .= "Message: <br />";
   $message .= $contact_message;
   $message .= "<br /> ----- <br /> Cette e-mail a été envoyé à partir du formulaire de contact de votre site. <br />";

   // Set From: header
   $from =  $name . " <" . $email . ">";

   // Email Headers
	/*    
	Avant :(
	$headers = "From:\"Gérard Lerandy\"<gerard.lerandy@gmail.com> " . $from . "\r\n";
	$headers .= "Reply-To:\"Gérard Lerandy\"<gerard.lerandy@gmail.com> ". $email . "\r\n";
	$headers est la variable qui contient l'entete du mail
	*/

	$headers = "From: " . $email . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


	if (empty($error)){
	  ini_set("sendmail_from", $siteOwnersEmail); // for windows server
	  $mail = mail($siteOwnersEmail, $subject, $message, $headers);

		if ($mail){
			echo "OK";
		}else{
			echo "Quelque chose s'est mal passé. Veuillez réessayer.";
		}
		
	}/*end if - no validation error*/else{
		$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
		$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
		
		echo $response;

	} # end if - there was a validation error

}

?>
