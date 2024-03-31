jQuery(document).ready(function($) {
/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/
    var scroll = $(window).scrollTop();  
    var scrollup = $('.backtotop');
    var menu_toggle = $('.menu-toggle');
    var dropdown_toggle = $('.main-navigation button.dropdown-toggle');
    var nav_menu = $('.main-navigation ul.nav-menu');

/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/
    
    $('.menu-toggle').click(function() {
        $(this).toggleClass('active');
        $(this).parent().find('ul.nav-menu').slideToggle();
        $(this).parent().find('div.nav-menu > ul').slideToggle();
        $('#masthead button.dropdown-toggle').removeClass('active');
        $('#masthead').find('.sub-menu').slideUp();
    });

    $('.dropdown-toggle').click(function() {
        $(this).toggleClass('active');
        $(this).parent().find('.sub-menu').first().slideToggle();
        $(this).parent().find('.children').first().slideToggle();
    });

    if( $(window).width() < 1024 ) {
        $('#site-navigation .nav-menu').find("li").last().bind( 'keydown', function(e) {
            if( !e.shiftKey && e.which === 9 ) {
                e.preventDefault();
                $('.site-header').find('.menu-toggle').focus();
            }
        });

        $('button.dropdown-toggle').focus(function() {
            $(this).addClass('active');
            $(this).parent().find('.sub-menu').first().slideDown();

            if( $('button.dropdown-toggle').hasClass('active') ) {
                $(this).addClass('active');
                $(this).parent().find('.sub-menu').first().slideDown();
            }
        });
    }
    else {
        $('#site-navigation .nav-menu').find("li").unbind('keydown');
    }

    $(window).resize(function() {
        if( $(window).width() < 1024 ) {
            $('#site-navigation .nav-menu').find("li").last().bind( 'keydown', function(e) {
                if( !e.shiftKey && e.which === 9 ) {
                    e.preventDefault();
                    $('.site-header').find('.menu-toggle').focus();
                }
            });

            $('button.dropdown-toggle').focus(function() {
                $(this).addClass('active');
                $(this).parent().find('.sub-menu').first().slideDown();

                if( $('button.dropdown-toggle').hasClass('active') ) {
                    $(this).addClass('active');
                    $(this).parent().find('.sub-menu').first().slideDown();
                }
            });
        }
        else {
            $('#site-navigation .nav-menu').find("li").unbind('keydown');
        }
    });

    $('.menu-toggle').on('keydown', function (e) {
        var tabKey    = e.keyCode === 9;
        var shiftKey  = e.shiftKey;

        if( $('.menu-toggle').hasClass('active') ) {
            if ( shiftKey && tabKey ) {
                e.preventDefault();
                $('#site-navigation .nav-menu').find("li:last-child > a").focus();
                $('#site-navigation .nav-menu').find("li").last().bind( 'keydown', function(e) {
                    if( !e.shiftKey && e.which === 9 ) {
                        e.preventDefault();
                        $('.site-header').find('.menu-toggle').focus();
                    }
                });
            }
        }
    });

/*------------------------------------------------
            SLICK SLIDER
------------------------------------------------*/

$('#hero-slider').slick();


/*------------------------------------------------
                MATCH HEIGHT
------------------------------------------------*/
    $('#our-services article').matchHeight();



/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});