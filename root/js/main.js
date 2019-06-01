// ======================================== OWL carusel
$(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:20,
    nav:true,
    center: true,
    autoplay: true,
    autoplayHoverPause: true,
    smartSpeed: 2000,
    autoplayTimeout: 15000,
    dots: false,
    responsive:{
        0:{
            items:1,
            touchDrag: true
        },
        600:{
            items:3,
            touchDrag: true
        },
        1000:{
            items:4
        }
    }
})
});
// ======================================== 