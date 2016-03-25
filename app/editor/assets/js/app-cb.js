$(document).ready(function($) {
    $.timeKey = {};

    $.cb['editor'] = {
        before_default: function (t, e){

        },
        default : function (t, json, e){
            alert(json.msg);
        },
        setEditor: function (t, json, e){
            // $('.files .active').removeClass('active');
            // t.addClass('active');
            // t.attr('data-editor',json.id)

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
            $.opens(-1);
          },
        fileSearchOn: function (t, e){
            $.suggest.on(t,'');
            if(t.val()!='')
                $.cb.editor.fileSearch(t, e);
        },
        fileSearchOff: function (t, e){
            $.suggest.off(t);
        },
        fileSearch: function (t, e){
            clearTimeout($.timeKey);
            if($.keyNav('.suggest-list', t, e)){

                var data = {
                    search : t.val(),
                    reg:$.regexp(t.val())
                }

                var action = $(t.data('target')).attr('action');

                $.timeKey = setTimeout(function (){
                    $.get(action,data, function(json) {
                        $('.suggest-list').html(json.content);
                        $(".suggest-list").fileext();
                        $(".suggest-list a").first().addClass('active');
                    },'json');
                },350);
            }
        },
        fileSearchNav: function (t, e){
            $.keyNav('.suggest-list', t, e);
        },
        contextmenu: function (t, e){
            $('.contextmenu-active').removeClass('contextmenu-active');


            if (t.attr('data-context-menu') == undefined)
                var contextmenu = 'default-contextmenu';
            else
                var contextmenu = t.attr('data-context-menu');

            if (t.attr('data-context-model') == undefined)
                var model = '';
            else
                var model = t.attr('data-context-model');

            if (t.next("#contextmenu").length == 1)
                $("#contextmenu").remove();

            else{
                var url = $.generate.url.view('editor', contextmenu, model);
                $("#contextmenu").remove();

                var data = {
                    dir : t.data('dest'),
                    file : t.data('file'),
                    ext : t.data('ext')
                };
                var param = $.param(data);
                $.get(url+"&"+param, function(data) {
                    console.log(e);
                    var div = $("<div>",{"id":"contextmenu","class":"contextmenu"}).html(data);
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
            $('.files-editor.nav-link').removeClass('active').attr('aria-expanded','false');
            $('.files-editor.tab-pane').removeClass('active').attr('aria-expanded','false');
            $('.editor-'+json.id+'.nav-link').addClass('active').attr('aria-expanded','true');
            $('.editor-'+json.id+'.tab-pane').addClass('active').attr('aria-expanded','true');
        },
        overidesList: function (t, e){
            var url = $.generate.url.exec('editor','overides');
            var data = {
                bundle: t.val()
            };
            $.get(url, data, function(json) {
                $('#overides-content').html(json.data);
            },'json');
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

            $(".suggest-list").fileext();
        },
        off: function (t){
            t.val('');
            setTimeout(function (){
                $('.suggest-list').remove();
            },150);
        }
    }

    $.regexp = function (str) {
        var strReg  = "";
        var strFind = str;
        var regexp  = "[a-zA-Z0-9\\.\.\\s\_\-]{0,}";
        for (var i  = 0; i < strFind.length; i++) strReg = strReg  + strFind[i] + "{1}(" + regexp + ")";
        return strReg;
    }

    $.keyNav = function(target, t, e){
        var tar    = $(target);
        var active = tar.find('.active');
        active.removeClass('active');

        if(e.keyCode == 27)
            t.val('');
        else if(e.keyCode == 40){
            if(!active.is(':last'))
                active.next().addClass('active');
        }
        else if(e.keyCode == 38){
            if(!active.is(':first'))
                active.prev().addClass('active');
        }
        else if(e.keyCode == 13)
            active.trigger('click');

        var inarr = $.inArray(e.keyCode, [27,40,38,13]);
        console.log(inarr);

        if(inarr > 0)
            return false;
        else
            return true;
    }
});