<?php 

	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('DB', 'apolearn');

	include_once('inc_bdd.php');
	include("librerie.php");


	if((!empty($_POST['email']))&&(!empty($_POST['mot_de_passe'])))
	{
		$e_mail=trim($_POST['email']);
		$mot_de_passe=trim($_POST['mot_de_passe']);   
		     
		$query = $db->prepare('SELECT id, nom, prenom, mot_de_passe FROM utilisateur WHERE email = ?');
		$query->bindValue(1, $_POST['email'], PDO::PARAM_STR);
		$query->execute();
		

		$result=$query->fetch();

		if($result != NULL)
		{
			//verif mot de passe
			$mot_de_passe = md5($mot_de_passe);

			if($mot_de_passe = $result['mot_de_passe'])
			{

				//si mdp concordent
				echo "vous ete connecté !<br> bojour <br> Mr ".$result['nom'].' '.$result['prenom'];
				session_start();
				$_SESSION['id'] = $result['id'];
				$_SESSION['nom'] = $result['nom'];
				$_SESSION['prenom'] = $result['prenom'];

			}
			else
			{
				echo "mdp pas bon";
			}
		}
		else
		{
			echo "email pas bon";
		}
	}
	else
	{
		echo "un champ n'est pas rempli";
	}
	//ATTENTION ! changer le nom du fichier de la page d'accueil selon le vôtre !
	echo "<p><a href='form-conexion.php'>retour a l'accueil</a></p>";