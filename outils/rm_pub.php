<?php
  if(!isset($_GET['id'])){
    header("Location: ../dashboard.php?redir=unknowidpub");
    exit();
  }

  include (__DIR__ .'/../config/bdd.php');

  session_start();

  $sql = "DELETE FROM publications WHERE id_publication = :id_publication";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_publication'=>$_GET['id']);
  $req->execute($marqueurs);
  $req->closeCursor();

  $sql = "DELETE FROM publications WHERE rep_id = :id_publication";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_publication'=>$_GET['id']);
  $req->execute($marqueurs);
  $req->closeCursor();

  header("Location: ../dashboard.php?redir=rmpubsuccess");
  exit();
 ?>
