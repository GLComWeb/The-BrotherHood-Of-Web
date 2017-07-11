<?php
class formuler
{
    public function cryptPassword($new_pass)
    {
        $hashPassword = $new_pass;                                  // cryptage du mot de passe à utiliser lors du login et du sign in.
        $arr = str_split($new_pass);                                // array('m','i','p','L','I','X','F','4','e','d','M','y','6');
        for ($i = 0; $i < strlen($new_pass); $i++) {
            $hashPassword .= $arr[$i] . ord($arr[$i]);              // ord() Conversion en ASSCII
        }
        $monMdp = strrev($hashPassword);                            // Inversion du sens du password
        $monMdp = crypt($monMdp, '$6$rounds=5000$usesomesillystri$0o0Og1fy80oO0jeR0oO0gpDT10oO0524hmrSt');
        $hazard = metaphone ($monMdp);                              //la est taille variable et elle créée une clé similaire pour des mots dont la prononciation est proche
        $monMdp = $monMdp.$hazard;
        $length = strlen($monMdp) / 2 + 3 * 5;                      //diviser par deux la valeure du crypt pour le racoursir
        $monMdp = substr($monMdp, $length);
        return $monMdp;
    }

}