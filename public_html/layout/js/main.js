jQuery(document).ready(function ($) {
    $('#slider').royalSlider({
        arrowsNav: true,
        blockLoop: true,
        loop: true,
        keyboardNavEnabled: true,
        controlsInside: true,
        imageScaleMode: 'fill',
        arrowsNavAutoHide: false,
        autoScaleSlider: true,
        autoHeight: false,
        controlNavigation: 'bullets',
        thumbsFitInViewport: false,
        navigateByClick: true,
        startSlideId: 0,
        autoPlay:{
            enabled:true,
            delay: 3000
        },
        transitionType: 'move',
        globalCaption: false,
        deeplinking: {
            enabled: true,
            change: false
        }
    });

    $('#recipes').unitegallery({
        theme_enable_navigation: false
    });

    // LINK TO HASH DIV  - WORKS ON ALL
    $(document).on('click', 'a[href^="#"]', function (e) {
        var id = $(this).attr('href');

        var $id = $(id);
        if ($id.length === 0) {
            return;
        }

        e.preventDefault();

        var pos = $id.offset().top;

        $('body, html').animate({scrollTop: pos}, 1000);
    });


    // BACK TO TOP FUNCTION
    var offset = 300,
        offset_opacity = 1200,
        scroll_top_duration = 700,
        $back_to_top = $('.cd-top');

    $(window).scroll(function () {
        ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if ($(this).scrollTop() > offset_opacity) {
            $back_to_top.addClass('cd-fade-out');
        }
    });

    $back_to_top.on('click', function (event) {
        event.preventDefault();
        $('body,html').animate({
                scrollTop: 0,
            }, scroll_top_duration
        );
    });

});
