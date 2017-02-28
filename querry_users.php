<?php
include_once 'config.php';
date_default_timezone_set('Europe/Paris');
$Hour = strtotime(date("d-m-Y H:i:s"));
$LastHour = $Hour - 3600;
$requete_donnees_utilisateurs = $base->prepare("SELECT * FROM prsm_users WHERE lastconnect > '$LastHour'");
if ($requete_donnees_utilisateurs->execute()) {
  while( $donnees_utilisateurs = $requete_donnees_utilisateurs->fetch())
  {
    ?>
    <li class="collection-item avatar">
      <i class="material-icons circle <?php echo $donnees_utilisateurs['colors'] ?> <?php echo $donnees_utilisateurs['colorsnb'] ?>">pets</i>
      <span class="title"><?php echo $donnees_utilisateurs['nom'] ?></span>
      <?php
      $LastCo = $Hour - $donnees_utilisateurs['lastconnect'];
      if ($LastCo < 30) {
        $resultat_lastco = "il y a quelques secondes";
      }
      elseif ($LastCo < 60) {
        $resultat_lastco = "il y a 1 minute";
      }
      elseif ($LastCo < 120) {
        $resultat_lastco = "il y a 2 minutes";
      }
      elseif ($LastCo < 180) {
        $resultat_lastco = "il y a 3 minutes";
      }
      elseif ($LastCo < 240) {
        $resultat_lastco = "il y a 4 minutes";
      }
      elseif ($LastCo < 300) {
        $resultat_lastco = "il y a 5 minutes";
      }
      elseif ($LastCo < 600) {
        $resultat_lastco = "il y a 10 minutes";
      }
      elseif ($LastCo < 1200) {
        $resultat_lastco = "il y a 20 minutes";
      }
      elseif ($LastCo < 1800) {
        $resultat_lastco = "il y a 30 minutes";
      }
      elseif ($LastCo < 2700) {
        $resultat_lastco = "il y a 45 minutes";
      }
      else {
        $resultat_lastco = "il y a une heure";
      }
      ?>
      <p class="grey-text">Actif il y a <?php echo $resultat_lastco ?></p>
    </li>
    <?php
  }
}
?>
