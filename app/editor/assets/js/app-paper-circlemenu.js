$.hideMouseMenu = function(){
        $('#circle-mouse').hide().removeClass('open');
    }
    $.toggleMouseMenu = function (e){
        // var cursor    = $.editor.getCursor();
        var mouseMenu = $('#circle-mouse');
        if (!mouseMenu.hasClass('open')) {
            mouseMenu.css({
                left:e.clientX,
                top:e.clientY
            }).show().addClass('open');
        }
        else
            mouseMenu.hide().removeClass('open');
    }
    /* End Mouse menu */