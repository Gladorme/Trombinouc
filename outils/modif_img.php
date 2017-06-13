<?php
  include (__DIR__ .'/../config/bdd.php');

  if (!isset($_POST['img'])){
    header('Location: ../options.php?redir=arg');
    exit();
  }

  if (!preg_match('#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#iS', $_POST['img'])){
    header("Location: ../profil.php?redir=errimg");
    exit();
  }
  session_start();
  $sql = "UPDATE utilisateurs SET img = :img WHERE id_utilisateur = :id_utilisateur";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_utilisateur'=>$_SESSION['id'], 'img'=>$_POST['img']);
  $req->execute($marqueurs);
  $req->closeCursor();

  $_SESSION['img'] = $_POST['img'];
  header("Location: ../profil.php?redir=successimg");
  exit();
 ?>
