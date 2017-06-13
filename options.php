<?php include (__DIR__ .'/include/header.inc.php'); ?>
<?php include (__DIR__ .'/outils/get_infos.php'); ?>
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

<div class='options'>
	<center>
  <form id="pseudo" action="outils/modif_pseudo.php" method="POST">
    <h3>Changer son pseudo: </h3>
    <input type="text" name="pseudo" placeholder="Nouveau pseudo" required /><br />
    <input type="submit" id="pseudo" value="Modifier son pseudo" />
  </form>
  <form id="email" action="outils/modif_mail.php" method="POST">
    <h3>Changer son email: </h3>
    <input type="email" name="email" placeholder="Nouvelle adresse email" required /><br />
    <input type="submit" id="email" value="Modifier son email" />
  </form>
  <form id="annee" action="outils/modif_annee.php" method="POST">
    <h3>Changer sa date de naissance: </h3>
    <input type="text" name="annee" placeholder="Nouvelle année de naissance" required /><br />
    <input type="submit" id="annee" value="Modifier son année de naissance" />
  </form>
	<form id="img" action="outils/modif_img.php" method="POST">
		<h3>Changer son image: </h3>
		<input type="text" name="img" placeholder="URL de la nouvelle image" required /><br />
		<input type="submit" id="img" value="Modifier son image" />
	</form>
  <form id="mdp" action="outils/modif_mdp.php" method="POST">
    <h3>Changer son mot de passe: </h3>
    <input type="password" name="mdp_old" placeholder="Ancien mot de passe" required /><br />
    <input type="password" name="mdp" placeholder="Nouveau mot de passe" required /><br />
		<input type="password" name="mdp_conf" placeholder="Confirmer nouveau mot de passe" required /><br />
    <input type="submit" id="mdp" value="Modifier son mot de passe" />
  </form>
	</center>
</div>
<?php include ('include/footer.inc.php'); ?>
