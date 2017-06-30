<?php
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DB', 'apolearn');

        include_once ('inc_bdd.php');

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
<html>
    <head>

    <link rel="stylesheet" type="text/css" href="css/stylechats.css">
    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/scriptschat.js"></script>
    <!--<script src="https://use.fontawesome.com/45e03a14ce.js"></script>-->
    </head>
    <body >
        <header>
            <div class="main_section">
                <div class="container">
                    <div class="chat_container">
                        <div class="col-sm-3 chat_sidebar">
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
                                            <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg"
                                                 alt="User Avatar" class="img-circle">
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
                            </div>
                        </div>
                    </div>
                        <!--chat_sidebar-->
                    <div class="col-sm-9 message_section">
                        <div class="row">
                            <div class="new_message_head">
                                <div class="pull-left">
                                    <button><i class="fa fa-plus-square-o" aria-hidden="true"></i> New Message</button>
                                </div>
                           </div><!--new_message_head-->
                           <div class="chat_area">
                                <ul class="list-unstyled1">
                                    <!--*************** ici se trouve la structure des message qui aparesse dans le tchat en AJAX **********-->
                                </ul>
                            </div><!--chat_area-->
                            <div class="message_write">
                                <form action="traitementchat.php" method="POST"  >
                                    <textarea name="message" class="form-control" placeholder="type a message" id="message" ></textarea>
                                    <div class="clearfix"></div>
                                    <!--<div class="chat_bottom"  ><a href="#" class="pull-left upload_btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i>Add Files</a>-->
                                        <input class="pull-right btn btn-success" type="submit" id="envoi" value="send" >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!--message_section-->
                </div>
            </div>
        </header>
    </body>