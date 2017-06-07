<?php
  if (!isset($_POST['mdp_old']) || !isset($_POST['mdp']) || !isset($_POST['mdp_conf'])){
    header('Location: ../options.php?redir=arg');
    exit();
  }
  if ($_POST['mdp'] != $_POST['mdp_conf']){
    header('Location: ../options.php?redir=mdpdiff');
    exit();
  }

  include (__DIR__ .'/../config/bdd.php');
  session_start();

  $sql = "SELECT mdp FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_utilisateur'=>$_SESSION['id']);
  $req->execute($marqueurs);
  $result = $req->fetchall();
  $req->closeCursor();
  $mdp = hash('sha512', htmlspecialchars($_POST['mdp_old']));

  if($result[0]['mdp'] == $mdp){
    $sql = "UPDATE utilisateurs SET mdp = :mdp WHERE id_utilisateur = :id_utilisateur";
    $req = $bd->prepare($sql);
    $marqueurs = array('id_utilisateur'=>$_SESSION['id'], 'mdp'=>hash('sha512', htmlspecialchars($_POST['mdp'])));
    $req->execute($marqueurs);
    $req->closeCursor();
    header("Location: ../options.php?redir=success");
    exit();
  }

  header('Location: ../options.php?redir=wrongmdp');
  exit();
?>
