<?php 

//classe d'accès aux données concernant les agences

class daoAgences {

    //chargement de toutes les agences de la BDD

    public static function chargerAgences(){
        $resultat = array();
        try {
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("select * from agence");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while($ligne){
                $resultat[] = new agence($ligne["idAgence"],$ligne["nomAgence"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception $ex) {
            echo("Erreur : ".$ex->getMessage());
            die();
        }     
        return $resultat; 
    }
    
}

?>