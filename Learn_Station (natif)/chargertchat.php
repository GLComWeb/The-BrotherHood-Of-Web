<?php
            define('HOST', 'localhost');
            define('USER', 'root');
            define('PASS', '');
            define('DB', 'apolearn');

        include_once ('includes/inc_bdd.php');

            // on récupère les messages ayant un id plus grand que celui donné
            $requete = $db->prepare('SELECT * FROM tchat ORDER BY id DESC LIMIT 0,10');
            $requete->execute();
            $result = $requete->fetchAll();

            echo json_encode($result);


