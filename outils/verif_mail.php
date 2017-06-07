<?php
  // Cette fonction permet de vérifier si le pseudo existe ou pas
  function verif_mail($pseudo) {
    include (__DIR__ .'/../config/bdd.php');

    $sql = "SELECT mail FROM utilisateurs WHERE pseudo = :pseudo";
    $req = $bd->prepare($sql);
    $marqueurs = array('pseudo' => $pseudo);
    $req->execute($marqueurs);
    $result = $req->fetchall();
    $req->closeCursor();

    // Si le pseudo n'existe pas, on retourne "Unknow"
    if (count($result) == 0){
      return "Unknow";
    }else{
      return "Exist";
    }
  }
 ?>
