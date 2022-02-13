<?php

//classe d'accès aux données concernant les sessions

class daoSession{

    public static function getSessionsIdVoy($unIdVoy){
        $resultat = array();
        $i=0;

        try{
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("select * from session where idVoyage = $unIdVoy");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while($ligne){
                $resultat[$i] = new session($ligne["idSession"],$ligne["placesSession"],$ligne["DateDebut"],$ligne["DateFin"]);

                $lesInscrits = daoInscrits::chargerInscritsIdS($ligne["idSession"]);

                for($e=0;$e<count($lesInscrits);$e++){
                    $resultat[$i]->addInscrit($lesInscrits[$e]);
                }

                $i = $i+1;
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception $ex){
            echo("Erreur : ".$ex->getMessage());
            die();
        }
        return $resultat; 
    }

    public static function SupprimePlace($idS){

        try{
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("update session set placesSession = placesSession-1 where idSession = $idS");
            $req->execute();

        } catch (Exception $ex){
            echo("Erreur : ".$ex->getMessage());
            die();
        }
    }

    public static function AjoutePlace($idS){

        try{
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("update session set placesSession = placesSession+1 where idSession = $idS");
            $req->execute();

        } catch (Exception $ex){
            echo("Erreur : ".$ex->getMessage());
            die();
        }
    }

    public static function chargerSessionIdI($unIdInscrit){
        $session = NULL;

        try{
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("select * from session, inscrit where inscrit.idInscrit = $unIdInscrit and inscrit.idSession = session.idSession");
            $req->execute();
            
            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            $session = new session($ligne["idSession"],$ligne["placesSession"],$ligne["DateDebut"],$ligne["DateFin"]);

        } catch (Exception $ex){
            echo("Erreur : ".$ex->getMessage());
            die();
        }
        return $session;
    }
}


?>