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
    url: form.attr('contact_action'),
    data: form.serialize(),

    success: function(response) {
      // console.log(response.error);
      console.log(response.test);
      if (response.success) {
        // console.log(response);
        $('#success').append("Bien joué");
        // $('#contact_us').fadeOut();
      } else if (response.error) {

          console.log(response);
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


  });
});
