<html>

<br>
<br>

<center>
<table class="tableVoyage" cellpadding=15>
        <td>
                <img src="images/<?=$voyage->getImage()?>" class="imageDetail"/>
        </td>
        <td>
                <p class="paragrapheDetail">
                <?php
                        echo $voyage->getDescription();
                ?> 
                </p>     

                <a href="./?action=reservations" class="linkInscription"> 
                <p class="linkColor">S'inscrire</p>
                </a>
        </td>
</table>
</center>

<br>
<br>
<br>
<br>

</html>