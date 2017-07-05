<?php 

//form pour les utilisateur
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('DB', 'apolearn');

	include_once('inc_bdd.php');
	include("librerie.php");
    include('functon_class.php');

$form = array('civilite', 'nom', 'prenom', 'date_naissance', 'telephone_fixe', 'telephone_mobile', 'adresse', 'code_postal', 'ville', 'email', 'passe1', 'passe2');

//fonction verife que tous le inpute soi remplie 
if (valid_form($_POST, $form)) 
{
	
	//je fait appel a la fonction pour genere la securiter xss
        $civilite = echappement($_POST["civilite"]);
        $nom = echappement($_POST["nom"]);
		$prenom = echappement($_POST["prenom"]);
        $date_naissance = echappement($_POST["date_naissance"]);
		$telephone_fixe = echappement($_POST["telephone_fixe"]);
		$telephone_mobile = echappement($_POST["telephone_mobile"]);
		$adresse = echappement($_POST["adresse"]);                                              //integration de l'utilisateur dans la base de donnee
		$code_postal = echappement($_POST["code_postal"]);
		$ville = echappement($_POST["ville"]);
        $email = echappement($_POST["email"]);
		$mot_de_passe = echappement($_POST["passe1"]);
		$verif_passe = echappement($_POST["passe2"]);


                                                                                                // la je fait appel a une fonction de verification de mot de passe
		if(verif_pass($mot_de_passe, $verif_passe))
		{
			$query = $db->prepare('SELECT email FROM utilisateur WHERE email = ?');
			$query->bindValue(1, $email, PDO::PARAM_STR);
			$query->execute();

			$result = $query->fetch();

			if($result == NULL)
			{
                $pass = new formuler;

				$query = $db->prepare('INSERT INTO utilisateur (civilite , nom, prenom, email, telephone_fixe, telephone_mobile, mot_de_passe, date_naissance, adresse, ville, code_postal)
                                      VALUES (:civilite,:nom, :prenom, :email, :telephone_fixe, :telephone_mobile, :mot_de_passe, :date_naissance, :adresse, :ville, :code_postal)');
                $query->bindValue(":civilite", $civilite, PDO::PARAM_STR);
				$query->bindValue(":nom", $nom, PDO::PARAM_STR);
				$query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
				$query->bindValue(":email", $email, PDO::PARAM_STR);
				$query->bindValue(":telephone_fixe", $telephone_fixe, PDO::PARAM_STR);
				$query->bindValue(":telephone_mobile", $telephone_mobile, PDO::PARAM_STR);
				$query->bindValue(":mot_de_passe", $pass->cryptPassword($mot_de_passe), PDO::PARAM_STR);
				$query->bindValue(":date_naissance", $date_naissance, PDO::PARAM_STR);
				$query->bindValue(":adresse", $adresse, PDO::PARAM_STR);
				$query->bindValue(":ville", $ville, PDO::PARAM_STR);
				$query->bindValue(":code_postal", $code_postal, PDO::PARAM_STR);

				$query->execute();

				echo "OK !";
			}
			else
			{
				echo "Email déja inscrit";
			}
		}
		else
		{
			echo "le champs est pas valide";
		}
}
else
{
	echo "<p>les champs ne son pas replie</p>";
}








?>