<?php
function get_nbr_amis($pseudo){
  include ('config/bdd.php');
  $sql = "SELECT utilisateur_id FROM relations, utilisateurs WHERE pseudo = :pseudo";
  $req = $bd->prepare($sql);
  $marqueurs = array('pseudo' => $pseudo);
  $req->execute($marqueurs);
  $result = $req->fetchall();
  $req->closeCursor();
  return count($result);
}
function get_nbr_favoris($pseudo){
  return 0;
}
function get_age($pseudo){
  include ('config/bdd.php');
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
  include ('config/bdd.php');
  $sql = "SELECT utilisateur_id FROM publications, utilisateurs WHERE pseudo = :pseudo AND utilisateur_id = id_utilisateur";
  $req = $bd->prepare($sql);
  $marqueurs = array('pseudo' => $pseudo);
  $req->execute($marqueurs);
  $result = $req->fetchall();
  $req->closeCursor();
  return count($result);
}
?>
