$(document).ready(function(){

    /*------------------------------------------------------------------*/
        // клик по блоку - показать форму авторизации
    $('.login_href').click(function(){
        var f = $('#login_form');
        if (f.css('display') == 'none') {
            f.show();
        } else {
            f.hide();
        }
    })
        // спрятать форму авторизации по клику в не формы
    $(document).click(function(event) {
        if ($(event.target).closest('.login_href, #login_form').length) return;
        $('#login_form').hide();
        event.stopPropagation();
    });

    /*------------------------------------------------------------------*/
    // спрятать #back-top
    $("#to_top").hide();

    // показать #back-top
    $(function () {
        $(window).scroll(function () {
            //alert('sdf');
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
    /*------------------------------------------------------------------*/
    /*------------------------------------------------------------------*/
    /*------------------------------------------------------------------*/

});
//////
