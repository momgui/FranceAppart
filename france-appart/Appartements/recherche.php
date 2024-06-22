<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>France-Appart</title>
      <link rel="stylesheet" href="rechercheStyle.css">     
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"/>
   </head>
   <body>
      <?php
      $bdd = new PDO('mysql:host=;dbname=;charset=utf8','','');
       
      $articles = $bdd->query('SELECT * FROM recherche');
      $map = $bdd->query('SELECT * FROM map');
      if(isset($_GET['q']) AND !empty($_GET['q'])) {
         $q = htmlspecialchars($_GET['q']);
         $articles = $bdd->query('SELECT * FROM recherche WHERE CONCAT(Ville, departement, region, pays) LIKE "%'.$q.'%"');
         $map = $bdd->query('SELECT * FROM map WHERE CONCAT(Ville, departement, region, pays) LIKE "%'.$q.'%"');
         $zoom = $bdd->query('SELECT * FROM map WHERE CONCAT(Ville, departement, region, pays) LIKE "%'.$q.'%"');
      }
      ?>
         <!--barre de navigation-->
         <nav>
            <div class="home">
               <a href="..\index.html"><i class="fas fa-long-arrow-alt-left"></i></a>
               <p class="titre">France-Appart</p>
            </div>
            <div class="search_div">                  
               <form method="get" class="form1" style="position: absolute; margin-top: 20px; width: 1%;">
                     <input type="text" value="" placeholder="Ou voulez vous aller?" id="search" name="q">   
               </form>
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
         <div class="formulaire2">
            <form class="form2" method="get" style="position: absolute; margin-top: 20px; width: 1%;">
               <input type="text" value="" placeholder="Ou voulez vous aller?" id="search" name="q"> 
            </form>
         </div>             

         <button onclick="mapDisplay()" id="btnMap"><i class="fas fa-map-marked-alt"></i><span style="padding-left: 20px;">Map</span></button> 
         <button onclick="logementsDisplay()" id="btnLogements"><i class="fas fa-house-user"></i><span style="padding-left: 20px;">Logements</span></button> 
         <br>    
         <div class="recherche_Collones">
            <div id="logements_Trouve">
                  <?php if($articles->rowCount() > 0) { ?>
                  
                     <?php while($a = $articles->fetch()) { ?>
                        <div><?= $a['code'] ?></div>
                     <?php } ?>
                     
                  <?php } else { ?>
                  Aucun résultat pour: <?= $q ?>...
                  <?php } ?>
            </div>
            <div id="Map" class="divMap">
               <div class="map"></div>
               <script>
                     "Api-Key: "
                  function initMap() {
                     <?php while($b = $map->fetch()) { ?>
                        <?= $b['code'] ?>
                     <?php } ?>
                    const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: <?php if (empty($q)) {echo '6,'; } else {if($c = $zoom->fetch()) { ?><?= $c['zoom'] ?><?php } ?>,<?php } ?>
                        center: myLatLng,
                    });
                     new google.maps.Marker({
                        position:{ lat: 43.30037, lng: 5.38345 },
                        map,
                        title: "Marseillement_votre",
                     });
                     new google.maps.Marker({
                        position:{ lat: 43.33797, lng: 3.21389},
                        map,
                        title: "votre_adresse_de_charme",
                     });
                  }
               </script>
               <div id="map"></div>
            </div>
         </div>
         </div>     
      <!--footer-->
      <footer>
            <div class="container footer-content">
               <ul>
                  <li> © France-Appart</li>
                  <li><i class="fas fa-envelope-square"></i> contact@france-appart.fr</li>
                  <li><a href="">Terms, Conditions and Privacy Policy</a></li>
               </ul>      
            </div>
      </footer>
   </body>
   <script
      src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&libraries=&v=weekly"
      async
    ></script>
   <script src="rechercheScript.js"></script>
</html>

