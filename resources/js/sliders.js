window.arrowBigLeft = '<button type="button" class="slick-prev"></button>';
window.arrowBigRight = '<button type="button" class="slick-next"></button>';
$(document).ready(() => {
    $('.first-screen-slick').not('.slick-initialized').slick({
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        dots: true,
        infinite: true,
        autoplay: true,
        speed: 300,
        slidesToShow: 1
      });

    $('.catalog-filter-slick').not('.slick-initialized').slick({
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 9,
        slidesToScroll: 1,
        responsive: [
            {
              breakpoint: 1300,
              settings: {
                slidesToShow: 6,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
        ]
    });
});
