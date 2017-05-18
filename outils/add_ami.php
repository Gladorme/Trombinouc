<?php
  if(!isset($_GET['pseudo'])){
    header("Location: ../dashboard.php?redir=unknowpseudo");
    exit();
  }

  include ('../config/bdd.php');
  include ('get_infos.php');

  session_start();
  $id_ami = get_id($_GET['pseudo']);

  $sql = "INSERT INTO relations (utilisateur_id, ami_id) VALUES (:id_utilisateur, :id_ami)";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_utilisateur'=>$_SESSION['id'], 'id_ami'=>$id_ami);
  $req->execute($marqueurs);
  $req->closeCursor();

  header("Location: ../profil.php?pseudo={$_GET['pseudo']}");
  exit();
 ?>
