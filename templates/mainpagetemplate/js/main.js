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

    $("#inputName").inputmask("Regex");
    $("#inputPhone").inputmask("Regex");

});


function windowSize() {

    if (jQuery(window).width() >= '770') {
        jQuery('.odcat').show();
    }

    if (jQuery(window).width() >= '654') {
        jQuery('.burger_menu').hide();
    }
    else {
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




jQuery(document).ready(function($){
    if (!$(".sorting_wrapper").length) {
        $(".link_all_filters_display").hide();
    }

    $(".link_all_categories_display").click(function() {
        $(".odcat").slideToggle("fast");
        $(".sorting_wrapper").hide();
    });

    $(".link_all_filters_display").click(function() {
        $(".sorting_wrapper").slideToggle("fast");
        $(".odcat").hide();
    });


    $("form[name=product]").submit(function () {
        var select = $("[id^='jshop_attr_id']");
        var stop_submit = false;
        if (select.length) {
            select.each(function() {
                if ($(this).val() == 0) {
                    $(this).addClass('red_border');
                    stop_submit = true;
                } else {
                    $(this).removeClass('red_border');
                }
            });
        }
        if (stop_submit) {
            $(".hidden_alert_error").show();
            return false
        }
    });

    $("[id^='jshop_attr_id']").click(function() {
        $("[id^='jshop_attr_id']").removeClass('red_border');
    })

});

