<?php

class agence{
    private $idAgence;
    private $nomAgence;

    public function __construct($unId,$unNom){
        $this->idAgence = $unId;
        $this->nomAgence = $unNom;
    }

    public function getId(){
        return $this->idAgence;
    }

    public function getNom(){
        return $this->nomAgence;
    }
}