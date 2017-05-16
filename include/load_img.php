<?php
function load_img($utilisateur_id){
  $sql = "SELECT img FROM utilisateurs WHERE id_utilisateur = :utilisateur_id";
  $req = $bd->prepare($sql);
  $req->execute();
  $result = $req->fetchall();
  $req->closeCursor();
}
 ?>
