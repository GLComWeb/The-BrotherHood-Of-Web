<?php session_start();

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'apolearn');

    require_once('includes/inc_bdd.php'); // Inclusion essentielle

    // Les données et mot de passe ont été vérifiés en javascript
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
    $idFormation = 1;   // En session à la connexion soi de l'entreprise ou du centre de formation

    $requete = $db->prepare('INSERT INTO utilisateur (civilite, nom, prenom, date_naissance, telephone_fixe, telephone_mobile, adresse, code_postal, ville,
                                                      email, mot_de_passe, role, formation_id)
                             VALUES (:civil, :nom, :prenom, :dateNaissance, :telFixe, :telMob, :adresse, :codePostal, :ville, :email, :pass, :role, :formationId)');
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
    $requete->bindValue(':role',          'eleve', PDO::PARAM_INT);
    $requete->bindValue(':formationId',   $idFormation, PDO::PARAM_INT);

    $success = $requete->execute();

    if ($success) {
        echo 'Inscription réussi de l\'élève à la formation';
    } else { echo '[ERREUR] -  érreur d\inscription de l\'élève à la formation';}

?>