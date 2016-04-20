$(document).ready(function($) {
    /* CODE MIRROR  */



    /**
     * le cm en focus
     */
    $.editor = {};

    /**
     * Contient la liste de tout les cm indexer par id
     */
    $.editors = {};
        $.cm = {
            init : function (id){


                var list = [
                    'routes'
                ];

                CodeMirror.registerHelper("hint", "route", function(editor, options) {
                    var cur = editor.getCursor(), curLine = editor.getLine(editor.line);
                    var end = editor.ch, start = end;

                    return {list: $.routes, from: cur, to: curLine};
                });


                CodeMirror.commands.autocomplete = function(cm) {
                   cm.showHint({hint: CodeMirror.hint.auto});
                };

                CodeMirror.commands.route = function(cm) {
                   cm.showHint({hint: CodeMirror.hint.route});
                };

                var selector = "textarea#cm-ediror-"+id;

                $.editors[id] = CodeMirror.fromTextArea(document.getElementById("cm-ediror-"+id), {
                    theme           : "tomorrow-night-bright",
                    lineNumbers     : true,
                    styleActiveLine : true,
                    tabSize         : 8,
                    lineWrapping    : true,
                    mode            : "php",
                    gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
                    keyMap          : "sublime",
                    autoCloseBrackets: true,
                    extraKeys: {
                        "Ctrl-Alt": "route",
                        "Ctrl-Space": "autocomplete"
                    },
                    matchBrackets   : true
                })

                $.editors[id].on("change",function (editor, change){
                    var t = $(this);
                    $.protect.on(id);
                    sessionStorage.setItem(t.attr('data-editor'),editor.getValue());
                });

                // $.editors[id].commands.autocomplete = function(cm) {
                //     cm.showHint({hint: CodeMirror.hint.anyword});
                //   };

                /* Mise a jour du textarea d'origine */
                $.editors[id].on("change",function(editor, change){
                        $.editors[id].save();

                    });

                var eventContextMenu = ($.isBrowser.Firefox)?'mousedown':'click';

                $.editors[id].on(eventContextMenu, function(cm, e){
                        if (e.button == 2) {
                            $(document)[0].oncontextmenu = function() {
                                return false;
                            }

                            $.toggleMouseMenu(e);
                        }
                    });

                $.editors[id].on("focus",function(cm, e){
                    $.editor = cm;
                    $.sui.set('cm',cm.getOption('mode'));
                })

                $.editor = $.editors[id];
                $.editor.focus();
            },
            destroy : function (id){
                $.editors[id].toTextArea();
            }
        };

    $.protect = {
        on: function (id){
            var tab = $('.nav-link.editor-'+id);
            var rel = tab.attr('data-rel');
            tab.addClass('cm-protect');
        },
        off: function (id){
            var tab = $('.nav-link.editor-'+id);
            var rel = tab.attr('data-rel');
            tab.removeClass('cm-protect');
        }
    }


    /**
     * Bouton codemirror
     */
    $(document).on("click",".btn-cm",function (e){
        e.preventDefault();
        var t            = $(this);

        var editorActive = t.parents('.sui-editor-grid').find('.nav-link.files-editor.active').first();

        var id           = editorActive.attr('data-editor');

        var editor       = $.editors[id];
        var dir          = editorActive.attr('data-rel');
        var content      = editor.getValue();

        $.lock.on(t);
        var data = {
            dir: dir,
            content : content,
            id: id
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

$(document).on("click",".btn-cm-modal",function (e){
    e.preventDefault();
    var t     = $(this);

    var title = t.attr('title');
    var href  = t.attr('href');

    var size  = 'modalSm';

    var data = {
        selection : $.editor.getSelection()
    }

    $.modal(title, href, data, size, t);

    if(t.data('cb'))
        $.cb['editor'][t.data('cb')](t, json, e);

})

$(document).on("click",".nav-link.files-editor",function (e){
    var t = $(this);
    if($.force()){
        var url = $.generate.url.exec('editor','edit-reload');
        $.get(url,{file:t.attr('data-rel')}, function(json) {
            var editor = $.editors[t.data('editor')];
            editor.setValue(json.content);
            editor.clearHistory();
            t.removeClass('cm-protect');
        },'json');
    }

})

});