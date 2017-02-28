<?php
session_start();
include_once 'config.php';
if(!empty($_GET['id'])){
  if(isset($_GET['thread'])){
    $id_thread = htmlspecialchars($_GET['thread'], ENT_QUOTES);
    $id_crypt = htmlspecialchars($_GET['crypt'], ENT_QUOTES);
  }
  else {
    $id_thread = "world";
    $id_crypt = "";
  }
  $id = htmlspecialchars($_GET['id'], ENT_QUOTES);
  if ($id == "undefined") {
    $id = 1;
  }
  include_once 'decryptage.php';

  $datelast10min = (strtotime(date("d-m-Y H:i:s"))) - 600;
  $requete_donnees_messages = $base->prepare("SELECT id, userCouleur, userVal, contenu, userNom FROM prsm_msgs WHERE thread = '$id_thread' AND id > $id AND datemsg > $datelast10min");
  if ($requete_donnees_messages->execute()) {
    $message = null;
    while( $donnees_messages = $requete_donnees_messages->fetch() ){
      $message .= "<li id='".$donnees_messages['id']."' class='waves-effect ".$donnees_messages['userCouleur']." ".$donnees_messages['userVal']."  white-text dialogue'>";
      $maChaineDecrypter = f_decrypt($id_crypt.$clefPrsm,  $donnees_messages['contenu']);
      $message .= $maChaineDecrypter;
      $message .= "<div class='right-align grey-text text-lighten-2 signature'>".$donnees_messages['userNom']."</div>";
      $message .= "</li>";
    }
    echo $message;
  }
}
?>
