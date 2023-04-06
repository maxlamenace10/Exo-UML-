<?php

class Technicien {
    private $nom;
    private $subordonnes = array();

    public function __construct($nom) {
        $this->nom = $nom;
    }

    public function addSubordonnes($subordonne) {
        if ($subordonne === $this->nom) {
            throw new Exception("Un technicien ne peut pas être son propre subordonné");
        }
        $this->subordonnes[] = $subordonne;
        $subordonne->setTechnicien($this);
    }

    public function getSubordonnes() {
        return $this->subordonnes;
    }
}

class Subordonne {
    private $nom;
    private $technicien;

    public function __construct($nom) {
        $this->nom = $nom;
    }

    public function setTechnicien($technicien) {
        $this->technicien = $technicien;
    }

    public function getTechnicien() {
        return $this->technicien;
    }
}

$technicien = new Technicien("Julien");


$subordonne1 = new Subordonne("Mathis");
$subordonne2 = new Subordonne("Julien");

$technicien->addSubordonnes($subordonne1);
$technicien->addSubordonnes($subordonne2);

var_dump($technicien);