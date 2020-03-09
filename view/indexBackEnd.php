<?php
require('../controller/controllerBackEnd.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listMessages') {
        listMessages();

    } elseif ($_GET['action'] == 'disconnect') { // déconnexion session
        disconnect();
    } elseif ($_GET['action'] == 'listAvis') { // affichage des avis
        listAvis();

    } elseif ($_GET['action'] == 'vBufferAvis') { // Valider un avis : passage du buffer à la base avis validés   
        vBufferAvis();
        mBufferAvis();

    } elseif ($_GET['action'] == 'dBufferAvis') { // Valider un avis : passage du buffer à la base avis validés   
       dBufferAvis();
        

    } elseif ($_GET['action'] == 'dAvis') { // Valider un avis : passage du buffer à la base avis validés   
       dAvis();
        

    } elseif ($_GET['action'] == 'dClient') { // Valider un avis : passage du buffer à la base avis validés   
       dClient();
        

    } elseif ($_GET['action'] == 'listAvisvalides') { // Valider un avis : passage du buffer à la base avis validés   
       listAvisvalides();
        

    } elseif ($_GET['action'] == 'listClients') { // accèder à la liste des clients  
       listClients();
        

    } elseif ($_GET['action'] == 'repondreAvis') { // Lire et répondre à un avis 
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            repondreAvis();
        } else {
            echo 'Erreur : aucun identifiant davis envoyé';
        }
       
        

    } elseif ($_GET['action'] == 'lireMessage') { // Lire et répondre à un message 
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            lireMessage();
        } else {
            echo 'Erreur : aucun identifiant davis envoyé';
        }

    } elseif ($_GET['action'] == 'dMessage') { // Effacer le message  
       dMessage();
        

    } elseif ($_GET['action'] == 'consulterClient') { // Lire et répondre à un avis 
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            consulterClient();
        } else {
            echo 'Erreur : aucun identifiant davis envoyé';
        }
       
    } elseif ($_GET['action'] == 'mClient') { // modifier une fiche client
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            mClient();
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }

    } elseif ($_GET['action'] == 'newClient') { // Créer un client 
         
        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['code_postal'])  && !empty($_POST['ville']) && !empty($_POST['telephone']) && !empty($_POST['mail']) && !empty($_POST['semaine']) && !empty($_POST['textarea']) ){
                echo '<script type="text/javascript">alert("La fiche client a été enregistrée ! ");</script>';
                addClient($_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['code_postal'], $_POST['ville'], $_POST['telephone'], $_POST['mail'],$_POST['semaine'], $_POST['textarea'] ); 
        } else {
            echo '<script type="text/javascript">alert("Veuillez renseigner tous les champs");</script>';
            ?>
            <script language="javascript">history.go(-1)</script>;<?php
        }

    } elseif ($_GET['action'] == 'UDClient') { // modifier un client
         
        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['code_postal'])  && !empty($_POST['ville']) && !empty($_POST['telephone']) && !empty($_POST['mail']) && !empty($_POST['semaine']) && !empty($_POST['textarea']) ){
                echo '<script type="text/javascript">alert("La fiche client a été enregistrée ! ");</script>';
                UDClient($_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['code_postal'], $_POST['ville'], $_POST['telephone'], $_POST['mail'],$_POST['semaine'], $_POST['textarea'], $_POST['id'] ); 
        } else {
            echo '<script type="text/javascript">alert("Veuillez renseigner tous les champs");</script>';
            ?>
            <script language="javascript">history.go(-1)</script>;<?php
        }

    }elseif ($_GET['action'] == 'addResponse') {  // ajout d'un commentaire par lecteur
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                echo '<script type="text/javascript">alert("la réponse a été prise en compte");</script>';
                addResponse($_GET['id'], $_POST['author'], $_POST['comment']);    
            } else {
                echo '<script type="text/javascript">alert("Veuillez remplir tous les champs demandés");</script>';
                ?>
                <script language="javascript">history.go(-1)</script>;
                <?php
            }
        } else {
            echo 'Erreur : aucun identifiant davis envoyé';
        }

    } elseif ($_GET['action'] == 'mailing') { // envoi du message de contact
            if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['textarea']) && !empty($_POST['adresseMail'] )) {
            mailing($_POST['nom'],$_POST['prenom'],$_POST['textarea'],$_POST['adresseMail']);
            sauvegardeReponse($_POST['id'],$_POST['nom'],$_POST['prenom'], $_POST['textarea'],$_POST['adresseMail']);
            } else {
                echo '<script type="text/javascript">alert("Veuillez remplir tous les champs demandés");</script>';
                ?>
                <script language="javascript">history.go(-1)</script>;<?php   
            }
    } elseif ($_GET['action'] == 'dReponse') { // supprimer une réponse à un message
        dReponse();
    }elseif ($_GET['action'] == 'dReponseAvis') { // supprimer une réponse à un avis
        dReponseAvis();

    }

} else {
require('backend/admin.php');
}