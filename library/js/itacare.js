jQuery(document).ready(function() {

        var controller = jQuery.superscrollorama({
            triggerAtCenter: false,
            playoutAnimations: true
        });


/*    
controller.addTween('.b1', TweenMax.from(jQuery('.b1'),.5,{css:{opacity:.5,left:-20}}),-300,false);
controller.addTween('.b2', TweenMax.from(jQuery('.b2'),.5,{css:{opacity:.5,right:-20}}),-300,false);
controller.addTween('.b3', TweenMax.from(jQuery('.b3'),.5,{css:{opacity:.5,left:-20}}),-300,false);
controller.addTween('.b4', TweenMax.from(jQuery('.b4'),.5,{css:{opacity:.5,right:-20}}),-300,false);


controller.addTween('.bm1', TweenMax.from(jQuery('.bm1'),.5,{css:{left:-20}}),-300,false);
]
*/

jQuery(window).scroll(function(){
    var x = jQuery(this).scrollTop();
jQuery('#slider').css('background-position',parseInt(-x/5)+'px 100%');
});

jQuery(".main-nav").animate({
    opacity: 1
  }, 800 );


});

function myPopup(url) {
window.open( url, "myWindow", "status = 1, height = 500, width = 360, resizable = 0" )
}