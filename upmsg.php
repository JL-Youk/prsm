<?php
include_once 'config.php';
session_start();
if (isset($_SESSION['connecte'])){
    $userIdUnique = $_SESSION["userIdUnique"];
    $userNom = $_SESSION["userNom"];
    $userCouleur = $_SESSION["userCouleur"];
    $userVal = $_SESSION["userVal"];
    $message = htmlspecialchars($_POST["message"], ENT_QUOTES);
    date_default_timezone_set('Europe/Paris');
    $dateentrée = strtotime(date("d-m-Y H:i:s"));

    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO prsm_msgs (contenu, userIdUnique, userNom, userCouleur, userVal, datemsg)
    VALUES ('$message', '$userIdUnique', '$userNom', '$userCouleur', '$userVal', '$dateentrée')";
    $base->exec($sql);

    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE prsm_users SET
    lastconnect = '$dateentrée'
    WHERE idunique = '$userIdUnique'";
    $base->exec($sql);
}

 ?>
