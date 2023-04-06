<?php

class Team {
  private $name;
  private $players = array();

  public function __construct($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  public function addPlayer($player) {
    if (count($this->players) < 6) {
      $this->players[] = $player;
      return true;
    } else {
      return false;
    }
  }

  public function getPlayers() {
    return $this->players;
  }
}

class Player {
  private $name;
  private $team;

  public function __construct($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  public function getTeam() {
    return $this->team;
  }

  public function setTeam($team) {
    $this->team = $team;
  }
}

$team = new Team("France");

$player1 = new Player("Julien");
$player2 = new Player("Toto");
$player3 = new Player("Momo");
$player4 = new Player("Sofiane");

// Ajout des joueurs à l'équipe
$team->addPlayer($player1);
$team->addPlayer($player2);
$team->addPlayer($player3);
$team->addPlayer($player4);

var_dump($team);