<?php
function get_nbr_amis($pseudo){
  include (__DIR__ .'/../config/bdd.php');
  $id_pseudo = get_id($pseudo);
  $sql = "SELECT id_relation FROM relations WHERE utilisateur_id = :id_pseudo";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_pseudo' => $id_pseudo);
  $req->execute($marqueurs);
  $result = $req->fetchall();
  $req->closeCursor();
  return count($result);
}

function get_nbr_favoris($pseudo){
  return 0;
}

function get_age($pseudo){
  include (__DIR__ .'/../config/bdd.php');
  $sql = "SELECT naissance FROM utilisateurs WHERE pseudo = :pseudo";
  $req = $bd->prepare($sql);
  $marqueurs = array('pseudo' => $pseudo);
  $req->execute($marqueurs);
  $result = $req->fetchall();
  $req->closeCursor();
  $age = date("Y") - $result[0]['naissance'];
  return $age;
}

function get_nbr_publications($pseudo){
  include (__DIR__ .'/../config/bdd.php');
  $sql = "SELECT utilisateur_id FROM publications, utilisateurs WHERE pseudo = :pseudo AND utilisateur_id = id_utilisateur";
  $req = $bd->prepare($sql);
  $marqueurs = array('pseudo' => $pseudo);
  $req->execute($marqueurs);
  $result = $req->fetchall();
  $req->closeCursor();
  return count($result);
}

function get_id($pseudo){
  include (__DIR__ .'/../config/bdd.php');
  $sql = "SELECT id_utilisateur FROM utilisateurs WHERE pseudo = :pseudo";
  $req = $bd->prepare($sql);
  $marqueurs = array('pseudo' => $pseudo);
  $req->execute($marqueurs);
  $result = $req->fetchall();
  $req->closeCursor();
  return $result[0]['id_utilisateur'];
}

function check_relation($pseudo, $pseudo_ami){
  include (__DIR__ .'/../config/bdd.php');

  $id = get_id($pseudo);
  $id_ami = get_id($pseudo_ami);

  $sql = "SELECT id_relation FROM relations WHERE utilisateur_id = :id_utilisateur AND ami_id = :id_ami";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_utilisateur'=>$id, 'id_ami'=>$id_ami);
  $req->execute($marqueurs);
  $result = $req->fetchall();
  $req->closeCursor();

  if (count($result) == 0){
    return False;
  }else{
    return True;
  }
}
?>
