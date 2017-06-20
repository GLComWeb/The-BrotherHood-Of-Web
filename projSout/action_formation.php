<?php session_start();

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'apolearn');

    require_once('includes/inc_bdd.php'); // Inclusion essentielle

    // Les données et mot de passe ont été vérifiés en javascript
    // Enregistrement dans la base de données de l'utilisateur
    $nom          = strip_tags($_POST['nom']);
    $dateDebut    = strip_tags($_POST['dateDebut']);
    $dateFin      = strip_tags($_POST['dateFin']);
    $lienPlanning  = strip_tags($_POST['planning']);
    $idCentre = $_SESSION['idCentre'];

    $requete = $db->prepare('INSERT INTO formation (nom, date_debut, date_fin, lien_planning, centre_de_formation_id)
                             VALUES (:nom, :dateDebut, :dateFin, :planning, :centreId)');
    $requete->bindValue(':nom',           $nom, PDO::PARAM_STR);
    $requete->bindValue(':dateDebut',     $dateDebut, PDO::PARAM_STR);
    $requete->bindValue(':dateFin',       $dateFin, PDO::PARAM_STR);
    $requete->bindValue(':planning',      $lienPlanning, PDO::PARAM_STR);
    $requete->bindValue(':centreId',      $idCentre, PDO::PARAM_STR);
    $success = $requete->execute();

    // centre de formation
    if ($success) {
        echo 'Inscription réussi de la formation';
    } else { echo '[ERREUR] -  érreur d\inscription de la formation'; }
?>