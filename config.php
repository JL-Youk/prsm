<?php
date_default_timezone_set('Europe/Paris');
$urlSite =  $_SERVER['HTTP_HOST'];
// ici la seconde partie de la clef de cryptage de votre serveur
$clefPrsm = "§§ù%%!";
try
{
  // ici vos parametre de connexion a votre base de donnée
  $base = new PDO('mysql:host=localhost;dbname=prsm;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}
 ?>
