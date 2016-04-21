$(document).ready(function($) {
    $.timeKey = {};

    $.cb['editor'] = {
        before_default: function (t, e){

        },
        default : function (t, json, e){
            alert(json.msg);
        },
        setEditor: function (t, json, e){
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
            $.protect.off(json.id);
            sessionStorage.setItem(json.id,json.content);
            $.sui.set('cm',$.editor.getOption('mode'));
            $.cb.editor.tabSortable();
        },
        tabSortable: function (){
            $('.nav-tabs-editor').sortable('destroy');
            $('.nav-tabs-editor').sortable({
                connectWith: '.nav-tabs-editor',
            }).bind('sortupdate', function(e, ui) {

                // if (ui.endparent != ui.startparent)
                //     $(ui.startparent).find('> li').last().find('a').trigger('click')

                var item        = $(ui.item);

                var editorID    = item.attr('data-editor');
                $.cm.destroy(editorID);

                var tabLink     = $(ui.item).find('.nav-link');
                var itemContent = $(tabLink.attr('href'));

                itemContent.remove();
                var content     = itemContent.clone();
                var parent      = item.parents('.sui-editor-grid').find('.tab-content');

                parent.append(content);
                $.cm.init(editorID);
                tabLink.trigger('click');

                var data = {
                    id:editorID,
                    pane:parent.attr('data-pane-id')
                };
                var url = $.generate.url.exec('editor','ws_upd');
                $.post(url, data);
            });
            // END : sortable system
        },
        toggleFolder: function (t, json, e){
            t.addClass('loaded');
            t.after(json.content);
        },
        openDir: function (t, json, e){
            console.log(json);
        },
        editorSave: function (t, e){
            var tab     = t.parents('.sui-editor-grid').find('a.nav-link.active');
            var id      = tab.attr('data-editor');
            var file    = tab.attr('data-rel');
            var type    = $.editorsType[tab.attr('data-editor')];
            var content = $.editorGetValue[type](id);
             $.lock.on(t);

            var url = $.generate.url.exec('editor','save');
            var data = {
                file:file,
                dir:file,
                id:id,
                content:content
            }



            console.log(data);



              $.post(url, data, function(json, textStatus, xhr) {


                $.lock[json.infotype](t, json.msg);
                $.protect.off(json.id);
                // if(json.cb)
                //   $.callback[json.cb](t,e,json);
                //  callback return
                // else if (t.data('callback'))
                //   $.callback[t.data('callback')](t,e,json);

              },'json');



            if($.sui.is('autorefresh','true'))
                $.cb['editor']['refresh'](t, json, e);
        },
        refresh: function (t, json, e){
            // si la fenetre interne le l'iframe est activé on rafraichie.
                if($.sui.is('iframe','true'))
                    $('#iframe-form').trigger('submit');

                // sinon on rafraichit la popup
                else
                    $('#iframe').trigger('click');
        },
        editorClose: function (t, json, e){
            $.close(t.attr('data-editor'));
            sessionStorage.removeItem(t.attr('data-editor'));
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

            $.each(json.target, function(index, val) {
                 $(index)[json.a](val);
            });
        },
        editor_init: function (t, json, e){

            var grid = $('.editor-'+json.id+'.nav-link').parents('.sui-editor-grid');

            $.editorsType[json.id] = json.editor;

            grid.find('.files-editor.nav-link').removeClass('active').attr('aria-expanded','false');
            grid.find('.files-editor.tab-pane').removeClass('active').attr('aria-expanded','false');
            $('.editor-'+json.id+'.nav-link').addClass('active').attr('aria-expanded','true');
            $('.editor-'+json.id+'.tab-pane').addClass('active').attr('aria-expanded','true');

            /**
             * Fix scroll on open
             */
            var sidebar = $('.sui-sidebar');
            var scroll  = sidebar.scrollTop();
            sidebar.scrollTop(scroll + t.outerHeight() - 3);
        },
        overidesList: function (t, e){
            var url = $.generate.url.exec('editor','overides');
            var data = {
                bundle: t.val()
            };
            $.get(url, data, function(json) {
                $('#overides-content').html(json.data);
                $('#overides-content .select2').select2();
                $.page.init('#overides-content');

            },'json');
        },
        loadOverideArchive: function (t, e){
            console.log(t);
        },
        triggerTabs: function (t, json, e){
            $('#editor-'+json.id+'.nav-link').trigger('click');
            console.log(json);
        },
        assetsExpose: function (t, e, json){
            $('#assetsExpose').trigger('click');
        }
    }

    $.suggest = {
        on: function(t, list){
            var suggest  = $("<div>",{"id":"suggest","class":"suggest-list"}).html(list);

            var offset   = t.offset();
            var position = t.position();
            suggest.css({
                top:10 + t.outerHeight() + 5,
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