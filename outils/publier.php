<?php
  if (!isset($_POST['message'])){
    header('Location: dashboard.php');
    exit();
  }
  session_start();
  include ('../config/bdd.php');
  $sql = "INSERT INTO publications (utilisateur_id, date, message) VALUES (:id_utilisateur, :date, :message)";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_utilisateur'=>$_SESSION['id'], 'date'=>time(), 'message'=>htmlspecialchars($_POST['message']));
  $req->execute($marqueurs) or die(print_r($req->errorInfo()));
  $req->closeCursor();

  header('Location: ../dashboard.php');
  exit();

 ?>
