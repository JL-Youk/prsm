<?php
include_once 'config.php';
// ...
// on se connecte à notre base de données
usleep(5000000);
if(!empty($_GET['id'])){ // on vérifie que l'id est bien présent et pas vide

    $id = (int) $_GET['id']; // on s'assure que c'est un nombre entier

    include_once 'config.php';
    date_default_timezone_set('Europe/Paris');
    $datelast10min = (strtotime(date("d-m-Y H:i:s"))) - 600;
    $requete_donnees_messages = $base->query("SELECT * FROM prsm_msgs WHERE id > $id AND datemsg > $datelast10min");
    $requete_donnees_messages->setFetchMode(PDO::FETCH_OBJ);
    $message = null;
    while( $donnees_messages = $requete_donnees_messages->fetch() )
    {
      $message .= "<li id='".$donnees_messages->id."' class='".$donnees_messages->userCouleur." ".$donnees_messages->userVal." white-text dialogue'>";
      $message .= $donnees_messages->contenu;
      $message .= "<div class='right-align grey-text text-lighten-2 signature'>".$donnees_messages->userNom."</div>";
      $message .= "</li>";
    }
    echo $message;
}
?>
