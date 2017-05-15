<?php include ('include/header.inc.php'); ?>
<header>
	<div class="slogan">
		<img src="img/logo.png" alt="Logo de Trombinouc">
    <p>
      Le Trombinouc des R&amp;T
    </p>
	</div>
  <div class="connexion">
    <form>
      <input type="text" name="search" placeholder="Rechercher !"/>
      <input type="button"  value="Se déconnecter" onclick="parent.location='deconnexion.php'"/>
    </form>
  </div>
</header>
<nav>
  <ul>
    <li><a href="http://ent.unice.fr">Accès ENT</a></li>
    <li><a href="http://jalon.unice.fr">Accès Jalon</a></li>
    <li><a href="http://iutsa.unice.fr/gpushow2/?dept=RT&interactive">Planning des cours</a></li>
  </ul>
</nav>
<div class="annonces">
  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
  Pas cours jusqu'à la fin de l'année
  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
</div>
<div class="forum">
  <div class="categorie">
    <div class="titre">
      Général
    </div>
    <div class="sujet">
      &bull; <a href="sujet_general.html">Discussions générales</a>
    </div>
  </div>
  <div class="categorie">
    <div class="titre">
      Cours
    </div>
    <div class="sujet">
      &bull; <a href="#">Semestre 1</a>
    </div>
    <div class="sujet">
      &bull; <a href="#">Semestre 2</a>
    </div>
    <div class="sujet">
      &bull; <a href="#">Semestre 3</a>
    </div>
    <div class="sujet">
      &bull; <a href="#">Semestre 4</a>
    </div>
  </div>
</div>
<?php include ('include/footer.inc.php'); ?>
