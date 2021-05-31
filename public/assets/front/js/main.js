(function($) {
    "use strict";

    $(document).ready(function() {
        $("[data-toggle=popover]").popover({
            html: true,
            trigger: 'focus',
            content: function() {
                var content = $(this).attr("data-popover-content");
                return $(content).children(".popover-body").html();
            }
        });
        // menu click sub menu mobile
        $('.main-menu-responsive ul li.menu-item-has-children > a').on("click", function(e) {
            e.preventDefault();
            $(this).parent().find("> ul").slideToggle(300);
            $(this).parent().toggleClass("mn-active-menu");
        });

        // menu click sub menu mobile
        $('ul.menu-list-product-shop-mobile li.menu-item-has-children > a').on("click", function(e) {
            e.preventDefault();
            $(this).parent().find("> ul").slideToggle(300);
            $(this).parent().toggleClass("mn-active-menu");
        });

        // menu bars show responsive
        $('.bt-menu-res-show').on("click", function() {
            $('.main-menu-responsive').addClass('main-menu-responsive-active');
            $('.bt-menu-res-hide').addClass('bt-menu-res-hide-active');
            $('.bt-menu-res-show').removeClass('bt-menu-res-show-active');
        });

        // menu bars hide responsive
        $('.bt-menu-res-hide').on("click", function() {
            $('.main-menu-responsive').removeClass('main-menu-responsive-active');
            $('.bt-menu-res-hide').removeClass('bt-menu-res-hide-active');
            $('.bt-menu-res-show').addClass('bt-menu-res-show-active');
        });

        // menu bars product
        $('.bt-bars-menu-product-mobile').on("click", function() {
            $('.wrap-mn-dropdown-product-mobile').addClass('wrap-mn-dropdown-product-mobile-active');
            $('.bt-bars-close-menu-product-mobile').addClass('bt-bars-close-menu-product-mobile-active');
        });

        // menu bars product
        $('.bt-bars-close-menu-product-mobile').on("click", function() {
            $('.wrap-mn-dropdown-product-mobile').removeClass('wrap-mn-dropdown-product-mobile-active');
            $('.bt-bars-close-menu-product-mobile').removeClass('bt-bars-close-menu-product-mobile-active');
        });

        //menu top fixed
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.wrap-all-sticky-menu-top').addClass('wrap-all-sticky-menu-top-fixed');
            } else {
                $('.wrap-all-sticky-menu-top').removeClass('wrap-all-sticky-menu-top-fixed');
            }
        });

        // main slider top
        var items = $('.main-slider-top .item');
        if (items.length > 3) {
            $('.main-slider-top').owlCarousel({
                loop: true,
                autoplayTimeout: 9000,
                autoplay: true,
                touchDrag: true,
                mouseDrag: true,
                margin: 0,
                autoplayHoverPause: false,
                autoHeight: false,
                nav: false,
                dots: true,
                smartSpeed: 700,
                items: 1
            });
        } else {
            $('.main-slider-top').owlCarousel({
                loop: false,
                autoplayTimeout: 9000,
                autoplay: true,
                touchDrag: true,
                mouseDrag: true,
                margin: 0,
                autoplayHoverPause: false,
                autoHeight: false,
                nav: false,
                dots: true,
                smartSpeed: 700,
                items: 1
            });
        }

        $(".nav-main-slider-top-prev").on("click", function() {
            $(".main-slider-top").trigger('prev.owl.carousel');
        });

        $(".nav-main-slider-top-next").on("click", function() {
            $(".main-slider-top").trigger('next.owl.carousel');
        });


        // slider new open
        var items = $('.slider-now-open .item');
        if (items.length > 3) {
            $('.slider-now-open').owlCarousel({
                loop: true,
                autoplayTimeout: 6000,
                autoplay: true,
                touchDrag: false,
                mouseDrag: false,
                margin: 30,
                autoplayHoverPause: false,
                autoHeight: false,
                nav: false,
                dots: true,
                smartSpeed: 700,
                responsive: {
                    // breakpoint from 0 up
                    0: {
                        items: 1,
                        margin: 30
                    },
                    // breakpoint from 768 up
                    768: {
                        items: 2
                    },
                    // breakpoint from 768 up
                    991: {
                        items: 3
                    }
                }
            });
        } else {
            $('.slider-now-open').owlCarousel({
                loop: false,
                autoplayTimeout: 6000,
                autoplay: true,
                touchDrag: false,
                mouseDrag: false,
                margin: 30,
                autoplayHoverPause: false,
                autoHeight: false,
                nav: false,
                dots: true,
                smartSpeed: 700,
                responsive: {
                    // breakpoint from 0 up
                    0: {
                        items: 1,
                        margin: 30
                    },
                    // breakpoint from 768 up
                    768: {
                        items: 2
                    },
                    // breakpoint from 768 up
                    991: {
                        items: 3
                    }
                }
            });
        }
        // tab calculator & keluhan
        $('.item-sec-button-servis').click(function() {
            var nm = $(this).data('mtab');
            $('.item-tab-content-calculator-sevis').removeClass('item-tab-content-calculator-sevis-active');
            $(this).siblings('.item-sec-button-servis').removeClass('item-sec-button-servis-active');
            $(this).addClass('item-sec-button-servis-active');
            $('#' + nm).addClass('item-tab-content-calculator-sevis-active');
        });

        // tab select device
        $('.item-device-cal-service').click(function() {
            var nm = $(this).data('mtab');
            $('.wrap-section-phone-choose').removeClass('wrap-section-phone-choose-active');
            $(this).siblings('.item-device-cal-service').removeClass('item-device-cal-service-active');
            $(this).addClass('item-device-cal-service-active');
            $('#' + nm).addClass('wrap-section-phone-choose-active');
            // NEW CODE =============================================
            $('html, body').animate({
                scrollTop: ($('#' + nm).offset().top)
            }, 500);
            // NEW CODE =============================================
        });

        // choose phone
        $('.item-sec-phone-choose').click(function() {
            var nm = $(this).data('mtab');
            $('.wrap-section-warna-tipe').removeClass('wrap-section-warna-tipe-active');
            $(this).siblings('.item-sec-phone-choose').removeClass('item-sec-phone-choose-active');
            $(this).addClass('item-sec-phone-choose-active');
            $('#' + nm).addClass('wrap-section-warna-tipe-active');
            // NEW CODE =============================================
            $('html, body').animate({
                scrollTop: ($('#' + nm).offset().top - 100)
            }, 500);
            // NEW CODE =============================================
        });

        // choose color type
        $('.warna-tipe-device').click(function() {
            var nm = $(this).data('mtab');
            $('#' + nm).addClass('wrap-section-phone-choose-active');
            // NEW CODE =============================================
            $('html, body').animate({
                scrollTop: ($('#' + nm).offset().top - 30)
            }, 500);
            // NEW CODE =============================================
        });


        // slider kenapa icolor
        var items = $('.slider-why-icolor .item');
        if (items.length > 1) {
            $('.slider-why-icolor').owlCarousel({
                loop: true,
                autoplayTimeout: 6000,
                autoplay: true,
                touchDrag: false,
                mouseDrag: false,
                margin: 10,
                autoplayHoverPause: false,
                autoHeight: false,
                nav: false,
                dots: true,
                smartSpeed: 700,
                items: 1
            });
        } else {
            $('.slider-why-icolor').owlCarousel({
                loop: false,
                autoplayTimeout: 6000,
                autoplay: true,
                touchDrag: false,
                mouseDrag: false,
                margin: 100,
                autoplayHoverPause: false,
                autoHeight: false,
                nav: false,
                dots: true,
                smartSpeed: 700,
                items: 1
            });
        }


        // slider testimonials
        var items = $('.slider-testimonials .item');
        if (items.length > 1) {
            $('.slider-testimonials').owlCarousel({
                loop: true,
                autoplayTimeout: 9000,
                autoplay: true,
                touchDrag: false,
                mouseDrag: false,
                autoplayHoverPause: false,
                autoHeight: false,
                nav: false,
                dots: true,
                smartSpeed: 700,
                responsive: {
                    0: {
                        stagePadding: 0,
                        items: 1,
                        center: false,
                        margin: 20,
                    },
                    600: {
                        stagePadding: 0,
                        items: 1,
                        center: false,
                        margin: 20,
                    },
                    1024: {
                        stagePadding: 200,
                        items: 1,
                        center: true,
                        margin: 80,
                    },
                    1366: {
                        stagePadding: 400,
                        items: 1,
                        center: true,
                        margin: 130,
                    }
                }
            });
        } else {
            $('.slider-testimonials').owlCarousel({
                loop: false,
                autoplayTimeout: 9000,
                autoplay: true,
                touchDrag: false,
                mouseDrag: false,
                margin: 10,
                autoplayHoverPause: false,
                autoHeight: false,
                nav: false,
                dots: true,
                smartSpeed: 700,
                responsive: {
                    0: {
                        stagePadding: 0,
                        items: 1,
                        center: false,
                        margin: 20,
                    },
                    600: {
                        stagePadding: 0,
                        items: 1,
                        center: false,
                        margin: 20,
                    },
                    1024: {
                        stagePadding: 200,
                        items: 1,
                        center: true,
                        margin: 80,
                    },
                    1366: {
                        stagePadding: 400,
                        items: 1,
                        center: true,
                        margin: 130,
                    }
                }
            });
        }

        $(".bt-nav-testi-prev").on("click", function() {
            $(".slider-testimonials").trigger('prev.owl.carousel');
        });

        $(".bt-nav-testi-next").on("click", function() {
            $(".slider-testimonials").trigger('next.owl.carousel');
        });

        // slider shop product
        var items = $('.main-slider-shop .item');
        if (items.length > 1) {
            $('.main-slider-shop').owlCarousel({
                loop: true,
                autoplayTimeout: 6000,
                autoplay: true,
                touchDrag: false,
                mouseDrag: true,
                margin: 0,
                autoplayHoverPause: false,
                autoHeight: false,
                nav: false,
                dots: true,
                smartSpeed: 700,
                responsive: {
                    0: {
                        stagePadding: 0,
                        items: 1,
                    },
                    768: {
                        stagePadding: 0,
                        items: 1,
                    },
                    991: {
                        stagePadding: 300,
                        items: 1,
                    }
                },
            });
        } else {
            $('.main-slider-shop').owlCarousel({
                loop: false,
                autoplayTimeout: 6000,
                autoplay: true,
                touchDrag: false,
                mouseDrag: true,
                margin: 0,
                autoplayHoverPause: false,
                autoHeight: false,
                nav: false,
                dots: true,
                smartSpeed: 700,
                responsive: {
                    0: {
                        stagePadding: 0,
                        items: 1,
                    },
                    768: {
                        stagePadding: 0,
                        items: 1,
                    },
                    991: {
                        stagePadding: 300,
                        items: 1,
                    }
                },
            });
        }

        $(".nav-slider-shop-prev").on("click", function() {
            $(".main-slider-shop").trigger('prev.owl.carousel');
        });

        $(".nav-slider-shop-next").on("click", function() {
            $(".main-slider-shop").trigger('next.owl.carousel');
        });

        // custom upload 
        $('.uploadBtn').change(function() {
            $(this).parent().next().val($(this).val());
        });

        // smooth scroll
        var scroll = new SmoothScroll('a[href*="#"]', {
            speed: 500, // Integer. How fast to complete the scroll in milliseconds
            offset: 80, // Integer or Function returning an integer. How far to offset the scrolling anchor location in pixels
            easing: 'easeInOutCubic', // Easing pattern to use
        });

        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            image: {
                titleSrc: 'title',
            },
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            callbacks: {
                elementParse: function(item) {
                    console.log(item.el[0].className);
                    if (item.el[0].className == 'video') {
                        item.type = 'iframe',
                            item.iframe = {
                                patterns: {
                                    youtube: {
                                        index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

                                        id: 'v=', // String that splits URL in a two parts, second part should be %id%
                                        // Or null - full URL will be returned
                                        // Or a function that should return %id%, for example:
                                        // id: function(url) { return 'parsed id'; } 

                                        src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe. 
                                    },
                                    vimeo: {
                                        index: 'vimeo.com/',
                                        id: '/',
                                        src: '//player.vimeo.com/video/%id%?autoplay=1'
                                    },
                                    gmaps: {
                                        index: '//maps.google.',
                                        src: '%id%&output=embed'
                                    }
                                }
                            }
                    } else {
                        item.type = 'image',
                            item.tLoading = 'Loading image #%curr%...',
                            item.mainClass = 'mfp-img-mobile',
                            item.image = {
                                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                            }
                    }

                }
            }
        });

        // The slider being synced must be initialized first
        $('#carousel-product').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 100,
            maxItems: 3,
            itemMargin: 13,
            asNavFor: '#slider-main-product'
        });

        $('.prev-thumbnail-slide-nav-prev').on('click', function() {
            $('#carousel-product').flexslider('prev');
            return false;
        })

        $('.prev-thumbnail-slide-nav-next').on('click', function() {
            $('#carousel-product').flexslider('next');
            return false;
        })

        $('#slider-main-product').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel-product"
        });


        // Video Responsive
        $(".section-video-full").fitVids();

        // Wow Js Animate
        new WOW().init();

    });
})(jQuery);