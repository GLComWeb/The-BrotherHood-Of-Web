<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Educative" />
    <meta name="author" content="The BrotherHood Of Web" />
    <title>Learn Station&reg; Plateforme social et collaborative d'auto-formation</title>
    <!-- bon affichage sur mobile -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Learn Station&reg; est une plateforme e-learning LMS sociale et collaborative pour les professionnels de l'éducation et de la formation." />

    <!-- JS -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

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
                        <li><a href="#home" class="js-scrollTo">Accueil <span class="sr-only">(current)</span></a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">A propos</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#About" class="js-scrollTo">Mission</a></li>
                                <li><a href="#advantages" class="js-scrollTo">Avantages</a></li>
                                <li><a href="#testimony" class="js-scrollTo">Témoignages</a></li>
                                <li><a href="#team" class="js-scrollTo">Equipe</a></li>
                            </ul>
                        </li>
                        <li><a href="regis_connect.php">Inscription| Connexion</a></li>
                        <li><a href="#contact" class="js-scrollTo">Contact</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>

    <!-- SECTION 1 -->
    <main class="container-fluid">
        <section class="row" id="home">
            <div class="col-xs-12">
                <h1>Learn Station&reg;</h1>
                <h3>PLATEFORME SOCIALE ET COLLABORATIVE D'AUTO-FORMATION</h3>
                <hr>
                <a href="regis_connect.php" class="btn btn-danger">Créer un compte</a>
                <a href="#contact" class="btn btn-default js-scrollTo">Nous contacter</a>
            </div>
            <!-- Click to bottom -->
            <div class="thim-click-to-bottom">
                <a href="#About" class="js-scrollTo"><i class="fa fa-chevron-down"></i>
                </a>
            </div>  <!-- ./..col-xs-12 -->
        </section> <!-- ./..row --> 
    </main> <!-- ./..container-fluid -->

    <!-- SECTION 2 -->
        <section class="sectionContent" id="About">
            <div class="container">
               <!--  <div class="row">
                    <div class="col-xs-12 aboutUs">
                        <h2>Qui sommes-nous ?</h2>
                    </div>
                </div>  -->
                <div class="row">
                    <div class="col-xs-12">
                        <h4 id="dropdown1">Ce que nous proposons</h4>
                        <hr/>
                    </div> <!-- ./..col-xs-12 -->
                    <div class="col-sm-12 col-md-6">
                        <img src="images/img2.jpg" class="img-responsive" alt="Responsive image"/>
                    </div> <!-- ./..col-sm-12 col-md-6 -->
                    <div class="col-sm-12 col-md-6">
                        <div class="about-des">
                            <p>Cum soccis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor</p>
                        </div>
                        <div class="about-des">
                            <p>Cum soccis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor</p>
                        </div>
                        <div class="about-des">
                            <p>Cum soccis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor</p>
                        </div>
                    </div> <!-- ./..col-sm-12 col-md-6 -->
                </div> <!-- ./..row -->
            </div> <!-- ./..container -->
        </section> 

    <!-- SECTION 3 -->
    <section class="sectionContent" id="advantages">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h4 id="dropdown2">Les avantages</h4>
                    <hr/>
                </div> <!-- ./..col-xs-12 -->
            </div> <!-- ./..col-xs-12 -->
            <div class="row">
                <div class="col-sm-3 advantages-des">
                    <i class="fa fa-laptop" aria-hidden="true"></i>
                    <h3>Plateforme d'apprentissage</h3>
                    <hr/>
                    <p>Un outil à disposition pour une expérience afin de réussir votre formation.</p>
                </div> <!-- ./..col-sm-3 -->
                <div class="col-sm-3 advantages-des">
                    <i class="fa fa-commenting-o" aria-hidden="true"></i>
                    <h3>Une communauté active</h3>
                    <hr/>
                    <p>Une communication interne par tchat et forum avec les formateurs et les élèves.</p>
                </div> <!-- ./..col-sm-3 -->
                <div class="col-sm-3 advantages-des">
                    <i class="fa fa-spinner" aria-hidden="true"></i>
                    <h3>Des ressources pédagogiques</h3>
                    <hr/>
                    <p>Des modules de cours et des tests d'évaluation qui sont mis à jour régulièrement.</p>
                </div> <!-- ./..col-sm-3 -->
                <div class="col-sm-3 advantages-des">
                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                    <h3>Passeport pour l'emploi</h3>
                    <hr/>
                    <p>A terme, des compétences et un diplôme qui assurera l'accès à l'emploi.</p>
                </div> <!-- ./..col-sm-3 -->
            </div> <!-- ./..row -->
        </div>  <!-- ./..container -->
    </section>
    

    <!-- SECTION 4 -->
    <section class="sectionContent" id="testimony">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 ">
                    <h4 id="dropdown3">Témoignages</h4>
                    <hr/>
                </div> <!-- ./..col-xs-12 -->
            </div> <!-- ./..row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="testimony-des">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                        <p>Cum soccis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                        </div>
                    <div class="testimony-img">
                        <img src="images/brad-pitt2.jpg" class="img-responsive" alt="Responsive image"/>
                        <a href="#">Mr SMITH</a>
                    </div>
                </div> <!-- ./..col-sm-6 -->
                <div class="col-sm-6">
                    <div class="testimony-des">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                        <p>Cum soccis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                    </div>
                    <div class="testimony-img">
                        <img src="images/Angelina-Jolie1.jpg" class="img-responsive" alt="Responsive image"/>
                        <a href="#">Mrs SMITH</a>
                    </div>
                </div> <!-- ./..col-sm-6 -->
            </div> <!-- ./..row -->
        </div> <!-- ./..container -->
    </section> 

    <!-- SECTION 5 -->
    <section class="sectionContent" id="team">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 ">
                    <h4 id="dropdown4">L'équipe Learn Station&reg;</h4>
                    <hr/>
                </div> <!-- ./..col-xs-12 -->
                <div class="col-xs-12 col-sm-6 col-md-3">
                     <figure class="thumbnail">
                        <img src="images/teamG.jpg" class="img-responsive" alt="team img"/>
                        <figcaption class="caption">
                            <h4>Gérard</h4>
                            <h3>Intégrateur web</h3>
                            <hr/>
                            <p class="social-icon">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </p>
                        </figcaption>
                    </figure>
                </div> <!-- ./..col-sm-6 col-md-3 -->
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <figure class="thumbnail">
                        <img src="images/teamL.jpg" class="img-responsive" alt="team img"/>
                        <figcaption class="caption">
                            <h4>Lucile</h4>
                            <h3>Intégratrice web</h3>
                            <hr/>
                            <p class="social-icon">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </p>
                        </figcaption>
                    </figure>
                </div> <!-- ./..col-sm-6 col-md-3 -->
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <figure class="thumbnail">
                        <img src="images/teamW.jpg" class="img-responsive" alt="team img"/>
                        <figcaption class="caption">
                            <h4>Willy</h4>
                            <h3>Développeur web</h3>
                            <hr/>
                            <p class="social-icon">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </p>
                        </figcaption>
                    </figure>
                </div> <!-- ./..col-sm-6 col-md-3 -->
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <figure class="thumbnail">
                        <img src="images/teamJ.jpg" class="img-responsive" alt="team img"/>
                        <figcaption class="caption">
                            <h4>Jérémy</h4>
                            <h3>Développeur web</h3>
                            <h3>Commercial</h3>
                            <hr/>
                            <p class="social-icon">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </p>
                        </figcaption>
                    </figure>
                </div> <!-- ./..col-sm-6 col-md-3 -->
            </div> <!-- ./..row -->
        </div> <!-- ./..container -->
    </section> 

    <!-- SECTION 6 -->
    <section id="contact">
        <div class="container">
            <div class="row section6">
                <div class="col-xs-12">
                    <h2>Nous contacter</h2>
                </div>
                <!-- ./..col-xs-12 -->
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 contactInfo">
                            <h3>Contact Info</h3>
                            <p>Besoin de plus d'informations?</p>
                            <p>N'hésitez pas à nous contacter par mail, téléphone ou bien via le formulaire de contact ci-après. Réponse rapide garantie !</p>
                            <div class="row contactIcon">
                                <div class="col-sm-4 col-md-6">
                                    <h4><i class="fa fa-envelope-open-o" aria-hidden="true"></i>E-MAIL</h4>
                                    <p>contact@learnstation.com</p>
                                </div>
                                <!-- ./..col-sm-12 col-md-4 -->
                                <div class="col-sm-4 col-md-6 phone">
                                    <h4><i class="fa fa-phone" aria-hidden="true"></i>TEL</h4>
                                    <p>07.80.81.82.83</p>
                                </div>
                                <!-- ./..col-sm-12 col-md-4 -->
                            </div>
                            <!-- ./..row -->
                        </div>
                        <!-- ./..col-sm-12 col-md-6 -->
                        <div class="col-sm-12 col-md-6">
                            <form method="POST" action="inc/sendEmail.php" class="form-group" id="formulaire" onsubmit="event.preventDefault();">
                                <div class="col-sm-6 col-md-6">
                                    <p><input class="form-control" type="text" name="nom" id="nom" placeholder="Nom" /></p>
                                </div>
                                <!-- ./..col-sm-6 col-md-6 -->
                                <div class="col-sm-6 col-md-6">
                                    <p><input class="form-control" type="text" name="prenom" id="prenom" placeholder="Prénom" /></p>
                                </div>
                                <!-- ./..col-sm-6 col-md-6 -->
                                <div class="col-sm-12 col-md-12">
                                    <p><input class="form-control" type="email" name="email" id="email" placeholder="Adresse mail" required/></p>
                                </div>
                                <!-- ./..col-sm-12 col-md-12" -->
                                <div class="col-sm-12 col-md-12">
                                    <p><input class="form-control" type="objet" name="objet" id="objet" placeholder="Objet" /></p>
                                </div>
                                <!-- ./..col-sm-12 col-md-12" -->
                                <div class="col-sm-12 col-md-12">
                                    <p><textarea id="message" class="form-control" rows="7" name="message" placeholder="Message" required></textarea></p>
                                </div>
                                <!-- ./..col-sm-12 col-md-12 -->
                                <div class="col-sm-offset-4 col-sm-8 col-md-offset-4 col-md-8 ">
                                    <input id="valider" type="submit" class="form-control" value="Envoyer" />
                                </div>
                            </form>
                            <div id="confirmation"></div>
                        </div>
                        <!-- ./..col-sm-12 col-md-6 -->
                    </div>
                    <!-- ./..row -->
                </div>
                <!-- ./..col-xs-12 -->
            </div>
            <!-- ./..row -->
        </div>
    </section>
    <!-- ./..section -->

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
