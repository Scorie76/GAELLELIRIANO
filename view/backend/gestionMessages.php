<?php
session_start(); // On démarre la session AVANT toute chose
?>
<?php ob_start(); ?>
<?php 
  if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
}
else {
  
    ?><script >document.location="http://liriano-formation.fr/view/frontEnd/login.php"</script>;<?php
}

?>
<div class="container">
	<div class="row">
		 <div class=" col-sm-3">
    	</div>
		<div id="blocTitreGestionMessages" class=" col-sm-6">
			<h2>Messages </h2>
		</div>
	</div>	
	<div class="row">
		<div class=" col-sm-3">
    	</div>
		<div id="barreAdmin" class=" col-sm-6">
          <h4>
            <a href="http://liriano-formation.fr/view/indexBackEnd.php">Menu principal de l'administration</a>
          </h4>
      </div>

    </div>

    <div class="row">
    	<div class=" col-sm-3">
    	</div>
		<div id="retour" class="col-sm-6">
			<a href="indexBackEnd.php"><p>Retour</p></a>
		</div>
	</div>
	<div class="row">
		<div class=" col-sm-3">
    	</div>
		<div id="BlocTitreMessages" class="col-sm-6" >
			<div id="contenuMessage" class= " col-sm-12" >
				<?php
				    while ($donnees = $req->fetch())
				    {
				?>
				    <div class="onearticle">
				        <p >
				            <?php
				             echo htmlspecialchars($donnees['prenom'].' '.$donnees['nom']);
				            ?> 
				            le 
				            <?php
				             echo htmlspecialchars($donnees['datejour']);?>
				         </p>
				         <p>
				         	<a href="indexBackEnd.php?action=lireMessage&amp;id=<?php echo $donnees['id']; ?>">Lire </a>
				            <a href="indexBackEnd.php?action=dMessage&amp;id=<?php echo $donnees['id']; ?>">Supprimer</a>
				         </p>
				   </div>
				<?php
				    }
				    $req->closeCursor();
				?>
			</div>
		</div>
		</div>
		<div class="row">
    	<div class=" col-sm-3">
    	</div>
		<div id="retour" class="col-sm-6">
			<a href="indexBackEnd.php"><p>Retour</p></a>
		</div>
	</div>	
	
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>