<?php
include_once 'config.php';
date_default_timezone_set('Europe/Paris');
$datelast10min = (strtotime(date("d-m-Y H:i:s"))) - 600;
$requete_donnees_messages = $base->query("SELECT * FROM prsm_msgs WHERE datemsg > $datelast10min");
$requete_donnees_messages->setFetchMode(PDO::FETCH_OBJ);
while( $donnees_messages = $requete_donnees_messages->fetch() )
{
  ?>
  <li id="<?php echo $donnees_messages->id ?>" class="<?php echo $donnees_messages->userCouleur." ".$donnees_messages->userVal ?> white-text dialogue">
    <?php echo htmlspecialchars_decode($donnees_messages->contenu, ENT_NOQUOTES); ?>
    <div class="right-align grey-text text-lighten-2 signature">
      <?php echo $donnees_messages->userNom ?>
    </div>
  </li>
  <?php
}
?>
