<?php
  if (!isset($_GET['id'])){
    header('Location: dashboard.php?redir=unknowidpub');
    exit();
  }
 ?>
<?php include (__DIR__ .'/include/header.inc.php'); ?>
<?php include (__DIR__ .'/outils/get_infos_rep.php'); ?>
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

<div class="forum">
<?php
  include (__DIR__ .'/config/bdd.php');
  $sql = "SELECT id_publication, pseudo, message, img FROM utilisateurs, publications WHERE id_publication = :id_publication AND id_utilisateur = utilisateur_id";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_publication' => $_GET['id']);
  $req->execute($marqueurs);
  $result = $req->fetchall();
  $req->closeCursor();
  if (count($result) == 0){
    echo "<div class='annonces'>\n
  		<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
  			Cette publication n'existe pas ou a été supprimée !
  		<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>\n
  	</div>\n";
  }else{
    if ($result[0]['pseudo'] == $_SESSION['pseudo']){
      $delete = "
      <div class='actions'>
        <ul>
          <li><a href='outils/rm_pub.php?id={$result[0]['id_publication']}'><i class='fa fa-trash' aria-hidden='true'></i> Supprimer</a></li>
        </ul>
      </div>";
    }else{
      $delete = "";
    }
    echo "
    <div class='publication'>\n
        <div class='auteur'>\n
          <a href='profil.php?pseudo={$result[0]['pseudo']}'><img src='{$result[0]['img']}' alt='{$result[0]['pseudo']}' /></a>\n
          <p><a href='profil.php?pseudo={$result[0]['pseudo']}'>{$result[0]['pseudo']}</a></p>\n
        </div>\n
        <div class='texte'>\n
          {$result[0]['message']}
        </div>
        {$delete}
      </div>";
  }
  load_rep($_GET['id']);
 ?>
</div>
<div class="repondre" id="rep">
  <form id="rep" action="outils/repondre.php" method="POST">
		<textarea name="message" id="textarea" placeholder=" Exprimez-vous ..." required></textarea> <em id="count">500</em>
    <?php echo "<input type='text' hidden='true' name='id_pub' value='{$_GET['id']}'/>"; ?>
		<br />
		<input type="submit" id="rep" value="Publier !"/>
	</form>
</div>
<script src="js/count.js"></script>
<?php include ('include/footer.inc.php'); ?>
