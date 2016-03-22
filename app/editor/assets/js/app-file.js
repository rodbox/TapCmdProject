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


    $(document).on("click",".btn-f-edit",function (e){
        e.preventDefault();
        var t = $(this);

        if($.alt()){
            $.get(t.data('alt'), t.data());
            $.clear_alt();
        }

        else{
            $.get(t.attr('href'), t.data(), function(json) {
                $.each(json.target, function(index, val) {
                    $(index).append($(val));
                });

                $.cb['editor'][json.cb](t, json, e);
                    $.cm.init(json.id);

                $.cb.editor.setEditor(t, json, e);
            },'json');
        }
    })

    $(document).on("submit",".form-iframe",function (e){
        e.preventDefault();
        var t   = $(this);
        var url = t.attr('action')+$('#urlPreview').val();
        $(t.data('target')).attr('src',url);
    });







    $(document).on("click",".editor-close",function (e){
        e.preventDefault();
        var t      = $(this);
        var target = $(t.data('target'));

        /**
        * TODO :
        * - rajouter une condition pour ouvrir l'onglet suivant si on ferme le premier.
        * - corriger l'attribut du tabs
        **/

        var sibling = (target.is(':first-child'))?target.prev():target.next();

        sibling.addClass('active').find('.nav-link').addClass('active').attr('aria-expanded',true);

        if (target.hasClass('lock')){
            if (confirm('delete ?'))
                target.remove();
        }
        else
            target.remove();

    })

    // $(document).on("mousedown",".CodeMirror",function (e){

    //     if (e.button == 2) {
    //         e.preventDefault();

    //         $(document)[0].oncontextmenu = function() {
    //             return false;
    //         }
    //         var t = $(this);
    //         var cbapp = (t.data('cb-app')==undefined)?'app':t.data('cb-app');

    //         $.cb[cbapp][t.data('cb-r-click')](t, e);
    //     }
    // })

});