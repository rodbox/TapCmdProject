$.shortcut={
    keyup: function(e){
        console.log(e);
    },
    keydown: function(e){
        console.log(e.keyCode);
        if(e.keyCode == 83 && $.kalte("onCmd")){
            e.preventDefault();
            $('#editorSave').trigger('click');
        }
        else if((e.keyCode == 81 || e.keyCode == 87) && $.kalte("onCmd")){
            e.preventDefault();
            $('.nav-link.active + .editor-close').trigger('click');
        }
        else if ($.kalte("onCmd") && e.keyCode >= 49 && e.keyCode <=57){
            e.preventDefault();
            $('#filesStars a.btn-f-edit').eq(e.keyCode - 49).trigger('click');
        }

        else if ($.kalte("onAlt") && e.keyCode >= 49 && e.keyCode <=57){
            e.preventDefault();
            $('#filesTabs a.files-editor').eq(e.keyCode - 49).trigger('click');
        }

        else if ($.kalte("onCmd") && e.keyCode == 84){
            e.preventDefault();
            $('#popupTest').trigger('click');
        }

        else if ($.kalte("onCmd") && e.keyCode == 69){
            e.preventDefault();
            $('#iframe').trigger('click');
        }
        else if ($.kalte('onCmd') && $.kalte('onCtrl')){
            $('.btn-sui-suggest').trigger('click');
        }
    }
};