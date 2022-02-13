<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["accueil"] = "accueil.php";
    $lesActions["liste"] = "listeVoyages.php";
    $lesActions["detail"] = "detailVoyage.php";
    $lesActions["reservations"] = "reservation.php";
    $lesActions["desinscription"] = "desinscription.php";
    $lesActions["presentation"] = "presentationSite.php";
    $lesActions["newsletter"] = "newsletter.php";
    $lesActions["suivi"] = "suivi.php";

    if (array_key_exists($action,$lesActions)) {
        return $lesActions[$action];
    }
    else {
        return $lesActions["defaut"];
    }
}

?>