<?php

//objet inscrit

class inscrit{
    protected $idInscrit;
    protected $nomInscrit;
    protected $prenomInscrit;
    protected $ageInscrit;

    public function __construct($unId,$unNom,$unPrenom,$unAge){
        $this->idInscrit = $unId;
        $this->nomInscrit = $unNom;
        $this->prenomInscrit = $unPrenom;
        $this->ageInscrit = $unAge;
    }

    public function getId(){
        return $this->idInscrit;
    }

    public function getNom(){
        return $this->nomInscrit;
    }

    public function getPrenom(){
        return $this->prenomInscrit;
    }

    public function getAge(){
        return $this->ageInscrit;
    }

}

?>