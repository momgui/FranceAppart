function Inscription() {
	document.getElementById("ConnexionBtn").style.display = "initial";
	document.getElementById("InscriptionBtn").style.display = "none";
	document.getElementById("Connexion").style.display = "block";
	document.getElementById("Inscription").style.display = "none";
}

function Connexion() {
	document.getElementById("ConnexionBtn").style.display = "none";
	document.getElementById("InscriptionBtn").style.display = "initial";
	document.getElementById("Connexion").style.display = "none";
	document.getElementById("Inscription").style.display = "block";
}

function goVersPrix() {
	document.getElementById("bienvenue").style.display = "none";
	document.getElementById("prixContainer").style.display = "block";
}

