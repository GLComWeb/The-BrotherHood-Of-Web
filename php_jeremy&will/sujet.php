<?php require_once('includes/head_bootstrap.html');
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
    <script src="assets/js/jquery-3.2.1.js"></script>
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <script src="assets/js/gestion_sujet.js"></script>
    <title>Sujet de discussion</title>
</head>
<body>
    <main class="container">
        <section class="row">

            <div class="col-sm-6">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#monModal">
                    <i class="fa fa-plus" aria-hidden="true"></i> Ajouter une réponse
                </button>
            </div>
            <div class="message"></div>

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
        
        <section class="row" style="padding-top: 20px;">
            <div class="col-sm-12 thread">
                <table class="table table-striped">
                    <tbody>
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
                                $return['erreur1'] = 'Une érreur est survenue dans l\'exécution de la requête des sujets';
                            }
                                                       
                            echo '<tr><td><p>'.$return['message'][0]['sujetDiscus'].'<p>'.
                                            '<p>'.$return['message'][0]['texteDiscus'].'<p>'.
                                            '<p>'.$return['message'][0]['dateDiscus'].'</p></tr></td>';
                                
                            if ( !empty($return['message'][0]['sujetDiscus']) ) {
                                echo '<tr class="reponse"><td><p>';
                                foreach ($return['message'] as $element) {
                                    echo $element['sujetMess'].'</p>'.
                                    '          <p>'.$element['texteMess'].'</p>'.
                                    '          <p>'.$element['dateMess'];
                                    echo '<hr/>';
                                }
                                echo '</p></tr></td>';
                            } else {
                                echo '<tr class="vide"><td>Aucune réponse à ce sujet ou ce sujet n\'existe pas</td></tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>