<?php

//objet session

class session{
    private $idSession;
    private $nbPlaces;
    private $dateDebut;
    private $dateFin;
    private $lesInscrits;

    public function __construct($unId,$unNbPlaces,$uneDateDebut,$uneDateFin){
        $this->idSession = $unId;
        $this->nbPlaces = $unNbPlaces;
        $this->dateDebut = $uneDateDebut;
        $this->dateFin = $uneDateFin;
        $this->lesInscrits = array();
    }

    public function getIdS(){
        return $this->idSession;
    }

    public function getDateDebut(){
        return $this->dateDebut;
    }

    public function getDateFin(){
        return $this->dateFin;
    }

    public function getInscrits(){
        return $this->lesInscrits;
    }

    //test si la session courante est disponible (elle est disponible s'il est reste des places)

    public function estDispo(){
        if($this->nbPlaces > 0){
            return True;
        } 
        else{
            return False;
        }
    }

    //ajoute un objet inscrit à la session

    public function addInscrit($unInscrit){
        $this->lesInscrits[] = $unInscrit;
    }
}

?>