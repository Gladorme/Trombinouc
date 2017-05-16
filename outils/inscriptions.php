<?php
  // On vérifie que les champs sont tous définis
  if(!isset($_POST['pseudo']) || !isset($_POST['email']) || !isset($_POST['annee']) || !isset($_POST['mdp']) || !isset($_POST['CGU'])){
    header('Location: ../index.php?redir=champs');
    exit();
  }else{
    if($_POST['CGU']=="Yes"){
      include ('../config/bdd.php');

      $sql = "SELECT pseudo FROM utilisateurs WHERE pseudo = :pseudo";
      $req = $bd->prepare($sql);
      $marqueurs = array('pseudo'=>$_POST['pseudo']);
      $req->execute($marqueurs);
      $result = $req->fetchall();
      $req->closeCursor();
      if(count($result) != 0){
        header("Location: ../index.php?redir=pseudoused");
        exit();
      }

      $sql = "SELECT mail FROM utilisateurs WHERE mail = :email";
      $req = $bd->prepare($sql);
      $marqueurs = array('email'=>$_POST['email']);
      $req->execute($marqueurs);
      $result = $req->fetchall();
      $req->closeCursor();
      if(count($result) != 0){
        header("Location: ../index.php?redir=mailused");
        exit();
      }

      $sql = "INSERT INTO utilisateurs (pseudo, mdp, mail, naissance) VALUES (:pseudo, :mdp, :email, :annee)";
      $req = $bd->prepare($sql);
      $marqueurs = array('pseudo'=>$_POST['pseudo'], 'mdp'=>hash('sha512', htmlspecialchars($_POST['mdp'])), 'email'=>$_POST['email'], 'annee'=> $_POST['annee']);
      $req->execute($marqueurs);
      $req->closeCursor();
      header("Location: ../index.php?redir=inscrit");
      exit();
    }
  }
?>
