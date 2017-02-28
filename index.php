<!DOCTYPE html>
<html lang="fr">
<?php
if (isset($_GET['thread'])) {
  $welcome = false;
  $id_thread = htmlspecialchars($_GET['thread'], ENT_QUOTES);
}
else {
  $welcome = true;
  $id_thread = "Prsm";
}
if (isset($_GET['crypt'])) {
  $id_crypt = htmlspecialchars($_GET['crypt'], ENT_QUOTES);
}
else {
  $id_crypt = "";
}
 ?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <meta charset="utf-8">
  <title><?php echo $id_thread."-Prsm" ?></title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/animate.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<!--
.-------------------.
|                   |
|                   |
|  P A R E N T A L  |
|                   |
|  A D V I S O R Y  |
|                   |
|                   |
| explicit  content |
|                   |
`-------------------'
-->
<body>
  <?php
  include_once 'utilisateur.php';
    ?>
   <div class="navbar-fixed">
     <nav class="grey darken-4 white-text" role="navigation">
       <div class="nav-wrapper container "><a href="index.php"><span class="titre_menu">PRSM</span></a><?php echo "[".$id_thread."]" ?><a id="logo-container" href="#" class="brand-logo"></a>
         <ul class="right hide-on-med-and-down">
           <li class="<?php echo $_SESSION['userCouleur'] ?> <?php echo $_SESSION['userVal'] ?>"><a href="#"><?php echo $_SESSION['userNom'] ?></a></li>
           <li><a id="newid" href="#">Nouvelle identitée</a></li>
           <li><a id="btnDiscution" href="#"><i class="material-icons">message</i></a></li>
           <li><a id="btnshare" href="#"><i class="material-icons">share</i></a></li>
           <li><a id="btninfo" href="#"><i class="material-icons">info_outline</i></a></li>
         </ul>
         <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons teal-text text-darken-1">menu</i></a>
       </div>
     </nav>
   </div>
   <ul id="nav-mobile" class="side-nav">
     <li class="<?php echo $_SESSION['userCouleur'] ?> <?php echo $_SESSION['userVal'] ?>"><a style="color: white;" href="#"><?php echo $_SESSION['userNom'] ?></a></li>
     <li><a id="newid2" href="#"><i class="material-icons">autorenew</i>Générer une nouvelle identitée</a></li>
     <li><a id="btnDiscution2" href="#"><i class="material-icons">message</i>Nouvelle discution</a></li>
     <li><a id="btnshare2" href="#"><i class="material-icons">share</i>Partages</a></li>
     <li><a id="btninfo2" href="#"><i class="material-icons">info_outline</i>Informations</a></li>
     <ul class="collection" id="divusers">
       <?php
       include "querry_users.php";
       ?>
     </ul>
   </ul>
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
            <input type="hidden" id="thread" name="thread" value="<?php echo $id_thread ?>">
            <input type="hidden" id="crypt" name="crypt" value="<?php echo $id_crypt ?>">
          </div>
          <div class="col s2">
            <button class="btn waves-effect waves-light" id="envoiMSG"  type="submit" name="action">Envoi
              <i class="material-icons right">send</i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <script src="js/init.js"></script>
  <script src="js/main.js"></script>
  <script type="text/javascript">
  function ChangeDiscution() {
    swal({
      title: "<?php echo 'Salut '.$_SESSION['userNom'] ?>",
      text: "Créer ou rejoint une discution",
      type: "input",
      showCancelButton: true,
      closeOnConfirm: false,
      animation: "slide-from-top",
      inputPlaceholder: "Nom de ta discution"
    },
    function(inputValue){
      if (inputValue === false) return false;
      if (inputValue === "") {
        swal.showInputError("il faut ecrire quelque chose!");
        return false
      }
      var thread = "?thread=" + inputValue;

      // second carton
      swal({
        title: "Une derniere chose",
        text: "la conversation peut etre cryter, ecris la clef si dessous ou laisse la vide si la conversation est public",
        type: "input",
        showCancelButton: true,
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: "Code de cryptage"
      },
      function(inputValue){
        if (inputValue === false) return false;
        if (inputValue === "") {
          var mdp = "";
        }
        var mdp = inputValue;
        var url = thread + "&crypt=" + mdp;
        swal("Niquel!", "tu va etre rediriger vers la discution : " + inputValue, "success");
        setTimeout(function(){
          window.location.replace(url);
        }, 2000);
      });
    });
  }

  </script>
  <?php
  if ($welcome) {
    ?>
    <script type="text/javascript">
      ChangeDiscution();
    </script>
    <?php
  }
   ?>
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
