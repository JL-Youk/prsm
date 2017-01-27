<?php
  session_start();
  if (isset($_SESSION['connecte'])) {

  } else {
    include_once 'config.php';
    $animaux = array("Agneau", "Aigle", "Albatros", "Alligator", "Anaconda", "Antilope", "Araignée", "Autruche", "Babouin", "Belette", "Bison", "Boeuf", "Bongos", "Bonobo", "Bouquetin");
    $adjectif = array("anonyme", "faché", "adorable", "élégant", "parfait", "plaisant", "propre", "ravissant", "réfléchi", "sombre", "souriant", "timide", "vivace", "amusé", "avare", "calme", "débile", "déterminé", "entraînant", "farfelu", "hésitant ", "loufoque", "plaisant ", "sage", "solitaire", "vilain", "choqué", "débordé", "dérangé", "extatique", "gai");
    $couleurs = array("red", "pink", "purple", "deep-purple", "indigo", "blue", "light-blue", "cyan", "teal", "green", "light-green", "lime", "yellow", "amber", "orange", "deep-orange", "brown");
    $valeurcouleur = array("lighten-1", "lighten-2", "lighten-3");
    $nbAnimaux = count($animaux) - 1;
    $nbCouleurs = count($couleurs) - 1;
    $nbadjectif = count($adjectif) - 1;
    $nbValeurcouleur = count($valeurcouleur) - 1;
    date_default_timezone_set('Europe/Paris');
    $dateentrée = strtotime(date("d-m-Y H:i"));
    //echo count($animaux)*count($couleurs)*count($valeurcouleur)." possibilées differentes!";

    $_SESSION['userIdUnique'] = $userIdUnique = $random_digit1=rand(000,999).$dateentrée;
    $_SESSION['userNom'] = $userNom = $animaux[rand(0,$nbAnimaux)]." ".$adjectif[rand(0,$nbadjectif)];
    $_SESSION['userCouleur'] = $userCouleur = $couleurs[rand(0,$nbCouleurs)];
    $_SESSION['userVal'] = $userVal = $valeurcouleur[rand(0,$nbValeurcouleur)];
    $_SESSION['connecte'] = true;

    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO prsm_users (idunique, nom, colors, colorsnb, lastconnect)
    VALUES ('$userIdUnique', '$userNom', '$userCouleur', '$userVal', '$dateentrée')";
    $base->exec($sql);
  }
 ?>
