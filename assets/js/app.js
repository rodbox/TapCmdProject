(function($) {
    // creer un attribut data-ext avec l'extension du fichier dans data-file
    $.fn.fileext = function(options) {
        var list = $(this).find("a.file-ext, .extension-me, a.ext-me");

            $.each(list,function(index){

                var t    = $(this);
                var file = t.data("file");
                var ext  = file.split('.');
                t.attr("data-ext",ext[ext.length - 1]);
            })
        return this;
    };
})(jQuery);

(function($) {
    $.qs = (function(a) {
        if (a == "") return {};
        var b = {};
        for (var i = 0; i < a.length; ++i)
        {
            var p=a[i].split('=');
            if (p.length != 2) continue;
            b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
        }
        return b;
    })(window.location.search.substr(1).split('&'))
})(jQuery);


$(document).ready(function($) {
    $(document).fileext();

    $.def = function (value, defaultValue){
        return (value == undefined)?defaultValue:value;
    }


    $(document).on("change",".val-session",function (e){
        e.preventDefault();
        var t = $(this);

        var url = $.generate.url.exec('app','session');
        $.get(url,{
            id:t.attr('id'),
            value:t.val()
        });
    })


    $(".context-sidebar-body").fileext();
    // Stock les callbacks des fichiers app-cb.js


    $(document).on("click",".btn-cmd ",function (e){
        e.preventDefault();
        var t    = $(this);

        var form = $(t.attr('data-src'));
        var data = {
            project:$('#project').val(),
            cmd:t.attr('data-cmd'),
            force:$.force()
        };

        if(!$.lock.is(t)){

            $.lock.on(t);

            $.post(t.attr('href'), data, function(json) {
                $(t.data('target')).html(json.shell);
                $.lock.success(t);

                $(".cmd-item")
                    .removeClass('active')
                    .attr('aria-expanded',false);

                $(".cmd-item-"+t.attr('data-cmd'))
                    .addClass('active')
                    .attr('aria-expanded',true);

                $.cb['app']['cmd'](t, json, e);

            },'json').error(function (err){
                $.lock.alert(t);
            });
        }
    });



    $(document).on("click",".btn-form",function (e){
        e.preventDefault();
        var t = $(this);

        var form = $(t.attr('data-src'));
        var data = form.serialize()+"&force="+$.force();

        if(!$.lock.is(t)){

            $.lock.on(t);

            $.post(form.attr('action'), data, function(json) {
                $.lock.off(t);
            },'json').error(function (err){
                $.lock.alert(t);
            });
        }
    });


    $(document).on("click",".btn-exec", function (e){

        e.preventDefault();
        var t = $(this);

        $.bcbt(t, e); // callback beforesend t

        var form = $(t.attr('data-form'));
        var data = form.serialize()+"&force="+$.force();

        if(!$.lock.is(t)){

            $.lock.on(t);

            $.post(t.attr('href'), data, function(json) {
                $.lock[json.infotype](t, json.msg);

                $.a(t, json); // target view
                $.cbt(t, json, e); // callback t

            },'json').error(function (err){
                $.lock.alert(t);
            });
        }
    });



    $(document).on("click",".btn-canvas",function (e){
        e.preventDefault();
        var t        = $(this);

        var canvasId = t.attr("data-canvas");
        var img      = document.getElementById(canvasId);
        var context  = img.getContext('2d');
        var ext      = 'png';
        var imgData  = img.toDataURL("image/"+ext);
        var img      = {
                ext   : ext,
                img   : imgData
        }

        var form = $(t.attr('data-form'));
        var data = {
            project:$("#project").val(),
            img:img

        };

        if(!$.lock.is(t)){
            $.lock.on(t);

            $.post(t.attr('href'), data, function(json) {
                $.lock.success(t,json.msg);
            },'json').error(function (err){
                $.lock.alert(t);
            });
        }
    });

    /**
     * Function d'ouverture modal
     * @param  {[type]} title [description]
     * @param  {[type]} href  [description]
     * @param  {[type]} data  [description]
     * @param  {[type]} size  [description]
     * @param  {[type]} t     [description]
     * @return {[type]}       [description]
     */
    $.modal = function (title, href, data, size, t){

        var size = (size==undefined)?'modalM':size;
        var t = (t==undefined)?'':$('.loadLock');

        var modal = $(".modal#"+size);

        $.lock.on(t);

        modal.find('.title').html(title);
        $.get(href, data, function(json) {
            $.lock.off(t);

            modal.find('.modal-body').html(json.page);

            if (json.title != undefined){
                modal.find('.title').append(" : ");
                modal.find('.subtitle').html(json.title);
            }

            modal.modal();
            $.page.init('#'+modal.attr('id'));
            modal.on('hidden.bs.modal',function(e){
                if($('.modal.in').length>0)
                    $('body').addClass('modal-open');
            })
        },'json').error(function (err){
            $.lock.alert(t);
        });
    };





    $(document).on("click",".btn-modal",function (e){
        e.preventDefault();
        var t     = $(this);

        if(!$.lock.is(t)){
            var title = t.attr('title');
            var href  = t.attr('href');
            var size  = t.data('modal');
            var value = (t.data('src')!=undefined)?$(t.data('src')).val():'';
            if(t.data('form') != "")
                data = $(t.data('form')).serialize()+"&force="+$.force()+"&value="+value;
            else{
                data = {
                    force : $.force(),
                    value : value
                };
            }

            $.modal(title, href, data, size, t);
        }
    });


    $(document).on("click",".btn-del",function (e){
        e.preventDefault();
        var t = $(this);
        if(confirm('Confirmer ?'))
            t.parents(t.data('target')).remove();

    })




    $(document).on("mouseup mousedown",".btn-cmd",function (e){
        if(e.type=='mousedown')
            $(this).addClass('onPress');
        else
            $(this).removeClass('onPress');
    });



    $(document).on("click",".btn-live",function (e){
        e.preventDefault();
        var t = $(this);
        $.get(t.attr('href'), function(data) {
            $('#app-page').html(data);
            $.page.init();
        });
    })



    $(document).on("click",".btn-cb",function (e){
        e.preventDefault();
        var t = $(this);

        var app =  (t.data('cb-app'))?t.data('cb-app'):'app';
        var cb  =  (t.data('cb'))?t.data('cb'):'default';

        $.cb[app][cb](t, e);
    })


    $(document).on("click",".btn-trigger",function (e){
        e.preventDefault();
        var t = $(this);
        $(t.attr('href')).trigger('click');

    })


    new Clipboard('.btn-clip', {
        text: function(trigger) {
            return trigger.getAttribute('aria-label');
        }
    }).on('success', function(e) {
        e.clearSelection();
    });


    $('.btn-popup').on("click",function (e){
        e.preventDefault();
        var t = $(this);
        var popupID = (t.data('popup')==undefined)?'Popup':t.data('popup');

        var pop = window.open(t.attr('href'), popupID, 'scrollbars=1,resizable=1,height=560,width=770');

        if(pop.window.focus){pop.window.focus();}

        $.kaltClear();
    })


    $(document).on("click",".btn-fullscreen",function (e){
        e.preventDefault();
        var t = $(this);
          var element = document.getElementById(t.attr('data-target'));
    if (element.mozRequestFullScreen)
      element.mozRequestFullScreen(element.ALLOW_KEYBOARD_INPUT);
    else if (element.webkitRequestFullScreen)
      element.webkitRequestFullScreen(element.ALLOW_KEYBOARD_INPUT);

    })



    $(document).on("submit",".form-live",function (e){
        e.preventDefault();
        var t = $(this);
        var data  = t.serialize()+"&force="+$.force();

        var submit = t.find("[type=submit]");

        if(!$.lock.is(submit)){
            $.lock.on(submit);
            $.post(t.attr('action'), data, function(json, textStatus, xhr) {
                $.lock.off(submit);

                $.cbt(t, json, e);

            },'json').error(function(err){
                $.lock.alert(submit);
            });

        };
    })


    /**
     * on event callback
     */
    var eventList = ['change','keydown','keyup','keypress','focusin','focusout','mouseenter','mouseleave'];

    $.each(eventList, function(index, val) {
        $(document).on(val,".on-"+val,function (e){
            var t = $(this);
            // if(t.data('preventDefault')==undefined)
            e.preventDefault();


            var cbapp = (t.data('cb-app')==undefined)?'app':t.data('cb-app');
            if (t.data('cb-'+val)){
                var cb = t.data('cb-'+val);
                $.cb[cbapp][cb](t, e);
            }

        });
    });

    $(document).on("mousedown",".r-click",function (e){

        if (e.button == 2) {
            e.preventDefault();

            $(document)[0].oncontextmenu = function() {
                return false;
            }
            var t = $(this);
            var cbapp = (t.data('cb-app')==undefined)?'app':t.data('cb-app');

            $.cb[cbapp][t.data('cb-r-click')](t, e);
        }
    })



    /**
     *
     * CBT : callback $(this)
     * BCBT : before send callback $(this)
     *
     */

    /**
    * TODO : fusionner cbt et bcbt
    * - juste inverser le passage du json avec la e (event) dans tout les scripts et definir une condition undefined
    **/

    $.cbt = function (t, json, e){
        var cbapp = (t.data('cb-app')==undefined)?'app':t.data('cb-app');
        var cb    = $.def(t.data('cb'),'default');

        $.cb[cbapp][cb](t, json, e);

        // le callback de la requete
        if (json.cb != undefined)
            $.cb[cbapp][json.cb](t, json, e);
    }


    $.bcbt = function (t, e){
        var bcbapp = $.def(t.data('bcb-app'),'app');
        var bcb    = $.def(t.data('bcb'),'before_default');

        $.cb[bcbapp][bcb](t, e);
    }
    /**
     * END CBT BCBT
     */


    // init a chaque chargement de page
    $.page = {
        init: function (container){
            var cont = (container != undefined)?container:'body';

            $(cont+' .input-colors').colorpicker();
            $(cont+' .btn-popover').popover();
            $(cont+' .select2').select2();

            $(cont+' .sortable').sortable({
                connectWith: '.sortable'
            }).on('sortupdate', function(e, obj){
                // console.log('Parent old: ');
                console.log(obj.startparent);
                // console.log('Parent new: ');
                console.log($(obj.endparent));
                console.log($(obj.item));
                // console.log('Index: '+obj.oldindex+' -> '+obj.index);
                // console.log('elementIndex: '+obj.oldElementIndex+' -> '+obj.elementIndex);
            });

            $('#filesTabs').sortable();

        },
        redirect: function (app, page, data){
            var app  = $.def(app, 'app');
            var page = $.def(page, 'index');
            var data = $.def(data, {});
            window.location.href = $.generate.url.page(app, page, data);
        },
        modal: function (app, page, data, modal){
            var app   = $.def(app, 'app');
            var page  = $.def(page, 'index');
            var data  = $.def(data, {});
            var modal = $.def(modal, 'modalLg2');
            var url   = $.generate.url.page(app, page, data);
            $.modal(page, url, data, modal,$('.loadLock'));
        }

    };

    $.page.init();

    $.lock = {
        on:function(t, msg){
            var loader = $('<i>',{'id':'id','class':'fa fa-refresh fa-spin fa-spin-2x loader'});

            t.attr('data-html',t.html());
            t.css({
                'min-width':t.outerWidth()
            });
            t.find('i').hide();
            t.prepend(loader);
            t.attr('disabled','disabled');
            t.addClass('disabled');
            t.addClass('onLoad');

            if (msg != undefined)
                t.append(' '+msg);
        },
        off:function(t){
            setTimeout(function(){
                t.removeAttr('disabled');
                t.removeClass('onLoad');
                t.removeClass('disabled');
                t.find('i').show();
                t.find('.loader').remove();
                t.html(t.attr('data-html'));
                t.removeClass('lock-warning');
                t.removeClass('lock-alert');
                t.removeClass('lock-success');


            },200);
        },
        alert:function(t, msg){
            var alert = $('<i>',{'id':'id','class':'fa fa-exclamation-triangle '});

            t.html(alert);
            t.removeClass('onLoad');
            t.addClass('lock-alert');
            if (msg != undefined)
                t.append(' '+msg);

            setTimeout(function(){
                $.lock.off(t);
            },5000);
        },
        error:function(t, msg){
            var error = $('<i>',{'id':'id','class':'fa fa-exclamation-triangle '});

            t.html(error);
            t.removeClass('onLoad');
            t.addClass('lock-error');
            if (msg != undefined)
                $.notiny({ text: msg, position: 'right-top',theme: 'light' });
            setTimeout(function(){
                $.lock.off(t);
            },5000);
        },
        success:function(t, msg){
            var success = $('<i>',{'id':'id','class':'fa fa-check '});

            t.html(success);
            t.removeClass('onLoad');
            t.addClass('lock-success');

            if (msg != undefined)
                $.notiny({ text: msg, position: 'right-top',theme: 'light' });

            setTimeout(function(){
                $.lock.off(t);
            },2000);
        },
        is:function(t){
            return (t.attr('disabled')=='disabled');
        }
    }




    /**
     * Generate url for app
     */
    $.generate = {
        url : {
            exec : function(app, exec, params) {
                var p = ($.isArray(params))?$.param (params):'';
                var purl = 'app='+app+'&exec='+exec;
                return './app/exec.php?'+purl+((p!='')?'&'+p:'');
            },
            view : function(app, view, model, params) {
                var p = ($.isArray(params))?$.param (params):'';
                var purl = 'app='+app+'&view='+view+'&model='+model;
                return './app/view.php?'+purl+((p!='')?'&'+p:'');
            },
            page : function (app, page, params) {
                var p = ($.isArray(params))?$.param (params):'';
                var purl = 'app='+app+'&page='+page;
                return './index.php?'+purl+((p!='')?'&'+p:'');
            }
        }
    }


    /**
    * TODO : Faire un systeme d'index pour stocker list plutot qu'au chargement de la page
    **/
    $.get($.generate.url.exec('app','dev'), function(json) {
        $.routes   = json.routes;
        $.bundles  = json.bundles;
        $.services = json.services;
    },'json');




    $.a = function (t, json){
        if (json.target != undefined) {
            $.each(json.target, function(index, val) {
                $(index)[json.a](val);
            });
        }
    }


    var isOpera   = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
    var isFirefox = typeof InstallTrigger !== 'undefined';
    var isSafari  = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
    var isIE      = /*@cc_on!@*/false || !!document.documentMode;
    var isEdge    = !isIE && !!window.StyleMedia;
    var isChrome  = !!window.chrome && !!window.chrome.webstore;
    var isBlink   = (isChrome || isOpera) && !!window.CSS;

    $.isBrowser = {
        Opera : (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0,
        Firefox : typeof InstallTrigger !== 'undefined',
        Safari : Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0,
        IE : /*@cc_on!@*/false || !!document.documentMode,
        Edge : !isIE && !!window.StyleMedia,
        Chrome : !!window.chrome && !!window.chrome.webstore,
        Blink : (isChrome || isOpera) && !!window.CSS,
    }

});