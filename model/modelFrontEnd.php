<?php

require_once("model/modelManager.php"); //chargement du modelManager pour connection à la BDD

class FrontManager extends modelManager //création d'un objet 
{

    public function envoiInfo ($nom, $prenom,$textarea, $adresseMail) //envoi du message
    {
        $db = $this->dbConnect();
        $infoMessage = $db->prepare('INSERT INTO contact ( nom, prenom, message, mail, dateJour) VALUES(?, ?, ?, ?, NOW())');
        $affectedLines = $infoMessage->execute(array($nom, $prenom,$textarea, $adresseMail));
        return $affectedLines;
    }


     public function loginAdmin($login, $pass) //connection après vérification du mot de passe et login
    {
	    $db = $this->dbConnect();
	    //  Récupération de l'utilisateur et de son pass hashé
        $req = $db->prepare('SELECT id, pass, prename, name  FROM admin WHERE login = :login');
        $req->execute(array(
        'login' => $login));
        $resultat = $req->fetch();
        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($pass, $resultat['pass']);

        if (!$resultat){
            echo 'Mauvais identifiant ou mot de passe !';
        } else {
            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['nom'] = $resultat['name'];
                $_SESSION['prenom'] = $resultat['prename'];
                ?>
                <script language="javascript">document.location="view/indexBackEnd.php"</script>;<?php
                exit();
            } else {
                echo 'Mauvais identifiant ou mot de passe !';
            }
        }
    }

}