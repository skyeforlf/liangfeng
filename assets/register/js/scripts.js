
jQuery(document).ready(function() {

    /*
        Background slideshow
    */
    $.backstretch([
        "/assets/register/images/backgrounds/1.jpg",
        "/assets/register/images/backgrounds/2.jpg",
        "/assets/register/images/backgrounds/3.jpg"
    ], {duration: 3000, fade: 750});

    /*
        Tooltips
    */
    $('.links a.home').tooltip();
    $('.links a.blog').tooltip();

    /*
        Form validation
    */
    $('.register form').submit(function(){

    });


});


