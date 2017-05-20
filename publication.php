<?php
  if (!isset($_GET['id'])){
    header('Location: dashboard.php?redir=unknowidpub');
    exit();
  }
 ?>
<?php include (__DIR__ .'/include/header.inc.php'); ?>
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
  



 ?>


<?php include ('include/footer.inc.php'); ?>
