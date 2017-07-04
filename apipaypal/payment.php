<?php
session_start();
?>
<?php
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DB', 'apolearn');

        include_once ('inc_bdd.php');
        //include_once ('ipn.php');

?>
<html>
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
        <link rel="stylesheet" type="text/css" href="css/styleachat.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-default ">
            <div class="topbar-inner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <ul class="navbar navbar-default navbar-static-top">
                            <h3><a herf="#">test paypal</a></h3>
                                <li><a href="#" title="">vous ete connecté en tant que </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
<!--======================================== formule 1 offre prenium ======================================================================-->
    <div class="contaire-fluid" style="padding-top: 60px;  ">
        <div class="page-header">
            <h1 style="text-align: center">chois de l'offre de formation</h1>
            <div class="row" style="text-align: center">
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <div class="col-md-4 col-sm-6" >
                        <div class="plan plan-one wow bounceIn animated" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: bounceIn; ">
                            <div class="plan_title" style="border: solid 1px">
                                <i class="icon-mobile medium-icon"></i>
                                <h3>formation prenium</h3>
                                <h2>400€ <span>par ans</span></h2>
                                <?php
                                $req = $db->prepare('SELECT * from offre');
                                $req->execute();
                                while ($d = $req->fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                    <input name="amount" value="<?php echo $d['prix'];?>" type="hidden">
                                    <?php
                                ?>
                                    <input name="cmd" type="hidden" value="_xclick" />
                                    <input name="business" type="hidden" value="dev.test.wf3-facilitator@gmail.com" />
                                    <input name="item_name" type="hidden" value="offre de formation prenium Solo" />
                                    <input name="shipping" type="hidden" value="0.00" />
                                    <input name="no_shipping" type="hidden" value="0" />
                                    <input name="custom" type="hidden" value="utilisateur_id=2&time" />
                                    <input name="return" type="hidden" value="http://localhost/entrepris_form/api%20php/notify_url.php" />
                                    <input name="cancel_return" type="hidden" value="http://localhost/entrepris_form/api%20php/cancel_return.php" />
                                    <input name="notify_url" type="hidden" value="http://localhost/entrepris_form/api%20php/ipn.php" />
                                    <input name="no_note" type="hidden" value="1" />
                                    <input name="currency_code" type="hidden" value="EUR" />
                                    <input name="tax" type="hidden" value="0.00" />
                                    <input name="lc" type="hidden" value="FR" />
                                    <input name="bn" type="hidden" value="PP-BuyNowBF" />
                                    <input alt="Effectuez vos paiements via PayPal : une solution rapide, gratuite et sécurisée" name="submit" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" type="image" /><img src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" border="0" alt="" width="1" height="1" />
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
         </div>
    </div>
</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
</html>

<?php