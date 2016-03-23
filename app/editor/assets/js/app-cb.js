$(document).ready(function($) {
    $.cb['editor'] = {
        default : function (t, json, e){
            alert(json.msg);
        },
        setEditor: function (t, json, e){
            $('.files .active').removeClass('active');
            t.addClass('active');
            t.attr('data-editor',json.id)

            var ext   = t.attr('data-ext');
            var mode  = ($.mode[ext]==undefined)?'default':$.mode[ext];


            /**
            * TODO : corriger l'attribution du fichier ouvert pour les tabulations
            **/
            $('#file-open-'+json.id+'.open').val(json.dir+'/'+json.file);

            $('#file-open-mode-'+json.id).html(mode);

            $.editor.setOption("mode",mode);
            $.editor.setValue(json.content);
            $.editor.clearHistory();


            $.sui.set('cm',$.editor.getOption('mode'));

        },
        toggleFolder: function (t, json, e){
            t.addClass('loaded');
            t.after(json.content);
        },
        openDir: function (t, json, e){
            console.log(json);
        },
        editorSave: function (t, json, e){
            $.protect.off(json.id);
            if($.sui.is('autorefresh','true'))
                $('.form-iframe').trigger('submit');
        },
        editorClose: function (t, json, e){
            $("[data-editor="+t.attr('data-editor')+"]").remove();
        },
        fileSearchOn: function (t, e){
            /**
            * TODO : creer la recherche dynamique
            **/
            var action = $(t.data('target')).attr('action')
            $.get(action, function(json) {
                $.suggest.on(t, json.content);
            },'json');
        },
        fileSearchOff: function (t, e){
            var action = $(t.data('target')).attr('action')
            $.suggest.off();
        },
        fileSearch: function (t, e){
             /**
            * TODO : creer la recherche dynamique faire les tests de performance
            * stockage dans le storage
            **/
            var action = $(t.data('target')).attr('action')
            // $.get(action, function(data) {
            //     optional stuff to do after success
            // });
            console.log('file_search');
        },
        templateMenu: function (t, e){
            $('.contextmenu-active').removeClass('contextmenu-active');


            if (t.next("#templates").length == 1)
                $("#templates").remove();

            else{
                var url = $.generate.url.view('editor','templates-menu','templates');
                $("#templates").remove();
                var data = {
                    dir : t.data('dest')
                };
                var param = $.param(data);
                $.get(url+"&"+param, function(data) {
                    console.log(e);
                    var div = $("<div>",{"id":"templates","class":"contextmenu"}).html(data);
                    div.css({
                        position:'static',
                        'z-index':2500,
                        top:t.position().top + t.height(),
                        left:t.position().left,
                        width:t.outerWidth()
                    })
                    t.after(div);
                    $('.autofocus').focus();
                    t.addClass('contextmenu-active');
                });
            }
        },
        toggleMouseMenu: function (t, e){
          console.log('toggle mouse');
           // $.toggleMouseMenu(e);
        },
        starsRefresh: function (t, json, e){
            $('#files-stars').replaceWith(json.content);
        },
        editor_init: function (t, json, e){
            $('.files-editor').removeClass('active').attr('aria-expanded','false');
            $('.editor-'+json.id).addClass('active').attr('aria-expanded','true');
        }
    }

    $.suggest = {
        on: function(t, list){
            var suggest  = $("<div>",{"id":"suggest","class":"suggest-list"}).html(list);

            var offset   = t.offset();
            var position = t.position();
            suggest.css({
                top:offset.top + t.outerHeight() + 5,
                left: offset.left
            });
            $('body').append(suggest);

            $("#suggest").fileext();
        },
        off: function (){
            setTimeout(function (){
                $('#suggest').remove();
            },150);
        }
    }

});