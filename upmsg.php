<?php
include_once 'config.php';
session_start();
if (isset($_SESSION['connecte'])){
    $userIdUnique = htmlspecialchars($_SESSION["userIdUnique"], ENT_QUOTES);
    $userNom = htmlspecialchars($_SESSION["userNom"], ENT_QUOTES);
    $userCouleur = htmlspecialchars($_SESSION["userCouleur"], ENT_QUOTES);
    $userVal = htmlspecialchars($_SESSION["userVal"], ENT_QUOTES);
    $message = htmlspecialchars($_POST["message"], ENT_QUOTES);
    $dateentrée = strtotime(date("d-m-Y H:i:s"));

    //Update des messages en bdd
    $stmt = $base->prepare("INSERT INTO prsm_msgs  (contenu, userIdUnique, userNom, userCouleur, userVal, datemsg) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $datacontenu);
    $stmt->bindParam(2, $datauserIdUnique);
    $stmt->bindParam(3, $datauserNom);
    $stmt->bindParam(4, $datauserCouleur);
    $stmt->bindParam(5, $datauserVal);
    $stmt->bindParam(6, $datadatemsg);
    // insertion d'une ligne
    $datacontenu = $message;
    $datauserIdUnique = $userIdUnique;
    $datauserNom = $userNom;
    $datauserCouleur = $userCouleur;
    $datauserVal = $userVal;
    $datadatemsg = $dateentrée;
    $stmt->execute();
    
    //Update de la liste des utilisateurs
    $stmt = $base->prepare("INSERT INTO prsm_users (lastconnect) VALUES (?) WHERE idunique = '$userIdUnique'");
    $stmt->bindParam(1, $datacontenu);
    // insertion d'une ligne
    $datadateentrée = $dateentrée;
    $stmt->execute();
}
 ?>
