<?php
  session_start();
  if(isset($_SESSION['connect'])){
    header('Location: ./dashboard.php');
    exit();
  }
?>
<!DOCTYPE HTML>
<html lang="fr">
 <head>
   <meta charset="utf-8" />
   <title>Trombinouc</title>
   <meta name="description" content="Trombinouc est une version simplifiée de Facebook, qui permet d'échanger avec ses amis">
		<meta name="authors" content="Guillaume LADORME, Kévin SANTACREU, Marwane SHAIM">
		<meta name="keywords" content="Trombinouc, Mini-Facebook, DUT R&amp;T, Projet PHP">
		<link rel="stylesheet" href="css/style.css">
		<link rel="icon" type="image/png" href="../img/favicon.png" />
 </head>
 <body>
	<header>
		<div class="slogan">
			<img src="img/logo.png" alt="Logo du Trombinouc">
      <p>
        Trombinouc
      </p>
		</div>
    <div class="connexion">
      <form id="connexion" action="outils/connexion.ph" method="POST">
        <input type="email" name="email" placeholder="Adresse email" required/>
        <input type="password" name="mdp" placeholder="Mot de passe" required/>
        <input type="button" id="connexion"  value="Se connecter" />
      </form>
    </div>
	</header>



  <div class="main">
    <div class="gauche">
      <p>
        Avec Trombinouc, partagez et restez en contact avec votre entourage.
      </p>
      <img src="img/world_people.png" alt="Image qui représente l'entraide">
      <?php
        if($_GET['redir']="inscrit"){
          echo "<p>Vous désormais inscrit, veuillez vous connecter !</p>";
        }
       ?>
    </div>
    <div class="droite">
      <div class="inscription">
        <h1>Inscription</h1>
        <form id="signup" action="outils/inscriptions.php" method="POST">
          <input type="text" name="pseudo" placeholder="Nom d'utilisateur" required /><br />
          <input type="email" name="email" placeholder="Adresse email" required /><br />
          <input type="text" name="annee" placeholder="Année de naissance" required /><br />
          <input type="password" name="mdp" placeholder="Mot de passe" required /><br />
          <div class="centrer">
            <input type="checkbox" name="CGU" value="Yes" required /> J'accepte les conditions d'utilisation<br />
            <input type="submit" id="inscription" value="S'inscrire" />
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
