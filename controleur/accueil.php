<?php

include "./modele/dao.voyages.php";

$listeVoyages = daoVoyages::chargerVoyages();

$prix = INF;
$indice = 0;

//On cherche la position du voyage le moins cher dans le tableau pour le faire prendre la variable $voyage

for($i=0;$i<count($listeVoyages);$i++){
    if($prix > $listeVoyages[$i]->getPrix() && $listeVoyages[$i]->nbSessionsDispo()>0){
        $prix = $listeVoyages[$i]->getPrix();
        $indice = $i;
    }
}

//On stock le voyage le moins cher.

$voyage = $listeVoyages[$indice];

include "./vue/entete.html.php";
include "./vue/vueAccueil.php";
include "./vue/pied.html.php";

?>