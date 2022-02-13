<?php

//classe d'accès aux données concernant les voyages
//les objets session, inscrits, et agences sont compris dans l'objet voyage
//d'où les include

include "classAgence.php";
include "classInscrit.php";
include "classMineurInscrit.php";
include "classSession.php";
include "classVoyage.php";
include "classDao.php";
include "dao.agences.php";
include "dao.inscription.php";
include "dao.session.php";

class daoVoyages {

    public static function chargerVoyages(){

        $lesAgences = daoAgences::chargerAgences();
        $resultat = array();

        try {
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("select * from voyage");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while($ligne){

                $agence = NULL;
                for($i=0;$i<count($lesAgences);$i++){
                    if($lesAgences[$i]->getId() == $ligne["idAgence"]){
                        $agence = $lesAgences[$i];
                        break;
                    }
                }

                $lesSessions = daoSession::getSessionsIdVoy($ligne["idVoyage"]);

                $resultat[] = new voyage($ligne["idVoyage"],$ligne["destinationVoyage"],$ligne["descriptionVoyage"],$ligne["prixVoyage"],$ligne["imageVoy"],$agence,$lesSessions);

                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception $ex) {
            echo("Erreur : ".$ex->getMessage());
            die();
        }
        return $resultat; 
    }

    public static function chargerVoyagesPrixCroissant(){

        $lesAgences = daoAgences::chargerAgences();
        $resultat = array();

        try {
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("select * from voyage order by prixVoyage asc");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while($ligne){

                $agence = NULL;
                for($i=0;$i<count($lesAgences);$i++){
                    if($lesAgences[$i]->getId() == $ligne["idAgence"]){
                        $agence = $lesAgences[$i];
                        break;
                    }
                }

                $lesSessions = daoSession::getSessionsIdVoy($ligne["idVoyage"]);

                $resultat[] = new voyage($ligne["idVoyage"],$ligne["destinationVoyage"],$ligne["descriptionVoyage"],$ligne["prixVoyage"],$ligne["imageVoy"],$agence,$lesSessions);

                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception $ex) {
            echo("Erreur : ".$ex->getMessage());
            die();
        }
        return $resultat; 
    }

    public static function chargerVoyagesPrixDecroissant(){

        $lesAgences = daoAgences::chargerAgences();
        $resultat = array();

        try {
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("select * from voyage order by prixVoyage desc");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while($ligne){

                $agence = NULL;
                for($i=0;$i<count($lesAgences);$i++){
                    if($lesAgences[$i]->getId() == $ligne["idAgence"]){
                        $agence = $lesAgences[$i];
                        break;
                    }
                }

                $lesSessions = daoSession::getSessionsIdVoy($ligne["idVoyage"]);

                $resultat[] = new voyage($ligne["idVoyage"],$ligne["destinationVoyage"],$ligne["descriptionVoyage"],$ligne["prixVoyage"],$ligne["imageVoy"],$agence,$lesSessions);

                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception $ex) {
            echo("Erreur : ".$ex->getMessage());
            die();
        }
        return $resultat; 
    }

    public static function chargerVoyagesNom($unNom){

        $lesAgences = daoAgences::chargerAgences();
        $resultat = array();

        try {
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("select * from voyage where lower(destinationVoyage) like '$unNom%'");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while($ligne){

                $agence = NULL;
                for($i=0;$i<count($lesAgences);$i++){
                    if($lesAgences[$i]->getId() == $ligne["idAgence"]){
                        $agence = $lesAgences[$i];
                        break;
                    }
                }

                $lesSessions = daoSession::getSessionsIdVoy($ligne["idVoyage"]);

                $resultat[] = new voyage($ligne["idVoyage"],$ligne["destinationVoyage"],$ligne["descriptionVoyage"],$ligne["prixVoyage"],$ligne["imageVoy"],$agence,$lesSessions);

                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception $ex) {
            echo("Erreur : ".$ex->getMessage());
            die();
        }
        return $resultat; 
    }

    public static function chargerVoyagesIdV($idV){
        $lesAgences = daoAgences::chargerAgences();

        try {
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("select * from voyage where idVoyage = $idV");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC); 

            $agence = NULL;
            for($i=0;$i<count($lesAgences);$i++){
                if($lesAgences[$i]->getId() == $ligne["idAgence"]){
                    $agence = $lesAgences[$i];
                    break;
                }
            }

            $lesSessions = daoSession::getSessionsIdVoy($idV);

            $obj = new voyage($ligne["idVoyage"],$ligne["destinationVoyage"],$ligne["descriptionVoyage"],$ligne["prixVoyage"],$ligne["imageVoy"],$agence,$lesSessions);

        } catch (Exception $ex) {
            echo("Erreur : ".$ex->getMessage());
            die();
        }
        return $obj;
    }

    public static function chargerVoyageIdS($idS){
        $lesAgences = daoAgences::chargerAgences();

        try {
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("select * from voyage, session where idSession = $idS and session.idVoyage = voyage.idVoyage");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC); 

            $agence = NULL;
            for($i=0;$i<count($lesAgences);$i++){
                if($lesAgences[$i]->getId() == $ligne["idAgence"]){
                    $agence = $lesAgences[$i];
                    break;
                }
            }

            $lesSessions = daoSession::getSessionsIdVoy($ligne["idVoyage"]);

            $obj = new voyage($ligne["idVoyage"],$ligne["destinationVoyage"],$ligne["descriptionVoyage"],$ligne["prixVoyage"],$ligne["imageVoy"],$agence,$lesSessions);

        } catch (Exception $ex) {
            echo("Erreur : ".$ex->getMessage());
            die();
        }
        return $obj;
    }
}

?>