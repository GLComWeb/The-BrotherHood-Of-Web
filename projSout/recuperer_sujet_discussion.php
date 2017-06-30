<?php
/*===================================================================
  ======== récupère les sujets à partir de la base de donnée ========
  ===================================================================*/

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'apolearn');

require_once('includes/inc_bdd.php'); // Inclusion essentielle

$return = array();
//$nombreSujet = $_GET('nombreSujet');

$requete = $db->prepare('SELECT COUNT(*) as nbr_sujet FROM discussion');
$succes = $requete->execute();
if ($succes) { 
    $return['nbr_sujet'] = $requete->fetch()['nbr_sujet'];
} else {
    $return['erreur0'] = 'Une érreur est survenue dans l\'exécution de la requête du nombre total de sujet';
}

$requete = $db->prepare('SELECT sujet, texte, date_post FROM discussion ORDER BY date_post DESC'); // LIMIT :offset, :nombreSujet
//$requete->bindValue(':nombreSujet', $nombreSujet, PDO::PARAM_INT);
$succes = $requete->execute();

if ($succes) {
    $return['sujets'] = $requete->fetchAll();

} else {
    $return['erreur1'] = 'Une érreur est survenue dans l\'exécution de la requête des sujets';
}

echo json_encode($return);
?>