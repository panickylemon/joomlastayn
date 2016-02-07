//вместо доллара ставим jQuery

jQuery(document).ready(function($){

    $(".burger_menu").click(function() {
        $(".nav_mobile").slideToggle("slow");
        $(".burger_menu").hide();
        $(".burger_menu_close").show();
    });
    $(".burger_menu_close").click(function() {
        $(".nav_mobile").slideToggle("slow");
        $(".burger_menu").show();
        $(".burger_menu_close").hide();
    });
});



function windowSize() {
    if (jQuery(window).width() >= '654') {
        jQuery('.burger_menu').hide();
    }
    else  {
        jQuery('.burger_menu').show();
    }
}
jQuery(window).on('load resize', windowSize);


jQuery(window).resize(function(){
    jQuery(".burger_menu_close").hide();
    jQuery(".nav_mobile").hide();
});
// вызовем событие resize
jQuery(window).resize();