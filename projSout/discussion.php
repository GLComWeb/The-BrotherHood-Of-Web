<?php 
require_once('includes/head_bootstrap.html');

// ========= FUTUR Numerotation des pages =========
/*$numeroPage = 1;
if (isset($_GET['page'])) {
    $numeroPage = $_GET['page'];
}
echo $numeroPage;*/

/*===================================================================
  ======== récupère les sujets à partir de la base de donnée ========
  ===================================================================*/

define('HOST', 'localhost');
define('USER', 'phpmyadmin');
define('PASS', 'bmaxx');
define('DB', 'apolearn');

require_once('includes/inc_bdd.php'); // Inclusion essentielle

$return = array();

$requete = $db->prepare('SELECT *, (SELECT COUNT(*) FROM discussion) as nbr_sujet FROM discussion ORDER BY date_post DESC');
$succes = $requete->execute();

if ($succes) {
    $return['sujets'] = $requete->fetchAll();

} else {
    $return['erreur'] = 'Une érreur est survenue dans l\'exécution de la requête des sujets';
}
?>
    <script src="assets/js/jquery-3.2.1.js"></script>
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <script src="assets/js/gestion_discussion.js"></script>
    <title>Forum de discussion</title>
</head>
<body>
    <main class="container">
        <section class="row">
            
            <div class="col-sm-6">
                <p><span class="nombreTotalSujet"></span> sujets.</p>
            </div>
            <a href="discussion.php?page=2">Page suivante</a>

            <div class="col-sm-6">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#monModal">
                    <i class="fa fa-plus" aria-hidden="true"></i> Ajouter discussion
                </button>
            </div>
            <div class="message"></div>

            <div class="modal fade" id="monModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <p class="modal-title">Ajouter une nouvelle discussion</p>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="sujet">Sujet</label>
                                <p><input type="text" class="form-control input-sm" id="sujet" placeholder="sujet" minlength="3" maxlength="45" required></p>
                            </div>
                            <div class="form-group">
                                <label for="texte">Votre text</label>
                                <p><textarea class="form-control" id="texte" rows="3" minlength="15"></textarea></p>
                            </div>
                            <div id="erreur"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="valider">Valider</button> <!-- Ajout en Ajax dans la base de donnée -->
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </section>
        
        <section class="row" style="padding-top: 20px;">
            <div class="col-sm-12 thread">
                <table class="table table-striped">
                    <tbody>
                        <?php
                            foreach ($return['sujets'] as $element){
                                echo '<tr class="ligne">
                                        <td>
                                            <a style="font-size: 2.0em;" class="sujet" href="sujet.php?id='.$element['id'].'">'.$element['sujet'].'</a>
                                            <p class="texte">'.$element['texte']    .'</p>
                                            <p class="date">' .$element['date_post'].'</p>
                                        </td>
                                     </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>