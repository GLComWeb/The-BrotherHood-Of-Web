<?php
	//======liaison BDD=========
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('DB', 'apolearn');

	include_once('inc_bdd.php');
	include("librerie.php");

//======================================= declaration du token (utilisateur) ===========================================
    if (isset($_GET['id']) && isset($_GET['token']))
    {                                                    //verifie $_GET lien
            $query = $db->prepare('SELECT id FROM utilisateur WHERE token = ?');
            $query->bindValue(1, $_GET['token'], PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetch();

            if (isset($_POST['id']) && isset($_POST['token']))                                       //vérifie id + token sont dans la table utilisateur
            {
                $query = $db->prepare('SELECT id FROM utilisateur WHERE token = ?');
                $query->bindValue(1, $_GET['token'], PDO::PARAM_STR);
                $query->execute();
                $result = $query->fetch();
            }else{
?>
<!--=============================================== from de new pass ===============================-->
            <link rel="stylesheet" type="text/css" href="css/style.css">
            <h1 style="text-align: center">changement de mot de passe </h1>';
             <div align="center" border="2">
                <form method="post" action="action_redef_mdp.php">                                   <!-- affiche un formulaire -> POST action_redef_mdp.php -->
                    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id">               <!-- ajouter un input hidden avec le GET id -->
                    <label>entre un nouveau mot de passe
                        <input type="password" name="new_pass" maxlength="250">
                    </label>
                    <br>
                    <label>confirme le mot de passe
                        <input type="password" name="conf_new_pass" maxlength="250">
                    </label>
                    <br>
                    <input type="submit" name="valider">
                </form>
            </div>
<!--=============================================== fin de new from =================================-->
<?php       }
           if (isset($_POST['new_pass']))
            {                                                                                       //si le new pass est vide ne rien faire
               $password = $_POST['new_pass'];
            }else
            {
                $password = '';
            }
            if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password))        // declaration des carater speciau autoriser
            {      // daclaration de caracter qui son axepte dans les mot de passe
                 echo 'Mot de passe conforme';
            }
            elseif($password)
            {
                 echo 'Mot de passe non conforme';
            }
             echo "<p style=\"text-align: center\"><a href='#.php'>Retour a la connexion</a></p>"; //sur le href il faut mettre le form


        //=========================== supretion du token dans la base sous 48h =========================
            $result = $query->fetch();
            if($query <= '3600')
            {   $query = $db->prepare("SELECT * FROM utilisateur(token) WHERE date_expir");
                $query -> bindValue($donnees['date_expire'], PDO::PARAM_STR);                       //selection dans la table de la colonne
                $query = datetime();
                $query = $date - $date_token;
                $query = (3600);                                                                //$nbre Secondes En 2Jours de termination du temps aven suprimer le token

                if ($difference > $timesup)                                                        //On supprime le token
                {
                    $id = $donnees['id'];
                    $query = $db->prepare("DELETE FROM utilisateur WHERE id='$id'");
                }
            }
    }

?>
