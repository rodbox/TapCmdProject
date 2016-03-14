$(document).ready(function($) {



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
            },'json').error(function (err){
                $.lock.alert(t);
            });
        }
    })



    $(document).on("click",".btn-modal",function (e){
        e.preventDefault();
        var t     = $(this);

        if(!$.lock.is(t)){

            $.lock.on(t);

            var modal = $("#myModal");
            modal.find('#modal-title .title').html(t.attr('title'));

            if(t.data('form') != "")
                data = $(t.data('form')).serialize();
            else
                data = {};


            $.get(t.attr('href'), data, function(json) {
                $.lock.off(t);
                $.page.init();
                modal.find('.modal-body').html(json.page);

                if (json.title != undefined){
                    modal.find('#modal-title .title').append(" : ");
                    modal.find('#modal-title .subtitle').html(json.title);
                }

                modal.modal(t.data());
            },'json');
        }
    });



    $(document).on("mouseup mousedown",".btn-cmd",function (e){
        if(e.type=='mousedown')
            $(this).addClass('onLoad');
        else
            $(this).removeClass('onLoad');
    });



    $(document).on("click",".btn-live",function (e){
        e.preventDefault();
        var t = $(this);
        $.get(t.attr('href'), function(data) {
            $('#app-page').html(data);
            $.page.init();
        });
    })







    $(document).on("submit",".form-live",function (e){
        e.preventDefault();
        var t = $(this);
        var data  = t.serialize();

        var submit = $("[type=submit]");

        if(!$.lock.is(submit)){
            $.lock.on(submit);

            $.post(t.attr('action'), data, function(json, textStatus, xhr) {
               $.lock.off(submit);
            },'json').error(function(err){
                $.lock.alert(submit);
            });

        };
    })


    // init a chaque chargement de page
    $.page = {
        init: function (){

        }
    }


    $.lock = {
        on:function(t, msg){
            var loader = $('<i>',{'id':'id','class':'fa fa-refresh fa-spin fa-spin-2x '});

            t.attr('data-html',t.html());
            t.css({
                'min-width':t.outerWidth()
            });
            t.html(loader);
            t.attr('disabled','disabled');
            t.addClass('onLoad');

            if (msg != undefined)
                t.append(' '+msg);
        },
        off:function(t){
            setTimeout(function(){
                t.removeAttr('disabled');
                t.removeClass('onLoad');
                t.html(t.attr('data-html'));
                t.removeClass('warning');
                t.removeClass('success');
            },400);
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