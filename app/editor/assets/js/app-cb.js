$(document).ready(function($) {
    $.cb['editor'] = {
        default : function (t,json,e){
            alert(json.msg);
        }
    }
});