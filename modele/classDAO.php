<?php 

class DAO{

    //méthode statique dédiée à la connexion à la NDD

    public static function connexionPDO(){
    $login = "root";
    $mdp = "root";
    $bd = "agences";
    $serveur = "localhost";

    try {
        $cnx = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $cnx;
    } catch (PDOException $ex) {
        print "Erreur de connexion PDO ";
        die();
        }  
    }

}

?>