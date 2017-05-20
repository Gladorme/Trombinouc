<?php
function get_nbr_rep($id_publication){
  include (__DIR__ .'/../config/bdd.php');
  $sql = "SELECT id_publication FROM publications WHERE rep_id = :id_publication";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_publication' => $id_publication);
  $req->execute($marqueurs);
  $result = $req->fetchall();
  $req->closeCursor();
  return count($result);
}

function load_rep($id_pub){
  include (__DIR__ .'/../config/bdd.php');
  $sql = "SELECT rep_id, id_publication, pseudo, message, img FROM utilisateurs, publications WHERE id_utilisateur = utilisateur_id AND rep_id = :id_rep ORDER BY id_publication";
  $req = $bd->prepare($sql);
  $marqueurs = array ('id_rep'=>$id_pub);
  $req->execute($marqueurs);
  $result = $req->fetchall();
  $req->closeCursor();

  foreach ($result as $key => $value) {
    echo "
    <div class='answer'>\n
        <div class='auteur'>\n
          <a href='profil.php?pseudo={$value['pseudo']}'><img src='{$value['img']}' alt='{$value['pseudo']}' /></a>\n
          <p><a href='profil.php?pseudo={$value['pseudo']}'>{$value['pseudo']}</a></p>\n
        </div>\n
        <div class='texte'>\n
          {$value['message']}
        </div>
      </div>";
  }
}
?>
