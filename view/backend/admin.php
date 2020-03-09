<?php
session_start(); // On démarre la session AVANT toute chose
?>
<?php ob_start(); ?>

<?php 
  if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
}
else {
  
    ?><script language="javascript">document.location="http://liriano-formation.fr/view/frontEnd/login.php"</script>;<?php
}

?>

<div class="container">
	<div class="row">
			<div id="bloc" class="col-sm-4">	
			</div>
			<div id="blocAdmin" class="col-sm-4">
				<h2>
					<i class="fas fa-power-off"></i><a href="indexBackEnd.php?action=disconnect">      Se déconnecter</a>
				</h2>
			</div>
			<div id="bloc" class="col-sm-4">	
			</div>
	</div>
	
	<div class="row">
			<div id="bloc" class="col-sm-4">	
			</div>
			<div id="blocAdmin" class="col-sm-4">
				<h2>
					<i class="far fa-envelope"></i><a href="indexBackEnd.php?action=listMessages">      Gestion des Messages </a>
				</h2>
				
			</div>
			<div id="bloc" class="col-sm-4">
			</div>
		</section>
	</div>
	
</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>