<?php
date_default_timezone_set('Europe/Paris');
$urlSite =  $_SERVER['HTTP_HOST'];
try
{
  $base = new PDO('mysql:host=localhost;dbname=prsm;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}
 ?>
