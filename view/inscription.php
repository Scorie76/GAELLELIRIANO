<?php ob_start(); ?> 

<body>

  <div id="bloc_page">


 <div class="container-fluid">  
  <div class="row">
<div class="col-lg-12" id="titreArticle">
  <h2>Formulaire d'inscription
  </h2>
</div>
<section id="formulaire" class="col-lg-12">
<form class="col-lg-7  col-xs-12" action="inscription_post.php" method="post">
  
    <div class="form-group">
      <label for="nom">Nom : </label>
      <input id="nom" name="nom" type="text" class="form-control">
    </div>
    <div class="form-group">
      <label for="prenom">Prénom : </label>
      <input id="prenom" name="prenom" type="text" class="form-control">
    </div>
    <div class="form-group">
      <label for="pseudo">Votre Pseudo : </label>
      <input id="pseudo" name="pseudo" type="text" class="form-control">
    </div>
    <div class="form-group">
      <label for="mdp">mot de passe : </label>
      <input id="mdp" name="mdp" type="text" class="form-control">
    </div>
    <div class="form-group">
      <label for="email">Adresse email : </label>
      <input id="email" name="email"  type="text" class="form-control">
    </div>
    <input class="submit" type="submit" value="Valider" />
</form>

      
    </section>

</div>
</div>


</div>
  <!-- liens pour les fichiers javascript-->
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); 


