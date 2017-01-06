// Hermelen
// sticky navbar
$(window).scroll(function() {
if ($(this).scrollTop() < 425){
    $('.navbar-default').removeClass("sticky");
    $('.menu_right').removeClass("sticky");
  }
  else{
    $('.navbar-default').addClass("sticky");
    $('.menu_right').addClass("sticky");
  }
});
