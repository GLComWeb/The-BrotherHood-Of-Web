<?php

/**
 *  Classe abstraite de l'utilisateur
*/
class Utilisateur {
    protected $id;
    // protected $email;
    protected $nom;
    protected $prenom;
    // protected $dateConnexion;

    /* ===================== GETTER / SETTER ===================== */
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    // public function setEmail($email) {
    //     $this->email = $email;
    // }

    // public function getEmail() {
    //     return $this->email;
    // }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    // public function setDateConnexion($dateConnexion) {
    //     $this->dateConnexion = $dateConnexion;
    // }

    // public function getDateConnexion() {
    //     return $this->dateConnexion;
    // }
}
?>