(function($) {
    $.fn.finder = function(paramSend) {
        $(this).on({
            focusin : function (e){
                e.preventDefault();console.log(e);
            },
            focusout : function (e){
                console.log(e);
            },
            keydown: function (e){
                var t = $(this);
                console.log(e);
            },
            keyup: function(e){console.log(e);
                // if(p.finder){
                //     var eval = $.inArray(e.keyCode, [40,38,13]);
                //     if (eval<0)
                //         filter();
                // }
            }
        })


        /* créer la regexp pour trouver le resultat */
        function regexp() {
            var strReg = "";
            var strFind = p.t.val();
            var regexp = "[a-zA-Z0-9\\.\.\\s\_\-]{0,}";
            for (var i = 0; i < strFind.length; i++) strReg = strReg  + strFind[i] + "{1}(" + regexp + ")";
            p.reg = strReg;
        }



    }
});


$(document).ready(function($) {

$('#file_project').finder();




});