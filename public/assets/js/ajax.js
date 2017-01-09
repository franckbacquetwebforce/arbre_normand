$("#contact_us").on("submit", function(e) {
  e.preventDefault();
  $("#form_contact").addClass('hidden');//au submit, on cache le formulaire
  $("#wait_send").addClass('loader_contact');// au submit, on affiche le loader

  $('#error_name').empty();//on vide les span d'erreur par précaution
  $('#error_mail').empty();
  $('#error_subject').empty();
  $('#error_message').empty();
  // var form = $('#contact_us');
  var form = $(this);
  var url = form.attr('action');//on recupère la route contenue dans 'action du form'
  var data =  form.serialize();//serialise recupère les values des input du form sous forme de string
  data += '&isAjax=true';//on ajoute par concaténation isAjax=true au tableau data
  console.log(data);
  $.ajax({
    url: url,//on recupère var url
    method: 'POST',
    data: data,//data = serialize + isAjax=true
    success: function(response) {
console.log('response');
      if (response.success) {
        console.log('success');
        $("#wait_send").removeClass('loader_contact');//si pas d'erreur à la fin de l'envoi on supprime le loader
        $('#success').append("<strong>Merci !</strong> Votre email a bien été envoyé.");//si pas d'erreur à la fin de l'envoi on affiche message
      } else {
        console.log('echec');
        $("#form_contact").removeClass('hidden');//si erreur on re-affiche le formulaire avec les erreurs
        if (response.error) {
          $("#wait_send").removeClass('loader_contact');
          if (response.error.nameContact != null) {
            $('#error_name').html(response.error.nameContact);
          };
          if (response.error.mailContact != null) {
            $('#error_mail').html(response.error.mailContact);
          };
          if (response.error.subjectContact != null) {
            $('#error_subject').html(response.error.subjectContact);
          };
          if (response.error.messageContact != null) {
            $('#error_message').html(response.error.messageContact);
          };
        }
      }
    }

  });
});
// $(".addtocart").on("submit", function(e){
//   console.log('coucou');
//   e.preventDefault();
//   var url = $('#addtocart').attr('href');
//   $.ajax({
//     url: url,
//     success: function(success){
//       if(success='true'){
//
//     }
//   }
// })
// })
