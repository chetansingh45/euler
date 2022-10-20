new WOW().init();
AOS.init();

var $ = jQuery.noConflict();

$(document).ready(function () {
    // main menu
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 300) {
            $(".header").addClass("fixed");
        } else {
            $(".header").removeClass("fixed");
        }
    });
    jQuery('ul.sf-menu').superfish({
        animation: {
            height: 'show'
        },
        delay: 100
    });
    $('.offcanvas-menu-btn').click(function(){
        $(this).toggleClass('close');
        $('.header_menu').toggleClass('open');
    });
    $("#toggle-btn").click(function () {
        $(".sf-menu").slideToggle("slow");
    });

    $('.toggle-subarrow').click(
        function () {
            $(this).parent().toggleClass("mob-drop");
        });

    var header = $(".header-inner");
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 100 && $(this).width() > 769) {
            header.addClass("navbar-fixed-top");
        } else {
            header.removeClass('navbar-fixed-top');
        }
    });
    $(this).find(".h4 i").each(function () {
        $(this).addClass("green");
    });

    var options = [];

    // header language dropdown    
    $('#about_company_menu').on('mouseenter', function () {
        $('.lan-selector').toggleClass('open');
    });

    $('#about_company_menu').on('mouseleave', function () {
        $('.lan-selector').toggleClass('close');
    });

    //banner kilometers counter animation
    $('.count').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });


    // charging hub locator js

    /*var marker;
    var map;

    $("#link1").click(function () {
        changeMarkerPos(28.538556, 77.276667);
    });
    $("#link2").click(function () {
        changeMarkerPos(28.476852, 77.053320);
    });
    $("#link3").click(function () {
        changeMarkerPos(28.6726359, 77.145608, 17);
    });
    $("#link4").click(function () {
        changeMarkerPos(28.609556, 77.048248);
    });
    $("#link5").click(function () {
        changeMarkerPos(28.628689, 77.320381);
    });
    $("#link6").click(function () {
        changeMarkerPos(28.713373, 77.317039);
    });
    $("#link7").click(function () {
        changeMarkerPos(28.659327, 77.351212);
    });
    $("#link8").click(function () {
        changeMarkerPos(28.624992, 77.391197);
    });

    function initialize() {
        var styles = [{
            stylers: [{
                saturation: -100
            }]
        }];
        var styledMap = new google.maps.StyledMapType(styles, {
            name: "Styled Map"
        });
        var mapProp = {
            center: new google.maps.LatLng(28.54085922241211, 77.27555847167969),
            zoom: 17,
            panControl: false,
            zoomControl: false,
            mapTypeControl: false,
            scaleControl: true,
            streetViewControl: false,
            overviewMapControl: false,
            rotateControl: true,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map_canvas"), mapProp);

        map.mapTypes.set('map_style', styledMap);
        map.setMapTypeId('map_style')

        marker = new google.maps.Marker({
            position: new google.maps.LatLng(19.0760, 72.8777),
            animation: google.maps.Animation.DROP,
            icon: 'images/map-marker.png',
        });

        marker.setMap(map);
        map.panTo(marker.position);
    }

    function changeMarkerPos(lat, lon) {
        myLatLng = new google.maps.LatLng(lat, lon)
        marker.setPosition(myLatLng);
        map.panTo(myLatLng);
    }

    google.maps.event.addDomListener(window, 'load', initialize);*/

    // animation on scroll
    AOS.init({
        once: true
    })

    // our customer logo slider
    $('.clients ul').slick({
        infinite: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        autoplaySpeed: 4000,
        responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 1008,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    arrows: false
                }
            }

        ]
    });
    //awards slider
    // Init slick slider + animation
    $('.slider').slick({
        autoplay: true,
        speed: 800,
        lazyLoad: 'progressive',
        arrows: true,
        dots: false,
        slidesToShow: 1,
        adaptiveHeight: false,
        responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 1008,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    arrows: false,

                }
            }

        ]

    }).slickAnimation();

    $('.testimonials-sec').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplaySpeed: 2000,
        dots: false,
        arrows: false,

        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.variant-colors ul li').click(function(){
        $('.variant-colors ul li').removeClass('active');
        $(this).addClass('active');
    });
});

// Play Audio
jQuery(document).ready(function() {
  var playing = false;

  jQuery("#audio-button").click(function() {
    if (playing == false) {
      document.getElementById("player").play();
      playing = true;
    } else {
      document.getElementById("player").pause();
      playing = false;
    }
  });
});

$(document).ready(function(){
    //why ev section slider
    $('.charge-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        pauseOnFocus: false,
        pauseOnHover: false,
        pauseOnDotsHover: false,
        arrows: false,
        fade: false,
        infinite: true,
        adaptiveHeight: false,
        asNavFor: '.charge-nav'
    });

    $('.charge-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        asNavFor: '.charge-slider',
        dots: false,
        infinite: true,
        centerMode: true,
        adaptiveHeight: false,
        focusOnSelect: true
    });

    // Story Slider
    $('.story-slider-bot').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        pauseOnFocus: false,
        pauseOnHover: false,
        pauseOnDotsHover: false,
        arrows: false,
        fade: false,
        infinite: 0,
        adaptiveHeight: true,
        asNavFor: '.story-slider-top'
    });
    $('.story-slider-top').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        asNavFor: '.story-slider-bot',
        dots: false,
        infinite: 0,
        centerMode: true,
        focusOnSelect: true
    });
});
// Team Slider
$(document).ready(function(){
    $('.team-img-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        pauseOnHover: false,
        dots: true
    });

    // Headlines Slider
    $('.head_slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: false,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    dots: true
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                    dots: true
                }
            }
        ]
    });

    var matchHeight = function () {
        function init() {
            eventListeners();
            matchHeight();
        }
        function eventListeners(){
            $(window).on('resize', function() {
                matchHeight();
            });
        }
        function matchHeight(){
            var groupName = $('[data-match-height]');
            var groupHeights = [];
            
            groupName.css('min-height', 'auto');
            
            groupName.each(function() {
                groupHeights.push($(this).outerHeight());
            });
            
            var maxHeight = Math.max.apply(null, groupHeights);
            groupName.css('min-height', maxHeight);
        };
        return {
            init: init
        };
    } ();
    matchHeight.init();

    // Product Listing Slider
    $('.pro-sel-pro').slick({
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        // autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    // arrows: false,
                    centerMode: true,
                    centerPadding: 80
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    // arrows: false,
                    centerMode: true,
                    centerPadding: 40
                }
            }
        ]
    });
    $('.nav-tabs a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        e.target
        e.relatedTarget
        $('.pro-sel-pro').slick('setPosition');
    });
});

// Single Slider
$(document).ready(function(){
    $('.single-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        pauseOnHover: false,
        dots: true,
        arrows: false,
        adaptiveHeight: true
    });
});

// Scrollspy
$(document).ready(function () {
    $("#Scrollspy a").on('click', function(event) {
       if (this.hash !== "") {
           event.preventDefault();
           var hash = this.hash;
           $('html, body').animate({
               scrollTop: $(hash).offset().top
               }, 800, function(){
               window.location.hash = hash;
           });
        }
    });
});

$(document).ready(function(){
    // Select City & State
    $('.sel-state').change(function(){
        $('.others-status').removeClass('other-hide');
        $('.' + $(this).val()).addClass('other-hide');
    });
});
$(document).ready(function(){
    $('.play_btn').click(function(){
        $('.charging_video').get(0).play();
    });
    $('.charging_banner_video .close').click(function(){
        $('.charging_video').get(0).pause();
    });

    $('.tab-btn').click(function(){
        $(this).toggleClass('open');
    });
});

// Product Quantity
$(document).ready(function(){    
    $('[data-dir="dwn"]').click(function () {
		var $input = $('#input-quantity');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		return false;
	});
	
	$('[data-dir="up"]').click(function () {
		var $input = $('#input-quantity');
		$input.val(parseInt($input.val()) + 1);
		$input.change();
		return false;
	});
});

$(document).ready(function(){
    var check = $("#vehicle1").prop("checked");
    if(check){
        $(".vehicle_yes").removeClass("d-none");
    }
    
    $("#vehicle1").on("click", function(){
        check = $(this).prop("checked");
        $(".vehicle_yes").removeClass("d-none");
    });
    $("#vehicle2").on("click", function(){
        check = $(this).prop("checked");
        $(".vehicle_yes").addClass("d-none");
        console.log(check);
    });

    $('.other_select').on('change', function() {
        //  alert( this.value ); // or $(this).val()
        if(this.value == "others") {
            $(this).siblings('.others_input').addClass('d-block');
        }   else {
            $(this).siblings('.others_input').removeClass('d-block');
        }
    });
});

// Technology Slider
$('.tech-slider').slick({
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    autoplaySpeed: 3000,
    dots: false,
    arrows: true,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 1,
                // arrows: false,
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                dots: true,
                arrows: false,
                adaptiveHeight: true

            }
        }
    ]
});

// slick
$('.full-screen-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    pauseOnHover: false,
    dots: false,
    arrows: false,
    adaptiveHeight: true
});



// Smooth Scroll

$(document).ready(function(){

    $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {

        // On-page links

        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

            var target = $(this.hash);

            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

            // Does a scroll target exist?

            if (target.length) {

                // Only prevent default if animation is actually gonna happen

                event.preventDefault();

                $('html, body').animate({

                scrollTop: target.offset().top

                }, 500, function() {

                // Callback after animation

                // Must change focus!

                var $target = $(target);

                $target.focus();

                if ($target.is(":focus")) { // Checking if the target was focused

                    return false;

                } else {

                    $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable

                    $target.focus(); // Set focus again

                };

                });

            }

        }

    });

});