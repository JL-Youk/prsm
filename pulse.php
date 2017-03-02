<?php
include_once 'config.php';
if (isset($_POST['id'])) {
  $id = htmlspecialchars($_POST["id"], ENT_QUOTES);
  $date = strtotime(date("d-m-Y H:i:s"));
  // preparation querry
  $sql = "UPDATE prsm_msgs SET pulse = :datepulse
  WHERE id = :id";
  $stmt = $base->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_STR);
  $stmt->bindParam(':datepulse', $date, PDO::PARAM_STR);
  $stmt->execute();
}
 ?>
