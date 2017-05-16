<?php include ('include/header.inc.php'); ?>
<?php include ('outils/load_msg.php'); ?>
<header>
	<div class="slogan">
		<a href="dashboard.php"><img src="img/logo.png" alt="Logo du Trombinouc"></a>
    <p>
      Le Trombinouc des R&amp;T
    </p>
	</div>
  <div class="connexion">
    <form id="rechercher">
      <input type="text" name="search" placeholder="Pseudo"/>
			<input type="submit" id="rechercher" value="Rechercher"/>
			<input type="button" value="Se déconnecter" onclick="parent.location='deconnexion.php'"/>
    </form>

  </div>
</header>
<nav>
  <ul>
    <li><a href="http://ent.unice.fr">Accès ENT</a></li>
    <li><a href="http://jalon.unice.fr">Accès Jalon</a></li>
    <li><a href="http://iutsa.unice.fr/gpushow2/?dept=RT&interactive">Planning des cours</a></li>
		<?php echo "<li><a href='dashboard.php?user={$_SESSION['pseudo']}'>Profil</a></li>"; ?>
		<li><a href="options.php">Paramètres</a></li>
  </ul>
</nav>
<div class="publier">
  <form id="publication" action="outils/publier.php" method="POST">
		<textarea name="message" placeholder=" Exprimez-vous ..." required></textarea><br />
		<input type="submit" id="publication" value="Publier !"/>
	</form>
</div>
<div class="forum">
	<?php	load_msg();	?>
	<div class="answer">
		<div class="auteur">
			<img src="img/logo.png" alt="George" />
			<p>George</p>
		</div>
		<div class="texte">
			Bonjour à tous ! Je souhaiterai où je pourrais trouver les coefficients de chaque matière ! <br />
			Merci d'avance !
		</div>
	</div>
</div>
<?php include ('include/footer.inc.php'); ?>
