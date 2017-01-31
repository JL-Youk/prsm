<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <meta charset="utf-8">
  <title>Prsm</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <?php
  include_once 'utilisateur.php';
   ?>
   <div class="">
     <nav class="grey darken-4 white-text" role="navigation">
       <div class="nav-wrapper container "><span class="titre_menu">PRSM</span > [BETA]<a id="logo-container" href="#" class="brand-logo"></a>
         <ul class="right hide-on-med-and-down">
           <li class="<?php echo $_SESSION['userCouleur'] ?> <?php echo $_SESSION['userVal'] ?>"><a href="#"><?php echo $_SESSION['userNom'] ?></a></li>
           <li><a id="newid" href="#">Nouvelle identitée</a></li>
         </ul>
         <ul id="nav-mobile" class="side-nav">
           <li class="<?php echo $_SESSION['userCouleur'] ?> <?php echo $_SESSION['userVal'] ?>"><a style="color: white;" href="#"><?php echo $_SESSION['userNom'] ?></a></li>
           <li><a id="newid2" href="#">Générer une nouvelle identitée</a></li>
           <ul class="collection" id="divusers">
             <?php
             include "querry_users.php";
             ?>
           </ul>
         </ul>
         <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons teal-text text-darken-1">menu</i></a>
       </div>
     </nav>
   </div>
  <div class="row">
    <div class="col l3 hide-on-med-and-down">
      <ul class="collection liste_users" id="divusers">
        <?php
        include "querry_users.php";
         ?>
      </ul>
    </div>
    <div class="col l9 m12 s12">
      <!-- TCHAT -->
      <div class="row">
        <ul class="fenetre_dialogue" id="tchat">
          <?php include_once 'querry_msgs.php'; ?>
        </ul>
      </div>
      <!-- FIN TCHAT -->
      <!-- TEXT -->
      <div class="fenetre_texte">
        <div class="row">
          <div class="col s10">
            <input type="text" id="message" name="text" placeholder="Envoyer un message">
          </div>
          <div class="col s2">
            <button class="btn waves-effect waves-light" id="envoiMSG"  type="submit" name="action">Envoi
              <i class="material-icons right">send</i>
            </button>
          </div>
        </div>
      </div>
      <!-- FIN TEXT -->
    </div>
  </div>
  <!-- <footer class="page-footer  grey darken-4 white-text">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Prsm</h5>
          <p class="grey-text text-lighten-4">Copyright © 2017 Prsm. Tous droits réservés.</p>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="https://frompixel.com">Frompixel</a>
      </div>
    </div>
  </footer> -->
  <!--  Scripts-->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <script src="js/init.js"></script>
  <script src="js/main.js"></script>
  <script type="text/javascript">
    swal("Salut <?php echo $_SESSION['userNom'] ?>", "=)");
  </script>
  <!-- __________________________________________________
________________░▓█▓█▓▓▓▓█▓▓▒░____________________
_______________▒█▓▓▓█████████▓▓▓▒_________________
______________▓██▓██████▓▓▓▓▓▓▓▓▓▓░_______________
_____________▒▓██████▓▓▓▓▓▒▒░░░░░▒▓▓______________
_____________▓▓▓▓▓▓▓▓▒▒▒▒▒░__░░░▒▒▓█▓░____________
____________░▓▒▒▒▒▒▒▒▒▒▒░░░░░░░░░▒▓███░___________
____________▒▓▒▒▒▒▒▒▒▒░░░░░░░░░▒▒▒▒▓██▒___________
____________▒▒▒▒▒▒▒▒▒▒░░░░░░▒▒▒▒▒▒▓▓███___________
___________░▒▒▒▒▒▒▒▒▒░░░░░░▒▒▒▒▒▒▓▓▓███░__________
___________░▒▒▒▒▒▒▒▒▒░░░░░░▒▒▒▒▒▒▓▓▓███▒__________
___________░▒▒▒░▒▒▒▒░░░░░░▒▒▒▒▒▒▓▓▓████▒__________
___________▒▒▒▒░░░░░░░░░░░▒▒▒▒▒▒▓▓▓████▒__________
___________▒▒▒▒░░░░░░░░░░░▒▒▒▒▒▒▒▓▓███▓▒__________
___________▓▓▓▓▒▒░░░▒▒▓▓▓█▓▓▒▒▒▒▒▓▓█▓▓█▓__________
___________▓████▓▒░░▒▓▓▓▒▒▒▒▒▒▒▒▒▓▓████▒__________
___________▓▓▒▒▒▓▓▒░░▒▒▓▓▓▒▒▓▓▒▒▒▓▓███▓▓░_________
___________▓██▓▒▓▓▒░░▒▒▓▓█▓▓▓▒▒▒▒▒▓▓█▓▓▓▒_________
___________▒▓▓▓▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▓██▓▓▓▒_________
___________▒▓▓▒▒▒▒▒▒▒▒▒▒▒░░░▒░▒▒▒▒▓███▓▓▒_________
___________▒▒▒▒▒▒▒░░▒▒▒░░░░░░░▒▒▒▒▓███▓▓░_________
___________▒▒▒▒▒▒▒▒▒▒▒▒▒░░░░░▒▒▒▒▓▓██▓▒▒__________
___________▒▒▒▒▒▓█▓▓▓▓▓▒░░░░▒▒▒▒▒▓▓▓█▓▒░__________
___________▒▒▒▒▒███████▓▓▒░░▒▒▒▒▓▓▓▓▓▒▒___________
___________░▒▒▒██████████▓▒▒▒▒▒▒▓▓▓▓▓▓░___________
____________▒▒████▓▒▓▓▓▓██▓▒▒▒▒▒▓▓▓▓▓_____________
____________▒▒██████████▓▓▓▒▒▒▒▓▓▓▓▓█▓▒___________
____________░▒▓▓▓▒▒▒▒▒▒▒▒▒▒▒▒▒▒▓▓▓▓▓████▒░________
____________░▓▓▓▓▒▒▒▒▒▒▒▒▒▒▒▒▒▓▓▓▓▓█▓▓▓▓▓▒░_______
__________░▒▒▓▓▓▒▒▒▒▒▒▒▒▒▒▒▒▒▒▓▓▓▓█▓▓▓▓▓▓▒░░______
░_░░░░_░░░░▒▓▓▓▓▒▒▒▒▒▒▒▒▒▒▒▒▒▓▓▓▓█▓▓▓▓█▓▓░▒░______
__░░░░░░░░▒▒▓█▓▓▒▒▒▒▒▒▒▒▒▓▓▓▓▓▓▓█▓▓▓▓▓▓▓░▒▒░_░░___
░░░░░░░░░▒▒▓█▒█▓▓▒▒▒▒▒▒▓▓▓▓▓▓▓██▓▓▓▓▓▓▓▒▒▒░░▒▒____
░░░░░▒▒▒▒▒▒▓▓▓███▓▓▓▓▓▓▓▓▓▓▓▓█▓▓▓▓▓▓▓▓▒▒▒▒░▒▒░░░__
░░▒▒▒▒▒▒▒▒▓▓▓▓▓██▓▓▓▓▓▓▓▓▓▓██▓▓▓▓▓▓▓▓▒▓▒▒▒▒▒▒░░░░░
▒░▒▒▒▒▒▒▒▒▒▓▓▓▓▓███▓▓▓▓▓███▓▓▓▓▓▓▓▓▒▒▒▒▒▒▒▒▒░░░░░░
▒▒▒▒▒▒▒▒▒▒▒▓▓▓▒▓▓███▓████▓▓▓▓▓▓▓▓▓▒▒▒▒▒▒▒▓▒▒░░░░░░ -->
  </body>
</html>
