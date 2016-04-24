$.shortcut={
    keyup: function(e){

    },
    keydown: function(e){

        $("#keyconsole").html(e.keyCode);

        if(e.keyCode == 90 && $.kalte("onCmd")){
            e.preventDefault();
             $('#draw_undo').trigger('click');
        }

        else if(e.keyCode == 83 && $.kalte("onCmd")){
            e.preventDefault();
            $('#draw_save').trigger('click');
        }
        else if ($.kalte("onAlt") && e.keyCode >= 49 && e.keyCode <=57){
            e.preventDefault();
            $('a.btn-tool').eq(e.keyCode - 49).trigger('click');
        }

        else if ($.kalte("onAlt") && e.keyCode == 88){
            e.preventDefault();
            var color1 = $('#color1').val();
            var color2 = $('#color2').val();

            $('#color1').val(color2).trigger('change');
            $('#color2').val(color1).trigger('change');
        }

        else if ($.kalte("onCtrl") && e.keyCode >= 49 && e.keyCode <=57){
            e.preventDefault();
            $('a.btn-open').eq(e.keyCode - 49).trigger('click');
        }


    }
};