<?php
function load_img($pseudo){
  $sql = "SELECT img FROM utilisateurs WHERE pseudo = :pseudo";
  $req = $bd->prepare($sql);
  $marqueurs = array('pseudo' => $pseudo);
  $req->execute($marqueurs);
  $result = $req->fetchall();
  $req->closeCursor();
  if (isset($result[0]['img'])){
      return $result[0]['img'];
  }else{
    return 'img/logo.png';
  }
}
 ?>
