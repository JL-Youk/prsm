function mimite() {
  // mise a jour de la liste des utilisateurs
  $('#divusers').load('querry_users.php');
}

$( "#tchat" ).children( ".dialogue" ).fadeTo( "slow", 1 );
function charger(){
  var premierID = $('#tchat li:last').attr('id'); // on récupère l'id le plus récent
  var  thread = $("#thread").val();// on recul le nom du thread
  var  crypt = $("#crypt").val();// on recul le nom du thread
  $.ajax({
    url : "charger.php?id=" + premierID + "&thread=" + thread + "&crypt=" + crypt, // on passe l'id le plus récent au fichier de chargement
    type : 'GET',
    success : function(html){
      if(html != ""){
        $('#tchat').append(html);
        $( "#tchat" ).children( ".dialogue" ).fadeTo( "slow", 1 );
        $('body').scrollTop($('body')[0].scrollHeight);
      }
    }
  });
}
var timer = setInterval(mimite, 30000);
var timercharger = setInterval(charger, 3000);

function envoimessage() {
  message = $("#message").val();
  thread = $("#thread").val();
  crypt = $("#crypt").val();
    if(message != ""  && thread != "")
    {
      $.post("upmsg.php",
      {
        message : message,
        thread : thread,
        crypt : crypt
      },
      function(data) {
        $("#message").val("");
        mimite();
        charger();
      }
    );
  }
  else {
    Materialize.toast('Champ de text vide', 4000);
  }
}
$("#envoiMSG").click(function(event){
  envoimessage();
});
$("#btnDiscution").click(function(event){
  ChangeDiscution();
});
$("#btninfo").click(function(event){
  info();
});
$("#btninfo2").click(function(event){
  info();
});
$("#btnshare").click(function(event){
  share();
});
$("#btnshare2").click(function(event){
  share();
});
$("#btnDiscution2").click(function(event){
  ChangeDiscution();
});
$('body').keypress(function(e){
  if( e.which == 13 ){
    envoimessage();
  }
});
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');

function share() {
  swal({
    title: "Partage",
    text: "<a href='https://twitter.com/share'  target='_blank' class='twitter-share-button' data-size='large' data-hashtags='prsm'>Tweet</a>",
    html: true
  });
}
function info() {
  swal({
    title: "Prsm",
    text: "<p>Prsm est un tchat anonyme qui ne garde aucune donnée sur ses utilisateurs et leurs généere des identités aléatoire, sont utilisation est gratuite et illimité.</p><br>Le code source est disponible ici :<br> <a href='https://github.com/JL-Youk/prsm'>github.com/JL-Youk/prsm</a>",
    html: true
  });
}
function resetname() {
  swal({
    title: "Are you sure?",
    text: "Votre identité actuelle sera définitivement modifié",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!",
    closeOnConfirm: false
  },
  function(){
    window.location.replace("reset.php");
    swal("Deleted!", "identité effacé.", "success");
  });
}
$("#newid").click(function() {
  resetname();
});
$("#newid2").click(function() {
  resetname();
});
