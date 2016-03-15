$(document).ready(function($) {
    $.cb['app'] = {
        default : function (t,json,e){
            alert(json.msg);
        },
        copy : function(t,json,e){

            $('input#tmp').remove();
            var tmp = $("<input>",{"id":"tmpName","name":"tmp","type":"hidden"}).val(json.tmp);
            t.after(tmp);



            $.cb['app']['default'](t,json,e);
        },
        cmd : function(t,json,e){
            // alert(json.project);
        },
        upl : function (t,json,e){
            $('span.time_upl').html(json.upl);
            $('input.time_upl').val(json.upl);
        },
        config : function (t, json, e){
            $('span.time_upd').html(json.upd);
            $('input.time_upd').val(json.upd);
        }
    }
});