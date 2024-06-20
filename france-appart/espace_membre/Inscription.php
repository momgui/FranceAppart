<?php
$bdd = new PDO('mysql:host=francekmembre.mysql.db;dbname=francekmembre', 'francekmembre', '180105Membre');
 
if(isset($_POST['forminscription'])) {
   $prenom = htmlspecialchars($_POST['prenom']);
   $mail = htmlspecialchars($_POST['mail']);
   $nom = htmlspecialchars($_POST['nom']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
   if(!empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['nom']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
      $prenomlength = strlen($prenom);
      if($prenomlength <= 255) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO membres(prenom, mail, nom, mdp) VALUES(?, ?, ?, ?)");
                     $insertmbr->execute(array($prenom, $mail, $nom, $mdp));
                     $erreur = "Votre compte a bien été créé !";
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
      } else {
         $erreur = "Votre prenom ne doit pas dépasser 255 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}

if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND mdp = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['prenom'] = $userinfo['prenom'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: espace_membre.php?id=".$_SESSION['id']);
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>

   <html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>France-Appart</title>
      <link rel="stylesheet" href="inscriptionStyle.css">     
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
               <a href="#">Connexion / Inscription</a>
            </div>
         </nav>
         <div class="divForm2">
         </div>



         <div class="background">
            <div class="container">
               <div class="Connexion_Inscription" id="Inscription">
                  <h2 class="inscriptionTitle">Inscription</h2>
                  <form method="POST" class="inscriptionForm" action="">
                     <table>
                        <tr>
                           <td>
                              <input class="textZone" type="text" placeholder="Votre Prénom" id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" />
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <input class="textZone" type="text" placeholder="Votre Nom" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" />
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <input class="textZone" type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <input class="textZone" type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <input class="textZone" type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                           </td>
                        </tr>
                        <tr>
                           <td class="submitDiv">
                              <input class="submitZone" type="submit" name="forminscription" value="Je m'inscris" />
                           </td>
                           <td></td>
                        </tr>
                     </table>
                  </form>
                  <?php
                  if(isset($erreur)) {
                     echo $erreur;
                  }
                  ?>
               </div>


               <div class="Connexion_Inscription" id="Connexion">
                  <h2 class="inscriptionTitle">Connexion</h2>
                  <form method="POST" class="inscriptionForm" action="">
                     <table>
                        <tr>
                           <td>
                              <input class="textZone" type="email" placeholder="Votre mail" name="mailconnect">
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <input class="textZone" type="password" placeholder="Votre mot de passe" id="mdp" name="mdpconnect" />
                           </td>
                        </tr>
                        <tr>
                           <td class="submitDiv">
                              <input class="submitZone" type="submit" name="formconnexion" value="Se connecter" />
                           </td>
                        </tr>
                     </table>
                  </form>
                  <?php
                  if(isset($erreur)) {
                     echo '<font color="red">'.$erreur."</font>";
                  }
                  ?>
            </div>
         </div>
            <button onclick="Connexion()" id="ConnexionBtn" class="textZone btnValidation">Pas de compte? M'inscrire</button>
            <button onclick="Inscription()" id="InscriptionBtn" class="textZone btnValidation">Déjà inscrit ? Me connecter</button>
      </div>
   </body>
   <script src="script.js"></script>
</html>