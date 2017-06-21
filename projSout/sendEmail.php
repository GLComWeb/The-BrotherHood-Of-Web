 <?php

// Constante de longueur de chaîne
define('LEN_NAME', 2);		// longueur du nom
define('LEN_MESSAGE', 15);  // longueur du message

// Replace this with your own email address
$siteOwnersEmail = 'gerard.lerandy@gmail.com';
$message = '';

if ( isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'] ) ) {
	//Tu peux modifier ça si tu veux Depuis glcomweb.com - 
	//$subject = "Depuis glcomweb.com";  
	
    $name 			 = trim(stripslashes($_POST['name']));

	// Vérifie que l'adresse email est correct
	$email 			 = filter_var( trim(stripslashes($_POST['email'])), FILTER_VALIDATE_EMAIL );

    $subject 		 = trim(stripslashes($_POST['subject']));
    $contact_message = trim(stripslashes($_POST['message']));

   // Check Name
	if ( strlen($name) < LEN_NAME ) {
		$error['name'] = "Votre nom doit contenir au moins 2 caractères!";
	}
	// Check Email
	// if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
	// 	$error['email'] = "Entrer un email valide, s'il vous plaît.";
	// }
	

	// Check Message
	if ( strlen($contact_message) < LEN_MESSAGE ) {
		$error['message'] = "Votre message doit contenir au moins 15 caractères";
	}
   // Subject
	//if ($subject == '') { $subject = "Contact Form Submission"; }


   // Set Message
   $message .= "Email from: " . $name . "<br />";
   $message .= "Email address: " . $email . "<br />";
   $message .= "Message: <br />";
   $message .= $contact_message;
   $message .= "<br /> ----- <br /> Cette e-mail a été envoyé à partir du formulaire de contact de votre site. <br />";

   if (isset($error['name']) ) {
   	echo '[ERROR] - '.$error['name'];
   }

   // Set From: header
   $from = $name . ' < ' . $email . ' > ';

   // Email Headers
	/*    
	Avant :(
	$headers = "From:\"Gérard Lerandy\"<gerard.lerandy@gmail.com> " . $from . "\r\n";
	$headers .= "Reply-To:\"Gérard Lerandy\"<gerard.lerandy@gmail.com> ". $email . "\r\n";
	$headers est la variable qui contient l'entete du mail
	*/
	
	$headers  = "From: " . $email . "\r\n";
 	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    if (empty($error)) {

      ini_set("sendmail_from", $siteOwnersEmail); // for windows server
      $mail = mail($siteOwnersEmail, $subject, $message, $headers);

	  if ($mail) { echo "Email Envoyé!"; }
      else { echo "Erreur dans l'envoi du mail"; }
		
	} # end if - no validation error

	else {

		$response  = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
		$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
		
		echo $response;

	} # end if - there was a validation error

} else {
	echo '[ERROR] - Vous n\'avez pas remplis correctement vos champs';
}

?>