<html>

<br>

<center>

    <!-- affichage de toutes les données concernant l'inscrit -->

    <p class="paragrapheType"> Voici les informations concernant votre inscription : 
        <br>
        Vous êtes inscrit pour le voyage à <?=$voyage->getDestinationVoyage()?> du <?=$session->getDateDebut()?> au <?=$session->getDateFin()?> 
        au nom de <?=$inscrit->getNom()?> <?=$inscrit->getPrenom()?>.
        <br>
    </p>

    <!-- fin de l'affichage -->

    <br>

    <p class="paragrapheType">
        Cliquez sur le lien suivant pour vous désinscrire :
        <br>
        <a href=<?="./?action=desinscription&idI=".$inscrit->getId()?>>
                <input type="submit" value="Se désinscrire"/>
        </a>
    </p>

<center>

</html>