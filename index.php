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
    <link rel="stylesheet" href="css/font-awesome.min.css" />
		<link rel="icon" type="image/png" href="img/logo.png" />
 </head>
 <body>
	<header>
		<div class="slogan">
			<a href="index.php"><img src="img/logo.png" alt="Logo du Trombinouc"></a>
      <p>
        Le Trombinouc des R&amp;T
      </p>
		</div>
    <div class="connexion">
      <form id="connexion" action="outils/connexions.php" method="POST">
        <input type="email" name="email" placeholder="Adresse email" required/>
        <input type="password" name="mdp" placeholder="Mot de passe" required/>
        <input type="submit" id="connexion"  value="Se connecter" />
      </form>
    </div>
	</header>



  <div class="main">
    <?php // Apparait uniquement lorsqu'il y a une variable dans l'url
    if (isset($_GET['redir'])){
      if($_GET['redir'] == "inscrit"){
        $msg = "Vous êtes désormais inscrit, veuillez vous connecter !";
      }
      elseif($_GET['redir'] == "errmdp"){
        $msg = "Mot de passe incorrect !";
      }
      elseif($_GET['redir'] == "errmail"){
        $msg = "Email inconnue, veuillez vous inscrire !";
      }
      elseif($_GET['redir'] == "pseudoused"){
        $msg = "Ce pseudo déjà utilisé !";
      }
      elseif($_GET['redir'] == "mailused"){
        $msg = "Cette adresse mail déjà utilisée !";
      }
      elseif($_GET['redir'] == "deco"){
        $msg = "Vous êtes désormais déconnecté !";
      }
      elseif($_GET['redir'] == "noconnect"){
        $msg = "Vous devez être connecté pour afficher cette page !";
      }else{
        $msg = "";
      }
    echo "<div class='annonces'>\n
      <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        {$msg}
      <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>\n
    </div>\n";
    }
    ?>

    <div class="gauche">
      <p>
        Avec Trombinouc, partagez et restez en contact avec votre entourage.
      </p>
      <img src="img/world_people.png" alt="Image qui représente l'entraide">
    </div>
    <div class="droite">
      <div class="inscription">
        <h1>Inscription</h1>
        <form id="inscription" action="outils/inscriptions.php" method="POST">
          <input type="text" name="pseudo" placeholder="Nom d'utilisateur" required /><br />
          <input type="email" name="email" placeholder="Adresse email" required /><br />
          <input type="text" name="annee" placeholder="Année de naissance" required /><br />
          <input type="password" name="mdp" placeholder="Mot de passe" required /><br />
            <input type="checkbox" name="CGU" value="Yes" required /> J'accepte les conditions d'utilisation<br />
            <input type="submit" id="inscription" value="S'inscrire" />
        </form>
      </div>
    </div>
  </div>
</body>
</html>
