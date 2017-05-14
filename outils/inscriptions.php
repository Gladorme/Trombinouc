<?php
  // On vérifie que les champs sont tous définis
  if(!isset($_POST['pseudo']) || !isset($_POST['email']) || !isset($_POST['annee']) || !isset($_POST['mdp']) || !isset($_POST['CGU'])){
    header('Location: ../index.php?redir=champs');
    exit();
  }else{
    if($_POST['CGU']=="Yes"){
      include ('../config/bdd.php');
      $sql = "INSERT INTO utilisateurs (pseudo, mdp, mail, naissance) VALUES (:pseudo, :mdp, :email, :annee)";
      $req = $bd->prepare($sql);
      $marqueurs = array('pseudo'=>$_POST['pseudo'], 'mdp'=>password_hash($_POST['mdp'], PASSWORD_BCRYPT), 'email'=>$_POST['email'], 'annee'=> $_POST['annee']);
      $req->execute($marqueurs);
      $req->closeCursor();
      header("Location: ../index.php?redir=inscrit");
      exit();
    }
  }
?>
