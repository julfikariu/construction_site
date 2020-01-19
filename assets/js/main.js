$(document).ready(function() {
    "use strict";
    $('body').addClass('preload-site');

    // Scroll To Top
    $('body').prepend('<div class="go-top"><span id="top"><i class="ion-chevron-up"></i></span></div>');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 500) {
            $('.go-top').fadeIn(600);
        } else {
            $('.go-top').fadeOut(600);
        }
    });
    $('#top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800, 'easeInQuad');
        return false;
    });

    // Match Height
    $('.items-row').each(function() {
        $(this).children('.single-item').matchHeight();
    });

    // Match Height
    $('.isotop').each(function() {
        $(this).find('.grid-match').matchHeight();
    });

    //owl carosel 
    $('.custome-slider').owlCarousel({
        loop: true,
        margin: 0,
        slideBy: 1,
        dots: false,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });


    // Search Form Show
    $('.search-box').hide();
    $('.search-button').click(function(e) {
        e.preventDefault();
        $('.search-box').slideToggle(700);
        e.stopPropagation();
    });

    $('.image-popup-no-margins').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 500,
            opener: function(openerElement) {
                // openerElement is the element on which popup was initialized, in this case its <a> tag
                // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                return openerElement.is('i') ? openerElement : openerElement.find('i');
            }
        }
    });
    //Mobile menu
    $('#menu').slicknav({
        label: '',
        appendTo: '.mobile-menu',
        duration: 700
    });

    //    $('#menu').slicknav();
    $('.isotop-menu ul li').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
        $(this).parents('.isotop-menu').next().isotope({
            filter: $(this).data('filter')
        })
    });

    // init Isotope
    var $grid = $('#grid').isotope({
        itemSelector: '.single-grid',
        percentPosition: true,
        layoutMode: 'masonry'
    });

    // layout Isotope after each image loads
    $grid.imagesLoaded().progress(function() {
        $grid.isotope('layout');
    });
});


$(window).load(function() {
    $('#preloader').fadeOut();
    $('.preloader-spinner').fadeOut(400);
    $('body').removeClass('preload-site');
});
