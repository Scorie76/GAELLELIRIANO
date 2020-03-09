<?php
require('controller/controllerFrontEnd.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'Info2') {
      
			if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['textarea']) && !empty($_POST['adresseMail'] )) {
			echo '<script type="text/javascript">alert("le message a été envoyé, nous y répondrons le plus rapidement possible");</script>';	
            demandeInfo($_POST['nom'],$_POST['prenom'],$_POST['adresseMail'],$_POST['textarea']);
            
            } else {
                echo '<script type="text/javascript">alert("Veuillez remplir tous les champs demandés");</script>';
                ?>
                <script language="javascript">history.go(-1)</script>;<?php   
            }
	} elseif ($_GET['action'] == 'connection') {
        connection($_POST['login'],$_POST['pass']);
    } elseif ($_GET['action'] == 'listAvis') { // affichage des avis
        listAvis();

    } elseif ($_GET['action'] == 'lireAvis') { // Lire et répondre à un avis 
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            lireAvis();
        } else {
            echo 'Erreur : aucun identifiant davis envoyé';
        }   

    } elseif ($_GET['action'] == 'afficherCitation') { // Afficher une citation au hasard sur Bréhat et la mer
       afficherCitation();
    } elseif ($_GET['action'] == 'newAvis') {
        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['textarea']) && !empty($_POST['adresseMail'] )) {
            echo '<script type="text/javascript">alert("l\'avis a été envoyé, nous le mettrons en ligne le plus rapidement possible");</script>';    
            PostnewAvis($_POST['nom'],$_POST['prenom'],$_POST['textarea'],$_POST['adresseMail']);
            
            } else {
                echo '<script type="text/javascript">alert("Veuillez remplir tous les champs demandés");</script>';
                ?>
                <script language="javascript">history.go(-1)</script>;<?php   
            }
    }

}else {
require('view/frontend/accueil.php');
$date = date("d-m-Y");
$heure = date("H:i");	
}