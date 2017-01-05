$("#contact_us").on("submit", function(e) {

  e.preventDefault();
  var form = $('#contact_us');
  // var action = $('#contact_us').attr('action');


  $('#error_name').empty();
  $('#error_mail').empty();
  $('#error_subject').empty();
  $('#error_message').empty();

  $.ajax({
    method: 'POST',
    url: form.attr('action'),
    data: form.serialize(),

    success: function(response) {
      if (response.success) {
        console.log('coucou');
        $('#success').append("<strong>Merci !</strong> Votre email a bien été envoyé.");
        document.location = form.attr('alt');
      } else {
        if (response.error) {
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
