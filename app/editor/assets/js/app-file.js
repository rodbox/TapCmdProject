$(document).ready(function($) {
    $(document).on("click",".btn-f-explore",function (e){
        e.preventDefault();
        var t = $(this);

        if($.alt()){
            $.get(t.data('alt'), t.data());
            $.clear_alt();
        }

        else if(!t.hasClass('loaded') || $.force()){
            $.get(t.attr('href'), t.data(), function(json) {
                t.addClass('loaded');

                if(t.next('ul').length == 1)
                    t.next('ul').replaceWith(json.content);
                else
                    t.after(json.content);

                $(t.next('ul')).fileext();
            },'json');
        }
        else
            t.next('ul').toggle();
    })



    $(document).on("click",".btn-sh",function (e){
        e.preventDefault();
        var t = $(this);

        if($.alt()){
            $.get(t.data('alt'), t.data());
            $.clear_alt();
        }

        else{
            $.get(t.attr('href'), t.data(), function(json) {
                if(t.data('cb'))
                    $.cb['editor'][t.data('cb')](t, json, e);
            },'json');
        }
    })

    $(document).on("click"," [data-rel]",function (e){
        var t = $(this);
        $('.rel-active').removeClass('rel-active');
        $('[data-rel="'+t.data('rel')+'"]').addClass('rel-active');
    })

    $(document).on("click",".btn-f-edit",function (e){
        e.preventDefault();
        var t = $(this);
        $('.rel-active').removeClass('rel-active');
        $('[data-rel="'+t.data('rel')+'"]').addClass('rel-active');

        if($.alt()){
            $.get(t.data('alt'), t.data());
            $.clear_alt();
        }

        else{
            $.get(t.attr('href'), t.data(), function(json) {
                $.each(json.target, function(index, val) {
                    $(index)[json.a]($(val));
                    $.opens(1);
                });

                $.cb['editor'][json.cb](t, json, e);
                    $.cm.init(json.id);

                $.cb.editor.setEditor(t, json, e);
            },'json');
        }
    })


    $('#filesOpens .btn-f-edit').trigger('click');

    $.opens = function(inc){
        var opens = $('#files-workspace').attr('data-open');
        var count = parseInt(opens);

        $('#files-workspace').attr('data-open',count+inc);
    }

    $(document).on("submit",".form-iframe",function (e){
        e.preventDefault();
        var t   = $(this);
        var url = t.attr('action')+$('#urlPreview').val();
        $(t.data('target')).attr('src',url);
    });


    $.close = function (id){
        var tabs    = $('.nav-item[data-editor='+id+']');
        var sibling = (tabs.is(':first-child'))?tabs.next():tabs.prev();
        sibling.find('.nav-link').trigger('click');
        $("[data-editor="+id+"]").remove();
        $.opens(-1);
    }
});