<?php
  include (__DIR__ .'/../config/bdd.php');
  include (__DIR__ .'/verif_pseudo.php');

  if (!isset($_POST['pseudo'])){
    header('Location: ../options.php?redir=arg');
    exit();
  }
  if (verif_pseudo($_POST['pseudo']) == 'Exist'){
    header("Location: ../profil.php?redir=alrpseudo");
    exit();
  }

  session_start();
  $sql = "UPDATE utilisateurs SET pseudo = :pseudo WHERE id_utilisateur = :id_utilisateur";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_utilisateur'=>$_SESSION['id'], 'pseudo'=>htmlspecialchars($_POST['pseudo']));
  $req->execute($marqueurs);
  $req->closeCursor();

  $_SESSION['pseudo'] = $_POST['pseudo'];
  header("Location: ../profil.php?redir=successpseudo");
  exit();
 ?>
