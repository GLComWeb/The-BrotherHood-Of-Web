<?php
/*==================================================
  ======== Ajout en base de donnée du forum ========
  ==================================================*/

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'apolearn');

require_once('includes/inc_bdd.php'); // Inclusion essentielle

$return = array();

if ( (isset($_POST['sujet'], $_POST['texte']) )
     && (!empty($_POST['sujet']) && !empty($_POST['texte']) ) ) {

        $sujet = strip_tags($_POST['sujet']);
        $texte = strip_tags($_POST['texte']);

        $requete = $db->prepare('INSERT INTO discussion (sujet, texte, date_post) VALUES (:sujet, :texte, NOW())');
        $requete->bindValue(':sujet', $sujet, PDO::PARAM_STR);
        $requete->bindValue(':texte', $texte, PDO::PARAM_STR);
        $succes = $requete->execute();

        if ($succes) {
            $return = array('result' => true );
            echo $return;
        } else {
            $return = array( 'result' => false );
            echo $return;
        }

} else {
    $return = array( 'result' => false );
    echo $return;
}

?>