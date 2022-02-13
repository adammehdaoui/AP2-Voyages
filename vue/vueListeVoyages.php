<html>

<!-- déclaration de la barre de navigation de recherche -->

<nav class="navbar navbar-expand-lg headerNav">
    <form action="" method="post">
    <table cellspacing=15 cellpadding=15>
        <td>
            <select name="critère" id="criterechoix">
                <option value=""> Choisissez un critère de recherche </option>
                <option value="prix croissant"> prix croissant </option>
                <option value="prix décroissant"> prix décroissant </option> 
            </select>
        </td>
        <td>
            <p class="posNav">Cherchez une destination : <input type="text" name="nom"/></p>
        </td>
        <td>
            <input type="submit" value="confirmez les critères"/>
        </td>
    </table>
    </form>
</nav>

<br>

<center>
<div class="divVoyage">
        <?php

        for($i=0;$i<count($listeVoyages);$i++){
            if($listeVoyages[$i]->nbSessionsDispo() > 0){
                $nomAgence = $listeVoyages[$i]->getAgence()->getNom();
            
        ?>

            <a href=<?="./?action=detail&idV=".$listeVoyages[$i]->getIdVoyage()?>>
                <table class="tableVoyage">
                    <td>
                        <img src="images/<?= $listeVoyages[$i]->getImage() ?>" class="imageVoyage"/>
                    </td>
                    <td>
                        <p class="linkTitre"> <?=$listeVoyages[$i]->getDestinationVoyage()?> <p>
                        <p class="linkVoyage"> Il y a <?=$listeVoyages[$i]->nbSessionsDispo()?> sessions disponibles pour cette destination. </p>
                        <p class="linkVoyage"> Prix : <?=$listeVoyages[$i]->getPrix()?> euros. </p>
                        <p class="linkVoyage"> Ce voyage vous est proposé par <?=$nomAgence?>. </p>
                    </td>
                </table>
            </a>

            <br>

            <?php

            }
        } ?>

</div>
</center>

<br>

</html>