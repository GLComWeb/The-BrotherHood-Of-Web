<?php

	session_start();

	if(isset($_SESSION['id']))
	{
		session_destroy();
		unset($_SESSION);

		echo "<p> Vous êtes maintenant déconnecté <br> a bientot</p>";
	}
	else
	{
		echo "<p> Vous êtes déjà déconnecté</p>";
	}

	

	//ATTENTION ! changer le nom du fichier de la page d'accueil selon le vôtre !
	echo "<p><a href='form-conexion.php'>deconnection></a></p>";

?>