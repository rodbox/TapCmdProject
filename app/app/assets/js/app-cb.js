$(document).ready(function($) {
    $.cb['app'] = {
        default : function (t,json,e){
            // callback par default
            alert(json.msg);
        },
        copy : function(t,json,e){
            // copie du projet dans le tmp
            $('input#tmp').remove();
            var tmp = $("<input>",{"id":"tmpName","name":"tmp","type":"hidden"}).val(json.tmp);
            t.after(tmp);

            $.cb['app']['default'](t,json,e);
        },
        cmd : function(t,json,e){
            // Execution d'une commande
        },
        upl : function (t,json,e){
            // upload du projet
            $('span.time_upl').html(json.upl);
            $('input.time_upl').val(json.upl);
        },
        config : function (t, json, e){
            // enregistrement de la config
            $('span.time_upd').html(json.upd);
            $('input.time_upd').val(json.upd);
        },
        final: function (t, json, e){
            // retour du combo de deploiement

        },
        todo_new: function (t, json, e){
            // creation d'une nouvelle tache
            // alert(t.data('cb'));
            t.find('input').val('');
            var todo = $(json.todo).addClass('todo-new');
            $('#todo-list').prepend(todo);
        },
        todo_del: function (t, json, e){
            // upd d'une tache
            $(t.data('target')).remove();
        },
        todo_check: function (t, json, e){
            // upd d'une tache
            $(t.data('target')).addClass('todo-checked');
        },
        setEditor: function (t, json, e){
            // $.editor.setOption("mode",mode[ext]);
            $('.files .active').removeClass('active');
            t.addClass('active');
            $.editor.setValue(json.content);
            $.editor.clearHistory();

        },
        toggleFolder: function (t, json, e){
            t.addClass('loaded');
            t.after(json.content);
        }
    }
});