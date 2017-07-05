<?php

define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('DB', 'apolearn');

	include_once('inc_bdd.php');
	include("librerie.php");
    include('functon_class.php');

    // ================================================== verif si les chemps son bien remplie ================================================================
    if(isset($_POST['new_pass']) && $_POST['new_pass'] != NULL && isset($_POST['conf_new_pass']) && $_POST['conf_new_pass'] != NULL && isset($_POST['id']) && $_POST['id'] != NULL)
	{

		$pass1 = $_POST['new_pass'];
		$pass2 = $_POST['conf_new_pass'];                                                           // declaration de variable pour l'interation dans la base
		$id = $_POST['id'];

		if(verif_pass($pass1, $pass2))                                                              //verif du formuler si les deux mot de passe son identique
		{
            $pass = new formuler();
                                                                                                    //update de l'utilisateur sur le mot de passe en supriment le token et la date
            $query = $db->prepare('UPDATE utilisateur SET mot_de_passe = :mot_de_passe,token="", date_expiration="" WHERE id = :id');

            $query->bindValue(':mot_de_passe', $pass->cryptPassword($pass1), PDO::PARAM_STR);       //si c'est bon on rentre les mot de passe dans la base de donnee avec une cle de criptage
			$query->bindValue(':id', $id, PDO::PARAM_INT);
			$query->execute();

			echo"<h1 style=\"text-align: center\">le nouveau mot de passe a biens été changer </h1>";

			echo"<p style=\"text-align: center\"><a href='#' >Retour vers le formulaire</a></p>";
		}
        else
        {
            echo'<h1 style="text-align: center">les deux champs ne son pas indentique</h1>';
        }
	}
	else
	{
		echo "les champs ne son pas bon";
	}



