<?php session_start();

//form pour les entreprise

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'apolearn');

include_once('../includes/inc_bdd.php');
include("librerie.php");

$form = array('nom', 'adresse', 'codePostal', 'ville', 'telephone', 'siret', 'numeroTva', 'email');

// Enregistrement dans la base de données de l'utilisateur
$civilite          = strip_tags($_POST['civilite']);
$nomUtilisateur    = strip_tags($_POST['nomUtilisateur']);
$prenomUtilisateur = strip_tags($_POST['prenomUtilisateur']);
$dateNaissance     = strip_tags($_POST['dateNaissance']);
$telFixe           = strip_tags($_POST['telFixe']);
$telMobile         = strip_tags($_POST['telMobile']);
$adresse           = strip_tags($_POST['adresse']);
$codePostal        = strip_tags($_POST['codePostal']);
$ville             = strip_tags($_POST['ville']);
$email             = strip_tags($_POST['email']);
$password          = strip_tags($_POST['password']);

$requete = $db->prepare('INSERT INTO utilisateur (civilite, nom, prenom, date_naissance, telephone_fixe, telephone_mobile, adresse, code_postal, ville,
                                                    email, mot_de_passe, role)
                            VALUES (:civil, :nom, :prenom, :dateNaissance, :telFixe, :telMob, :adresse, :codePostal, :ville, :email, :pass, :role)');
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
$requete->bindValue(':pass',          $password, PDO::PARAM_STR);
$requete->bindValue(':role',          'superAdmin', PDO::PARAM_INT);

$succes = $requete->execute();
//echo 'Inscription réussi de l\'utilisateur';

// Si les champs utilisateur de rôle Directeur à correctement été remplis
if ($succes) {

	//fonction verife que tous le inpute soi remplie 
	if (valid_form($_POST, $form)) 
	{
		
		//je fait appel a la fonction pour genere la securiter xss
			$nom = echappement($_POST["nom"]);
			$adresse = echappement($_POST["adresse"]);
			$code_postal = echappement($_POST["codePostal"]);
			$ville = echappement($_POST["ville"]);
			$telephone = echappement($_POST["telephone"]);
			$siret = echappement($_POST["siret"]);
			// $num_contract = echappement($_POST["num_contract"]);
			$num_tva = echappement($_POST["numeroTva"]);
			$e_mail = echappement($_POST["email"]);

		//l'integration dans la base de donnee
			$query = $db->prepare('INSERT INTO entreprise (nom, adresse, code_postal, ville, telephone, siret, numero_tva, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
					
			$query->bindValue(1, $nom, PDO::PARAM_STR);
			$query->bindValue(2, $adresse, PDO::PARAM_STR);
			$query->bindValue(3, $code_postal, PDO::PARAM_STR);
			$query->bindValue(4, $ville, PDO::PARAM_STR);
			$query->bindValue(5, $telephone, PDO::PARAM_STR);
			$query->bindValue(6, $siret, PDO::PARAM_STR);
			$query->bindValue(7, $num_tva, PDO::PARAM_STR);
			$query->bindValue(8, $e_mail, PDO::PARAM_STR);
			
			$succes = $query->execute();
			
			if ($succes) {
				$res = $db->lastInsertId();

				// Met à jour l'entreprise_id dans la table utilisateur
				$query = $db->prepare('UPDATE utilisateur SET entreprise_id ='.$res);
				$succes = $query->execute();

				if ($succes) {
					echo '[SUCCES] - L\'entreprise et le superAdmin ont bien été enregistrés';
					$_SESSION['idEntreprise'] = $res;
					
				} else {
					echo '<p>[ERREUR]- La mise à jour de l\'entreprise_id à échoué</p>';
				}
			
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