<?php
    /*===================================================================
    ======== récupère le sujets à partir de la base de donnée ========
    ===================================================================*/

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'apolearn');

    require_once('includes/inc_bdd.php'); // Inclusion essentielle
    $idDiscussion = intval($_GET['id']);
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
            <title>Forum de discussion</title>
            
            <!-- JS -->
            <script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.js"></script>
            <script type="text/javascript" src="js/bootstrap.js"></script>
            <script type="text/javascript" src="js/script_dashboard_student.js"></script>
            <script src="js/gestion_sujet.js"></script>
            
            <!-- CSS -->
            <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
            <link rel="stylesheet" type="text/css" href="css/styles_dashboard_student.css" />
            <link href="css/font-awesome.css" rel="stylesheet" />
            <link rel="shortcut icon" href="favicon.ico" />
        
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
            <div class="side-body forum">
                <section class="row">

                    <div class="modal fade" id="monModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <p class="modal-title">Ajouter une réponse</p>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="sujet">Sujet</label>
                                        <p><input type="text" class="form-control input-sm" id="sujet" placeholder="sujet" minlength="3" maxlength="45" required></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="texte">Votre texte</label>
                                        <p><textarea class="form-control" id="texte" rows="3" minlength="15"></textarea></p>
                                    </div>
                                    <div id="erreur"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="valider" onclick="ajouterReponse(<?php echo $idDiscussion; ?>);">Valider</button> <!-- Ajout en Ajax dans la base de donnée -->
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </section>
                
                <?php
                                    $return = array();
                                    $requete = $db->prepare('SELECT discussion.sujet as sujetDiscus, 
                                                             discussion.texte as texteDiscus,
                                                             discussion.date_post as dateDiscus,
                                                             message.sujet as sujetMess,
                                                             message.date_post as dateMess,
                                                             message.texte as texteMess 
                                                             FROM discussion LEFT JOIN message ON message.discussion_id = discussion.id WHERE discussion.id = :idDiscussion'); // LIMIT :offset, :nombreSujet
                                    $requete->bindValue(':idDiscussion', $idDiscussion, PDO::PARAM_INT);
                                    $succes = $requete->execute();

                                    if ($succes) {
                                        $return['message'] = $requete->fetchAll();
                                        // echo '<pre>';
                                        // echo print_r($return['message']);
                                        // echo '</pre>';

                                    } else {
                                        $return['erreur1'] = 'Une erreur est survenue dans l\'exécution de la requête des sujets';
                                    }
                ?>

                <section class="row" style="padding-top: 20px;">
                    <div class="col-sm-12">

                        <?='<h1>'.$return['message'][0]['sujetDiscus'].'</h1>' ?>
                    </div>

                    <div class="col-sm-11 thread">
                        <table class="table table-striped">
                            <tbody>
                                
                                <?php                              
                                    echo '<tr><td><p>Sujet: '.$return['message'][0]['sujetDiscus'].'<p>'.
                                                    '<p>'.$return['message'][0]['texteDiscus'].'<p>'.
                                                    '<p>'.$return['message'][0]['dateDiscus'].'</p></tr></td>';
                                        
                                    if ( !empty($return['message'][0]['sujetDiscus']) ) {
                                        
                                        foreach ($return['message'] as $element) {
                                            echo '<tr class="reponse"><td><p>';
                                            echo 'Sujet: '.$element['sujetMess'].'</p>'.
                                            '          <p>'.$element['texteMess'].'</p>'.
                                            '          <p>'.$element['dateMess'];
                                            // echo '<hr/>';
                                            echo '</p></tr></td>';
                                        }
                                        
                                    } else {
                                        echo '<tr class="vide"><td>Aucune réponse à ce sujet ou ce sujet n\'existe pas</td></tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12 pull-right">
                        <button type="button" class="btn btn-default ajoutDiscussion" data-toggle="modal" data-target="#monModal">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter une réponse
                        </button>
                    </div>
                    <div class="message"></div>
                </section>
            </div>
        </main>

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