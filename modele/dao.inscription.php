<?php

//classe d'accès aux données concernant les inscrits

class daoInscrits {
    
    public static function chargerTousLesInscrits() {
        $resultat = array();
        try {
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("select * from inscrit");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while($ligne){
                if ($ligne["telResponsable"] == NULL) {
                    $resultat[] = new inscrit($ligne["idInscrit"],$ligne["nomInscrit"],$ligne["prenomInscrit"],$ligne["ageInscrit"]);
                }
                else {
                    $resultat[] = new mineurInscrit($ligne["idInscrit"],$ligne["nomInscrit"],$ligne["prenomInscrit"],$ligne["ageInscrit"],$ligne["telResponsable"]);
                }
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception $ex) {
            echo("Erreur : ".$ex->getMessage());
            die();
        }     
        return $resultat; 
    }

    public static function chargerIdMaxInscrit(){
        $idInscrit = 0;
        
        try {
            $cnx = DAO::connexionPDO();

            //On vient chercher l'id inscrit le plus grand pour affecter le suivant au prochain inscrit

            $req = $cnx->prepare("select max(idInscrit) as idI from inscrit");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            $idInscrit = $ligne["idI"];

        }catch (Exception $ex) {
            echo("Erreur : ".$ex->getMessage());
            die();
        }
        return $idInscrit;
    }
 
    public static function chargerInscritViaForm($unNom,$unPrenom,$unAge,$unTelephone,$unIdSession){
        $idMax = daoInscrits::chargerIdMaxInscrit();
        $idInscrit = $idMax+1;

        try {
            $cnx = DAO::connexionPDO();

            //instancie la classe père (mineur) si l'âge > 18, sinon instancie la classe fils (mineurInscrit)
            
            if($unAge < 18) {
                $req = $cnx->prepare("insert into inscrit(idInscrit,nomInscrit,prenomInscrit,ageInscrit,telResponsable,idSession) values (:IdI,:Nom,:Prenom,:Age,:Tel,:IdS)");
                $req->bindValue(':IdI', $idInscrit, PDO::PARAM_INT);
                $req->bindValue(':Nom', $unNom, PDO::PARAM_STR);
                $req->bindValue(':Prenom', $unPrenom, PDO::PARAM_STR);
                $req->bindValue(':Age', $unAge, PDO::PARAM_INT);
                $req->bindValue(':Tel', $unTelephone, PDO::PARAM_STR);
                $req->bindValue(':IdS', $unIdSession, PDO::PARAM_INT);
            }
            else {
                $unTelephone = NULL;
                $req = $cnx->prepare("insert into inscrit(idInscrit,nomInscrit,prenomInscrit,ageInscrit,telResponsable,idSession) values (:IdI,:Nom,:Prenom,:Age,:Tel,:IdS)");
                $req->bindValue(':IdI', $idInscrit, PDO::PARAM_INT);
                $req->bindValue(':Nom', $unNom, PDO::PARAM_STR);
                $req->bindValue(':Prenom', $unPrenom, PDO::PARAM_STR);
                $req->bindValue(':Age', $unAge, PDO::PARAM_INT);
                $req->bindValue(':Tel', $unTelephone, PDO::PARAM_STR);
                $req->bindValue(':IdS', $unIdSession, PDO::PARAM_INT);
            }

            $req->execute();
        } catch (Exception $ex) {
            echo("Erreur : ".$ex->getMessage());
            die();
        }
    }

    public static function chargerInscritsIdS($unIdSession){
        $resultat = array();

        try {
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("select * from inscrit where idSession = $unIdSession");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while($ligne){
                if ($ligne["telResponsable"] == NULL) {
                    $resultat[] = new inscrit($ligne["idInscrit"],$ligne["nomInscrit"],$ligne["prenomInscrit"],$ligne["ageInscrit"]);
                }
                else {
                    $resultat[] = new mineurInscrit($ligne["idInscrit"],$ligne["nomInscrit"],$ligne["prenomInscrit"],$ligne["ageInscrit"],$ligne["telResponsable"]);
                }
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception $ex) {
            echo("Erreur : ".$ex->getMessage());
            die();
        }     
        return $resultat; 
    }

    public static function supprimerUnInscritIdI($unIdInscrit){

        try {
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("delete from inscrit where idInscrit = $unIdInscrit");
            $req->execute();

        } catch (Exception $ex) {
            echo("Erreur : ".$ex->getMessage());
            die();
        }
    }

    //charger un inscrit à partir de son ID

    public static function chargerInscritIdI($unIdInscrit){

        try {
            $cnx = DAO::connexionPDO();
            $req = $cnx->prepare("select * from inscrit where idInscrit = $unIdInscrit");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            if($ligne["ageInscrit"]<18){
                $inscrit = new mineurInscrit($ligne["idInscrit"],$ligne["nomInscrit"],$ligne["prenomInscrit"],$ligne["ageInscrit"],$ligne["telResponsable"]);
            }
            else{
                $inscrit = new inscrit($ligne["idInscrit"],$ligne["nomInscrit"],$ligne["prenomInscrit"],$ligne["ageInscrit"]);
            }


        } catch (Exception $ex) {
            echo("Erreur : ".$ex->getMessage());
            die();
        }
        return $inscrit;
    }



}

?>