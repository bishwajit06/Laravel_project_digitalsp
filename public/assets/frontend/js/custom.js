(function($) {
    $.fn.sameHeight = function() {
      var selector = this;
      var heights = [];
      selector.each(function() {
        var height = $(this).height();
        heights.push(height);
      });
      var maxHeight = Math.max.apply(null, heights);
      selector.each(function() {
        $(this).height(maxHeight);
      });
    };
}(jQuery));

$(window).resize(function() {
    $('.home-banner-section .card .card-body').sameHeight();
});

$(document).ready(function(){
  $('.home-banner-section .card .card-body').sameHeight();

//Owl Carousel Config
  $('.owl-carousel-3x').owlCarousel({
    loop: true,
    smartSpeed: 500,
    nav: false,
    autoplay: true,
    autoplayHoverPause:true,
    responsive: {
        0: {
            items: 1
        },
        576: {
            items: 2
        },
        768: {
            items: 2
        },
        992: {
            items: 2
        },
        1200: {
            items: 3
        }
    },
    dots: true,
  });

  $('.owl-carousel-2x').owlCarousel({
    loop: true,
    smartSpeed: 500,
    nav: false,
    autoplay: true,
    autoplayHoverPause:true,
    responsive: {
        0: {
            items: 1
        },
        576: {
            items: 1
        },
        768: {
            items: 2
        },
        992: {
            items: 2
        },
        1200: {
            items: 2
        }
    },
    dots: true,
  });
  
})