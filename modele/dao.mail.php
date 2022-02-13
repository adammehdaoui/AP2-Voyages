<?php 

//classe d'accès aux données concernant les mails

include "classDAO.php";
include "classMail.php";

class daoMail {

    public static function chargerMails(){
        $resultat = array();

        try{
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("select * from mail");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            
            while($ligne){
                $resultat[] = new mail($ligne["mailUser"]);

                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }

        } catch (Exception $ex){
            echo("Erreur : ".$ex->getMessage());
            die();
        }
        return ($resultat);
    }

    public static function addMail($unMail){

        try{
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("insert into mail(mailUser) values (:mail)");

            $req->bindValue(':mail', $unMail, PDO::PARAM_STR);

            $req->execute();

        } catch (Exception $ex){
            echo("Erreur : ".$ex->getMessage());
            die();
        }
    }

    public static function supMail($unMail){

        try{
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("delete from mail where mailUser = :mail");

            $req->bindValue(':mail', $unMail, PDO::PARAM_STR);

            $req->execute();
        } catch (Exception $ex){
            echo("Erreur : ".$ex->getMessage());
            die();
        }
    }

}