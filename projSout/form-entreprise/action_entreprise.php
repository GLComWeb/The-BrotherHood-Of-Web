<?php session_start();

// ========== Form pour les entreprises, crée l'utilisateur superAdmin

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'apolearn');

include_once('../includes/inc_bdd.php');
include("librairie.php");

$form = array('nom', 'adresse', 'codePostal', 'ville', 'telephone', 'siret', 'numeroTva', 'email');

// Enregistrement dans la base de données de l'utilisateur
//$id = $_SESSION['id'];
$id = 25;
$civilite          = strip_tags($_POST['civilite']);
$nomUtilisateur    = strip_tags($_POST['nom']);
$prenomUtilisateur = strip_tags($_POST['prenom']);
$dateNaissance     = strip_tags($_POST['date_naissance']);
$telFixe           = strip_tags($_POST['telephone_fixe']);
$telMobile         = strip_tags($_POST['telephone_mobile']);
$adresse           = strip_tags($_POST['adresse']);
$codePostal        = strip_tags($_POST['code_postal']);
$ville             = strip_tags($_POST['ville']);
$email             = strip_tags($_POST['email']);
$password          = strip_tags($_POST['passe1']);

$requete = $db->prepare('UPDATE utilisateur SET civilite = :civil, 
												nom = :nom, 
												prenom = :prenom, 
												date_naissance = :dateNaissance, 
												telephone_fixe = :telFixe, 
												telephone_mobile = :telMob, 
												adresse = :adresse, 
												code_postal = :codePostal, 
												ville = :ville, 
												email = :email 
						 WHERE entreprise_id = :id');

$requete->bindValue(':civil',         $civilite, PDO::PARAM_STR);
$requete->bindValue(':nom',           $nomUtilisateur, PDO::PARAM_STR);
$requete->bindValue(':prenom',        $prenomUtilisateur, PDO::PARAM_STR);
$requete->bindValue(':dateNaissance', $dateNaissance, PDO::PARAM_STR);
$requete->bindValue(':telFixe',       $telFixe, PDO::PARAM_STR);
$requete->bindValue(':telMob',        $telMobile, PDO::PARAM_STR);
$requete->bindValue(':adresse',       $adresse, PDO::PARAM_STR);
$requete->bindValue(':codePostal',    $codePostal, PDO::PARAM_STR);
$requete->bindValue(':ville',         $ville, PDO::PARAM_STR);
$requete->bindValue(':email',         $email, PDO::PARAM_STR);
$requete->bindValue(':id',         	  $id, PDO::PARAM_INT);
// $requete->bindValue(':pass',          $password, PDO::PARAM_STR);
// $requete->bindValue(':role',          'superAdmin', PDO::PARAM_INT);

$succes = $requete->execute();

// Si les champs utilisateur de rôle Directeur à correctement été remplis
if ($succes) {

	//fonction verife que tous le inpute soi remplie 
	if (valid_form($_POST, $form)) 
	{
		
		//je fait appel a la fonction pour genere la securiter xss
			$nom 		 = echappement($_POST["nom"]);
			$adresse     = echappement($_POST["adresse"]);
			$code_postal = echappement($_POST["codePostal"]);
			$ville 		 = echappement($_POST["ville"]);
			$telephone   = echappement($_POST["telephone"]);
			$siret 		 = echappement($_POST["siret"]);
			// $num_contract = echappement($_POST["num_contract"]);
			$num_tva 	 = echappement($_POST["numeroTva"]);
			$e_mail 	 = echappement($_POST["email"]);

		//l'integration dans la base de donnee
			$query = $db->prepare('UPDATE entreprise SET nom = :nom, adresse = :adresse, code_postal = :codePostal, ville = :ville, telephone = :tel,
										  siret = :siret, numero_tva = :numTva, email = :email
								   WHERE id = :id');
					
			$query->bindValue(':nom', $nom, PDO::PARAM_STR);
			$query->bindValue(':adresse', $adresse, PDO::PARAM_STR);
			$query->bindValue(':codePostal', $code_postal, PDO::PARAM_STR);
			$query->bindValue(':ville', $ville, PDO::PARAM_STR);
			$query->bindValue(':tel', $telephone, PDO::PARAM_STR);
			$query->bindValue(':siret', $siret, PDO::PARAM_STR);
			$query->bindValue(':numTva', $num_tva, PDO::PARAM_STR);
			$query->bindValue(':email', $e_mail, PDO::PARAM_STR);
			$query->bindValue(':id', $id, PDO::PARAM_INT);
			
			$succes = $query->execute();
			
			if ($succes) {
				echo '[SUCCES] - L\'entreprise et le superAdmin ont bien été enregistrés';

			} else {
				echo "<p>[ERREUR]- Une érreur est survenue durant la requête.</p>";
			}
	}
	else
	{
		echo "<p>les champs de l'entreprise ne sont pas remplis</p>";
	}
} else {
	echo "<p>[ERREUR]- Les champs de l'utilisateur ne sont pas remplis</p>";
}

?>