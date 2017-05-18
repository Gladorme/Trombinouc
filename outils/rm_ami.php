<?php
  if(!isset($_GET['pseudo'])){
    header("Location: ../dashboard.php?redir=unknowpseudo");
    exit();
  }

  include (__DIR__ .'/../config/bdd.php');
  include (__DIR__ .'/get_infos.php');

  session_start();
  $id_ami = get_id($_GET['pseudo']);

  $sql = "DELETE FROM relations WHERE utilisateur_id = :id_utilisateur AND ami_id = :id_ami";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_utilisateur'=>$_SESSION['id'], 'id_ami'=>$id_ami);
  $req->execute($marqueurs);
  $req->closeCursor();

  header("Location: ../profil.php?pseudo={$_GET['pseudo']}");
  exit();
 ?>
