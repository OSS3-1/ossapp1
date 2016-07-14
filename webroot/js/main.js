function checkWidth(init)
{
    /*If browser resized, check width again */
    if ($(window).width() < 770) {
        $('ul').removeClass('animated');
    }
    else {
        if (!init) {
            $('ul').addClass('animated');
        }
    }
}

$(document).ready(function() {
    checkWidth(true);

    $(window).resize(function() {
        checkWidth(false);
    });
});


jQuery(document).ready(function($){
    window.dzsscr_init($('.skroll'),{
        'type':'scrollTop'
        ,'settings_skin':'skin_apple'
        ,enable_easing: 'on'
        ,settings_autoresizescrollbar: 'on'
        ,settings_chrome_multiplier : 0.04
    })
});

$('.carrusel').slick({
	dots: true,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 2000,
  slidesToShow: 1,
  slidesToScroll: 1
});
