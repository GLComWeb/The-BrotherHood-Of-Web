<?php

define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('DB', 'apolearn');

	include_once('inc_bdd.php');
	include("librerie.php");


session_start();
//On va vérifier :

	//Si le jeton est présent dans la session et dans le formulaire
	if(isset($_POST['email']) && isset($_SESSION['token']))
	{
		$query = $db->prepare('SELECT id FROM utilisateur WHERE email = ?');						//verif si le mail de l'utilisation et bien dans la base de donnee
		$query->bindValue(1, $_POST['email'], PDO::PARAM_STR);
		$query->execute();

		$result = $query->fetch();

		if ($result != NULL) {																	// verif et updete dans la base de l'utilisateur pour le token

			$id = $result['id'];
			$token = $_SESSION['token'];


			$query = $db->prepare('UPDATE utilisateur SET token = :token WHERE id = :id');   	// clé token de l'utilisateur
            $query->bindValue(':token', $token, PDO::PARAM_STR);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $query = $db->prepare('UPDATE utilisateur SET date_expiration = NOW() WHERE id = :id'); // date et heure de l'inscription
            $query->bindValue(':id', $id, PDO::PARAM_INT);

			$query->execute();


			$lien = "redef_mdp.php?id=" . $id . "&token=" . $token;

			echo "<a href='" . $lien . "'>redefinir le mot de passe</a>";
		} else
		{
			echo "Email n'est pas dans la base";
		}
	}
	else
	{
		echo "<p>Veuillez remplir le champ !</p>";
	}
	echo "<p><a href='oubli.php'>Retour vers le formulaire</a></p>";
?>
