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

        else if (e.keyCode >= 49 && e.keyCode <=57){
            $.frames.get(e.keyCode - 48);
        }

        else if (e.keyCode == 39){
            $.frames.get($.frames.cur + 1);
        }

        else if (e.keyCode == 37){
            $.frames.get($.frames.cur - 1);
        }

        else if ($.kalte("onCmd") && e.keyCode == 68){
            e.preventDefault();
            $.pjs.unselect();
        }

        else if ($.kalte("onCmd") && e.keyCode == 65){
            e.preventDefault();
            $.pjs.selectAll();
        }

        else if ($.kalte("onAlt") && $.kalte("onMaj")){
            e.preventDefault();
            $("#searchLayer").focus();
        }

        else if ($.kalte("onCmd") && e.keyCode == 71){
            e.preventDefault();
            $.pjs.createGroup();
        }


        else if ($.kalte("onCmd") && e.keyCode == 78){
            e.preventDefault();
            $.pjs.new();
        }

        else if ($.kalte("onCmd") && e.keyCode == 88){
            e.preventDefault();
            var color1 = $('#color1').val();
            var fillColor = $('#fillColor').val();
            var color2 = $('#color2').val();
            var strokeColor = $('#strokeColor').val();

            $('#color1').val(color2).trigger('change');
            $('#color2').val(color1).trigger('change');

            $('#fillColor').val(strokeColor).trigger('change');
            $('#strokeColor').val(fillColor).trigger('change');
        }


        else if ($.kalte("onCmd") && e.keyCode == 8){
            $.pjs.selectRemove();
        }

        else if ($.kalte("onCtrl") && e.keyCode >= 49 && e.keyCode <=57){
            e.preventDefault();
            $('a.btn-open').eq(e.keyCode - 49).trigger('click');
        }


    }
};