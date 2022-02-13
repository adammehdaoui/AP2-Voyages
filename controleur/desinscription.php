<?php

include "./modele/dao.voyages.php";
include "./vue/entete.html.php";

if(isset($_GET["idI"])){

    $lesInscrits = daoInscrits::chargerTousLesInscrits();

    $test = False;
    $idI = $_GET["idI"];

    //On cherche si l'id de l'inscrit existe bien dans la BDD
    //pour ne pas retourner une erreur SQL

    for($i=0;$i<count($lesInscrits);$i++){
        if($lesInscrits[$i]->getId()==$idI){
            $test = True;
        }
    }

    if($test==True){
        //On charge la session où est inscrit l'utilisateur

        $session = daoSession::chargerSessionIdI($idI);

        $idS = $session->getIdS();

        //On ajoute une place à la session car l'utilisateur vient de se désinscrire

        daoSession::AjoutePlace($idS);

        //Et enfin on supprime l'inscrit de la BDD

        daoInscrits::supprimerUnInscritIdI($idI);

        include "./vue/vueDesinscription.php";
    }
    else{
        //On retourne l'erreur

        include "./vue/vueAucunResultat.php";
    }
}

include "./vue/pied.html.php";

?>