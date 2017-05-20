<?php
  if (!isset($_POST['message'])){
    header('Location: dashboard.php');
    exit();
  }
  if (strlen($_POST['message']) > 502) {
    header("Location: ../dashboard.php?redir=msgsize");
    exit();
  }
  session_start();
  include (__DIR__ .'/../config/bdd.php');
  $sql = "INSERT INTO publications (utilisateur_id, date, message) VALUES (:id_utilisateur, :date, :message)";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_utilisateur'=>$_SESSION['id'], 'date'=>time(), 'message'=>htmlspecialchars($_POST['message']));
  $req->execute($marqueurs);
  $req->closeCursor();

  header('Location: ../dashboard.php');
  exit();
 ?>
