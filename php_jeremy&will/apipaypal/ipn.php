<?php
// perment de traiter le reyour ipn de paypal
//lire la publication du systeme paypal et ajouter 'cmd'
$email_account = "dev.test.wf3-facilitator@gmail.com";           // maitre email du vendeur en dur pour eviter les fraude de payment
$req = 'cmd=_notify-validte';                                   // appel a paypal si le payment est bien valide

foreach ($_POST as $key => $value){                              // verif de la trensaction
    $value = urldencode(stripslashes($value));
    $req .= "&$key=$value";
}

// renvoyer au systeme Paypal pour la validation
$header = "POST /cgi-bin/websrc HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-length" . strlen($req) . "\r\n\r\n";
$fp = fsockopen('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);

print_r($fp);

// verif de l'idantiter du l'utilisateur qui a bien payer l'offre
echo "<pre>";
print_r($_POST);
echo "</pre>";
$item_name = $_POST['item_name'];
$item_number = $_POST['item_numbre'];//?
$payment_status = $_POST['payment_status'];//?
$payment_amount = $_POST['mc_gorss'];
$payment_currency = $_POST['mc_currency'];
$tx_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_email = $_POST['payer_email'];

// verif et recup des information du chemps custom
parse_str($_POST['custom'], $custom);

// verif de se qui se passe a la trensection char paypal si elle et valide ou pas valide
if (!$fp){

}else{
    fputs($fp, $header . $req);
    while (!feof($fp)){
        $res = fgets($fp, 1024);
        if (strcmp($res, "VERIFED") == 0){

            //verifier que le payment_status a la valeur Completed
            if ($payment_status == "Completed"){ //verif du statut du payment par le variable
                if ($email_account == $receiver_email){ //verif du compte qui a bien ressu le payment
                    /**
                     * C'est LA QUE TOUT SE PASSE
                     * toujoures penser a verifier la somme !!
                     */
                    //stocker les donnee de la trasaction dans le ficher log
                    file_put_contents('log', print_r($_POST, true));
                    $req = $db->prepare('SELECT * FROM  offre WHERE prix='.$payment_amount.'LIMIT 1 ');
                    $req->execute();
                    $d = $req->fetch(PDO::FETCH_ASSOC);
                    if (!empty($d)){ //verif si il y a biens un payment
                        $duration = $d['duration'];
                        $uid = $custom['utilisateur_id'];
                        $data = serialize($_POST);

                        //on met a jours la date d'expiration
                        $req = $db->prepare('UPDATE utitlisateur  SET date_expiration = DATE_ADD(NOW(), INTERVAL '.$duration.' MONTH) WHERE id ='.$uid);

                        // on sauvegarde la commande
                        $req = $db->prepare("INSERT INTO order SET utilisateur_id=$uid, amount=$payment_amount, created=NOW(), datas='$data'");
                        print_r($_POST);
                        file_get_contents('log', 'Le paiment a biens été confirmé');// il faut cree un ficher log pour recupere les info de la transaction
                    }else{
                        file_get_contents('log', 'Le paiment ne correspond a aucune offre');
                    }
                    /**
                     * FIN DU CODE DE VERIF
                     */
                }
            }else{
                // statut de paiment: echec
            }
            exit();
        }
        else if (strcmp($res,"INVALID") == 0){
            // trensaction un valide
        }

    }
    fclose($fp);
}
