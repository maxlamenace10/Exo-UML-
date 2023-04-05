<?php

class Table {
    private $waiter = array();
    private $tableId;

    public function __construct($tableId, Waiter $waiter) {
        $this->waiter = $waiter;
        $this->waiter->addTable($this);
    }

    public function getTableId() {
        return $this->tableId;
    }

    public function getWaiterName() {
        return $this->waiter->getName();
    }

    public function addWaiter(Waiter $waiter) {
        if (count($this->waiters) >= 1) {
            throw new Exception('Vous devez ajoutez un waiter à cette table');
        }
        $this->waiters[] = $waiter;
        echo "La table " . $this->name . " a été ajouté par  " . $waiter->getName() ;
    }
}

class Waiter {
    private $name;
    private $tables = array();

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function addTable(Table $table) {
        if (count($this->tables) < 4) {
            $this->tables[] = $table;
            echo $this->name . " a ajouté la table" . $table->getTableId() ;
        } else {
            echo $this->name . " Vous ne pouvez pas ajoutez plus de table";
        }
    }

    public function removeTable(Table $table) {
        $index = array_search($table, $this->tables);
        if ($index !== false) {
            unset($this->tables[$index]);
            echo $this->name . " a supprimer la table" . $table->getTableId();
        }
    }
}


$waiter = new Waiter("John");

$table1 = new Table('table 1',$waiter);
$table2 = new Table('table 2',$waiter);
$table3 = new Table('table 3',$waiter);
$table4 = new Table('table 4',$waiter);
$table5 = new Table('table 5',$waiter); 


$waiter->removeTable($table2);

var_dump($waiter);

