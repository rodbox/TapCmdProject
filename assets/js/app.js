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
                $("#result").html(json.shell);
                $.lock.off(t);
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
    })



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



    $(document).on("click",".btn-modal",function (e){
        e.preventDefault();
        var t = $(this);
        var modal = $("#myModal");
        modal.find('#modal-title').html(t.attr('title'));
        $.get(t.attr('href'), function(data) {
            $.page.init();
            modal.find('.modal-body').html(data);
            modal.modal({
            // backdrop: 'static'
            });
        });
    });



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
        on:function(t){
            t.attr('data-html',t.html());
            var loader = $('<i>',{'id':'id','class':'fa fa-refresh fa-spin fa-spin-2x '});
            t.attr('disabled','disabled');
            t.addClass('onLoad');
            t.html(loader);
        },
        off:function(t){
            t.removeAttr('disabled');
            t.removeClass('onLoad');
            t.html(t.attr('data-html'));
            t.removeClass('warning');
        },
        alert:function(t){

            var warning = $('<i>',{'id':'id','class':'fa fa-exclamation-triangle '});
            t.html(warning);
            t.addClass('warning');
            setTimeout(function(){
                $.lock.off(t);
            },3000);

            // t.html(t.attr('data-html'));
        },
        is:function(t){
            return (t.attr('disabled')=='disabled');
        }
    }
});