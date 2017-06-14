<?php session_start();

    // Quand l'utilisateur clique pour ajouter un centre de formation, l'ID sera transmis en SESSION à cette page
    //echo '<pre>'.print_r($_POST).'</pre>';

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'apolearn');

    require_once('includes/inc_bdd.php'); // Inclusion essentielle

    // Les données et mot de passe ont été vérifiés en javascript et soumise
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
                                                      email, mot_de_passe, role, formation_id, paiement_id)
                             VALUES (:civil, :nom, :prenom, :dateNaissance, :telFixe, :telMob, :adresse, :codePostal, :ville, :email, :pass, :role, :formationId, :paiementId)');
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
    $requete->bindValue(':role',          'président', PDO::PARAM_INT);
    $requete->bindValue(':formationId',   1, PDO::PARAM_INT);
    $requete->bindValue(':paiementId',    1, PDO::PARAM_INT);

    $success = $requete->execute();
    //echo 'Inscription réussi de l\'utilisateur';

    // Si les champs utilisateur de rôle Directeur à correctement été remplis
    if ($success) {
        //echo 'Entré dans le bloc centre de formation';
        $requete = $db->prepare('SELECT id FROM utilisateur WHERE email LIKE :email');
        $requete->bindValue(':email', $email, PDO::PARAM_STR);
        $success = $requete->execute();

        // Récupère l'id de l'entreprise passé en session, qui créera le centre de formation 
        $idEntreprise = $_SESSION['idEntreprise'];
        
        $idUtilisateur = 0;
        if ($success) {
            $idUtilisateur = $requete->fetch()['id'];
        }

        // On remplis la table 'centre_de_formation'
        if ($idUtilisateur != 0) {
            $nomCentre  = strip_tags($_POST['nomCentre']);
            $adresse    = strip_tags($_POST['adresse']);
            $codePostal = strip_tags($_POST['codePostal']);
            $siret      = strip_tags($_POST['siret']);
            $secteur    = strip_tags($_POST['secteur']);

            $requete = $db->prepare('INSERT INTO centre_de_formation (nom, adresse, code_postal, siret, telephone, secteur, utilisateur_id, formation_id, entreprise_id, messagerie_forum_id)
                                    VALUES (:nom, :adresse, :codePostal, :siret, :tel, :secteur, :utilisateurId, :formationId, :entrepriseId, :messageId)');
            $requete->bindValue(':nom',           $nomCentre, PDO::PARAM_STR);
            $requete->bindValue(':adresse',       $adresse, PDO::PARAM_STR);
            $requete->bindValue(':codePostal',    $codePostal, PDO::PARAM_STR);
            $requete->bindValue(':siret',         $siret, PDO::PARAM_STR);
            $requete->bindValue(':tel',           $siret, PDO::PARAM_STR);
            $requete->bindValue(':secteur',       $secteur, PDO::PARAM_STR);
            $requete->bindValue(':utilisateurId', $idUtilisateur, PDO::PARAM_INT);
            $requete->bindValue(':formationId',   1, PDO::PARAM_INT);
            $requete->bindValue(':entrepriseId',  $idEntreprise, PDO::PARAM_INT);
            $requete->bindValue(':messageId',     1, PDO::PARAM_INT);

            $success = $requete->execute();
            if ($success) {
                echo 'Inscription réussi au centre de formation';
            } else { echo '[ERREUR] -  érreur d\inscription au centre de formation';}

        } else {
            echo '[ERREUR] - L\'utilisateur n\'a pas été reconnu, veuillez remplir les champs de l\'utilisateur';
        }
    }
?>