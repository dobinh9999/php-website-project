document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"><\/script>');
document.write('<script src="https://code.jquery.com/jquery-1.11.0.min.js"><\/script>');
document.write('<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"><\/script>');
document.write('<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"><\/script>');

function initializeSlider(sliderClass, slidesToShow, dots = false) {
    $(document).ready(function() {
        $(sliderClass).slick({
            slidesToShow: slidesToShow,
            infinite: true,
            arrows: true,
            draggable: false,
            prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
            dots: dots,
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                        infinite: false,
                    },
                },
            ],
            autoplay: true,
            autoplaySpeed: 2000
        });
    });
}