<?php
  if(!isset($_POST['email']) || !isset($_POST['mdp'])){
    header('Location: ../index.php?redir=errconnect');
    exit();
  }else{
  include (__DIR__ .'/../config/bdd.php');
    $sql = "SELECT mdp FROM utilisateurs WHERE mail = :email";
    $req = $bd->prepare($sql);
    $marqueurs = array('email'=>$_POST['email']);
    $req->execute($marqueurs);
    $result = $req->fetchall();
    $req->closeCursor();

    if(count($result) == 1){
      $mdp = hash('sha512', htmlspecialchars($_POST['mdp']));
      if($result[0]['mdp'] == $mdp){

        $sql = "SELECT * FROM utilisateurs WHERE mail = :email";
        $req = $bd->prepare($sql);
        $marqueurs = array('email'=>$_POST['email']);
        $req->execute($marqueurs);
        $result = $req->fetchall();
        $req->closeCursor();

        session_start();
        $_SESSION['id'] = $result[0]['id_utilisateur'];
        $_SESSION['pseudo'] = $result[0]['pseudo'];
        $_SESSION['mail'] = $result[0]['mail'];
        $_SESSION['naissance'] = $result[0]['naissance'];
        $_SESSION['img'] = $result[0]['img'];
        $_SESSION['connect'] = "true";

        header('Location: ../dashboard.php');
        exit();
      }else{
        header("Location: ../index.php?redir=errmdp");
        exit();
      }
    }else{
      header('Location: ../index.php?redir=errmail');
      exit();
    }
  }
 ?>
