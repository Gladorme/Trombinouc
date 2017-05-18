<?php
  function check_pseudo($pseudo) {
  include (__DIR__ .'/../config/bdd.php');
    $sql = "SELECT pseudo FROM utilisateurs WHERE pseudo = :pseudo";
    $req = $bd->prepare($sql);
    $marqueurs = array('pseudo' => $pseudo);
    $req->execute($marqueurs);
    $result = $req->fetchall();
    $req->closeCursor();

    if (count($result) == 0){
      header("Location: ../dashboard.php?redir=unknowpseudo");
      exit();
    }else{
      return;
    }
  }
 ?>
