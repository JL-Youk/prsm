<?php
include_once 'config.php';
if (isset($_POST['lastpulse'])) {
  $date = strtotime(date("d-m-Y H:i:s"));
  $lastpulse = htmlspecialchars($_POST["lastpulse"], ENT_QUOTES);
  $requete_get_pulse = $base->prepare("SELECT id FROM prsm_msgs WHERE pulse > $lastpulse ");
  if ($requete_get_pulse->execute()) {
    echo "<script type='text/javascript'>";
    while( $donnees_get_pulse = $requete_get_pulse->fetch() ){
      echo "$('#".$donnees_get_pulse['id']."').animateCss('animated pulse');";
    }
    echo "var date = ".$date;
    echo "</script>";
  }
}
?>
