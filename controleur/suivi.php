<?php 

include "./modele/dao.voyages.php";
include "./vue/entete.html.php";
include "./vue/vueSuivi.php";

if(isset($_POST["idI"])){

    $lesInscrits = daoInscrits::chargerTousLesInscrits();

    $test = False;
    $idI = $_POST["idI"];

    //On cherche si l'id de l'inscrit existe bien dans la BDD
    //pour ne pas retourner une erreur SQL

    for($i=0;$i<count($lesInscrits);$i++){
        if($lesInscrits[$i]->getId()==$idI){
            $test = True;
        }
    }

    if($test==True){
        //On charge toutes les informations concernant l'inscrit

        $inscrit = daoInscrits::chargerInscritIdI($idI);

        $session = daoSession::chargerSessionIdI($idI);

        $idS = $session->getIdS();

        $voyage = daoVoyages::chargerVoyageIdS($idS);

        include "./vue/vueConsultationInscription.php"; 
    }
    else{
        //On retourne l'erreur si l'entier entré ne correspond à aucun
        //id d'inscrit dans la BDD

        include "./vue/vueAucunResultat.php";
    }
}

include "./vue/pied.html.php";

?>