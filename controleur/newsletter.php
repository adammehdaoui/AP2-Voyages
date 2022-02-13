<?php 

include "./modele/dao.mail.php";
include "./vue/entete.html.php";
include "./vue/vueNewsletter.php";

if(isset($_POST["mail"])){

    $mail = $_POST["mail"];
    $mails = daoMail::chargerMails();
    $test = True;

    //on vérifie si le mail n'est pas déjà présent dans la BDD

    for($i=0; $i<count($mails);$i++){
        if($mails[$i]->getMail()==$mail){
            $test = False;
        }
    }

    if(strpos($mail,'@')==False){
        //on vérifie si le mail entré contient le caractère "@"

        $test = False;
    }

    if($test==False){
        include "./vue/vueAucunResultat.php";
    }
    else{
        //insertion du mail dans la BDD s'il a été trouvé dans le tableau $_GET de la page referer
        
        daoMail::addMail($_POST["mail"]);

        include "./vue/vueConfirmationNewsletter.php";
    }
}

include "./vue/pied.html.php";

?>