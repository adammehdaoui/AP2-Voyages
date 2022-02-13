<!DOCTYPE html>
<html>

<?php 

//Organisation de quel lien sera actif (blanc) ou non (noir)

$link = array();

if(isset($_GET["action"])){
    $action==$_GET["action"];

    if($action=="reservations"){
        $link[0] = "linkActive";
        $link[1] = "link";
        $link[2] = "link";
    }
    elseif($action=="liste"){
        $link[0] = "link";
        $link[1] = "linkActive";
        $link[2] = "link";
    }
    elseif($action=="presentation"){
        $link[0] = "link";
        $link[1] = "link";
        $link[2] = "linkActive";
    }
    else{
        $link[0] = "link";
        $link[1] = "link";
        $link[2] = "link";
    }
}

else{
    $link[0] = "link";
    $link[1] = "link";
    $link[2] = "link";
}
?>

<head>
    <meta charset=UTF-8>
    <title> Oslo Voyages </title>

    <!-- importation css principal -->

    <link rel="stylesheet" type="text/css" href="./css/main.css">

    <!-- importation bootstrap css -->

    <link href='./css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css%27%3E'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css%22%3E">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
</head>

<body>

<!-- déclaration de la barre de navigation -->

<nav class="nbavar navbar-expand-lg header">
    <table width="100%">
        <td>
            <a href="./?action=accueil" class="container-fluid"><img src="./images/logo.jpg" class="imageLogo"></a>
        <td width="70%">

        <table id="menu" cellpadding=15 cellspacing=15 style="padding-left: 0px">
            <tr>
            <td>  
                <a href="./?action=reservations">
                <p class=<?=$link[0]?>>
                Réservations
                <p>
                </a>
            </td>
            <td>
                <a href="./?action=liste">
                <p class=<?=$link[1]?>>
                Les Destinations
                </p>
                </a>
            </td>
            <td>
                <a href="./?action=presentation">
                <p class=<?=$link[2]?>>
                Nous découvrir
                </p>    
                </a>
            </td>
            </tr>
        </table>

        </td>
    </table>
</nav>

</html>