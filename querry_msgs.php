<?php
include_once 'config.php';
include_once 'decryptage.php';
$datelast10min = (strtotime(date("d-m-Y H:i:s"))) - 600;
$requete_donnees_messages = $base->prepare("SELECT * FROM prsm_msgs WHERE datemsg > $datelast10min AND thread = '$id_thread'");
if ($requete_donnees_messages->execute()) {
  while( $donnees_messages = $requete_donnees_messages->fetch() )
  {
    ?>
    <li id="<?php echo $donnees_messages['id'] ?>" class="<?php echo $donnees_messages['userCouleur']." ".$donnees_messages['userVal'] ?> white-text dialogue">
      <?php
       $messages = htmlspecialchars_decode($donnees_messages['contenu'], ENT_NOQUOTES);
       $maChaineDecrypter = f_decrypt($id_crypt,  $messages);
       echo $maChaineDecrypter;
       ?>
      <div class="right-align grey-text text-lighten-2 signature">
        <?php echo $donnees_messages['userNom'] ?>
      </div>
    </li>
    <?php
  }
}
?>
