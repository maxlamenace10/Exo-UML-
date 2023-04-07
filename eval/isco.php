<?php

class Responsable {
    private array $itcs;
}

class ITC {
    private Responsable $responsable;
    private array $devis;
}

class Devis {
    private Affaire $affaire; 
    private Itc $itc;
    private Client $client; 
    private DateTime $date;
    private array $products;
    private array $prestations;
}

class Affaire {
    private array $devis;
}

class Product {
} 

class Prestation {
}

class Client {
    private array $interlocuteurs;
}

class Interlocuteur  {
}