<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'apolearn');

include_once('includes/inc_bdd.php');

/* ============== Ajout du responsable de l'entreprise, il aura le role de "superAdmin" ==============*/
$return = array();

$nomEntreprise = $_POST['nomEntreprise'];
$siret         = $_POST['siret'];
$nom           = $_POST['nomUtilisateur'];
$prenom        = $_POST['prenomUtilisateur'];
$telephone     = $_POST['telephone'];
$email         = $_POST['email'];
$token         = md5(uniqid(rand(),true));

/* ============== Ajout d'une date d'expiration de compte ==============*/
$dateAujourdhui  = new DateTime();
$delaiExpiration = new DateInterval('PT12H');    // Expiration dans 12h
$dateExpiration  = $dateAujourdhui->add($delaiExpiration)->format('Y-m-d-H-m-s');
/* =====================================================================*/
$motDePasse      = generateur();

$requete = $db->prepare('INSERT INTO entreprise (nom, siret) VALUES (:nom, :siret)');
$requete->bindValue(':nom', $nomEntreprise, PDO::PARAM_STR);
$requete->bindValue(':siret', $siret, PDO::PARAM_STR);
$succes = $requete->execute();

/* ============== Ajout de son entreprise ==============*/
if ($succes) {
    $idEntreprise = $db->lastInsertId();

    $requete = $db->prepare('INSERT INTO utilisateur (nom, prenom, telephone_fixe, email, mot_de_passe, role, token, date_expiration, entreprise_id)
                             VALUES (:nom, :prenom, :telFixe, :email, :pass, :role, :token, :dateExpir, :entreprise_id)');

    $requete->bindValue(':nom',           $nom, PDO::PARAM_STR);
    $requete->bindValue(':prenom',        $prenom, PDO::PARAM_STR);
    $requete->bindValue(':telFixe',       $telephone, PDO::PARAM_STR);
    $requete->bindValue(':email',         $email, PDO::PARAM_STR);
    $requete->bindValue(':pass',          $motDePasse, PDO::PARAM_STR);
    $requete->bindValue(':role',          'superAdmin', PDO::PARAM_STR);
    $requete->bindValue(':token',         $token, PDO::PARAM_STR);
    $requete->bindValue(':dateExpir',     $dateExpiration, PDO::PARAM_STR);
    $requete->bindValue(':entreprise_id', $idEntreprise, PDO::PARAM_INT);
    $succes = $requete->execute();

    if ($succes) {
        $return['result'] = true;
        $return['message'] = 'La préinscription de l\'entreprise à bien été éffectué';
    } else {
        $return['result'] = false;
        $return['message'] = 'Une erreur est survenue durant l\'exécution de l\'enregistrement en base de donnée';
    }

    /* ============== Envoie un mail avec le mot de passe temporaire et un jeton unique d'authentification ==============*/
    echo 'token: '. $token;
    $contenuMail = '<p>FROM: LearnStation < admin@ls.fr ><br/>
    TO:   '.$nom.' < '.$email. ' ><br/>
    Subject: CONFIRMATION D\'INSCRIPTION</br>
    Chère Mme/Mr '.$nom.' '.$prenom.' merci d\avoir choisi notre plateforme de formation, votre préinscription à bien été enregistré, veuillez suivre le lien ce dessous afin de compléter
    vos informations, vous serez redirigé vers votre compte<br/>
    <a href="http://localhost/projSout/entreprise.php?token='.$token.'">Acceder à mon compte plateforme</a></p><br/>';

    file_put_contents('email.html', $contenuMail);
    echo json_encode($return);
}

/**
  * Génère un mot de passe temporaire à la préinscription
  */
function generateur() {
    $arrayGen = array(array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l',
    'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'),
                  array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9), 
                  array('@', '$', '!', '?', ':', '/', '#', '&', '+', '=', '-', '*') );

    // Vérifie dans la requête les différentes options
    $avecLettreMajuscule = true;
    $avecLettreMinuscule = true;
    $avecChiffres = true;
    $return = '';

    // Compose la chaine en fontion de la longueur souhaité
    $longueur = 8;
    $compt = 0;
    while ($compt <= $longueur) {

        if ($avecLettreMajuscule) {
            $res = Strtoupper(getRandomChar($arrayGen[0]) );
            $return .= $res;
            $compt+=1;
            if ($compt == $longueur) break;
        } 
        
        if ($avecLettreMinuscule) {
            $res = getRandomChar($arrayGen[0]);
            $return .= $res;
            $compt+=1;
            if ($compt == $longueur) break;
        } 
        
        if ($avecChiffres) { 
            $res = getRandomChar($arrayGen[1]);
            $return .= $res;
            $compt+=1;
            if ($compt == $longueur) break;
        } 

    }

    return $return;
}

/*
* Retourne un caractère aléatoirement.
*/
function getRandomChar($arrayCarac) {

    $caractere = '';
    if (is_Array($arrayCarac)) {
        
        $tailleArray = 0;
        $tailleArray = count($arrayCarac);

        if ( !isset($arrayCarac[$tailleArray])) {
            $tailleArray -= 1;
        }

        $rand = 0;
        $rand = rand(0, $tailleArray);
        $caractere = $arrayCarac[$rand];

    }

    return $caractere;
}
?>