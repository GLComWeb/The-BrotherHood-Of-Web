<?php

            define('HOST', 'localhost');
            define('USER', 'root');
            define('PASS', '');
            define('DB', 'apolearn');

            include_once ('inc_bdd.php');

// ==============appel dans la base de donnee pour inceret les donnee de la facture de l'entreprise==========
    $requert = $db->prepare('SELECT nom, prenom, adresse, code_postal, ville, email,telephone_fixe, telephone_mobile FROM utilisateur WHERE id=2 ');
    $requert->execute();
    $d = $requert->fetch();

    $requert = $db->prepare('SELECT nom, adresse, code_postal, ville, telephone, siret, secteur, site_web, email FROM centre_de_formation WHERE id=1 ');
    $requert->execute();
    $b = $requert->fetch();

    $requert = $db->prepare('SELECT nom, adresse, code_postal, ville, telephone, siret, email, numero_tva FROM entreprise WHERE id=1 ');
    $requert->execute();
    $e = $requert->fetch();

    $requert = $db->prepare('SELECT name,	prix, date_payment, duration, formation_id   FROM offre WHERE id=1 ');
    $requert->execute();
    $a = $requert->fetch();

    $requert = $db->prepare('SELECT  nom, 	date_debut, date_fin , lien_planning ,	details_formation, 	centre_de_formation_id   FROM formation WHERE id=2 ');
    $requert->execute();
    $f = $requert->fetch();
    // ===================================================calacule de la tva==================================
    $tva = 19.6/100;
    $prixTTC = $a['prix'];
    $prixHT = $prixTTC / (1 + $tva);
    $prixht = intVal("$prixHT");

?>
    <!--========================================== afichage facture =========================================== -->
<!DOCTYPE html>
<html>
<head>
    <title>facture</title>
    <meta charset="utf-8"/>
    <link href="css/stylefacturation.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header class="text-center">

    </header>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel-heading">
                    <div class="panel-heading text-center">  <h2>facture:)</h2></div>
                    <div class="text-center pull-right">
                        <p>Facture N°: <?php echo time()?></p>
                        <p>date: <?php echo date('d-m-Y');?></p>
                    </div>
                    <div class="panel-body">
                        <strong>entreprise: <?php echo $e['nom']?></strong><br>
                        <strong>telephone: </strong> <?php echo $e['telephone']?><br>
                        <strong>adresse: </strong> <?php echo $e['adresse'].' '.$e['code_postal'].' '.$e['ville'] ?><br>
                        <strong>Email: </strong> <?php echo $e['email']?><br>
                        <strong>siret: </strong> <?php echo $e['siret']?><br>
                        <strong>numero TVA: </strong> <?php echo $e['numero_tva']?><br>
                    </div>
                </div>
            </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6 pull-left">
                        <div class="panel panel-default height">
                            <div class="panel-heading">Détails de la facturation</div>
                            <div class="panel-body">
                                <strong> <?php echo $d['nom'].' '.$d['prenom'] ?></strong>
                                <p><strong>mobile: </strong> <?php echo $d['telephone_fixe']?><br>
                                    <strong>telephone: </strong> <?php echo $d['telephone_mobile']?><br>
                                <strong>adresse: </strong>  <?php echo $d['adresse'].' '.$d['code_postal'].' '.$d['ville'] ?></p>

                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6 pull-right">
                        <div class="panel panel-default height">
                            <div class="panel-heading">centre de formation</div>
                            <div class="panel-body">
                                <strong> <?php echo $b['nom']?> </strong><br>
                                <strong>adresse: </strong><?php echo $b['adresse'].' '.$b['code_postal'].' '.$b['ville']?> <br>
                                <strong>secteur: </strong><?php echo $b['secteur']?> <br>
                                <strong>telephonne: </strong><?php echo $b['telephone']?> <br>
                                <strong>Email: </strong><?php echo $b['email']?> <br>
                                <strong>site web: </strong><a href="<?php echo $b['site_web']?>"> <?php echo $b['site_web']?></a><br>
                                <strong>siret: </strong><?php echo $b['siret']?> <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h3 class="text-center"><strong>Récapitulatif de la commande</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <td><strong>Nom de la formation</strong></td>
                                    <td class="text-left"><strong>duration</strong></td>
                                    <td class=""><strong>prix de la formation</strong></td>
                                    <td class="text-center"><strong>prix au mois</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <p>
                                            <?php echo $a['name'];?> <!-- nom de la formation -->
                                        </p>
                                        <br>
                                    </td>
                                     <td class="text-center"><?php echo $a['duration']?></td>
                                     <td class="text-center"><?php echo "$prixht"?></td>
                                     <td class="text-right"><?php echo  intval(4000/12)?>€</td>
                                     <td class="text-right"><?php echo  "$prixht"?>€</td>
                                </tr>
                                <tr>
                                   <td class="highrow"></td>
                                   <td class="highrow"></td>
                                   <td class="highrow"></td>
                                   <td class="highrow text-center"><strong>Subtotal</strong></td>
                                   <td class="highrow text-right"><?php echo "$prixht"?>€</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"><p><strong>decipition de la formation</strong></p>
                                    <p><?php echo $f['details_formation'];?></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>TVA 20%</td>
                                    <td class="emptyrow text-right"><?php echo "$tva"?>€</td>
                                 </tr>
                                 <tr>
                                     <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                     <td class="emptyrow"></td>
                                     <td class="emptyrow"></td>
                                     <td class="emptyrow text-center"><strong>Total</strong></td>
                                     <td class="emptyrow text-right"> <?php echo "$prixTTC"?>€ </td>
                                 </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

