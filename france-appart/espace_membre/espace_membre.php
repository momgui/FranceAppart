<?php
session_start();
 
$bdd = new PDO('mysql:host=francekmembre.mysql.db;dbname=francekmembre', 'francekmembre', '180105Membre');
 


if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>France-Appart.fr</title>
		<link rel="stylesheet" href="..\accueilStyle.css">		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"/>
	</head>
	<body>
<!--barre de navigation-->
			<nav>
				<div class="home">
					<a href="..\index.html"><i class="fas fa-long-arrow-alt-left"></i></a>
					<p class="titre">France-Appart</p>
				</div>
				<div class="search_div">						
					<div class="form1" style="position: absolute; margin-top: 20px; width: 10%;">
							<button class="rechercheBtn" onclick="window.location = 'https://france-appart.fr/Appartements/recherche.php';">Où voulez vous aller?</button>
					</div>
				</div>
				<div class="onglets">
					<a class="link" style="display: none;">Connexion / Inscription</a>
					<a class="link">Proposer mon hébergement</a>
					<div class="language">
  						<button onclick="myFunctionlanguagefr()" class="languagebtn" style="margin-top: 8%;"><i class="fas fa-flag-usa" style="margin: 20%;"></i><p style="margin: -1%;" class="anglais">Anglais</p></button>
					</div>
					<div class="dropdown">
  						<button onclick="myFunction()" class="dropbtn"><i class="fas fa-align-justify"></i></button>
					</div>
				</div>
				<div id="myDropdown" class="dropdown-content">
    				<a href="https://france-appart.fr/espace_membre/Inscription.php">Connexion / Inscription</a>
  				</div>
			</nav>
			<div style="width: 80%; margin-left: auto;">
					<div class="form2" style="height: 20px; position: absolute; margin-top: 20px; width: 10%;">
							<button class="rechercheBtn2" onclick="window.location = 'https://france-appart.fr/Appartements/recherche.php';">Où voulez vous aller?</button>
					</div>
			</div>


			<div class="containerAll">
				<div class="partieGauche">
					<div class="miniContainer">
						<button onclick="window.location.href='deconnexion.php'" class="partieGaucheContent">Déconnexion</button>
					</div>
					<div class="miniContainer">
						<button onclick="goVersPrix()" class="partieGaucheContent">Configurer mes prix</button>
					</div>
				</div>
				<div class="partieDroite">
						<div id="bienvenue" class="center">
				        	<h2>Bienvenue <?php echo $userinfo['prenom']; ?></h2>
				     	</div>
				     	<div id="prixContainer" class="center">
				        	<h2>Gestion des prix</h2>
				        	<br>
				        	<br>
				        	<br>
				        	<div class="col">
				        		<h3>Configurer mes prix manuellement:</h3>
				        		<input type="text" name="newprix" placeholder="Prix" value="" />
				        		<h3>Configurer mes prix grâce à un logiciel/channel manager:</h3>
				        	</div>
				     	</div>
				</div>
			</div>


		<footer>
			</div>
	            <div class="container footer-content">
	               <ul class="footerList">
	               	<div>
	               		<li> © France-Appart</li>
	               	</div>
	               	<div>
	               		<li><i class="fas fa-envelope-square"></i> contact@france-appart.fr</li>
	                  	<li><a href="">Terms, Conditions and Privacy Policy</a></li>
	               	</div>
	               </ul>      
	            </div>
		</footer>	
	</body>
	<script src="script.js"></script>
</html> 

<?php   
}
?>


