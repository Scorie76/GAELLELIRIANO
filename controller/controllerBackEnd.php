<?php
// Chargement des classes
require_once('../model/modelBackEnd.php');


function listMessages()
{
    $backManager = new BackManager(); // Création d'un objet
    $req = $backManager -> getListMessages(); // Appel d'une fonction de cet objet
    require('backend/gestionMessages.php');
}

function listAvis()
{
    $backManager = new BackManager(); // Création d'un objet
    $req = $backManager -> getListAvis(); // Appel d'une fonction de cet objet
    require('backend/gestionAvisAValider.php');
}

function vBufferAvis()
{
    $backManager = new BackManager();
    $post = $backManager ->validateBufferAvis($_GET['id']);
            $backManager ->deleteBufferAvis($_GET['id']);
    //header('Location: indexFrontEnd.php?action=avComment' );
    ?>
    <script language="javascript">document.location="indexBackEnd.php?action=listAvis"</script>;<?php   
}

function dBufferAvis()
{
    $backManager = new BackManager();
    $post = $backManager ->deleteBufferAvis($_GET['id']);
     ?>
    <script language="javascript">document.location="indexBackEnd.php?action=listAvis"</script>;<?php       
    //header('Location: indexFrontEnd.php?action=avComment' );
      
}

function dAvis()
{
    $backManager = new BackManager();
    $post = $backManager ->deleteAvis($_GET['id']);
     ?>
    <script language="javascript">document.location="indexBackEnd.php?action=listAvisvalides"</script>;<?php       
    //header('Location: indexFrontEnd.php?action=avComment' );
      
}

function dClient() // effacer fiche client
{
    $backManager = new BackManager();
    $post = $backManager ->deleteClient($_GET['id']);
     ?>
    <script language="javascript">document.location="indexBackEnd.php?action=listClients"</script>;<?php       
    //header('Location: indexFrontEnd.php?action=avComment' );
      
}


function addClient($Nom, $Prenom, $Adresse, $Code_postal, $Ville, $Telephone, $Mail, $Semaine, $Textarea)
{
    $backManager = new BackManager(); // Création d'un objet
    $affectedLines = $backManager ->postClient($Nom, $Prenom, $Adresse, $Code_postal, $Ville, $Telephone, $Mail, $Semaine, $Textarea);
    if ($affectedLines === false) {
        die('Impossible d\'ajouter la Fiche client !');
    } else {
        //header('Location: indexFrontEnd.php');
        ?>
        <script language="javascript">document.location="indexBackEnd.php"</script>;<?php
    }
}

function UDClient($Nom, $Prenom, $Adresse, $Code_postal, $Ville, $Telephone, $Mail, $Semaine, $Textarea ,$id)
{
    $backManager = new BackManager(); // Création d'un objet
    $affectedLines = $backManager ->updateClient($Nom, $Prenom, $Adresse, $Code_postal, $Ville, $Telephone, $Mail, $Semaine, $Textarea, $id);
    if ($affectedLines === false) {
        die('Impossible d\'ajouter la Fiche client !');
    } else {
        //header('Location: indexFrontEnd.php');
        ?>
        <script language="javascript">document.location="indexBackEnd.php"</script>;<?php
    }
}

function mBufferAvis()
{
    $backManager = new BackManager();
    $backManager ->MessageValidateBufferAvis();
}


function listAvisvalides()
{
    $backManager = new BackManager(); // Création d'un objet
    $req = $backManager -> getListAvisEnLigne(); // Appel d'une fonction de cet objet
    require('backend/gestionAvisDejaEnLigne.php');
}

function listClients()
{
    $backManager = new BackManager(); // Création d'un objet
    $req = $backManager -> getListClients(); // Appel d'une fonction de cet objet
    require('backend/fichier_client.php');
}


function lireMessage()
{
    $backManager = new BackManager(); // Création d'un objet
    $post = $backManager->getMessage($_GET['id']);
    $comments =  $backManager->getComments($_GET['id']);
    require('backend/gestionMessages_lecture.php');
}

function dMessage()
{
    $backManager = new BackManager();
    $post = $backManager ->deleteMessage($_GET['id']);
     ?>
    <script language="javascript">document.location="indexBackEnd.php?action=listMessages"</script>;<?php       
    //header('Location: indexFrontEnd.php?action=avComment' );
      
}

function dReponse()
{
    $backManager = new BackManager();
    $post = $backManager ->deleteReponse($_GET['id']);
    //header('Location: indexFrontEnd.php' );
    ?>
    <script language="javascript">document.location="indexBackEnd.php"</script>;<?php
}

function dReponseAvis()
{
    $backManager = new BackManager();
    $post = $backManager ->deleteReponseAvis($_GET['id']);
    //header('Location: indexFrontEnd.php' );
    ?>
    <script language="javascript">document.location="indexBackEnd.php?action=listAvisvalides"</script>;<?php
}



function mailing($nom, $prenom,$textarea, $adresseMail)
{
    $backManager = new BackManager(); // Création d'un objet
    $affectedLines = $backManager->envoiMailing($nom, $prenom,$textarea, $adresseMail);
    if ($affectedLines === false) {
        die('Impossible d\'envoyer le message !');
    } else {
        ?>
        <script language="javascript">document.location="indexBackEnd.php?action=listMessages"</script>;<?php
    }
}


function sauvegardeReponse($id,$nom, $prenom,$textarea, $adresseMail)
{
    $backManager = new BackManager(); // Création d'un objet
    $affectedLines = $backManager->envoinewReponse($id,$nom, $prenom,$textarea, $adresseMail);
    if ($affectedLines === false) {
        die('Impossible d\'envoyer la réponse !');
    } else {
        ?>
        <script language="javascript">document.location="indexBackEnd.php"</script>;<?php
    }
}




function repondreAvis()
{
    $backManager = new BackManager(); // Création d'un objet
    $post = $backManager->getAvis($_GET['id']);
    $comments = $backManager->getreponses($_GET['id']);
    require('backend/gestionAvisRepondre.php');
}

function consulterClient()
{
    $backManager = new BackManager(); // Création d'un objet
    $post = $backManager->getClient($_GET['id']);
    require('backend/fiche_client.php');
}

function mClient() // modifier la fiche client en l'affichant
{
    $backManager = new BackManager(); // Création d'un objet
    $post = $backManager ->getClient($_GET['id']);
    require('backend/fiche_client_modif.php');
}

function addResponse($avisId, $author, $comment)
{
    $backManager = new backManager(); // Création d'un objet
    $affectedLines = $backManager->postResponse($avisId, $author, $comment);
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    } else {
        //header('Location: index.php?action=post&billet=' . $postId);
        ?>
        <script language="javascript">document.location="indexBackEnd.php?action=listAvisvalides"</script>;<?php
    }   
}










function disconnect()
{
    $backManager = new BackManager();
    $backManager ->disconnectSession(); 
}