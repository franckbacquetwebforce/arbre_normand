$("#contact_us").on("submit", function(e) {

  e.preventDefault();
  var form = $('#contact_us');
  // var action = $('#contact_us').attr('action');


  $('#error_name').empty();
  $('#error_mail').empty();
  $('#subject_contact').empty();
  $('#error_message').empty();

  $.ajax({

    method: 'POST',
    url: form.attr('action'),
    data: form.serialize(),

    success: function(response) {
      if (response.success) {
  
        $('#success').append("Bien joué");
      } else {
        if (response.error) {
          if (response.error.nameContact != null) {
            $('#error_name').html(response.error.nameContact);
          };

          if (response.error.mailContact != null) {
            $('#error_mail').html(response.error.mailContact);
          };

          if (response.error.subjectContact != null) {
            $('#subject_contact').html(response.error.subjectContact);
          };

          if (response.error.messageContact != null) {
            $('#error_message').html(response.error.messageContact);
          };

        }
      }
    }

  });
});
