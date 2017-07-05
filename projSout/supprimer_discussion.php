<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'apolearn');

include_once('includes/inc_bdd.php');

$idDiscussion = intval($_POST['idDiscussion']);
$idUtilisateur = intval($_POST['idUtilisateur']);
$return = array();

$requete = $db->prepare('SELECT COUNT(*) FROM message WHERE discussion_id = :id');
$requete->bindValue(':id', $idDiscussion, PDO::PARAM_INT);
$succes = $requete->execute();

/* ========== On supprime les messages des discussions d'abord ==========*/
if ($succes && ($requete->fetch() != 0) ) {
    $requete = $db->prepare('DELETE FROM message WHERE discussion_id = :id AND utilisateur_id = :idUtilisateur');
    $requete->bindValue(':id', $idDiscussion, PDO::PARAM_INT);
    $requete->bindValue(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);
    $succes = $requete->execute();

/* ========== Ensuite on supprime la discussion ==========*/
    if ($succes) {
        $requete = $db->prepare('DELETE FROM discussion WHERE id = :id AND utilisateur_id = :idUtilisateur');
        $requete->bindValue(':id', $idDiscussion, PDO::PARAM_INT);
        $requete->bindValue(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);
        $succes = $requete->execute();

        if ($succes) {
            $return['result'] = true;
            $return['message'] = 'La discussion a bien été supprimés';
            echo json_encode($return);

        } else {
            $return['result'] = false;
            $return['message'] = 'La discussion n\'a pas été supprimé';
            echo json_encode($return);
        }
    }

} else {
    $requete = $db->prepare('DELETE FROM discussion WHERE id = :id AND utilisateur_id = :idUtilisateur');
    $requete->bindValue(':idUtilisateur', $idDiscussion, PDO::PARAM_INT);
    $succes = $requete->execute();

    $return['result'] = true;
    $return['message'] = 'La discussion a bien été supprimé';
    echo json_encode($return);
}

$requete = $db->prepare('DELETE FROM discussion WHERE id = :id');
$requete->bindValue(':id', $idDiscussion, PDO::PARAM_INT);
$succes = $requete->execute();
