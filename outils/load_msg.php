<?php
  function load_msg($pseudo = 'everybody'){
  include (__DIR__ .'/../config/bdd.php');
  include (__DIR__ .'/get_infos_rep.php');
  $sql = "SELECT id_publication, pseudo, message, img, rep_id FROM utilisateurs, publications WHERE id_utilisateur = utilisateur_id ORDER BY id_publication DESC";
  $req = $bd->prepare($sql);
  $req->execute();
  $result = $req->fetchall();
  $req->closeCursor();

  if (count($result) == 0){
    echo "<div class='annonces'>\n
      <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
        Il n'y aucun message publié
      <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>\n
    </div>\n";
  }else{
    foreach ($result as $key => $value) {
      if($value['rep_id'] != "NULL"){
        if($pseudo == 'everybody'){
          $rep = get_nbr_rep($value['id_publication']);
          echo "
          <div class='publication'>\n
              <div class='auteur'>\n
                <a href='profil.php?pseudo={$value['pseudo']}'><img src='{$value['img']}' alt='{$value['pseudo']}' /></a>\n
                <p><a href='profil.php?pseudo={$value['pseudo']}'>{$value['pseudo']}</a></p>\n
              </div>\n
              <div class='texte'>\n
                {$value['message']}
              </div>
              <div class='actions'>
                <ul>
                  <li><a href='publication.php?id={$value['id_publication']}'><i class='fa fa-comments' aria-hidden='true'></i> {$rep} commentaires</a></li>
                  <li><a href='publication.php?id={$value['id_publication']}#rep'><i class='fa fa-share' aria-hidden='true'></i> Répondre</a></li>
                </ul>
              </div>
            </div>";
        }else{
          if($value['pseudo'] == $pseudo){
            $rep = get_nbr_rep($value['id_publication']);
            echo "
            <div class='publication'>\n
                <div class='auteur'>\n
                  <a href='profil.php?pseudo={$value['pseudo']}'><img src='{$value['img']}' alt='{$value['pseudo']}' /></a>\n
                  <p><a href='profil.php?pseudo={$value['pseudo']}'>{$value['pseudo']}</a></p>\n
                </div>\n
                <div class='texte'>\n
                  {$value['message']}
                </div>
                <div class='actions'>
                  <ul>
                    <li><a href='publication.php?id={$value['id_publication']}'><i class='fa fa-comments' aria-hidden='true'></i> {$rep} commentaires</a></li>
                    <li><a href='publication.php?id={$value['id_publication']}#rep'><i class='fa fa-share' aria-hidden='true'></i> Répondre</a></li>
                  </ul>
                </div>
              </div>";
          }
        }
      }
    }
  }
}
 ?>
