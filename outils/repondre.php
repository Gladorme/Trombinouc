<?php
  if (!isset($_POST['message']) || !isset($_POST['id_pub'])){
    header('Location: dashboard.php');
    exit();
  }
  if (strlen($_POST['message']) > 502) {
    header("Location: ../publication.php?id={$_POST['id_pub']}&redir=msgsize");
    exit();
  }
  session_start();
  include (__DIR__ .'/../config/bdd.php');
  $sql = "INSERT INTO publications (utilisateur_id, date, message, rep_id) VALUES (:id_utilisateur, :date, :message, :id_rep)";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_utilisateur'=>$_SESSION['id'], 'date'=>time(), 'message'=>htmlspecialchars($_POST['message']), 'id_rep'=>$_POST['id_pub']);
  $req->execute($marqueurs);
  $req->closeCursor();

  header("Location: ../publication.php?id={$_POST['id_pub']}");
  exit();
 ?>
