<?php 

include "./modele/dao.voyages.php";

//récupération de l'id du voyage cliqué dans la page "referer" par méthode get

$idV = $_GET["idV"];

//récupération du voyage en fonction de l'id récupéré précédemment

$voyage = daoVoyages::chargerVoyagesIdV($idV);
$lesSessions = $voyage->sessionsDispo();

include "./vue/entete.html.php";
include "./vue/vueDetailVoyage.php";
include "./vue/pied.html.php";

?>