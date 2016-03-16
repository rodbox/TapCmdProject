$(document).ready(function($) {

    var open  = {};
    var delay = 250;


    $(document).on('mouseenter', '.checkdown', function (e){
        var t           = $(this);
        if (t.attr('data-checkdown') != undefined)
            var checkdown = t.attr('data-checkdown');
        else{
            var rand        = Math.random().toString(36).substring(2);
            var checkdown   = t.attr('data-checkdown',rand);
        }

        if(open != undefined && open[checkdown] != undefined)
            clearTimeout(open[checkdown]);

        if(!t.find('.checkdown-btn').hasClass('disabled')){
            open[checkdown] = setTimeout(function(){
                t.addClass('open');
            }, delay);
        }

    });

    $(document).on('mouseleave', '.checkdown', function (e){
        var t = $(this);
        open[t.attr('data-checkdown')] = setTimeout(function(){
            t.removeClass('open');
        }, delay);
    });

    $(document).on('click', '.checkdown-btn', function(){
        var t = $(this);
        t.parent('.checkdown').removeClass('open');
    })
});