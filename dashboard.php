<?php include (__DIR__ .'/include/header.inc.php'); ?>
<?php include (__DIR__ .'/outils/load_msg.php'); ?>
<header>
	<div class="slogan">
		<a href="dashboard.php"><img src="img/logo.png" alt="Logo du Trombinouc"></a>
    <p>
      Le Trombinouc des R&amp;T
    </p>
	</div>
  <div class="connexion">
    <form id="rechercher" action="outils/rechercher.php" method="GET">
      <input type="text" name="pseudo" placeholder="Pseudo"/>
			<input type="submit" id="rechercher" value="Rechercher"/>
			<input type="button" value="Se déconnecter" onclick="parent.location='deconnexion.php'"/>
    </form>

  </div>
</header>
<nav>
  <ul>
		<li><a href="dashboard.php">Dashboard</a></li>
    <li><a href="http://ent.unice.fr">Accès ENT</a></li>
    <li><a href="http://iutsa.unice.fr/gpushow2/?dept=RT&interactive">Planning des cours</a></li>
		<?php echo "<li><a href='profil.php?pseudo={$_SESSION['pseudo']}'>Profil</a></li>"; ?>
		<li><a href="options.php">Paramètres</a></li>
  </ul>
</nav>
<?php // Apparait uniquement lorsqu'il y a une variable dans l'url
	if (isset($_GET['redir'])){
		if($_GET['redir'] == "msgsize"){
			$msg = "Votre message fait plus de 500 caractères !";
		}
		elseif($_GET['redir'] == "unknowpseudo"){
			$msg = "Pseudo inconnu !";
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
<div class="publier">
  <form id="publication" action="outils/publier.php" method="POST">
		<textarea name="message" id="textarea" placeholder=" Exprimez-vous ..." required></textarea> <em id="count">500</em>
		<br />
		<input type="submit" id="publication" value="Publier !"/>
	</form>
</div>
<div class="forum">
	<?php	load_msg();	?>
</div>
<script src="js/count.js"></script>
<?php include ('include/footer.inc.php'); ?>
