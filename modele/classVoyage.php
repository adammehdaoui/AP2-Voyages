<?php

//objet voyage

class voyage{
    private $idVoyage;
    private $destinationVoyage;
    private $descriptionVoyage;
    private $prixVoyage;
    private $imageVoy;
    private $agenceVoy;
    private $lesSessions;

    public function __construct($unId,$uneDestination,$uneDescription,$unPrix,$uneImage,$uneAgence,$desSessions){
        $this->idVoyage = $unId;
        $this->destinationVoyage = $uneDestination;
        $this->descriptionVoyage = $uneDescription;
        $this->prixVoyage = $unPrix;
        $this->imageVoy = $uneImage;
        $this->agenceVoy = $uneAgence;
        $this->lesSessions = $desSessions;
    }

    public function getIdVoyage(){
        return $this->idVoyage;
    }

    public function getDestinationVoyage(){
        return $this->destinationVoyage;
    }

    public function getDescription(){
        return $this->descriptionVoyage;
    }

    public function getPrix(){
        return $this->prixVoyage;
    }

    public function getImage(){
        return $this->imageVoy;
    }

    public function getAgence(){
        return $this->agenceVoy;
    }

    public function getLesSessions(){
        return $this->lesSessions;
    }

    //renvoit les sessions disponibles (avec de la place) d'une destination

    public function sessionsDispo(){
        $lesSessions = array();
        for($i=0;$i<count($this->lesSessions);$i++){
            if($this->lesSessions[$i]->estDispo()==True){
                $lesSessions[] = $this->lesSessions[$i];
            }
        }
        return $lesSessions;
    }

    //renvoit le nombre de sessions disponibles

    public function nbSessionsDispo(){
        $lesSessions = $this->sessionsDispo();
        $nbSessions = count($lesSessions);

        return $nbSessions;
    }
}

?>