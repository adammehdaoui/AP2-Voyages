<?php

include "./modele/dao.voyages.php";

$listeVoyages = daoVoyages::chargerVoyages();

//si aucun critère n'est saisi : requête par défaut
//sinon application par défaut

if(isset($_POST["critère"]) or isset($_POST["nom"])){
    if($_POST["critère"]=="prix croissant"){
        $listeVoyages = daoVoyages::chargerVoyagesPrixCroissant();
    }
    elseif($_POST["critère"]=="prix décroissant"){
        $listeVoyages = daoVoyages::chargerVoyagesPrixDecroissant();
    }
    else{
        $listeVoyages = daoVoyages::chargerVoyagesNom($_POST["nom"]);
    }
}

//Affichage en fonction du nombres de résultats (aucun ou plusieurs)

if(count($listeVoyages)==0){
    $vue = "./vue/vueAucunResultat.php";
}
else{
    $vue = "./vue/vueListeVoyages.php";
}

include "./vue/entete.html.php";
include $vue;
include "./vue/pied.html.php";

?>