<?php
  // On check si le pseudo est défini, si il ne l'est pas, on redirige avec msg d'erreur
  if(!isset($_GET['pseudo'])){
    header("Location: ../dashboard.php?redir=unknowpseudo");
    exit();
  }

  // On inclu les fichiers essentiels
  include (__DIR__ .'/../config/bdd.php');
  include (__DIR__ .'/get_infos.php');

  session_start();
  $id_ami = get_id($_GET['pseudo']);

  // On rajoute une entrée dans la table 'relations' avec l'id de l'utilisateur + l'id de l'ami rajouté
  $sql = "INSERT INTO relations (utilisateur_id, ami_id) VALUES (:id_utilisateur, :id_ami)";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_utilisateur'=>$_SESSION['id'], 'id_ami'=>$id_ami);
  $req->execute($marqueurs);
  $req->closeCursor();

  // On redirige quand la requête a été executée sur le profil où il était avant
  header("Location: ../profil.php?pseudo={$_GET['pseudo']}");
  exit();
 ?>
