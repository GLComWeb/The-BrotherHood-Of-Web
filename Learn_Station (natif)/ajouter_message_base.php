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

if ( !empty($_POST['sujet']) && !empty($_POST['texte']) ) {
    $idDiscussion = intval($_POST['idDiscussion']);
    $sujet = $_POST['sujet'];
    $texte = $_POST['texte'];

    $requete = $db->prepare('INSERT INTO message (sujet, date_post, texte, utilisateur_id, discussion_id)
                             VALUES (:sujet, NOW(), :texte, :utilisateurId, :discussionId)');

    $requete->bindValue(':sujet', $sujet, PDO::PARAM_STR );
    $requete->bindValue(':texte', $texte, PDO::PARAM_STR);
    $requete->bindValue(':utilisateurId', 1, PDO::PARAM_STR);   // Session
    $requete->bindValue(':discussionId', $idDiscussion, PDO::PARAM_STR);

    $succes = $requete->execute();
    if ($succes) {
        $return['result'] = true;
        $return['raison'] = 'L\'enregistrement en base de donnée c\'est déroulé correctement';

    } else {
        $return['result'] = false;
        $return['raison'] = '[ERREUR] - Une érreur est survenue durant l\'exécution de la requête';
    }

    echo json_encode($return);

} else {
    $return['result'] = false;
    $return['raison'] = '[ERREUR] - Les champs ne sont pas correctement remplis';
    echo json_encode($return);
}