$(document).ready(function(){

    // hide #back-top first
    $("#to_top").hide();

    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 200) {
                $('#to_top').fadeIn();
            } else {
                $('#to_top').fadeOut();
            }
        });

        // // scroll body to 0px on click
        // $('#back-top a').click(function () {
        //     $('body,html').animate({
        //         scrollTop: 0
        //     }, 800);
        //     return false;
        // });
    });

});
//////
