<?php
  function load_img($pseudo){
  include (__DIR__ .'/../config/bdd.php');
    $sql = "SELECT img FROM utilisateurs WHERE pseudo = :pseudo";
    $req = $bd->prepare($sql);
    $marqueurs = array('pseudo' => $pseudo);
    $req->execute($marqueurs);
    $result = $req->fetchall();
    $req->closeCursor();

    return $result[0]['img'];
  }
 ?>
