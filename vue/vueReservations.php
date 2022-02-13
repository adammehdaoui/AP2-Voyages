<html>

<br>

<center>
    <form action="" method="post" class="tableForm">
        <div class="divFond">

            <select name = "session">
                <option value=""> Choisissez une session </option>

                <!-- On vient chercher toutes les sessions disponibles pour les afficher et les choisir dans
                le menu déroulant du formulaire -->

                <?php

                for($i=0;$i<count($listeVoyages);$i++){
                    if($listeVoyages[$i]->nbSessionsDispo()>0){

                        $lesSessions = $listeVoyages[$i]->sessionsDispo();

                        for($e=0;$e<count($lesSessions);$e++){ ?>
                            
                            <option value=<?=$lesSessions[$e]->getIdS()?>> <?=$listeVoyages[$i]->getDestinationVoyage()?> du <?=$lesSessions[$e]->getDateDebut()?> au <?=$lesSessions[$e]->getDateFin()?> </option>
                        
                        <?php
                        }
                    }
                }

                ?>
            </select>

            <br>
            <br>

            <p><input type="text" name="nom" placeholder="Votre Nom"/></p>
            <p><input type="text" name="prenom" placeholder="Votre prénom"/></p>
            <p><input type="number" name="age" placeholder="Votre âge"/></p>
            <p>*<input type="text" name="tel" placeholder="Le téléphone du responsable"/>*</p>
            <p><input type="submit" value="Valider vos informations"></p>
            <p> *ne pas indiquer de télephone portable si vous êtes majeur </p>

        </div>
    </form>
</center>

<br>

</html>