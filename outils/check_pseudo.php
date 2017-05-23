<?php
  // Cette fonction permet de vérifier si le pseudo existe ou pas
  function check_pseudo($pseudo) {
    include (__DIR__ .'/../config/bdd.php');

    $sql = "SELECT pseudo FROM utilisateurs WHERE pseudo = :pseudo";
    $req = $bd->prepare($sql);
    $marqueurs = array('pseudo' => $pseudo);
    $req->execute($marqueurs);
    $result = $req->fetchall();
    $req->closeCursor();

    // Si le pseudo n'existe pas, on redirige avec un message d'erreur
    if (count($result) == 0){
      header("Location: ../dashboard.php?redir=unknowpseudo");
      exit();
    }else{
      return;
    }
  }
 ?>
