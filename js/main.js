$(document).ready(function(){

    /*------------------------------------------------------------------*/
        // клик по блоку - показать форму авторизации
    $('.login_href').click(function(){
        var f = $('#login_form');
        if (f.css('display') == 'none') {
            f.show();
            // f.css('-o-animation', 'anim_login .8s 1');
            f.css('-webkit-animation', 'anim_login .8s 1');
            f.css('animation', 'anim_login .8s 1');
            $(this).addClass('open');
        } else {

            $(this).removeClass('open');
            f.css('-webkit-animation', 'anim_login_hide .8s 1');
            f.css('animation', 'anim_login_hide .8s 1');
            //f.hide();
            setTimeout(function(){f.hide()}, 700);
            // f.css('-webkit-animation', 'none');
            // f.css('animation', 'none');
        }
    })
        // спрятать форму авторизации по клику в не формы
    $(document).click(function(event) {
        if ($(event.target).closest('.login_href, #login_form').length) {
            return;
        }

        var f = $('#login_form');
        //f.hide();
        $('.login_href').removeClass('open');
        f.css('-webkit-animation', 'anim_login_hide .8s 1');
        f.css('animation', 'anim_login_hide .8s 1');
            //f.hide();
        setTimeout(function(){f.hide()}, 700);
       // f.css('-webkit-animation', 'none');
       // f.css('animation', 'none');
        event.stopPropagation();
    });

    /*------------------------------------------------------------------*/
    // спрятать #to_top
    $("#to_top").hide();
        // если документ не больше окна браузера
    if ($(window).innerHeight()-$(document).innerHeight()>-100) {
        $("#to_bottom").hide();
    }
            // событие прокрутки документа
        $(window).scroll(function () {
            //alert('sdf');
                // если прокрутили вниз на 150 и более пикселей от верха
            if ($(this).scrollTop() > 150) {
                $('#to_top').fadeIn();
            } else {
                $('#to_top').fadeOut();
            }
                // если прокрутили вниз на 150 и более пикселей от низа
            if ($(window).scrollTop()+$(window).innerHeight()-$(document).innerHeight()>-150) {
                $("#to_bottom").fadeOut();
            } else {
                $("#to_bottom").fadeIn();
            }
        });

        // при изменениии высоты документа во время просмотра
    OnResizeElement(document, function(el){
            if ($(window).scrollTop()+$(window).innerHeight()-$(document).innerHeight()>-150) {
                $("#to_bottom").fadeOut();
            } else {
                $("#to_bottom").fadeIn();
            }
    }, 300);

    /*------------------------------------------------------------------*/
    /*------------------------------------------------------------------*/
    /*------------------------------------------------------------------*/

});
//////
/*--------------------------------------------------------------------------*/

function OnResizeElement(element, handler, time){
    var id = null;
    var _constructor = function(){
        var WIDTH = $(element).outerWidth(),
            HEIGHT = $(element).outerHeight();
        id = setInterval(function(){
            if(WIDTH != $(element).outerWidth() || HEIGHT != $(element).outerHeight()){
                WIDTH = $(element).outerWidth(), HEIGHT = $(element).outerHeight();
                handler(element);
            };
        }, time);
    };
    var _destructor = function(){
        clearInterval(id);
    };
    this.Destroy = function(){
        _destructor();
    };
    _constructor();
};