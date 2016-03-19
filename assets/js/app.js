(function($) {
    // creer un attribut data-ext avec l'extension du fichier dans data-file
    $.fn.fileext = function(options) {
        var list = $(this).find("a.file-ext, .extension-me, .ext-me");

            $.each(list,function(){
                var t    = $(this);
                var file = t.data("file");
                var ext  = file.split('.');
                t.attr("data-ext",ext[ext.length - 1]);
            })

        return this;
    };
})(jQuery);

$(document).ready(function($) {
    $(".context-sidebar-body").fileext();
    // Stock les callbacks des fichiers app-cb.js
    $.cb = {};

    $(document).on("click",".btn-cmd ",function (e){
        e.preventDefault();
        var t    = $(this);

        var form = $(t.attr('data-src'));
        var data = {
            project:$('#project').val(),
            cmd:t.attr('data-cmd')
        };

        if(!$.lock.is(t)){

            $.lock.on(t);

            $.post(t.attr('href'), data, function(json) {
                $(t.data('target')).html(json.shell);
                $.lock.success(t,json.msg);

                $(".cmd-item")
                    .removeClass('active')
                    .attr('aria-expanded',false);

                $(".cmd-item-"+t.attr('data-cmd'))
                    .addClass('active')
                    .attr('aria-expanded',true);

                $.cb['app']['cmd'](t, json, e);

            },'json').error(function (err){
                $.lock.alert(t);
            });
        }
    });



    $(document).on("click",".btn-form",function (e){
        e.preventDefault();
        var t = $(this);

        var form = $(t.attr('data-src'));
        var data = form.serialize();

        if(!$.lock.is(t)){

            $.lock.on(t);

            $.post(form.attr('action'), data, function(json) {
                $.lock.off(t);
            },'json').error(function (err){
                $.lock.alert(t);
            });
        }
    });



    $(document).on("click",".btn-exec",function (e){
        e.preventDefault();
        var t = $(this);

        var form = $(t.attr('data-form'));
        var data = form.serialize();

        if(!$.lock.is(t)){

            $.lock.on(t);

            $.post(t.attr('href'), data, function(json) {
                $.lock.success(t,json.msg);
                if (t.data('cb'))
                    $.cb['app'][t.data('cb')](t, json, e);
                else
                    $.cb['app']['default'](t, json, e);

            },'json').error(function (err){
                $.lock.alert(t);
            });
        }
    });



    $(document).on("click",".btn-canvas",function (e){
        e.preventDefault();
        var t = $(this);

        var canvasId = t.attr("data-canvas");
        var img      = document.getElementById(canvasId);
        var context  = img.getContext('2d');
        var ext      = 'png';
        var imgData  = img.toDataURL("image/"+ext);
        var img      = {
                ext   : ext,
                img   : imgData
        }

        var form = $(t.attr('data-form'));
        var data = {
            project:$("#project").val(),
            img:img

        };

        if(!$.lock.is(t)){

            $.lock.on(t);

            $.post(t.attr('href'), data, function(json) {
                $.lock.success(t,json.msg);
            },'json').error(function (err){
                $.lock.alert(t);
            });
        }
    });



    $(document).on("click",".btn-modal",function (e){
        e.preventDefault();
        var t     = $(this);

        if(!$.lock.is(t)){

            $.lock.on(t);

            if(t.data('modal'))
                var modal = $(".modal#"+t.data('modal'));
            else
                var modal = $("#modalM");

            modal.find('.title').html(t.attr('title'));

            if(t.data('form') != "")
                data = $(t.data('form')).serialize();
            else
                data = {};

            $.get(t.attr('href'), data, function(json) {
                $.lock.off(t);

                modal.find('.modal-body').html(json.page);

                if (json.title != undefined){
                    modal.find('.title').append(" : ");
                    modal.find('.subtitle').html(json.title);
                }

                modal.modal(t.data());
                $.page.init('#'+modal.attr('id'));
            },'json').error(function (err){
                $.lock.alert(t);
            });
        }
    });



    $(document).on("mouseup mousedown",".btn-cmd",function (e){
        if(e.type=='mousedown')
            $(this).addClass('onPress');
        else
            $(this).removeClass('onPress');
    });



    $(document).on("click",".btn-live",function (e){
        e.preventDefault();
        var t = $(this);
        $.get(t.attr('href'), function(data) {
            $('#app-page').html(data);
            $.page.init();
        });
    })



    $(document).on("click",".btn-cb",function (e){
        e.preventDefault();
        var t = $(this);

        if (t.data('cb'))
            $.cb['app'][t.data('cb')](t, json, e);
        else
            $.cb['app']['default'](t, json, e);
    })



    $(document).on("submit",".form-live",function (e){
        e.preventDefault();
        var t = $(this);
        var data  = t.serialize();

        var submit = t.find("[type=submit]");

        if(!$.lock.is(submit)){
            $.lock.on(submit);

            $.post(t.attr('action'), data, function(json, textStatus, xhr) {
               $.lock.off(submit);

                if (t.data('cb'))
                    $.cb['app'][t.data('cb')](t, json, e);
                else
                    $.cb['app']['default'](t, json, e);

            },'json').error(function(err){
                $.lock.alert(submit);
            });

        };
    })







    // init a chaque chargement de page
    $.page = {
        init: function (container){
            if (container != undefined)
                var cont = $(container);
            else
                var cont = $('body');

            cont.find('.input-colors').colorpicker()
        }
    };

    $.page.init();

    $.lock = {
        on:function(t, msg){
            var loader = $('<i>',{'id':'id','class':'fa fa-refresh fa-spin fa-spin-2x loader'});

            t.attr('data-html',t.html());
            t.css({
                'min-width':t.outerWidth()
            });
            t.find('i').hide();
            t.prepend(loader);
            t.attr('disabled','disabled');
            t.addClass('disabled');
            t.addClass('onLoad');

            if (msg != undefined)
                t.append(' '+msg);
        },
        off:function(t){
            setTimeout(function(){
                t.removeAttr('disabled');
                t.removeClass('onLoad');
                t.removeClass('disabled');
                t.find('i').show();
                t.find('.loader').remove();
                t.html(t.attr('data-html'));
                t.removeClass('warning');
                t.removeClass('success');
            },200);
        },
        alert:function(t, msg){
            var warning = $('<i>',{'id':'id','class':'fa fa-exclamation-triangle '});

            t.html(warning);
            t.removeClass('onLoad');
            t.addClass('warning');
            if (msg != undefined)
                t.append(' '+msg);

            setTimeout(function(){
                $.lock.off(t);
            },3000);
        },
        success:function(t, msg){
            var success = $('<i>',{'id':'id','class':'fa fa-check '});

            t.html(success);
            t.removeClass('onLoad');
            t.addClass('success');
            if (msg != undefined)
                t.append(' '+msg);

            setTimeout(function(){
                $.lock.off(t);
            },3000);
        },
        is:function(t){
            return (t.attr('disabled')=='disabled');
        }
    }

});


