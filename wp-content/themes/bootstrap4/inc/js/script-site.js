jQuery(document).ready(function($) {
    // ARTSY MENU
    // MENU DESKTOOP ESPAÑOL
    $('.menu-cont #menu-item-6328 a').each(function() {
        // if ($(this).text() == 'Google Must disappear')
            $(this).text('');
            $(this).html('<img class="img-fluid artsy" src="https://delinfinito.com/wp-content/themes/bootstrap4/inc/icons/artsy-logo.png">');
    });
    // MENU DESKTOOP INGLES
    $('.menu-cont #menu-item-6329 a').each(function() {
        // if ($(this).text() == 'Google Must disappear')
            $(this).text('');
            $(this).html('<img class="img-fluid artsy" src="https://delinfinito.com/wp-content/themes/bootstrap4/inc/icons/artsy-logo.png">');
    });
    // MENU MOBILE ESPAÑOL
    $('#menu-responsive-es #menu-item-6330 a').each(function() {
        // if ($(this).text() == 'Google Must disappear')
            $(this).text('');
            $(this).html('<img class="img-fluid artsy" src="https://delinfinito.com/wp-content/themes/bootstrap4/inc/icons/artsy-logo.png">');
    });
    // MENU MOBILE ESPAÑOL
    $('#menu-responsive-en #menu-item-6331 a').each(function() {
        // if ($(this).text() == 'Google Must disappear')
            $(this).text('');
            $(this).html('<img class="img-fluid artsy" src="https://delinfinito.com/wp-content/themes/bootstrap4/inc/icons/artsy-logo.png">');
    });
        
    // DISABLE IMAGE DRAGG
    $('img').attr('draggable', false);
    $(document).bind("contextmenu",function(e){
        return false;
     });
    // YEARS MENU 
    $(function() {
        var $button = $('.btn-years'),
            $arrow = $('.arrow-years'),
            $plus = $('.plus-years'),
            $nav = $('.years-cont')
            // $masthead = $('#masthead');

        $button.click(function() {
            $arrow.toggleClass('is-active');
            $plus.toggleClass('is-active');
            $nav.toggleClass('is-active');
            // $masthead.toggleClass('is-active');
            return false;
        });
        $('#site-nav .col a[class*=current]').addClass('active');
    });
    $(".thumbnails").hover(function() {
        $(this).find(".backdrop-filter").addClass("on-hover");
    }, function() {
        $(this).find(".backdrop-filter").removeClass("on-hover");
    });
    // INSIGHT PLUS
    $(".insight-plus").hover(function() {
        $(this).find(".plus-obra-icon").removeClass("d-none");
    }, function() {
        $(this).find(".plus-obra-icon").addClass("d-none");
    });
    // FERIAS ROLLOVER
    $(".box-color").hover(function() {
        $(this).find(".right").addClass("on-hover");
    }, function() {
        $(this).find(".right").removeClass("on-hover");
    });
    // OBRAS ARTISTAS ROLLOVER
    $(".grid-item a, .grid-item .my-gallery").hover(function() {
        $(this).find(".bg-roll").toggleClass("on-hover");
        $(this).find(".plus-icon").toggleClass("on-hover");
    });
    $('.read-more.es').click(function(e) {
        e.preventDefault();
        $(this).closest('.content-wrapper-middle').children('.more-text').slideToggle("slow");
        $(this).find('.icon img').toggleClass("up");
        $(this).find('p').text(function(i, v) {
            return v === 'ver menos' ? 'ver más' : 'ver menos'
        })
    });
    $('.read-more.en').click(function(e) {
        e.preventDefault();
        $(this).closest('.content-wrapper-middle').children('.more-text').slideToggle("slow");
        $(this).find('.icon img').toggleClass("up");
        $(this).find('p').text(function(i, v) {
            return v === 'view less' ? 'view more' : 'view less'
        })
    });

    // init Masonry
    var $grid = $('.grid-works').masonry({
        itemSelector: '.grid-item',
        percentPosition: true,
        columnWidth: '.grid-sizer',
        gutter: '.gutter-sizer'
    });
    // layout Masonry after each image loads
    $grid.imagesLoaded().progress(function() {
        $grid.masonry();
    });

    // $('.bottom-bar a[href^="#"]').on('click', function(e) {
    //     e.preventDefault();
    //     var target = this.hash;
    //     var $target = $(target);
    //     $('html, body').stop().animate({
    //         'scrollTop': $target.offset().top - 125
    //     }, 900, 'swing', function() {
    //         // window.location.hash = target;
    //     });
    // });

    var $nav = $('.cover-section .bottom-bar');
    var $nav_text = $('.cover-section .bottom-bar .menu a');
    var $win = $(window);
    var winH = $win.height(); // Get the window height.

    $win.on("scroll", function() {
        if ($(this).scrollTop() > winH) {
            $nav.addClass('fixed');
            $nav_text.removeClass('normal');
        } else {
            $nav.removeClass('fixed');
            $nav_text.addClass('normal');
        }
    }).on("resize", function() { // If the user resizes the window
        winH = $(this).height(); // you'll need the new height value
    });

    $(".bottom-bar").on("click", "a", function(event) {
        // exclude standard response browser
        event.preventDefault();
        // get the block ID from the href attribute
        var id = $(this).attr('href'),
            // find the height at which the block is placed on the
            top = $(id).offset().top - 100;
        // use the transition block time: 800 MS
        $('body,html').animate({ scrollTop: top }, 800);
    });

    $('.bottom-bar a').click(function() {
        $('.bottom-bar a.active').removeClass("active");
        $(this).addClass("active");
    });

    $('#toggle-plus').click(function() {
        $(this).toggleClass('active');
        $('header.resp').toggleClass('active');
        $('header.resp.transp .bg-gradient').toggleClass('active');
        $('#overlay').toggleClass('open');
        $('body').toggleClass('active');
    });

    // SMART HEADER 
    // Hide Header on on scroll down
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('header').outerHeight();

    $(window).scroll(function(event) {
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = $(this).scrollTop();

        // Make sure they scroll more than delta
        if (Math.abs(lastScrollTop - st) <= delta)
            return;

        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight) {
            // Scroll Down
            $('header').removeClass('down').addClass('up');
        } else {
            // Scroll Up
            if (st + $(window).height() < $(document).height()) {
                $('header').removeClass('up').addClass('down');
            }
        }
        if (st <= 110) {
            if ($('header').hasClass('t')) {
                $('header').removeClass('white').addClass('transp');
            }
        } else {
            if ($('header').hasClass('t')) {
                $('header').removeClass('transp').addClass('white');
            }
        }
        lastScrollTop = st;
    }

    // LAZY LOAD 
    var bLazy = new Blazy({
        selector: '.b-lazy',
        loadInvisible: true, // all images
        success: function(element) {
            setTimeout(function() {
                // We want to remove the loader gif now.
                // First we find the parent container
                // then we remove the "loading" class which holds the loader image
                var parent = element.parentNode;
                parent.className = parent.className.replace(/\bloading\b/, '');
            }, 200);
        }
    });

    // CLONE SUBJECT
    $(".contact-gallery").click(function() {
        var current_artist = ($(this).closest("div").children('.title-current-artist').attr("data-title"));
        var current_work = ($(this).closest("div").children('.title-current-work').attr("data-title"));
        var current_img_work = ($(this).closest(".grid-item").find('.img-current-work').attr("src"));
        $('.subject-query').val(current_artist + ' - ' + current_work);
        $('.subject-img-query').val(current_img_work);
        console.log(($(this).closest("div").children('.title-current-artist').attr("data-title")));
        console.log(($(this).closest("div").children('.title-current-work').attr("data-title")));
        console.log(($(this).closest(".grid-item").find('.img-current-work').attr("src")));
    });

    $(".contact-gallery-insight").click(function() {
        var current_artist = ($(this).closest(".data-obra-cont").children('.data-obra').find('.title-current-artist').attr("data-title"));
        var current_work = ($(this).closest(".data-obra-cont").children('.data-obra').find('.title-current-work').attr("data-title"));
        var current_img_work = ($(this).closest(".data-obra-cont").find('.img-current-work').attr("data-image"));
        $('.subject-query').val(current_artist + ' - ' + current_work);
        $('.subject-img-query').val(current_img_work);
        console.log(($(this).closest(".data-obra-cont").children('.data-obra').find('.title-current-artist').attr("data-title")));
        console.log(($(this).closest(".data-obra-cont").children('.data-obra').find('.title-current-work').attr("data-title")));
        console.log(($(this).closest(".data-obra-cont").children('.data-obra').find('.img-current-work').attr("data-image")));
    });

    $(".contact-gallery-insight-grid").click(function() {
        var current_artist = ($(this).closest(".grid-item").children('.data').find('.title-current-artist').attr("data-title"));
        var current_work = ($(this).closest(".grid-item").children('.data').find('.title-current-work').attr("data-title"));
        var current_img_work = ($(this).closest(".grid-item").children('.data').find('.img-current-work').attr("data-image"));
        $('.subject-query').val(current_artist + ' - ' + current_work);
        $('.subject-img-query').val(current_img_work);
        console.log(($(this).closest(".grid-item").children('.data').find('.title-current-artist').attr("data-title")));
        console.log(($(this).closest(".grid-item").children('.data').find('.title-current-work').attr("data-title")));
        console.log(($(this).closest(".grid-item").children('.data').find('.img-current-work').attr("data-image")));
    });

    $(".contact-gallery-insight-grid-comp").click(function() {
        var current_artist = ($(this).closest(".grid-item").children('.data').find('.title-current-artist').attr("data-title"));
        var current_work = ($(this).closest(".grid-item").children('.data').find('.title-current-work').attr("data-title"));
        var current_img_work = ($(this).closest(".grid-item").find('.img-current-work').attr("src"));
        $('.subject-query').val(current_artist + ' - ' + current_work);
        $('.subject-img-query').val(current_img_work);
        console.log(($(this).closest(".grid-item").children('.data').find('.title-current-artist').attr("data-title")));
        console.log(($(this).closest(".grid-item").children('.data').find('.title-current-work').attr("data-title")));
        console.log(($(this).closest(".grid-item").find('.img-current-work').attr("src")));
    });
    AOS.init({
        startEvent: 'DOMContentLoaded'
    });
    $('.menu_muestras, #menu_ferias, #menu_novedades').on('change', function() {
        window.location.href = this.value;
    });
});