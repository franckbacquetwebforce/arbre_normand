$("#contact_us").on("submit", function(e) {
  e.preventDefault();
  var pseudo = $('#nameContact').val();
  var email = $('#mailContact').val();
  var subjectContact = $('#subjectContact').val();
  var messageContact = $('#messageContact').val();

  $('#error_name').empty();
  $('#error_mail').empty();
  $('#subject_contact').empty();
  $('#error_message').empty();

  $.ajax({

    method: 'POST',
    url: 'contact',
    data: {
      nameContact: nameContact,
      mailContact: mailContact,
      subjectContact: subjectContact,
      messageContact: messageContact,
    },

    success: function(response) {
      if (response.success) {
        $('#success_inscription').append("Bien joué");
        document.location.href="contact";
      } else {
        if (response.error) {
          if (response.error.nameContact != null) {
            $('#error_name').prepend(response.error.nameContact);
          };

          if (response.error.mailContact != null) {
            $('#error_mail').prepend(response.error.mailContact);
          };

          if (response.error.subjectContact != null) {
            $('#subject_contact').prepend(response.error.subjectContact);
          };

          if (response.error.messageContact != null) {
            $('#error_message').prepend(response.error.messageContact);
          };
        }
      }
    }

  });
});
