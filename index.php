<?php

class Technicien {
  private $name;
  private $vehicules = array();

  public function __construct($name) {
      $this->name = $name;
  }

  public function getName() {
      return $this->name;
  }

  public function getVehicules() {
      return $this->vehicules;
  }

  public function addVehicule(Vehicule $vehicule) {
      if (!in_array($vehicule, $this->vehicules, true)) {
          $this->vehicules[] = $vehicule;
          $vehicule->setTechnicien($this);
      }
  }
}

class Vehicule {
  private $registerNumber;
  private $technicien;

  public function __construct($registerNumber) {
      $this->registerNumber = $registerNumber;
  }

  public function getRegisterNumber() {
      return $this->registerNumber;
  }

  public function setTechnicien(Technicien $technicien) {
      $this->technicien = $technicien;
      $technicien->addVehicule($this);
  }

  public function getTechnicien() {
      return $this->technicien;
  }
}

$paul = new Technicien("Paul");
$juliette = new Technicien("Juliette");
$jalila = new Technicien("Jalila");

$vA = new Vehicule("AB-C12-ks");
$vB = new Vehicule("GH-I78-9Z");
$vC = new Vehicule("DE-F45-A6");

$paul->addVehicule($vA);
$juliette->addVehicule($vA);
$jalila->addVehicule($vC);

$vB->setTechnicien($paul);

var_dump($paul);
var_dump($juliette);
var_dump($jalila);

var_dump($vA);
var_dump($vB);
var_dump($vC);