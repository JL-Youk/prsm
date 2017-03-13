$(document).ready(function(){
  execptPulseID = 0;
  execptPulseTime = 0;
  //Fare apparaitre les dialogues
  $( "#tchat" ).children( ".dialogue" ).fadeTo( "slow", 1 );
  function mimite() {
    // mise a jour de la liste des utilisateurs
    $('#divusers').load('querry_users.php');
    $('#divusersnav').load('querry_users.php');
  }
  function charger(){
    var premierID = $('#tchat li:last').attr('id'); // on récupère l'id le plus récent
    var  thread = $("#thread").val();// on recup le nom du thread
    var  crypt = $("#crypt").val();// on recup le mot de cryptage
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
        // mimite();
        // charger();
      }
    );
  }
  else {
    Materialize.toast('Champ de text vide', 4000);
  }
}
// Gestion du menu
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
$("#newid").click(function() {
  resetname();
});
$("#newid2").click(function() {
  resetname();
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
    text: "<p>Prsm est un tchat anonyme qui ne garde aucune donnée sur ses utilisateurs et leurs génére des identités aléatoire, sont utilisation est gratuite et illimité.</p><br>Le code source est disponible ici :<br> <a href='https://github.com/JL-Youk/prsm'>github.com/JL-Youk/prsm</a>",
    html: true
  });
}
function resetname() {
  swal({
    title: "Tu es sûr?",
    text: "Votre identité actuelle sera définitivement suprimé",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Oui, je suprime!",
    cancelButtonText: "Non!",
    closeOnConfirm: false
  },
  function(){
    window.location.replace("reset.php");
    swal("Suprimé!", "identité effacé.", "success");
  });
}
// fonction d'animation du click sur les messages
$.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
    }
});
// fonction qui chercher les dernieres pulsation en fonction d'une date
function getpulse(lastpulse){
  $.post("getpulse.php",
		{
			lastpulse : lastpulse,
			execptPulseTime : execptPulseTime
		},
		function(data) {
      $("#response-div").html(data);
      $("#response-div").find("script").each(function(i) {
      eval($(this).text());
       });
		}
	);
};
// la fonction pulse, appelle une page qui met a jour la date vers le message correspondant a l'id
function pulse(id){
  $.post("pulse.php",
    {
			id : id
		},
    function(data) {
      execptPulseTime = data;
    }
	);
};
// Evenement lorceque un utilisateur clique sur un message
$('#tchat').on('click','li', function() {
  $(this).animateCss('animated pulseIn');
  id = $(this).attr('id');
  pulse(id);
 }
);
 // les timers
 function funcgetpulse() {
   getpulse(date);
 }
 var timer = setInterval(mimite, 20000);
 var timercharger = setInterval(charger, 1000);
 var timergetpulse = setInterval(funcgetpulse, 1000);
});
