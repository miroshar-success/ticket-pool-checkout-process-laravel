$(document).ready(function() 
{ 
    /*--/ Carousel owl /--*/
    $('#carousel').owlCarousel({
        rtl: true,
        loop: true,
        margin: -1,
        items: 1,
        nav: true,
        navText: ['<i class="ion-ios-arrow-back" aria-hidden="true"></i>', '<i class="ion-ios-arrow-forward" aria-hidden="true"></i>'],
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true
    });
});