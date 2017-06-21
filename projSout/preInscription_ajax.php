<?php

/***************************************
 ** Constante de connexion à la base ***
 ***************************************/
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'apolearn');

include_once('includes/inc_bdd.php'); // Inclusion essentielle

$succes = false;
$result = array();

if ( !empty($_POST['nomEntreprise']) || !empty($_POST['siret']) || !empty($_POST['nom']) 
     || !empty($_POST['prenom']) || !empty($_POST['telephone']) || !empty($_POST['email']) ) {

    $nomEntreprise     = strip_tags($_POST['nomEntreprise']);
    $siret             = strip_tags($_POST['siret']);
    $nomUtilisateur    = strip_tags($_POST['nom']);
    $prenomUtilisateur = strip_tags($_POST['prenom']);
    $telFixe           = strip_tags($_POST['telephone']);
    $email             = strip_tags($_POST['email']);
    
    // Vérifie l'existence de l'email dans la base de donnée
    $requete = $db->prepare('SELECT COUNT(email) as nbrEmail FROM utilisateur WHERE email LIKE :email');
    $requete->bindValue(':email', ".$email.", PDO::PARAM_STR);
    $succes = $requete->execute();

    if ( $succes ) {
        $nbrEmail = $requete->fetch()['nbrEmail'];

        if ( $nbrEmail == 0 ) {
            // Enregistrement dans la base de données de l'utilisateur
            
            $requete = $db->prepare('INSERT INTO utilisateur (nom, prenom, telephone_fixe, email, role)
                                     VALUES (:nom, :prenom, :telFixe, :email, :role)');

            $requete->bindValue(':nom',           $nomUtilisateur, PDO::PARAM_STR);
            $requete->bindValue(':prenom',        $prenomUtilisateur, PDO::PARAM_STR);
            $requete->bindValue(':telFixe',       $telFixe, PDO::PARAM_STR);
            $requete->bindValue(':email',         $email, PDO::PARAM_STR);
            $requete->bindValue(':role',          'superAdmin', PDO::PARAM_INT);

            $succes = $requete->execute();

            if ($succes) {
                // PreInscription de l'entreprise
                $query = $db->prepare('INSERT INTO entreprise (nom, siret) VALUES (:nom, :siret)');
					
                $query->bindValue(':nom',   $nomEntreprise, PDO::PARAM_STR);
                $query->bindValue(':siret', $siret, PDO::PARAM_STR);
                
                $succes = $query->execute();

                if ($succes) {
                    $result = array('result' => true, 'raison' => "La préinscription c'est bien déroulé");
                    echo json_encode($result);

                } else { 
                    $result = array('result' => false, 'raison' => "[ERREUR] - une érreur est survenue durant la préinscription de l'entreprise dans la base de donnée");
                    echo json_encode($result);
                }

            } else { 
                $result = array('result' => false, 'raison' => "[ERREUR] - une érreur est survenue durant la préinscription de l'utilisateur dans la base de donnée");
                echo json_encode($result);
            }

        } else {
            $result = array('result' => false, 'raison' => "[ERREUR] - L'email est déjà utilisé.");
            echo json_encode($result);
        }

    } else {
        $result = array('result' => false, 'raison' => "[ERREUR] - une érreur est survenue durant la recherche de l'email dans la base de donnée", 'repBase' => $succes, 'donnee' => $email);
        echo json_encode($result);
    }

} else {
    $result = array('result' => false, 'raison' => "[ERREUR] - Les champs ne sont pas correctement remplis");
    echo json_encode($result);
}
?>