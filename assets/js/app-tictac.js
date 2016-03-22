$(document).ready(function($) {

    /**
     * Gestion de l'affichage des process tictac.
     */
    $(document).on("click",".btn-combo",function (e){
        e.preventDefault();
        var t = $(this);

        $.tictac.init(t);

        var form = $(t.attr('data-form'));
        var data = form.serialize();

        $.get(t.attr('href'),data, function(json) {
            $.tictac.stop(t, json.infotype);
        },'json').error(function(){
            $.tictac.stop(t, 'error');
        });
    });


    /**
     * Function tictac
     */
    $.tictac = {
        timer :{},
        status :{},
        init    : function (t){
            var id     = t.attr('data-tictac');
            var loader = $('<i>',{'id':'id','class':'fa fa-refresh fa-spin fa-spin-2x '});
            var status = $("<span>",{"id":"tictac-"+t.attr('data-tictac'),"class":"tictac-status"}).html(loader);

            t.prepend(" ");
            t.prepend(status);
            t.addClass('on-load');
            $.tictac.status[id] = status;

            // $.tictac.timer[id] = setInterval(function (){
            //     $.get(t.data('url'), function(json) {
            //          $($.tictac.status[id]).html(json.msg);
            //     },'json');
            // },2500);
        },
        stop    : function (t, status){
            var id      = t.attr('data-tictac');

            var label = $($.tictac.status[id]);

            var warning = $('<i>',{'id':'id','class':'fa fa-exclamation-triangle '});
            var success = $('<i>',{'id':'id','class':'fa fa-check '});

            var icon    = (status =='success')?success:warning;
            var css     = (status =='success')?'success':'warning';

            label.html(icon);
            label.removeClass('label-default');
            label.addClass(css);

            clearInterval($.tictac.timer[id]);

            setTimeout(function(){
                t.removeClass('on-load');
                label.remove();
            },5000);


             }
    };
});
