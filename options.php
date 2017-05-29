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
  <form id="pseudo" action="outils/modif_pseudo.php" method="POST">
    <label>Changer son pseudo: </label>
    <input type="text" name="pseudo" placeholder="Nom d'utilisateur" required /><br />
    <input type="submit" id="pseudo" value="Modifier son pseudo" />
  </form>
  <form id="email" action="outils/modif_email.php" method="POST">
    <label>Changer son email: </label>
    <input type="email" name="email" placeholder="Adresse email" required /><br />
    <input type="submit" id="email" value="Modifier son email" />
  </form>
  <form id="annee" action="outils/modif_annee.php" method="POST">
    <label>Changer sa date de naissance: </label>
    <input type="text" name="annee" placeholder="Année de naissance" required /><br />
    <input type="submit" id="annee" value="Modifier son année de naissance" />
  </form>
  <form id="mdp" action="outils/modif_mdp.php" method="POST">
    <label>Changer son mot de passe: </label>
    <input type="password" name="oldmdp" placeholder="Ancien mot de passe" required /><br />
    <input type="password" name="newmdp" placeholder="Nouveau mot de passe" required /><br />
    <input type="submit" id="mdp" value="Modifier son mot de passe" />
  </form>
</div>
<?php include ('include/footer.inc.php'); ?>
