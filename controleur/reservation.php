<?php

include "./modele/dao.voyages.php";

$listeVoyages = daoVoyages::chargerVoyages();

include "./vue/entete.html.php";
include "./vue/vueReservations.php";

if(isset($_POST["session"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["age"]) && $_POST["age"]!=NULL){

    if($_POST["age"]<18 && $_POST["tel"]==NULL){
        include "./vue/vueAucunResultat.php";
    }
    elseif($_POST["session"]==NULL or $_POST["session"]==""){
        include "./vue/vueAucunResultat.php";
    }
    else{
        //On cherche l'id d'inscription de l'utilisateur

        $lesInscrits = daoInscrits::chargerTousLesInscrits();
        $idInscrit = count($lesInscrits)+1;

        //chargement de l'inscrit dans l'objet session correspondant et dans la BDD si les informations sont logiques

        daoInscrits::chargerInscritViaForm($_POST["nom"],$_POST["prenom"],$_POST["age"],$_POST["tel"],$_POST["session"]);

        //supression d'une place de la session correspondante dans la BDD

        daoSession::SupprimePlace($_POST["session"]);

        //confirmation de l'inscription
        
        include "./vue/vueConfirmation.php";
    }
}
else{
    include "./vue/vueAucunResultat.php";
}

include "./vue/pied.html.php";

?>