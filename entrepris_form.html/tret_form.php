<?php session_start();

//form pour les entreprise

	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('DB', 'apolearn');

	include_once('includes/inc_bdd.php');
	include("librerie.php");

$form = array('nom', 'adresse', 'code_postal', 'ville', 'telephone', 'siret', 'num_contract', 'num_tva', 'e_mail');

//fonction verife que tous le inpute soi remplie 
if (valid_form($_POST, $form)) 
{
	
	//je fait appel a la fonction pour genere la securiter xss
		$nom = echappement($_POST["nom"]);
		$adresse = echappement($_POST["adresse"]);
		$code_postal = echappement($_POST["code_postal"]);
		$ville = echappement($_POST["ville"]);
		$telephone = echappement($_POST["telephone"]);
		$siret = echappement($_POST["siret"]);
		$num_contract = echappement($_POST["num_contract"]);
		$num_tva = echappement($_POST["num_tva"]);
		$e_mail = echappement($_POST["e_mail"]);

	//l'integration dans la base de donnee
		$query = $db->prepare('INSERT INTO entreprise (nom, adresse, code_postal, ville, telephone, siret, num_tva, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
				
				$query->bindValue(1, $nom, PDO::PARAM_STR);
				$query->bindValue(2, $adresse, PDO::PARAM_STR);
				$query->bindValue(3, $code_postal, PDO::PARAM_STR);
				$query->bindValue(4, $ville, PDO::PARAM_STR);
				$query->bindValue(5, $telephone, PDO::PARAM_STR);
				$query->bindValue(6, $siret, PDO::PARAM_STR);
				$query->bindValue(7, $num_tva, PDO::PARAM_STR);
				$query->bindValue(8, $e_mail, PDO::PARAM_STR);
				
				$succes = $query->execute();
				echo "vous ette bien inscrit";

				if ($succes) {
					$res = $db->lastInsertId();
					$_SESSION['idEntreprise'] = $res;
				}
}
else
{
	echo "<p>les champs ne son pas replie</p>";
}








?>