<?php
  function load_msg($pseudo = 'everybody'){
  include ('config/bdd.php');
  $sql = "SELECT id_publication, pseudo, message, img FROM utilisateurs, publications WHERE id_utilisateur = utilisateur_id ORDER BY id_publication DESC";
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
      if($pseudo == 'everybody'){
       if (isset($value['img'])){
          echo "
          <div class='answer'>\n
              <div class='auteur'>\n
                <a href='profil.php?pseudo={$value['pseudo']}'><img src='{$value['img']}' alt='Avatar de {$value['pseudo']}' /></a>\n
                <p><a href='profil.php?pseudo={$value['pseudo']}'>{$value['pseudo']}</a></p>\n
              </div>\n
              <div class='texte'>\n
                {$value['message']}
              </div>
            </div>";
        }else{
          echo "
          <div class='answer'>\n
              <div class='auteur'>\n
                <a href='profil.php?pseudo={$value['pseudo']}'><img src='img/logo.png' alt='{$value['pseudo']}' /></a>\n
                <p><a href='profil.php?pseudo={$value['pseudo']}'>{$value['pseudo']}</a></p>\n
              </div>\n
              <div class='texte'>\n
                {$value['message']}
              </div>
            </div>";
        }
      }else{
        if($value['pseudo'] == $pseudo){
          if (isset($value['img'])){
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
           }else{
             echo "
             <div class='answer'>\n
                 <div class='auteur'>\n
                   <a href='profil.php?pseudo={$value['pseudo']}'><img src='img/logo.png' alt='{$value['pseudo']}' /></a>\n
                   <p><a href='profil.php?pseudo={$value['pseudo']}'>{$value['pseudo']}</a></p>\n
                 </div>\n
                 <div class='texte'>\n
                   {$value['message']}
                 </div>
               </div>";
          }
        }
      }
    }
  }
}
 ?>
