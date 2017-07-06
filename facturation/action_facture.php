<?php

        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DB', 'apolearn');

        include_once ('inc_bdd.php');



                // ==========================appel dans la base de donnee pour inceret les donnee de la facture de l'entreprise========================
                $requert = $db->prepare('SELECT id FROM utilisateur WHERE id=2 ');
                $requert->execute();
                $util = $requert->fetch();

                $requert = $db->prepare('SELECT nom FROM entreprise WHERE id=1 ');
                $requert->execute();
                $entete = $requert->fetch();

                $requert = $db->prepare('SELECT prix FROM offre WHERE id=1 ');
                $requert->execute();
                $prix = $requert->fetch();

                $requert = $db->prepare('SELECT details_formation FROM formation WHERE id=2');
                $requert->execute();
                $detail = $requert->fetch();

                $requert = $db->prepare('SELECT prix_unitaire, quantite,tva FROM facture WHERE id=1');
                $requert->execute();
                $unite = $requert->fetch();

                $requert = $db->prepare('SELECT duration FROM offre WHERE id=1');
                $requert->execute();
                $duree = $requert->fetch();

                $requert = $db->prepare('SELECT nom FROM centre_de_formation WHERE id=1');
                $requert->execute();
                $id = $requert->fetch();

                //=======================================creation du numero de facture==================================================
                $numero_de_facture = time();
                $date = date('YmdHis');
                $date =(float)$date; /*force le type*/
                $date2=$date.'_'.time();

                    //verifier si la facture existe
                    $date_sql = date('Y-m-d');
                    $requert=$db->prepare("select id from facture where id = ?");
                    $requert->bindValue(1,time(),PDO::PARAM_STR);
                    $requert->execute();
                    $d = $requert->fetch();

                //================================ si la facture et bien la donc g'integre les information dans la base de donnee==========
                if(empty($d)){
                    $nb_fact = $date;

                    $requert=$db->prepare('INSERT INTO facture(date_de_facturation, 
                                                                        numero_de_facture, 
                                                                        entete_entreprise, 
                                                                        prix, description, 	
                                                                        prix_unitaire ,	
                                                                        quantite, 
                                                                        duree, 
                                                                        tva, 
                                                                        utilisateur_id, 
                                                                        centre_de_formation) 
                                                    VALUES             (:date_de_facturation, 
                                                                        :numero_de_facture, 
                                                                        :entete_entreprise, 
                                                                        :prix, :description, 
                                                                        :prix_unitaire , 
                                                                        :quantite , 
                                                                        :duree, 
                                                                        :tva, 
                                                                        :utilisateur_id, 
                                                                        :centre_de_formation)');

                    $requert->bindValue(":date_de_facturation", $date_sql, PDO::PARAM_STR);
                    $requert->bindValue(":numero_de_facture", time(), PDO::PARAM_STR);
                    $requert->bindValue(":entete_entreprise", $entete['nom'], PDO::PARAM_STR);
                    $requert->bindValue(":prix", $prix['prix'], PDO::PARAM_STR);
                    $requert->bindValue(":description", $detail['details_formation'], PDO::PARAM_STR);
                    $requert->bindValue(":prix_unitaire", $unite['prix_unitaire'], PDO::PARAM_STR);
                    $requert->bindValue(":quantite", $unite['quantite'], PDO::PARAM_STR);
                    $requert->bindValue(":duree", $duree['duration'], PDO::PARAM_STR);
                    $requert->bindValue(":tva", $unite['tva'], PDO::PARAM_STR);
                    $requert->bindValue(":utilisateur_id", $util['id'], PDO::PARAM_STR);
                    $requert->bindValue(":centre_de_formation", $id ['nom'], PDO::PARAM_STR);
                    $requert->execute();


                } else {
                        // ======================si il n'y a pas de facture c'est qu'il y a un probleme de payment=======================
                    echo 'il n\'y a pas de facture pour set utilisateur';
                /* ... */
                }



