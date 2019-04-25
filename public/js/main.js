var $j = jQuery.noConflict();

$j(function(){
// alert('hello');



    // $j (document).ready(function () {
    //
    //     $j ('#sidebarCollapse').on('click', function () {
    //         $j ('#sidebar').toggleClass('active');
    //     });
    //
    // });
    $j(document).ready(function () {

        // $j("#sidebar").mCustomScrollbar({
        //     theme: "minimal"
        // });

        $j('#sidebarCollapse').on('click', function () {
            // open or close navbar
            // $j(this).toggleClass('active');
            $j('#sidebar').toggleClass('active');
            // close dropdowns
            $j('#content').toggleClass('active');

            $j('.collapse.in').toggleClass('in');
            // and also adjust aria-expanded attributes we use for the open/closed arrows
            // in our CSS
            $j('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });


    });
    //
    // $j('.card').on('click', function () {
    //     $j('.flying_card').toggleClass('container-original');
    //     $j('this').toggleClass('card_scale-up');
    // });
    //
    //     "use strict";
    //
    //     /* Swiper
    //       -------------------------------------------------------*/
    //     //initialize swiper when document ready
    //     var mySwiper = new Swiper(".swiper-container", {
    //         // Navigation arrows
    //         nextButton: ".swiper-button-next",
    //         prevButton: ".swiper-button-prev",
    //         slidesPerView: 2.7,
    //         centeredSlides: true,
    //         breakpoints: {
    //             1440: {
    //                 slidesPerView: 2.6
    //             },
    //             1439: {
    //                 slidesPerView: 1.45
    //             },
    //             1024: {
    //                 slidesPerView: 1.45
    //             },
    //             1023: {
    //                 slidesPerView: 2
    //             },
    //             768: {
    //                 slidesPerView: 2
    //             },
    //             568: {
    //                 slidesPerView: 1.5,
    //                 spaceBetween: 10
    //             },
    //             414: {
    //                 slidesPerView: 1.09,
    //                 spaceBetween: 3
    //             },
    //             320: {
    //                 slidesPerView: 1.09,
    //                 spaceBetween: 3
    //             }
    //         }
    //     });
    //
    //     /* Info Card
    //       -------------------------------------------------------*/
    //     var $revealCardContentBtn = $j(".sl--card-nav-container"),
    //         $contentContainer = $j(
    //             ".sl-card-wrapper .sl--content-wrapper .sl--content-container"
    //         ),
    //         $navGFX = $j(
    //             ".sl-card-wrapper .sl--content-wrapper .sl--card-nav-container .sl--content-btn .card-nav-gfx"
    //         );
    //
    // $revealCardContentBtn.on("click", function() {
    //         var parent = $j(this).closest(".swiper-slide");
    //
    //         // IC Container
    //         parent
    //             .siblings()
    //             .find($contentContainer)
    //             .removeClass("sl--card-reveal");
    //         parent
    //             .siblings()
    //             .find($contentContainer)
    //             .addClass("sl--card-hide");
    //         parent.find($contentContainer).toggleClass("sl--card-hide sl--card-reveal");
    //
    //         // IC Nav wrapper
    //         parent
    //             .siblings()
    //             .find(".sl--content-wrapper")
    //             .removeClass("sl--content-wrapper-active");
    //         parent
    //             .siblings()
    //             .find(".sl--content-wrapper")
    //             .addClass("sl--content-wrapper-inactive");
    //         parent
    //             .find(".sl--content-wrapper")
    //             .toggleClass("sl--content-wrapper-inactive sl--content-wrapper-active");
    //
    //         // IC Nav GFX
    //         parent
    //             .siblings()
    //             .find($navGFX)
    //             .removeClass("sl--close-card-info");
    //         parent
    //             .siblings()
    //             .find($navGFX)
    //             .addClass("sl--show-card-info");
    //         parent.find($navGFX).toggleClass("sl--show-card-info sl--close-card-info");
    //     });
    //
    //     /* Hide content on slide change
    //       -------------------------------------------------------*/
    //     mySwiper.on("onSlideChangeStart", function() {
    //         if ($contentContainer.hasClass("sl--card-reveal")) {
    //             var $CI_ContentWrapper = $j(".sl--content-wrapper");
    //
    //             $contentContainer.removeClass("sl--card-reveal");
    //             $contentContainer.addClass("sl--card-hide");
    //             $navGFX.removeClass("sl--close-card-info");
    //             $navGFX.addClass("sl--show-card-info");
    //             $CI_ContentWrapper.removeClass("sl--content-wrapper-active");
    //             $CI_ContentWrapper.addClass("sl--content-wrapper-inactive");
    //         }
    //     });
    //
    //     // Media Query
    //     var windowWidth = $j(window).width();
    //     if (windowWidth === 320) {
    //     }
    //     if (windowWidth === 375) {
    //     }
    //     if (windowWidth === 414) {
    //     }
    //     if (windowWidth === 768) {
    //     }
    //     if (windowWidth === 1024) {
    //     }

    //
    // $j("#myModal").on('hidden.bs.modal', function (e) {
    //     $j("#myModal iframe").attr("src", $j("#myModal iframe").attr("src"));
    // });


});


