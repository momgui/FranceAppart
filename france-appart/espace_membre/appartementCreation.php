<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>marseillement votre</title>
		<link rel="stylesheet" href="..\accueilStyle.css">		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"/>
	</head>
	<body>
<!--barre de navigation-->
			<nav>
				<div class="home">
					<a href="..\index.php"><i class="fas fa-long-arrow-alt-left"></i></a>
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

		<div class="container center">
			<form>
				<h3>Nom de l'appartement:</h3>
				<input>

				<h3>Nombre de personnes maximum:</h3>
				<input>

				<h3>Images formats paysage:</h3>
				<input>

				<h3>Adresse:</h3>
				<input>

				<h3>Taille et liste des pieces:</h3>
				<input>

				<h3>Types de lits disponnible:</h3>
				<input>

				<h3>Equipements:</h3>
				<input>
			</form>
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
</html> 
