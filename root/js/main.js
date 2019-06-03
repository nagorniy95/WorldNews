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