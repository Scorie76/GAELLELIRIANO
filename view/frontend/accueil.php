<?php ob_start(); ?> 
<div class="container">
	<div class="row" div="encartVideo">
		<!--<div id="left" class="col-sm-1" data-aos="fade-up" data-aos-duration="2500">
		</div>
		<div id="left" class="col-sm-1" data-aos="fade-up" data-aos-duration="2500">
			<img src="images/fleche_01.png" alt="Logo">	
		</div>
		<div id="left" class="col-sm-1" data-aos="fade-right" data-aos-duration="2000">	
			<img src="images/fleche_02.png" alt="Logo">
		</div>
		<div id="left" class="col-sm-1" data-aos="fade-down" data-aos-duration="1500">	
			<img src="images/fleche_03.png" alt="Logo">
		</div>
		<div id="left" class="col-sm-1">	
		</div>-->
		<!--<div  id="top" class="col-sm-12"   ><video autoplay  type="video/quicktime"  src="http://guillaumemorillon.fr/GLiriano/images/bandeau3.mp4" autoplay></video>
		</div>-->
		
	</div>
	<div class="row">	
		<div  id="one" class="col-sm-5 hvr-wobble-horizontal">
				<div  class="oneL" class="col-sm-12" data-aos="fade-right" data-aos-duration="1500">
					<img src="images/cercleXL.png"></div>
				<div  class="oneL" class="col-sm-12" data-aos="fade-left" data-aos-duration="1000">
					<img src="images/cercleL.png">
				</div>
				<div  class="oneL" class="col-sm-12" data-aos="fade-up" data-aos-duration="500" >
					<img src="images/cercle.png">
				</div>
				<div  class="oneL" class="col-sm-12" data-aos="fade-down" data-aos-duration="2020"  >
					<img src="images/cercleS.png">
				</div>
				<div  class="oneL" class="col-sm-12 hvr-wobble-horizontal " data-aos="fade-right" data-aos-duration="1500">
					<img src="images/cercleF.png">
				</div>
		</div>
		<div id="two" class="col-sm-7" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
		 <h2>Accompagnement des dirigeants de TPE, PME et professions libérales</h2> 
 		</div>
	</div>

	<div class="row">

		<div id="two" class="col-sm-7" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000"> 
		 <h2>Management efficace pour développer les compétences de vos collaborateurs</h2>
 		</div>	
		<div  id="one" class="col-sm-5 hvr-wobble-horizontal">
				<div  class="oneL" class="col-sm-12" data-aos="fade-right" data-aos-duration="1500">
					<img src="images/Rotation/cercleXLR.png"></div>
				<div  class="oneL" class="col-sm-12" data-aos="fade-left" data-aos-duration="1000">
					<img src="images/Rotation/cercleLR.png">
				</div>
				<div  class="oneL" class="col-sm-12" data-aos="fade-up" data-aos-duration="500" >
					<img src="images/Rotation/cercleR.png">
				</div>
				<div  class="oneL" class="col-sm-12" data-aos="fade-down" data-aos-duration="2020"  >
					<img src="images/Rotation/cercleSR.png">
				</div>
				<div  class="oneL" class="col-sm-12 hvr-wobble-horizontal " data-aos="fade-right" data-aos-duration="1500">
					<img src="images/Rotation/cercleFR.png">
				</div>
		</div>
		
	</div>




	<div class="row">

		<div class="col-sm-2"></div>
		<div  id="onePhrase" class="col-sm-8 hvr-grow-shadow"><h2>"Ma motivation réside dans le développement des personnes et des projets pour lesquels je m'investis"</h2></div>
	</div>

	
	<div class="row">
		<div  class="col-md-1">
		</div>
		<div  class="col-md-3 temoignage hvr-grow-shadow">
			<div class="row">
				<div class="col-md-12 imageTemoignage">
					<img src="images/chaidrv.jpeg">
				</div>
				<div class="col-md-12 texteTemoignage ">
				<h4>LE CHAI D’RV</h4>
				<h5>HERVÉ JEHANNIN, GÉRANT</h5>
				<p>L’accompagnement réalisé par Gaëlle Liriano m’a permis d’aborder sereinement un virage capital de mon entreprise.</p>
				 <p>J’ai embauché de nouveaux collaborateurs en disposant d’une vision et de stratégies claires pour atteindre mes objectifs.</p>
				</div>
			</div>
		</div>
		<div  class="col-md-4" id="titreTemoignages">
			<span class="spanH2" ><h2>Témoignages</h2></span>
		</div>
		<div  class="col-md-3 temoignage hvr-grow-shadow">
			<div class="row">
				<div class="col-md-12 imageTemoignage ">
					<img src="images/caveaflo.jpeg">
				</div>
			<div class="col-md-12 texteTemoignage">
			<h4>CAVE À FLO</h4>
			<h5>FLORENT SENARD, GÉRANT</h5>
			<p>La formation que nous avons effectuée avec Gaelle est de loin la meilleure formation que nous ayons faite.</p>
            <p>Des ateliers pratiques adaptés à notre environnement professionnel, des réponses claires et précises à nos questionnements, des solutions pratiques répondant à nos interrogations ont fait de cette formation une avancée majeure dans notre évolution en management.
			Nous la recommandons vivement!</p>
		</div>
		</div>
		</div>
	</div>
	



</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); 