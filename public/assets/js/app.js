// Hermelen
// sticky navbar
// $(window).scroll(function() {
// if ($(this).scrollTop() < $("#logo_slider").height()){
//     $('.navbar-default').removeClass("sticky");
//     $('.menu_right').removeClass("sticky");
//   }
//   else{
//     $('.navbar-default').addClass("sticky");
//     $('.menu_right').addClass("sticky");
//   }
// });

$(window).scroll(function() {
if ($(this).scrollTop() < $("#logo_slider").height()){
    $('.navbar-default').removeClass("sticky");
    $('.menu_right').removeClass("sticky");
  }
  else{
    $('.navbar-default').addClass("sticky");
    $('#menu_left_container').removeChild(".menu_right");
  }
});

//logo
//MODIF HER
TweenLite.set("#container",{perspective:600})
TweenLite.set("#container>img",{xPercent:"-50%",yPercent:"-50%"})

var total = 30;

// var warp = document.getElementById("container"),	w = document.getElementById("logo_slider").style.width , h = window.innerHeight;
var warp = document.getElementById("container"),	w = $("#logo_slider").width()/4 , h = window.innerHeight;

 for (i=0; i<total; i++){
   var Div = document.createElement('div');
   TweenLite.set(Div,{attr:{class:'dot'},x:R(0,w),y:R(-200,-150),z:R(-200,200)});
   warp.appendChild(Div);
   animm(Div);
 }

 function animm(elm){
   TweenMax.to(elm,R(6,15),{y:h+100,ease:Linear.easeNone,repeat:-1,delay:-15});
   TweenMax.to(elm,R(4,8),{x:'+=100',rotationZ:R(0,180),repeat:-1,yoyo:true,ease:Sine.easeInOut});
   TweenMax.to(elm,R(2,8),{rotationX:R(0,360),rotationY:R(0,360),repeat:-1,yoyo:true,ease:Sine.easeInOut,delay:-5});
 };

function R(min,max) {return min+Math.random()*(max-min)};


//navbar active
/////////////////////////////////Franck///////////////////
function openDoor(field) {
            var y = $(field).find(".thumb");
            var x = y.attr("class");
            if (y.hasClass("thumbOpened")) {
                y.removeClass("thumbOpened");
            }
            else {
                $(".thumb").removeClass("thumbOpened");
                y.addClass("thumbOpened");
            }
        }
