<?php
function get_nbr_rep($id_publication){
  include (__DIR__ .'/../config/bdd.php');
  $sql = "SELECT id_publication FROM publications WHERE rep_id = :id_publication";
  $req = $bd->prepare($sql);
  $marqueurs = array('id_publication' => $id_publication);
  $req->execute($marqueurs);
  $result = $req->fetchall();
  $req->closeCursor();
  return count($result);
}
?>
