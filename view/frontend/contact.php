<?php ob_start(); ?> 

<div class="container">
	<div class="row">	
		<div   id="Contact" class="col-sm-12">
			<h1>N'hésitez  pas à me contacter </h1>
			<h3>Pour toutes démarches, informations complémentaires, prise de rendez-vous</h3>
		</div>
	</div>
	<div class="row">
		<div  class="col-sm-5" id="Contact2">
			<h3>Vous pouvez soit remplir ce formulaire</h3>
			<h3>ou </h3>
			<h3>m'écrire directement à : </h3>
			<a href="mailto:gaelle.liriano@sfr.fr"> gaelle.liriano@sfr.fr</a>
		</div>
		<div  class="col-sm-1 ">
		</div>
		<div  class="col-sm-6">
			<form id="formulaire_contact" method="post" action="../../index.php?action=Info2">
  				<div class="form-group">
				    <label for="nom">Votre Nom :</label>
				    <input id="nom" name="nom" type="text" class="form-control"  aria-describedby="emailHelp" >
				</div>
				<div class="form-group">
				    <label for="prenom">Votre Prénom :</label>
				    <input id="prenom" name="prenom" type="text" class="form-control"  aria-describedby="emailHelp" >
				</div>
				  <div class="form-group">
				    <label for="adresseMail">Votre Email :</label>
				    <input id="adresseMail" name="adresseMail" type="email" class="form-control"  aria-describedby="emailHelp" >
				    
				  </div>
				  <div class="form-group">
		            <label for="textarea">Votre message : </label>
		            <textarea id="textarea" name="textarea" type="textarea" class="form-control"></textarea>
		          </div>
				  <button type="submit" class="btn btn-primary">Envoyer  <i class="fas fa-paper-plane hvr-icon"></i></button>
			</form>
		</div>
	</div>
	<div class="row" id="carte" >
		<div  class="col-sm-3" id="titreCarte">
			<h2>Ma zone d'activité</h2>

				
			</div>
		
		<div  class="col-sm-9 hvr-grow-shadow" id="blocCarte" >
			<img src="http://guillaumemorillon.fr/GLiriano/images/carteZone.jpg" alt="Photo de Gaelle Liriano">
		</div>
	</div>








</div>

<?php $content = ob_get_clean(); ?>
<?php require('../template.php'); 