$(document).ready(function($) {
    $.cb['editor'] = {
        default : function (t, json, e){
            alert(json.msg);
        },
        setEditor: function (t, json, e){
            $('.files .active').removeClass('active');
            t.addClass('active');
            var ext = t.attr('data-ext');
            var mode = ($.mode[ext]==undefined)?'default':$.mode[ext];
            var bread = $.navSplit(json.dir+'/'+json.file);

            $('.fileOpen.open').val(json.dir+'/'+json.file);

            $('#file-open-title').html( bread );
            $('#file-open-mode').html(mode);

            $.editor.setOption("mode",mode);
            $.editor.setValue(json.content);
            $.editor.clearHistory();

        },
        toggleFolder: function (t, json, e){
            t.addClass('loaded');
            t.after(json.content);
        },
        openDir: function (t, json, e){
            console.log(json);
        },
        editorSave: function (t, json, e){
            if($.sui.is('autorefresh','true'))
                $('.form-iframe').trigger('submit');
        }
    }



    $.navSplit = function (dir){
        var url = './app/exec.php?app=app&exec=sh-dir';

        var linkSh = $("<a>",{
            href    : url,
            class   : 'btn-sh ',
            'data-cb':'openDir'
        });

        var bread = $("<span>",{"class":"bread"});

        var list = dir.split('/');
        var link = '';

        $.each(list,function(index, el) {
            if(el != ''){
                var a = linkSh.clone().html(el);
                link += '/'+el

                a.attr({
                    'href':url+'&dir='+link
                });

                bread.append('/');
                bread.append(a);
            }
        });
        console.log(bread);
        return bread;

    }

});