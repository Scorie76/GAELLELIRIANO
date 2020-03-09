<?php

// Chargement des classes
require_once('model/modelFrontEnd.php');

function demandeInfo($nom, $prenom,$textarea, $adresseMail)
{
    $frontManager = new FrontManager(); // Création d'un objet
    $affectedLines = $frontManager->envoiInfo($nom, $prenom,$textarea, $adresseMail);
    if ($affectedLines === false) {
        die('Impossible d\'envoyer le message !');
    } else {
        ?>
        <script language="javascript">document.location="index.php"</script>;<?php
    }
}

function connection($login, $pass)
{
    $frontManager = new FrontManager(); // Création d'un objet
    $affectedLines = $frontManager->loginAdmin($login, $pass);
}