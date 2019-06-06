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
// ======================================== Welcome js
$(document).ready(function () {
    $imgSrc = $('#imgProfile').attr('src');
    function readURL(input) {
  
        if (input.files && input.files[0]) {
            var reader = new FileReader();
  
            reader.onload = function (e) {
                $('#imgProfile').attr('src', e.target.result);
            };
  
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#btnChangePicture').on('click', function () {
        // document.getElementById('profilePicture').click();
        if (!$('#btnChangePicture').hasClass('changing')) {
            $('#profilePicture').click();
        }
        else {
            // change
        }
    });
    $('#profilePicture').on('change', function () {
        readURL(this);
        $('#btnChangePicture').addClass('changing');
        $('#btnChangePicture').attr('value', 'Confirm');
        $('#btnDiscard').removeClass('d-none');
        // $('#imgProfile').attr('src', '');
    });
    $('#btnDiscard').on('click', function () {
        // if ($('#btnDiscard').hasClass('d-none')) {
        $('#btnChangePicture').removeClass('changing');
        $('#btnChangePicture').attr('value', 'Change');
        $('#btnDiscard').addClass('d-none');
        $('#imgProfile').attr('src', $imgSrc);
        $('#profilePicture').val('');
        // }
    });
  });