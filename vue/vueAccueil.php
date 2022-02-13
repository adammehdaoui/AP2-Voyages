<html>

<?php

//récupération du nom de l'agence initialisé dans le controleur

$nomAgence = $voyage->getAgence()->getNom();

?>

<br>

<center>
    <p class="paragrapheType"> 
        Oslo Voyages vous sélectionne le voyage le plus intéressant en terme de prix.
    </p>

    <br>
        <a href=<?php echo "./?action=detail&idV=".$voyage->getIdVoyage()?> class="linkVoyage">
        <table class="tableVoyage">
            <td>
                <img src="images/<?=$voyage->getImage()?>" class="imageVoyage"/>
            </td>
            <td class="tdVoyage">
                <p class="linkTitre"> <?=$voyage->getDestinationVoyage()?> <p>
                <p class="linkVoyage"> Il y a  <?=$voyage->nbSessionsDispo()?> sessions disponibles pour cette destination. </p> 
                <p class="linkVoyage"> Prix du séjour : <?=$voyage->getPrix()?> euros. </p>
                <p class="linkVoyage"> Ce voyage vous est proposé par <?=$nomAgence?>. </p>
            </td>
        </table>
        </a>
</center>

<br>
<br>
<br>
<br>
<br>
<br>
<br>

</html>