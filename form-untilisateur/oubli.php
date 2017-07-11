 <?php

//On démarre les sessions
session_start();
//On génére un jeton totalement unique (c'est capital :D)
$token = uniqid(rand(), true);
//Et on le stocke
 $_SESSION['token'] = $token;
//On enregistre aussi le timestamp correspondant au moment de la création du token
// $_SESSION['token_time'] = time();

//Maintenant, on affiche notre page normalement, le champ caché token en plus
?>
<link rel="stylesheet" type="text/css" href="css/style.css">
    <div class="jumbotron">
      <div class="container">
        <form id="form" name="form" method="post" action="nouveau_mdp.php" class="navbar-form navbar-left;  ">
          <h2>changer votre mot de passe</h2>
          <p>E-mail :
            <label>
              <input type="text" name="email" id="email" class="form-control"/>
            </label>
           <!-- le champs qui sera invisible  -->
              <input type="hidden" name="token" id="token" value=""
              <?php echo $token;?>"/>  <!--Le champ caché a pour valeur le jeton-->
          </p>
          <p>
            <label>
              <input type="submit" name="Envoyer" id="Envoyer" value="Envoyer" class="btn btn-default"/>
            </label>
          </p>
            <p><a href='from-conexion.php'>retour a la connexion</a></p>
        </form>
      </div>
    </div>
