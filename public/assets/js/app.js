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

<a href="cart.php?action=ajout&amp;l=LIBELLEPRODUIT&amp;q=QUANTITEPRODUIT&amp;p=PRIXPRODUIT" onclick="window.open(this.href, '',
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Ajouter au panier</a>
