<?php

        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DB', 'apolearn');

        include_once ('inc_bdd.php');


            if(!empty($_POST['message'])){         // si les variables ne sont pas vides

                $message = $_POST['message'];                                   // on sécurise nos données
               // $utilisateur_id = $_SESSION;
                $compteur = intval($_POST['compteur']);

                // puis on entre les données en base de données :
                $verif = $db->prepare('SELECT COUNT(*)AS nbr FROM tchat');
                $succes=$verif->execute();

                if ($verif->fetch()['nbr'] > 10){


                    if ($compteur==0){
                        $supretion = $db->prepare('DELETE FROM tchat LIMIT :number1');
                        $supretion->bindValue(':number1', 5, PDO::PARAM_INT );
                        $succes=$supretion->execute();
                    }else{
                        $supretion = $db->prepare('DELETE FROM tchat LIMIT :number1');
                        $supretion->bindValue(':number1', $compteur, PDO::PARAM_INT );
                        $succes=$supretion->execute();
                    }

                }
                    $insertion = $db->prepare('INSERT INTO `tchat` (`message`,`utilisateur_id`) VALUES (:message, :utilisateur_id )');
                    $insertion->bindValue(':utilisateur_id', 2, PDO::PARAM_INT);      //(utilisateur_id ($_session) a la plasse du 2
                    $insertion->bindValue(':message', strip_tags($message), PDO::PARAM_STR);
                    $insertion->execute();

                $test=array("compteur"=>$compteur, "param"=>$_POST['compteur']);
                echo json_encode($test);
            }


?>