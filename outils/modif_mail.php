<?php
  include (__DIR__ .'/../config/bdd.php');
  include (__DIR__ .'/verif_mail.php');

  if (!isset($_POST['email'])){
    header('Location: ../options.php?redir=arg');
    exit();
  }

  if (verif_mail($_POST['email']) == 'Exist'){
    header("Location: ../profil.php?redir=alremail");
    exit();
  }
  session_start();
  $sql = "UPDATE utilisateurs SET mail = :mail WHERE id_utilisateur = :id_utilisateur";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_utilisateur'=>$_SESSION['id'], 'mail'=>$_POST['email']);
  $req->execute($marqueurs);
  $req->closeCursor();

  $_SESSION['mail'] = $_POST['email'];
  header("Location: ../profil.php?redir=successpseudo");
  exit();
 ?>
