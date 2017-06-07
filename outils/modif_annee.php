<?php
  include (__DIR__ .'/../config/bdd.php');
  include (__DIR__ .'/verif_mail.php');
  if (!isset($_POST['annee'])){
    header('Location: ../options.php?redir=arg');
    exit();
  }

  session_start();
  $sql = "UPDATE utilisateurs SET naissance = :annee WHERE id_utilisateur = :id_utilisateur";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_utilisateur'=>$_SESSION['id'], 'annee'=>$_POST['annee']);
  $req->execute($marqueurs);
  $req->closeCursor();

  $_SESSION['naissance'] = $_POST['annee'];
  header("Location: ../profil.php?redir=successpseudo");
  exit();
 ?>
