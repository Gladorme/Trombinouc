<?php
 // On check si le visiteur est déjà connecté ou pas, si il n'est pas connecté, on le redirige vers l'acceuil (index.php)
  session_start();
  if(!isset($_SESSION['connect'])){
    header('Location: index.php?redir=noconnect');
    exit();
  }
?>
<!DOCTYPE HTML>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Trombinouc</title>
    <meta name="description" content="Trombinouc est une version simplifiée de Facebook, qui permet d'échanger avec ses amis" />
		<meta name="authors" content="Guillaume LADORME, Kévin SANTACREU, Marwane SHAIM" />
		<meta name="keywords" content="Trombinouc, Mini-Facebook, DUT R&amp;T, Projet PHP" />
		<link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
		<link rel="icon" type="image/png" href="img/logo.png" />
  </head>
  <body>
