<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Educative" />
    <meta name="author" content="The BrotherHood Of Web" />
    <title>Learn Station&reg; | Profil</title>
    <!-- bon affichage sur mobile -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Learn Station&reg; est une plateforme e-learning LMS sociale et collaborative pour les professionnels de l'éducation et de la formation." />

    <!-- JS -->
    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/dashboard_enterprise.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/dashboard_enterprise.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="shortcut icon" href="ico/favicon.ico" />
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- NAVIGATION -->
        <div class="side-menu">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <div class="brand-wrapper">
                        <!-- Hamburger -->
                        <button type="button" class="navbar-toggle">
				                <span class="sr-only">Toggle navigation</span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				            </button>

                        <!-- Brand -->
                        <div class="brand-name-wrapper">
                            <a class="navbar-brand" href="index.php">Learn Station&reg;</a>
                        </div>

                        <!-- Search -->
                        <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>

                        <!-- Search body -->
                        <div id="search" class="panel-collapse collapse">
                            <div class="panel-body">
                                <form class="navbar-form" role="search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                    <button type="submit" class="btn btn-default "><i class="fa fa-check" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ./..brand-wrapper -->
                </div>
                <!-- ./..navbar-header -->

                <!-- Main Menu -->
                <div class="side-menu-container">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="dashboard_enterprise.php"><i class="fa fa-home" aria-hidden="true"></i> Tableau de bord</a></li>
                        <li><a href="dashboard_enter-profile.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profil</a></li>
                        <li><a href="#"><i class="fa fa-book" aria-hidden="true"></i> Modules</a></li>
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Messagerie</a></li>
                        <li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i> Forum</a></li>
                        <li><a href="#"><i class="fa fa-power-off" aria-hidden="true"></i> Déconnexion</a></li>
                    </ul>
                </div>
                <!-- ./..side-menu-container -->
            </nav>
            <!-- ./..navbar navbar-default -->
        </div>
        <!-- ./..side-menu -->
    </header>

    <!-- CONTENT -->
    <main class="container-fluid">
        <div class="side-body">
            <div class="row">
                <!-- CONTENT -->
                <div class="col-md-8">

                    <?php // A des fins de test
                      		if (isset($_SESSION['idFormation']) ) {
                       			echo '<h4>'.$_SESSION['idFormation'].'</h4>';
                      		}
                		?>

                    <h1>Profil</h1>
                    <form class="form-group" method="post" action="action_eleve.php">
                        <fieldset>
                            <h3>Informations générales</h3>
                            <hr/>
                            <div class="col-sm-12 col-md-6">
                                <label for="civilite">Civilité :</label>
                                <p><select class="form-control" name="civilite" id="civilite">
	               							<option value="Mr">Monsieur</option>
								            <option value="Mme">Madame</option>
								            <option value="Mme">Mademoiselle</option>
            							</select></p>

                                <p><label for="prenomUtilisateur">Prénom *</label>
                                    <input class="form-control" type="text" name="prenomUtilisateur" id="prenomUtilisateur" required/></p>
                            </div>
                            <!-- ./..col-sm-12 col-md-6 -->
                            <div class="col-sm-12 col-md-6">
                                <label for="nomUtilisateur">Nom *</label>
                                <input class="form-control" type="text" name="nomUtilisateur" id="nomUtilisateur" required/>

                                <p><label for="dateNaissance">Date de naissance *</label>
                                    <input class="form-control" type="date" name="dateNaissance" id="dateNaissance" required/></p>
                            </div>
                            <!-- ./..col-sm-12 col-md-6 -->
                        </fieldset>

                        <fieldset>
                            <h3>Informations de contact</h3>
                            <hr/>

                            <div class="col-sm-12 col-md-6">
                                <p><label for="adresse">Adresse *</label>
                                    <input class="form-control" type="adresse" name="adresse" id="adresse" required/></p>

                                <p><label for="codePostal">Code postal *</label>
                                    <input class="form-control" type="text" name="codePostal" id="codePostal" /></p>

                                <p><label for="ville">Ville *</label>
                                    <input class="form-control" type="text" name="ville" id="ville" /></p>

                                <p><label for="pays">Pays *</label>
                                    <input class="form-control" type="text" name="pays" id="pays" /></p>
                            </div>
                            <!-- ./..col-sm-12 col-md-6 -->
                            <div class="col-sm-12 col-md-6">
                                <p><label for="telFixe">Numéro de telephone fixe *</label>
                                    <input type="text" class="form-control" id="telFixe" name="telFixe" required></p>

                                <label for="telMobile">Numéro de telephone mobile *</label>
                                <p><input type="text" class="form-control" id="telMobile" name="telMobile" required></p>

                                <p><label for="email">Adresse mail *</label>
                                    <input class="form-control" type="email" name="email" id="email" required/></p>
                            </div>
                            <!-- ./..col-sm-12 col-md-6 -->
                        </fieldset>

                        <fieldset>
                            <h3>Changer son mot de passe</h3>
                            <hr/>
                            <div class="col-sm-12 col-md-6">
                                <p><label for="password">Nouveau mot de passe *</label>
                                    <input class="form-control" type="password" name="password" id="password" /></p>
                            </div>
                            <!-- ./..col-sm-12 col-md-6 -->
                            <div class="col-sm-12 col-md-6">
                                <p><label for="confirmPassword">Confirmation du nouveau mot de passe *</label>
                                    <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" /></p>

                                <input type="submit" class="btn btn-default" value="Valider" />
                            </div>
                            <!-- ./..col-sm-12 col-md-6 -->

                        </fieldset>
                    </form>
                </div>
                <!-- ./..col-md-8 -->
            </div>
            <!-- ./..row -->
        </div>
        <!-- ./..side-body -->
    </main>
    <!-- ./..container -->

    <!-- Footer -->
    <footer>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="col-sm-8 col-sm-offset-2 ">
                    <p>&copy; 2017 <a href="#" class="color-primary linear">The BrotherHood Of Web</a>. All Rights Reserved. </p>
                </div>
                <!-- ./..col-xs-12 -->
            </div>
            <!-- ./..row-fluid -->
        </div>
        <!-- ./..container-fluid -->
    </footer>
    <!-- /Footer -->


</body>

</html>
