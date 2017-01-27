function mimite() {
  // mise a jour de la liste des utilisateurs
  $('#divusers').load('querry_users.php');
}

$( "#tchat" ).children( ".dialogue" ).fadeTo( "slow", 1 );
function charger(){
  var premierID = $('#tchat li:last').attr('id'); // on récupère l'id le plus récent
  console.log(premierID);
  $.ajax({
    url : "charger.php?id=" + premierID, // on passe l'id le plus récent au fichier de chargement
    type : 'GET',
    success : function(html){
      if(html != ""){
        $('#tchat').append(html);
        $( "#tchat" ).children( ".dialogue" ).fadeTo( "slow", 1 );
        $('#tchat').scrollTop($('#tchat')[0].scrollHeight);
      }
    }
  });
}

var timer = setInterval(mimite, 30000);
var timercharger = setInterval(charger, 3000);

function envoimessage() {
  message = $("#message").val();
    if(message != "")
    {
      $.post("upmsg.php",
      {
        message : message
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

$('body').keypress(function(e){
  if( e.which == 13 ){
    envoimessage();
  }
});
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
