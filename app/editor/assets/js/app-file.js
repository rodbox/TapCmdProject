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
            },'json');
        }
        else{
            t.next('ul').toggle();
        }
    })


    $(document).on("click",".btn-f-edit, .btn-sh",function (e){
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

    $(document).on("submit",".form-iframe",function (e){
        e.preventDefault();
        var t  = $(this);
        var url = t.attr('action')+$('#urlPreview').val();
        $(t.data('target')).attr('src',url);
    });



    /**
     * Bouton codemirror
     */
    $(document).on("click",".btn-cm",function (e){
        e.preventDefault();
        var t = $(this);

        $.lock.on(t);
        var data ={
            dir: $('.fileOpen.open').val(),
            content : $.editor.getValue()
        }

        $.post(t.attr('href'), data, function(json, textStatus, xhr) {
            $.lock[json.infotype](t, json.msg);

            if(t.data('cb'))
                $.cb['editor'][t.data('cb')](t, json, e);
        },'json').error(function (err){
            var t = $(this);
            $.lock.error(t,$err);
        });

    })

});