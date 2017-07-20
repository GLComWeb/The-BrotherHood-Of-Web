<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Educative">
    <meta name="author" content="The BrotherHood Of Web" />
    <title>Learn Station&reg; Plateforme social et collaborative d'auto-formation</title>
    <!-- bon affichage sur mobile -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Learn Station&reg; est une plateforme e-learning LMS sociale et collaborative pour les professionnels de l'éducation et de la formation." />
    <!-- JS -->
    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="stylesheet" href="css/form-elements.css">

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.ico" />

    <!-- script Google Analytics -->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-82980501-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>

<body>
    <!-- HEADER -->
    <header>
        <nav class="navbar navbar-fixed-top custom-navbar" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
                    <a class="navbar-brand" href="index.php">Learn Station&reg;</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Accueil <span class="sr-only">(current)</span></a></li>
                        <li><a href="regis_connect.php">Inscription| Connexion</a></li>
                        <li><a href="index.php#contact">Nous Contacter</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
    <section id="registration_connect">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Connectez-vous</h3>
                                <p>Entrez votre nom pour vous connecter:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="" method="post" class="login-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-username">Nom</label>
                                    <input type="text" name="form-username" placeholder="Nom..." class="form-username form-control" id="form-username">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Mot de passe</label>
                                    <input type="password" name="form-password" placeholder="Mot de passe..." class="form-password form-control" id="form-password">
                                </div>
                                <button type="submit" class="btn">Valider!</button>
                            </form>
                        </div>
                    </div>

                    <div class="social-login">
                        <h3>...ou connectez-vous avec: </h3>
                        <div class="social-login-buttons">
                            <a class="btn btn-link-2" href="#">
                                <i class="fa fa-facebook"></i> Facebook
                            </a>
                            <a class="btn btn-link-2" href="#">
                                <i class="fa fa-twitter"></i> Twitter
                            </a>
                            <a class="btn btn-link-2" href="#">
                                <i class="fa fa-google-plus"></i> Google Plus
                            </a>
                        </div>
                    </div>

                </div>

                <div class="col-sm-1 middle-border"></div>
                <div class="col-sm-1"></div>

                <div class="col-sm-5">

                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Inscrivez-vous maintenant</h3>
                                <p>Remplissez le formulaire ci-dessous pour obtenir un accès instantané: </p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-user-plus"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="" method="post" class="registration-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-first-name">Prénom</label>
                                    <input type="text" name="form-first-name" placeholder="Prénom..." class="form-first-name form-control" id="form-first-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-last-name">Nom</label>
                                    <input type="text" name="form-last-name" placeholder="Nom..." class="form-last-name form-control" id="form-last-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">E-mail</label>
                                    <input type="text" name="form-email" placeholder="E-mail..." class="form-email form-control" id="form-email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-about-yourself">&Agrave; propos de vous</label>
                                    <textarea name="form-about-yourself" placeholder="&Agrave; propos de vous..." class="form-about-yourself form-control" id="form-about-yourself"></textarea>
                                </div>
                                <button type="submit" class="btn">Inscrivez-vous!</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
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
