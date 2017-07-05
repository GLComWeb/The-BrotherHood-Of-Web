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
    $requete->bindValue(':role',          'directeur', PDO::PARAM_INT);

    $success = $requete->execute();

    // centre de formation
    if ($success) {
        
        if (isset($_SESSION['idEntreprise'])) {
            $idEntreprise = $_SESSION['idEntreprise'];
        } else {
            $idEntreprise = 1;
        }
        
        $idUtilisateur = $db->lastInsertId();

        if ($idUtilisateur != 0) {
            $nomCentre  = strip_tags($_POST['nomCentre']);
            $adresse    = strip_tags($_POST['adresse']);
            $codePostal = strip_tags($_POST['codePostal']);
            $siret      = strip_tags($_POST['siret']);
            $secteur    = strip_tags($_POST['secteur']);

            $requete = $db->prepare('INSERT INTO centre_de_formation (nom, adresse, code_postal, siret, telephone, secteur, utilisateur_id, entreprise_id)
                                    VALUES (:nom, :adresse, :codePostal, :siret, :tel, :secteur, :utilisateurId, :entrepriseId)');
            $requete->bindValue(':nom',           $nomCentre, PDO::PARAM_STR);
            $requete->bindValue(':adresse',       $adresse, PDO::PARAM_STR);
            $requete->bindValue(':codePostal',    $codePostal, PDO::PARAM_STR);
            $requete->bindValue(':siret',         $siret, PDO::PARAM_STR);
            $requete->bindValue(':tel',           $siret, PDO::PARAM_STR);
            $requete->bindValue(':secteur',       $secteur, PDO::PARAM_STR);
            $requete->bindValue(':utilisateurId', $idUtilisateur, PDO::PARAM_INT);
            $requete->bindValue(':entrepriseId',  $idEntreprise, PDO::PARAM_INT);

            $success = $requete->execute();
            if ($success) {
                $idCentre = $db->lastInsertId();

                // Mise à jour de l'entreprise_id dans la table utilisateur
				$query = $db->prepare('UPDATE utilisateur SET entreprise_id ='.$idCentre);
				$succes = $query->execute();

                $_SESSION['idCentre'] = $idCentre;
                echo 'Inscription réussi au centre de formation';
            } else { echo '[ERREUR] -  érreur d\inscription au centre de formation';}

        } else {
            echo '[ERREUR] - L\'utilisateur n\'a pas été reconnu, veuillez remplir les champs de l\'utilisateur';
        }
    }
?>