<?php

//objet mineurInscrit héritant d'Inscrit

final class mineurInscrit extends inscrit{
    private $telResponsable;

    public function __construct($unId,$unNom,$unPrenom,$unAge,$unTel){
        parent::__construct($unId,$unNom,$unPrenom,$unAge);
        $this->telResponsable = $unTel;
    }

    public function getTel(){
        return $this->telResponsable;
    }
}

?>