// ======================================== OWL carusel
$(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:15,
    nav:true,
    center: true,
    autoplay: true,
    autoplayHoverPause: true,
    smartSpeed: 1500,
    autoplayTimeout: 12000,
    dots: false,
    responsive:{
        0:{
            items:1
        },
        375:{
            items:2
        },
        600:{
            items:3
        },
        900:{
            items:4
        },
        1000:{
            items:5
        },
        1600:{
            items:6
        }
    }
})
});
// ======================================== 