<?php
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DB', 'apolearn');

        include_once ('includes/inc_bdd.php');

            // on récupère les 10 derniers messages postés
           //$requete = $db->prepare('SELECT * FROM tchat INNER JOIN utilisateur ON utilisateur_id=utilisateur.id ORDER BY utilisateur.id DESC ');
            $requete = $db->prepare('SELECT * FROM  utilisateur ORDER BY utilisateur.id ');
            $requete->execute();
            $donnees = $requete->fetchAll();

                // on affiche le message (l'id servira plus tard)
                //echo "<p id=\"" . $row['utilisateur.nom'] . "\"><strong>" . $row['auteur'] . " dit :</strong> " . $row['message'] . "</p>";

/*echo '<pre>';
echo print_r($donnees);
echo '</pre>';*/
?>
<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- bon affichage sur mobile -->
        <meta name="description" content="Educative" />
        <meta name="author" content="The BrotherHood Of Web" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Apolearn est une plateforme e-learning LMS sociale et collaborative pour les professionnels de l'éducation et de la formation." />
        <title>Tchat</title>

        <!-- JS -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/script_dashboard_student.js"></script>
        <script type="text/javascript" src="js/scriptschat.js"></script>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/styles_dashboard_student.css" />
        <link href="css/font-awesome.css" rel="stylesheet" />
        <link rel="shortcut icon" href="favicon.ico" />

        <!--<script src="https://use.fontawesome.com/45e03a14ce.js"></script>-->
    </head>
    <body >
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
                                <a class="navbar-brand" href="index.php">Apolearn II</a>
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
                        </div> <!-- ./..brand-wrapper -->
                    </div> <!-- ./..navbar-header -->

                    <!-- Main Menu -->
                    <div class="side-menu-container">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="dashboard_student.php"><i class="fa fa-home" aria-hidden="true"></i> Tableau de bord</a></li>
                            <li><a href="dashboard_student_profil.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profil</a></li>
                            <li><a href="#"><i class="fa fa-book" aria-hidden="true"></i> Modules</a></li>
                            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Messagerie</a></li>
                            <li><a href="discussion.php"><i class="fa fa-comment" aria-hidden="true"></i> Forum</a></li>
                            <li><a href="index_tchat.php"><i class="fa fa-commenting-o" aria-hidden="true"></i></i> Tchat</a></li>
                            <li><a href="#"><i class="fa fa-power-off" aria-hidden="true"></i> Déconnexion</a></li>
                        </ul>
                    </div><!-- ./..side-menu-container -->
                </nav> <!-- ./..navbar navbar-default -->
            </div> <!-- ./..side-menu -->
        </header>

        <!-- CONTENT -->
        <main class="container-fluid">
            <div class="side-body tchat">
                <div class="row">
                
                    <div class="col-md-3 hidden-xs chat_sidebar">
                        <div class="row">

                            <div class="dropdown all_conversation">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        Basic panel example
                                    </div>
                                </div>

                            </div>
                            <div class="member_list">
                                <?php
                                    foreach($donnees as $key=>$value){
                                ?>
                                <ul class="list-unstyled">
                                    <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                            <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                                    </span>
                                        <div class="chat-body clearfix">
                                            <div class="header_sec">
                                                <strong class="primary-font"><?= $value['nom'] . " " . $value['prenom'] ?></strong> <!-- ici on fait aparetre le utilisateur connecter -->
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                 <?php
                                    }
                                ?>
                            </div>
                        </div> <!-- ./..row -->
                    </div> <!-- ./..col-md-3 chat_sidebar -->

                    <div class="col-md-7 message_section">
                        <div class="row">
                            <div class="new_message_head">
                                <div class="pull-left">
                                    <button><i class="fa fa-plus-square-o" aria-hidden="true"></i> Nouveau message</button>
                                </div>
                            </div><!--new_message_head-->
                            <div class="chat_area">
                                <ul class="list-unstyled1">
                                        <!--*************** ici se trouve la structure des messages qui apparaissent dans le tchat en AJAX **********-->
                                </ul>
                            </div><!--chat_area-->
                            <div class="message_write">
                                <form action="traitementchat.php" method="POST"  >
                                    <textarea name="message" class="form-control" placeholder="Message" id="message" ></textarea>
                                    <div class="clearfix"></div>
                                        <!--<div class="chat_bottom"  ><a href="#" class="pull-left upload_btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i>Add Files</a>-->
                                        <button class="pull-right btn btn-success" type="submit" id="envoi">Envoyer</button>
                                    </div>
                                </form>
                            </div>
                        </div> <!-- ./..row -->
                    </div> <!--col-md-7 message_section-->
     
                </div> <!-- ./..row -->
            </div> <!-- ./..side-body tchat -->
        </main> <!-- ./..container-fluid -->

        <!-- Footer -->
         <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <p class="icon">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        </p>
                    </div> <!-- ./..col-xs-12 -->
                    <div class="col-xs-12 ">
                        <p>&copy; 2017 <a href="#" class="color-primary linear">The BrotherHood Of Web</a>. All Rights Reserved. </p>
                    </div> <!-- ./..col-xs-12 -->
                    
                </div> <!-- ./..row -->
            </div> <!-- ./..container-fluid -->
         </footer><!-- /Footer -->
    </body>
</html>