$.shortcut={
    keyup: function(e){

    },
    keydown: function(e){

        $("#keyconsole").html(e.keyCode);

        if(e.keyCode == 83 && $.kalte("onCmd")){
            e.preventDefault();
             $('.editorSave').trigger('click');
        }

        else if(e.keyCode == 82 && $.kalte("onAlt")){
            e.preventDefault();
            $('.editorSave').trigger('click');
        }
        else if($.kalte("onCmd") && $.kalte("onAlt")){
            e.preventDefault();
            $('#btnTap').trigger('click');
            $.kaltClear();
        }
        else if((e.keyCode == 81 || e.keyCode == 87) && $.kalte("onCmd")){
            e.preventDefault();
            $('.nav-link.active + .editor-close').trigger('click');
        }
        else if ($.kalte("onCmd") && e.keyCode >= 49 && e.keyCode <=57){
            e.preventDefault();
            $('#filesStars a.btn-f-edit').eq(e.keyCode - 49).trigger('click');
        }

        else if ($.kalte("onCtrl") && e.keyCode >= 49 && e.keyCode <=57){
            e.preventDefault();
            $('#filesTabs a.files-editor').eq(e.keyCode - 49).trigger('click');
        }

        else if ($.kalte("onCtrl") && e.keyCode == 37){
            e.preventDefault();
            $('#filesTabs a.files-editor.active').parents('.nav-item').prevAll().first().find('.nav-link').trigger('click');
        }

        else if ($.kalte("onCtrl") && e.keyCode == 39){
            e.preventDefault();
            $('#filesTabs a.files-editor.active').parents('.nav-item').nextAll().first().find('.nav-link').trigger('click');

        }

        else if ($.kalte("onCmd") && e.keyCode == 84){
            e.preventDefault();
            $('.btn-sui-todo').trigger('click');
        }

        else if ($.kalte("onAlt") && e.keyCode == 9){
            e.preventDefault();
            $('.btn-sui-sidebar').trigger('click');
        }

        else if ($.kalte("onCmd") && e.keyCode == 69){
            e.preventDefault();
            $('#iframe').trigger('click');
        }

        else if ($.kalte("onCmd") && e.keyCode == 78){
            e.preventDefault();
            $('#newproject').trigger('click');
        }
        else if ($.kalte("onCmd") && e.keyCode == 80){
            e.preventDefault();
            $('#paramproject').trigger('click');
        }
        else if ($.kalte('onCmd') && $.kalte('onCtrl')){
            $('.btn-sui-suggest').trigger('click');
        }
    }
};