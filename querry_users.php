<?php
include_once 'config.php';
date_default_timezone_set('Europe/Paris');
$dateentrée = strtotime(date("d-m-Y H:i:s")) - 500;
$requete_donnees_utilisateurs = $base->query("SELECT * FROM prsm_users WHERE lastconnect > '$dateentrée'");
$requete_donnees_utilisateurs->setFetchMode(PDO::FETCH_OBJ);
while( $donnees_utilisateurs = $requete_donnees_utilisateurs->fetch() )
{
  ?>
  <li class="collection-item avatar">
    <i class="material-icons circle <?php echo $donnees_utilisateurs->colors ?> <?php echo $donnees_utilisateurs->colorsnb ?>">pets</i>
    <span class="title"><?php echo $donnees_utilisateurs->nom ?></span>
    <?php
    $nbsecondeconnect =  500 - ($donnees_utilisateurs->lastconnect - $dateentrée);
    if ($nbsecondeconnect < 30) {
      $resultat_lastco = "il y a quelques secondes";
    }
    elseif ($nbsecondeconnect < 60) {
      $resultat_lastco = "il y a 1 minute";
    }
    elseif ($nbsecondeconnect < 120) {
      $resultat_lastco = "il y a 2 minutes";
    }
    elseif ($nbsecondeconnect < 180) {
      $resultat_lastco = "il y a 3 minutes";
    }
    elseif ($nbsecondeconnect < 240) {
      $resultat_lastco = "il y a 4 minutes";
    }
    elseif ($nbsecondeconnect < 300) {
      $resultat_lastco = "il y a 5 minutes";
    }
    else {
      $resultat_lastco = "il y a plus de 5 minutes";
    }
     ?>
    <p class="grey-text">Actif il y a <?php echo $resultat_lastco ?></p>
  </li>
  <?php
}
 ?>
