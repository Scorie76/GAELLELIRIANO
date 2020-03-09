<?php
try
{
    $bdd = new PDO('mysql:host=db5000258089.hosting-data.io;dbname=dbs251830', 'dbu330271', 'Golf7sw122/');
   
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// Hachage du mot de passe
$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

// Insertion
$req = $bdd->prepare('INSERT INTO admin(name, prename, login, pass, mail) VALUES(:name, :prename, :login, :pass, :mail)');
$req->execute(array(
    'name' => $_POST['nom'],
    'prename' => $_POST['prenom'],
    'login' => $_POST['pseudo'],
    'pass' => $pass_hache,
    'mail' => $_POST['email']));



// Redirection du visiteur vers la page de l'inscription
header('Location: inscription.php');
?>