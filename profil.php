<?php include ('include/header.inc.php'); ?>
<?php include ('outils/load_msg.php'); ?>
<?php include ('outils/load_img.php'); ?>
<?php include ('outils/get_infos.php'); ?>
<?php error_reporting(E_ERROR); ?>
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
<?php
	if(!isset($_GET['pseudo'])){
		$_GET['pseudo'] = $_SESSION['pseudo'];
	}
?>
<nav>
  <ul>
    <li><a href="http://ent.unice.fr">Accès ENT</a></li>
    <li><a href="http://jalon.unice.fr">Accès Jalon</a></li>
    <li><a href="http://iutsa.unice.fr/gpushow2/?dept=RT&interactive">Planning des cours</a></li>
		<?php echo "<li><a href='profil.php?pseudo={$_SESSION['pseudo']}'>Profil</a></li>"; ?>
		<li><a href="options.php">Paramètres</a></li>
  </ul>
</nav>

<div class='profil'>
	<?php
	$img = load_img($_GET['pseudo']);
	$amis = get_nbr_amis($_GET['pseudo']);
	$fav = get_nbr_favoris($_GET['pseudo']);
	$age = get_age($_GET['pseudo']);
	$publi = get_nbr_publications($_GET['pseudo']);
	if (check_relation($_SESSION['pseudo'], $_GET['pseudo'])){
		$action = "<li><a href='outils/rm_ami.php?pseudo={$_GET['pseudo']}'><i class='fa fa-times' aria-hidden='true'></i> Supprimer des amis</li>";
	}else{
		$action = "<li><a href='outils/add_ami.php?pseudo={$_GET['pseudo']}'><i class='fa fa-plus' aria-hidden='true'></i> Rajouter en amis</li>";
	}
	echo "
  <div class='utilisateur'>
		<img src='{$img}' alt='Avatar de {$_GET['pseudo']}' />
		<p>{$_GET['pseudo']}</p>
	</div>
	<div class='stats'>
		<ul>
			<li><i class='fa fa-users' aria-hidden='true'></i> {$amis} Amis</li>
			<li><i class='fa fa-star' aria-hidden='true'></i> {$fav} Favoris</li>
			<li><i class='fa fa-birthday-cake' aria-hidden='true'></i> {$age} ans</li>
			<li><i class='fa fa-comments-o' aria-hidden='true'></i> {$publi} publications</li>
			{$action}
		</ul>
	</div>";
	?>
</div>

<div class="forum">
	<?php
    load_msg($_GET['pseudo']);
  ?>
</div>
<?php include ('include/footer.inc.php'); ?>
