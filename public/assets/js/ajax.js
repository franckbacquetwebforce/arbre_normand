// flash button

  (function($) {
    $.fn.flash_message = function(content, delay) {
      return $(this).each(function() {
        if( $(this).parent().find('.flash_message').get(0) )
          return;
        var message = $(
        content
        ).hide().fadeIn('fast');

        $(this)['before'](message);

        message.delay(delay).fadeOut('fast', function() {
          $(this).remove();
        });

      });
    };
})(jQuery);


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
  $.ajax({
    url: url,//on recupère var url
    method: 'POST',
    data: data,//data = serialize + isAjax=true
    success: function(response) {
      if (response.success) {
        console.log('success');
        $("#wait_send").removeClass('loader_contact');//si pas d'erreur à la fin de l'envoi on supprime le loader
        $('#success').append("<strong>Merci !</strong> Votre email a bien été envoyé.");//si pas d'erreur à la fin de l'envoi on affiche message
      } else {
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

divs  = $('.count');
for(ind in divs){
  div = divs[ind];
}
function generate_handler_plus(l) {
  return function(e) {
    e.preventDefault();
    $('.cart_content').empty();
    $('#qt_product_ajax_'+l).empty();
    $('#tot_price_product_ajax_'+l).empty();
    $('#totalTTC').empty();
    $('error_ajax').empty();
    var url = $(this).attr('href');
    $.ajax({
      url: url,
      method: 'GET',
      success: function(response){
        $('.cart_content').append("("+response.total_qt_product+")");
        var stock=response.stock;
        $('#qt_product_ajax_'+l).append(response.qt_product);
        $('#tot_price_product_ajax_'+l).append(response.total_price_product);
        $("#totalTTC").append(response.total);
        if(response.error == "1 article ajouté au panier"){
          var contentStockBis = '<span class="alert_cart">'+response.error+'</span><br/>';
          $("#error_ajax").flash_message(contentStockBis, 500);
        } else {
        var contentNoStock = '<a href="../contact"><span class="alert_cart_stock">'+response.error+'</span><br/></a>';
        $("#error_ajax").flash_message(contentNoStock, 3000);
        }
      }
    })
  };
}
for (k = 0; k < divs.length; k++) {
  var plus_='.plus_'+k;
  $(plus_).click(generate_handler_plus(k) );
}

divs  = $('.count')
for(ind in divs){
  div = divs[ind];
}
function generate_handler_moins(j){
  return function(e) {
    e.preventDefault();
    $('.cart_content').empty();
    $('#qt_product_ajax_'+j).empty();
    $('#tot_price_product_ajax_'+j).empty();
    $("#totalTTC").empty();
    $('error_ajax').empty();
    var url = $(this).attr('href');
    $.ajax({
      url: url,
      method: 'GET',
      success: function(response){
        var stock=response.stock;
        var cart_art=response.qt_product;
        $('#qt_product_ajax_'+j).append(response.qt_product);
        $('#tot_price_product_ajax_'+j).append(response.total_price_product);
        $("#totalTTC").append(response.total);
        if((cart_art >= 1)){
          var retrait = '<span class="alert_cart">'+response.error+'</span><br/>';
          $("#error_ajax").flash_message(retrait, 500);
          $('.cart_content').append("("+response.total_qt_product+")");
        }else{
          var erreur = '<a href="../contact"><span class="alert_cart_stock">Produit supprimé du panier</span><br/></a>';
          $("#error_ajax").flash_message(erreur, 3000);
          $('.count_'+j).addClass("hidden");
        }
      }
    })
  };
}
for (i = 0; i < divs.length; i++) {
  var moins_='.moins_'+i;
  $(moins_).click( generate_handler_moins( i ) );
}

$(".addtocart").click(function(e) {
  e.preventDefault();
  $('.cart_content').empty();
  var url = $('#addtocart').attr('href');
  $.ajax({
    url: url,
    method: 'GET',
    success: function(response){
      $('.cart_content').append("("+response.total_qt_product+")");
      if(response.stock > response.qt){
        var ajout_single = '<a href="../contact"><span class="alert_cart_single">'+response.error+'</span><br/></a>';
        $("#error_ajax").flash_message(ajout_single, 1000);
      }else{
        $('.addtocart').addClass('hidden');
        $('.singlecard').append('<p id="specialorder" class="button no-stock"><a class="btn btn-danger" title="">Quantité maximale atteinte</a></p>')
      };
    }
  });
});
