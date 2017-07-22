// TOGGLE MOBILE
$(function () {
    $('.navbar-toggle').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200); 
    });
   
   // Remove menu for searching
   $('#search-trigger').click(function () {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');
    });
});


// SUR MOBILE : ON CACHE LE MENU APRES CLICK SUR UN LIEN //
$(function(){
    $('.navbar-nav a').click(function(){
        $(".navbar-nav").collapse('hide');
    });
});

