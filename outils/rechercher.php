<?php
  if(!isset($_GET['pseudo'])){
    header("Location: ../dashboard.php?redir='null'");
    exit();
  }
  include ("check_pseudo.php");
  check_pseudo($_GET['pseudo']);
  header("Location: ../profil.php?pseudo={$_GET['pseudo']}");
 ?>
