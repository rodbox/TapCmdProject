$(document).ready(function($) {
    $(document).on("click",".btn-cmd ",function (e){
        // e.preventDefault();
        var t    = $(this);

        var form = $(t.attr('data-src'));

        var data = form.serialize();
        $.post(form.attr('action'), data, function(json) {
            $("#result").html(json.shell);
        },'json');


    });

    $(document).on("submit",".form-live",function (e){
        e.preventDefault();
        // var t    = $(this);
        // var data = t.serialize();
        // $.post(t.attr('action'),data, function(json) {
        //     $("#result").html(json.shell);
        // },'json');

    });

    $(document).on("click",".btn-modal",function (e){
        e.preventDefault();
        var t = $(this);
        var modal = $("#myModal");

        modal.modal({
            // backdrop: 'static'
        });

    })
});