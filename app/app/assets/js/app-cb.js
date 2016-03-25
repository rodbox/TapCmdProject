$(document).ready(function($) {
    $.mode = {
        json:'application/json',
        php:'php',
        js:'text/javascript',
        html:'text/html',
        css:'text/css',
        less:'text/x-less',
        scss:'text/scss',
        twig:'text/html',
        md:'text/x-markdown',
        yml:'text/x-yaml',
        sh:'text/x-sh',
        default:'default'
    };


    $.cb['app'] = {
        before_default: function(t, e){
            console.log('before default');
        },
        refresh: function (t, json, e){
            window.location.reload();
        },
        default : function (t,json,e){
            // callback par default
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
        loadProject: function (t, e){
            $('#form-project').trigger('submit');
        },
        deployReturn: function (t, json, e){

            /**
            * TODO : creer un cross origin pour le rendre asynchrone
            **/

            var btnExtract = $("<a>",{
                'class'     : 'btn btn-secondary btn-sm ',
                'href'      : json.combo.app_upl.url,
                // 'data-cb'   : 'removeMe',
                // 'data-cb-app': 'editor',
                'target'   : 'blank'
            }).html('extract');
            btnExtract.css({
                'margin-left':'0.5rem'
            })
            t.parent('div').first().after(btnExtract);
        },
        removeMe: function (t, json, e){
            t.remove();
        },
        suiSuggest: function (t, e){
            if ($.sui.is('suggest','true'))
                $('#file_project').focus();
        }
    }
});