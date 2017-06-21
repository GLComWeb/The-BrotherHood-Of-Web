<?php
echo '<pre>';
echo print_r($_POST);
echo '</pre>';

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'apolearn');

include_once('../includes/inc_bdd.php');

$nomEntreprise = '';
$preEmail = '';
$succes = false;

if ( isset($_POST['nomEntreprise'], $_POST['siret'], $_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['email']) ) {
    $nomEntreprise     = strip_tags($_POST['nomEntreprise']);
    $siret             = strip_tags($_POST['siret']);
    $civilite          = strip_tags($_POST['civilite']);
    $nomUtilisateur    = strip_tags($_POST['nom']);
    $prenomUtilisateur = strip_tags($_POST['prenom']);
    $telFixe           = strip_tags($_POST['telephone']);
    $password          = strip_tags($_POST['password']);
    
    // Vérifie l'existence de l'email dans la base de donnée
    $requete = $db->prepare('SELECT COUNT(email) as nbrEmail FROM utilisateur WHERE email LIKE :email');
    $requete->bindValue(':email', $preEmail, PDO::PARAM_STR);
    $sucess = $requete->execute();

    if ( $succes  != 0 ) {
        $nbrEmail = $requete->fetch()['nbrEmail'];

        if ( $nbrEmail == 0 ) {
            // Enregistrement dans la base de données de l'utilisateur
            
            $requete = $db->prepare('INSERT INTO utilisateur (nom, prenom, telephone_fixe, email, mot_de_passe, role)
                                     VALUES (:civil, :nom, :prenom, :telFixe, :email, :pass, :role)');
            //$requete->bindValue(':civil',         'Mr', PDO::PARAM_STR);
            $requete->bindValue(':nom',           $nomUtilisateur, PDO::PARAM_STR);
            $requete->bindValue(':prenom',        $prenomUtilisateur, PDO::PARAM_STR);
            $requete->bindValue(':telFixe',       $telFixe, PDO::PARAM_STR);
            $requete->bindValue(':email',         $email, PDO::PARAM_STR);
            $requete->bindValue(':pass',          $password, PDO::PARAM_STR);
            $requete->bindValue(':role',          'superAdmin', PDO::PARAM_INT);

            $succes = $requete->execute();

            if ($succes) {
                // PreInscription de l'entreprise
                $query = $db->prepare('INSERT INTO entreprise (nom, siret) VALUES (:nom, :siret)');
					
                $query->bindValue(':nom',   $nom, PDO::PARAM_STR);
                $query->bindValue(':siret', $siret, PDO::PARAM_STR);
                
                $succes = $query->execute();

                if ($succes) {
                    echo true;

                } else echo false;

            } else echo false;

        } else echo false;

    } else echo false;

} else echo false;
?>