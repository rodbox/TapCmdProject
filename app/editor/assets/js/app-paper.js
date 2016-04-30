
paper.setup()

$.i = 0;
$.iLayers = project.layers.length;
var path;

var toolsList  = ['default'];
$.toolSelected = {};
$.selected     = {};
$.selectedDown = {};

var x          = 0, y = 0;
$.canvasPos    = $("canvas.draw-paper").position();
document.addEventListener('mousemove', function(e){
    x = e.layerX - $.canvasPos.left,
    y = e.layerY - 35;

}, false);


$( window ).resize(function (e){
    $.canvasPos  = $("canvas.draw-paper").position();
})


var hitOptions = {
    segments: true,
    stroke: true,
    fill: true,
    tolerance: 5
};


window.app = {
    default: new Tool({
        onKeyDown: function(){
           $.mouselock = {
                x:x,
                y:y
            };
        },
        onMouseDown: function(event){
            if($.kalte('onCmd')){

            }
            else{
                path             = new Path();
                $.i              = $.i + 1;
                path.name        = 'path'+$.i;
                path.strokeColor = $.getStrokeColor();
                path.strokeWidth = $.getW();
                path.strokeCap   = $.getCap();

                path.add(event.point);
                if($.dashMode())
                    path.dashArray = $.getDash();
            }
        },
        onMouseDrag: function(event){
            if($.kalte('onCmd')){
                var w = Math.round(Math.abs(event.event.clientY - $.mouselock.y)/5);
                $.pjs.strokeResize(w);
                 $('#strokeWidthPreview').css({
                    left:event.event.clientX,
                    top:event.event.clientY
                }).addClass('mousedrag');
            }
            else if($.kalte('onAlt')){
                var point = {
                    x   : $.mouselock.x,
                    y   : event.point.y
                };
                path.add(point);
                path.smooth();


            }
            else if($.kalte('onMaj')){
                var point = {
                    x   : event.point.x,
                    y   : $.mouselock.y
                };
                path.add(point);
                path.smooth();

             $('#strokeWidthPreview').css({
                    left:'inherit',
                    top:'inherit'
                }).removeClass('mousedrag');
            }
            else{
                var point = event.middlePoint;

                path.add(point);
                path.smooth();
            }
        },
        onMouseUp: function(event){
            $('#strokeWidthPreview').css({
                left:'inherit',
                top:'inherit'
            }).removeClass('mousedrag');

            $.pjs.updLayer();
            path.simplify();
            $.history.add(path);

        }
    }),
    circle: new Tool({
        onMouseDrag : function (event){
              var path = new Path.Circle({
                    center: event.downPoint,
                    radius: (event.downPoint - event.point).length,
                    strokeWidth : $.getW()
                });

                path.fillColor   = $.getFillColor();
                path.strokeColor = $.getStrokeColor();
                if($.dashMode())
                    path.dashArray = $.getDash();
                path.name        = "circle";

                $.history.add(path);
                path.removeOnDrag();

        },
        onMouseUp   : function (event) {
            $.history.add(path);
            $.pjs.updLayer();

        },
    }),
    rectangle: new Tool({
        onMouseDrag : function (event){
            var path = new Path.Rectangle({
                point       : [event.downPoint.x, event.downPoint.y],
                size        : [event.point.x-event.downPoint.x, event.point.y-event.downPoint.y],
                fillColor   : $.getFillColor(),
                strokeColor : $.getStrokeColor()
            });

            if($.dashMode())
                path.dashArray = $.getDash();
                path.name      = "rectangle";
                path.removeOnDrag();
                // path.strokeColor.alpha = alphaStroke();
            },

        onMouseUp   : function (event) {
                $.pjs.updLayer();
            }
        }),
    select: new Tool({
        onMouseDown : function (event){
            if (event.item)
                event.item.selected = true;

            $.selected     = project.selectedItems;
            $.selectedDown = {};
            $.each($.selected, function(index, val) {
                 $.selectedDown[index] = val.position;
            });

            /**
             * test from tuto hittest
             * @type {[type]}
             */
            // segment = path = null;
            // var hitResult = project.hitTest(event.point, hitOptions);
            // if (!hitResult)
            //      return;
            // if (event.modifiers.shift) {
            //  if (hitResult.type == 'segment') {
            //      hitResult.segment.remove();
            //  };
            //  return;
            //  }

            // if (hitResult) {
            //     path = hitResult.item;
            //     if (hitResult.type == 'segment') {
            //         segment = hitResult.segment;
            //     } else if (hitResult.type == 'stroke') {
            //         var location = hitResult.location;
            //         segment = path.insert(location.index + 1, event.point);
            //         path.smooth();
            //     }
            // }
            // movePath = hitResult.type == 'fill';

            // if (movePath){
            //     project.activeLayer.addChild(hitResult.item);
            // }
            /**
             * END test from tuto hittest
             */
        },
        onMouseMove : function (event) {
            // console.log($.kalte('onCmd'));

            // console.log(project);
            if($.kalte('onCmd')){

                console.log();
                project.selectedItems.selected = false;

                if (event.item)
                    event.item.selected = true;
            }
        },
        onMouseDrag : function (event){
            var downPointX = event.downPoint.x;
            var downPointY = event.downPoint.y;
            var sizeX      = event.point.x-downPointX;
            var sizeY      = event.point.y-downPointY;

            if($.kalte('onAlt')){
                var path = new Path.Rectangle({
                    point           : [downPointX,downPointY],
                    size            : [sizeX, sizeY],
                    fillColor       : "black",
                    strokeColor     : "grey",
                    strokeWidth     : "1",
                    strokeJoin      : 'round',
                    dashArray       : [5, 5]
                });
                path.fillColor.alpha = "0.1";

                /* path.miterLimit(1); */
                path.removeOnDrag();
                path.removeOnUp();

                var textX = new PointText({
                    point       : [downPointX+(sizeX/2), downPointY+13],
                    content     :  Math.abs(sizeX),
                    fillColor   : 'black',
                    justification: 'center',
                    fontSize:13
                }).removeOnDrag().removeOnUp();

                var textY = new PointText({
                    point: [downPointX+11, downPointY+(sizeY/2)],
                    content:  Math.abs(sizeY),
                    fillColor: 'black',
                    justification: 'center',
                    fontSize:13
                }).rotate(-90).removeOnDrag().removeOnUp();
            }


            else{
                $.each($.selected, function(index, item) {
                     /* iterate through array or object */
                       item.position.x = $.selectedDown[index].x + sizeX;
                       item.position.y = $.selectedDown[index].y + sizeY;
                     // item.position.x = $.selectedDown[index].x + sizeY;
                });
            }

            /**
            * TODO : Gestion du hit test pour la selection dans le rectangle de select
            **/


        },
        onMouseUp : function(){
            $.history.add();
        }
    }),
    brush: new Tool({
        onKeyDown: function(){
           $.mouselock = {
                x:x,
                y:y
            };
        },
        onMouseDown: function(event){
            path = new Path();
            $.i = $.i + 1;
            var rand = Math.random().toString(36).substring(2);
            path.name = 'brush '+$.i;
            path.fillColor = $.getFillColor(1);
            path.add(event.point);
        },
        onMouseDrag: function(event){
            var step = event.delta / 4;
            step.angle += 90;

            if($.kalte('onAlt')){

                var point = event.middlePoint + step;
                var bottom = event.middlePoint - step;

                // var point = {
                //     x:$.mouselock.x,
                //     y:event.point.y
                // };
            }
            else if($.kalte('onMaj')){

                // var point = event.middlePoint + step;
                // var bottom = event.middlePoint - step;

                var point = {
                    x:event.middlePoint.x  + step,
                    y:event.middlePoint.y  + step
                };


                var bottom = {
                    x:event.middlePoint.x  - step,
                    y:event.middlePoint.y  - step,
                };



            }
            else{

                var point = event.middlePoint + step;
                var bottom = event.middlePoint - step;

                // var point = event.middlePoint;
            }




            path.add(point);
            path.insert(0, bottom);
            path.smooth();
        },
        onMouseUp: function(event){
            path.add(event.point);
            path.closed = true;
            path.smooth();
            path.reduce();

            $.history.add(path);
            $.pjs.updLayer();
            console.log(path.name);
        }
    }),
    stroke: new Tool({
        onMouseDrag : function (event){
            var path         = new Path();
            path.strokeColor = 'black';

            path.strokeWidth = $.getW();
            path.strokeColor = $.getStrokeColor();
            path.strokeCap   = $.getCap();

            if($.dashMode())
                path.dashArray = $.getDash();

            path.add(new Point(event.downPoint.x, event.downPoint.y));
            path.add(new Point(event.point.x, event.point.y));

            path.name = "stroke";
            path.removeOnDrag();
        },

        onMouseUp   : function (event) {
                $.pjs.updLayer();
            }
        }),
    rope: new Tool({
        onKeyDown : function (event){
            path             = new Path();
            $.i              = $.i + 1;
            path.name        = 'path'+$.i;
            path.strokeColor = $.getStrokeColor();
            path.fillColor   = $.getFillColor();
            path.strokeWidth = $.getW();
            path.strokeCap   = $.getCap();
        },
        onMouseDown : function (event){
            path.add(event.point);
        },
        onKeyUp : function (event){
            path.closed = true;
            $.history.add(path);
            $.pjs.updLayer();
        }
    })


};
app.default.activate();



/**
* TODO : Optimiser la gestion des parametrages des tools
**/

// $.getColor = function (index){
//     return $('#color'+index).val();
// }
// $.colorFill = function (){
//    return $('#color1').val();
// }

// $.colorStroke = function (){
//    return $('#color2').val();
// }
// $.strokeSize = function(){
//     return $('#size').val();
// }


$.dashMode = function(){
    return $('#dash').prop('checked');
}
/*
Jusqu ici !!!!
 */


$(".btn-pjs").on("click",function (e){
    e.preventDefault();
    var t = $(this);

    $.pjs[t.data('pjs')](t, e);
})


$.history = {
    max: 10,
    listUndo: [],
    listRedo: [],
    undo:function (){
        var last = $.history.listUndo.pop();
        $.history.listRedo.push(last);

        // last.remove();
        project.clear();
        var state = project.importJSON(last);
        project.view.update();

        $.pjs.updLayer();
    },
    redo:function(){
        var last = $.history.listRedo.pop();
        $.history.listUndo.push(last);

        project.clear();
        var state = project.importJSON(last);
        project.view.update();
        $.pjs.updLayer();
    },
    add:function(item){
        $.history.listRedo = [];
        var state = project.exportJSON();
        if($.history.listUndo.length >= $.history.max)
            $.history.listUndo.shift();

        $.history.listUndo.push(state);
        $.history.setProtect(true);

    },
    setProtect: function(bool){
        project.protect = bool;
    },
    getProtect: function(){
        return project.protect;
    }
}


$.rename = {
    on:function (t, item){
        t.attr('data-content',t.html());
        var input = $("<input>",{
            "type":"text",
            "class":"inline"
        }).val(t.text()).keypress(function(e) {
            if(e.keyCode == 13){
                var name = ($(this).val() != '')?$(this).val():t.attr('data-content');
                // project.layers[0]._children[]['name'] = $(this).val();
               item.name = name;
                // $.item.set(t.attr('data-children'),'name',name);
                t.attr('data-content',name);

                $.rename.off(t);
            }
            else if (e.keyCode == 27){
                $.rename.off(t);
            }
        })

        t.html(input);

    },
    off:function (t, item){
        t.html(t.attr('data-content'));
    }
}


$.path = {
    set:function(index, val){
        return $("#"+index).val(val)
    },
    get:function(index, defaultValue){
        var val = $("#"+index).val();

        return $.def(val, '');
    }
}

$.getW           = function(){ return $.path.get('strokeWidth');}
$.getCap         = function(){ return $.path.get('strokeCap');}
$.getDash        = function(){ return [$.path.get('dash_x'),$.path.get('dash_w')];}
$.getStrokeColor = function(){ return $.path.get('strokeColor');}
$.getFillColor   = function(){ return $.path.get('fillColor');}
$.getPivot       = function(){ return [$.path.get('pivot_x'),$.path.get('pivot_y')];}





$.item = {
    set:function(itemIndex, attr, value){
        project.layers[0]._children[itemIndex][attr] = value;
        project.view.update();
    },
    get:function(itemIndex){
        return project.layers[0]._children[itemIndex];
    }
}



$(document).on("submit","#pathMenu",function (e){
    e.preventDefault();
    var t = $(this);

    var data = t.serializeObject();

    var items = project.selectedItems;
    // console.log(t.attr('data-properties'));



    // $.each(items, function(index, val) {
    //     if (t.attr('data-properties') == 'rotation') {

    //     }
    //     if (val.selected)
    //         val[t.attr('data-properties')] = t.val();
    // });
    project.view.update();
})



$.setSelect = function(properties, value){
    var form = $('#pathMenu').serializeObject();
    console.log("properties");
    console.log(properties);
    console.log(form);
    var items = project.selectedItems;
    var value = $.def(value,form[properties]);
    if (properties == 'rotation') {
        project.activeLayer.pivot = $.getPivot();
        project.activeLayer.rotation = form[properties];
    }
    else{


        $.each(items, function(index, item) {
            if (item.selected)
                item[properties] = value;
        })
    }

    project.view.update();
    $.history.add();
}

$(document).on("change keyup",".setSelect",function (e){
    e.preventDefault();
    var t     = $(this);

    $.setSelect(t.attr('data-properties'));

    });

    $.aCheck = function(item, metaList) {

        /**
        * TODO : return Layer Thumb SVG
        **/
        var svg = $("<svg>",{
            "id":'preview_'+item.id,
            "class":"layer-preview",
             x:"0",
             y:"0",
             width:"24",
             height:"24",
             version:"1.1",
             xmlns:"http://www.w3.org/2000/svg",
             'xmlns:xlink':"http://www.w3.org/1999/xlink"
        }).html(item.exportSVG());

        return $("<a>",{
                href    : "#",
                id      : "path_check_"+item.index,
                'data-children':item.index,
                style   : 'margin-right:0.275rem',
                class   : 'btn-check'
            })
            .html(svg)
            .click(function(e) {
                e.preventDefault();
                var t        = $(this);
                var p        = t.parents('tr');
                p.toggleClass('table-active');
                // item.selected = p.hasClass('table-active');

                var div = $.meta.load(item,metaList);
                $.selectedMode(item,p.hasClass('table-active'));
                $('#metaView').html(div);
                // $.meta.init();
            });
    }

    $.aShow = function(item) {
        return $("<a>",{
                href    : "#",
                id      : "path_show_"+item.index,
                'data-children':item.index,
                class   : (item.visible)?'visible active btn-show':'visible btn-show',
                style   : 'margin-right:0.275rem'
            })
            .html('<i class="fa fa-eye"></i>')
            .click(function(e) {
                e.preventDefault();
                $(this).toggleClass('active');
                item.visible = $(this).hasClass('active');
                project.view.update();
            });
    }

    $.aName = function(item){
        return $("<a>",{
            href    : "#",
            id      : "path_"+item,
            'data-children':item,
            class   : 'rename',
            style   : 'margin-right:0.275rem'
        }).html((item.name==undefined||item.name=="")?'layer':item.name).dblclick(function(e) {
            var t = $(this);
            $.rename.on(t,item);
        });
    }

    $.aToggle = function(item){
        return $("<a>",{
            href    : "#",
            'data-children':item,
            class   : (item.open)?'open toggle btn-toggle ':'toggle btn-toggle ',

        }).html('<i class="fa fa-caret-right"></i>').click(function(e) {
            e.preventDefault();
            $(this).toggleClass('open');
            item.open = $(this).hasClass('open');
        });
    }

    // $.aToggleMeta = function(item, metaList){
    //     return $("<a>",{
    //         href    : "#",
    //         'data-children':item,
    //         class   : 'toggle-meta btn-meta',
    //     }).html('<i class="fa fa-list"></i>').click(function(){
    //         e.preventDefault();
    //         var div = $.meta.load(item,metaList);
    //         $('#metaView').html(div);
    //     });
    // }

    $.aRemove = function(item){
        return $("<a>",{
            href    : "#",
            id      : "path_"+item,
            class   : 'remove pull-right btn-remove'
        }).html('<i class="fa fa-close"></i>').click(function(e) {
            e.preventDefault();
            if (confirm('Supprimer')) {
                item.remove();
                $.pjs.updLayer();
                project.view.update();
            }
        })
    };



$.meta = {
    load:function(item, index){
        var attrMetas = {
            'name'      : {
                class : 'form-control text',
            },
            'opacity'   : {
                class : 'form-control slider',
                'data-slider-step':0.01,
                'data-slider-max':1,
                'data-slider-min':0,

            },
            'className' : {
                class : 'form-control text',
            },
            'fillColor' : {
                class : 'form-control colorpicker',
            },
            'strokeWidth' : {
                class : 'form-control slider',
                'data-slider-step':1,
                'data-slider-max':50,
                'data-slider-min':1,
            },
            'strokeColor' : {
                class : 'form-control colorpicker',
            }
        };

        var div = $("<div>",{class:"meta"});
        $.each(index, function(index, val) {
            $('#'+val).val(index[val]);
            // $('#'+val).trigger('change');
        });
        return div;
    }
};
// $.rotore = {};
$.bound = {};

$.selectedMode = function(item, bool){
    if(bool){
        var b = item.bounds;

        item.pivot = $.getPivot();
        $.bound[item.index] = new Path.Rectangle(b);

        $.bound[item.index].className = 'bound';
        $.bound[item.index].name = 'bound'+item.index;
    }
    else{
        if ($.bound[item.index] != undefined)
            $.bound[item.index].remove();
    }

    item.selected = bool;
    project.view.update();
}

$.layerPath  = function(path){
    var table = $("<table>",{"id":path.name,"class":"layerPath layers table table-sm "+path.className});
    var thead = $("<thead>",{"id":"th_"+path.name,"class":"th_layerPath"});
    var tbody = $("<tbody>",{"id":"tb_"+path.name,"class":"tb_layerPath"});

    var metaList = [
        'name',
        'opacity',
        'className',
        'fillColor',
        'strokeWidth',
        'strokeColor'
    ];


    if(path.className == 'Group'){
        var ths  = {
                thShow   : $("<th>",{"class":"thShow"}).html($.aShow(path)),
                // thPreview   : $("<th>",{"class":"thPreview"}).html($.aPreview(path)),
                thCheck  : $("<th>",{"class":"thCheck"}).html($.aCheck(path, metaList)),
                // thMeta   : $("<th>",{"class":"thMeta"}).html($.aToggleMeta(path, metaList)),
                thToggle : $("<th>",{"class":"thToggle"}).html($.aToggle(path)),
                thName   : $("<th>",{"class":"thName"}).html($.aName(path)),

            thRemove : $("<th>",{"class":"thRemove"}).html($.aRemove(path))
        }
    }
    else{
        var ths  = {
            thShow   : $("<th>",{"class":"thShow"}).html($.aShow(path)),
            // thPreview   : $("<th>",{"class":"thPreview"}).html($.aPreview(path)),
            thCheck  : $("<th>",{"class":"thCheck"}).html($.aCheck(path, metaList)),
            // thMeta   : $("<th>",{"class":"thMeta"}).html($.aToggleMeta(path, metaList)),
            // thToggle : $("<th>",{"class":"thToggle"}).html($.aToggle(path)),
            thName   : $("<th>",{"class":"thName"}).html($.aName(path)),

            thRemove : $("<th>",{"class":"thRemove"}).html($.aRemove(path))
        }

    }
    var tr  = $("<tr>")
    if (path.selected){
        tr.addClass('table-active');
        tr.addClass(path.className);
        var name = (path.name != undefined)?path.name:'item '+path.index;
    }

    $.each(ths, function(index, th) {
        tr.append(th);
    });

    var trs = $("<tr>").append($("<td>",{
        class:'pathmeta',
        olspan:ths.length
    }).hide());

    thead.append(tr);
    thead.append(trs);
    table.append(thead);

    $.each(path._children, function(index, children) {
        tbody.append($.pathPath(children));
    });


    table.append(tbody);

    return table;
}


$.layerLayer = function(layer){
    var open        = $.def(layer.open,false);
    var openClass   = (open)?'open':'';

    var active        = $.def(layer.active,false);
    var activeClass = (active)?'active':'';

    var table       = $("<table>",{"id":"layer_"+layer.name,"data-layer-name":layer.name,"class":"layerLayer  table table-sm "+openClass + " "+activeClass});
    var thead       = $("<thead>",{"id":"th_"+layer.name,"data-layer-name":layer.name,"class":"th_layerLayer"});
    var tbody       = $("<tbody>",{"id":"tb_"+layer.name,"class":"tb_layerLayer"});

    var metaList    = [
        // 'name',
        'opacity',
        'className',
        'fillColor',
        'strokeWidth',
        'strokeColor'
    ];

    var ths  = {
        thShow   : $("<th>",{"class":"thShow"}).html($.aShow(layer)),
        thCheck  : $("<th>",{"class":"thCheck"}).html($.aCheck(layer)),
        thToggle : $("<th>",{"class":"thToggle"}).html($.aToggle(layer)).click(function(){
            tbody.toggle();
        }),
        thName   : $("<th>",{"class":"thName"}).html($.aName(layer)),
        thRemove : $("<th>",{"class":"pull-right thRemove"}).html($.aRemove(layer))
    }

    var tr  = $("<tr>");

    $.each(ths, function(index, th) {
        tr.append(th);
    });

    var trs = $("<tr>").append($("<td>",{class:'pathmeta', colspan:6}).hide());

    thead.append(tr);
    thead.append(trs);

    thead.on('click',function(){

        $('.layerLayer.active').removeClass('active');

        table.addClass('active');

        $.pjs.activeLayer(layer);
    })

    table.append(thead);


    $.each(layer._children, function(index, children) {
        var tr = $("<tr>");
        var td = $("<td>",{
            colspan:ths.length
        });
        // console.log(children.className);
        td.html($.layerPath(children))
        tr.append(td);
        tbody.prepend(tr);
    });


    table.append(tbody);

    return table;
}

$.each($('.knob'), function(index, val) {
    var t = $(this);
     t.knob({
                change: function (v){
                    $.setSelect('rotation',v);

                }
            })
});



$.pjs = {
    new: function(t){
        $.pjs.protect(t, function(){
            project.clear();
            // $.pjs.createLayer();
            $.iLayers = project.layers.length;
            project.view.update();
            $.pjs.updLayer();
        })
    },
    protect: function(t, func){
        if($.history.getProtect()){
            var msg = $.def(t.attr('data-msg-confirm'),'Attention les modifications n\'ont pas été enregistrée' );
            if(confirm(msg)){
                func();
            }
        }
        else
            func();
    },
    selectRemove: function(){
        var items = project.selectedItems;
        $.each(items, function(index, item) {
           item.remove();
        });
        $.pjs.updLayer();
        project.view.update();
    },
    undo: function(){
        $.history.undo();
    },
    redo: function(){
        $.history.redo();
    },
    unselect: function(){
        var items = project.selectedItems;
        $.each(items, function(index, item) {
           $.selectedMode(item, false);
        });
        project.view.update();
    },
    selectAll: function(){
        if ($.kalte('onCmd'))
            console.log('all');
        else
            console.log('layer active layer');
    },
    activeLayer: function(layer){
         $.each(project.layers, function(index, val) {
             val.active = false;
        });
        layer.active = true;
        layer.activate();
    },
    createLayer: function(){
        $.iLayers = parseInt($.iLayers) + 1;

        /**
        * TODO : Fixer la gestion des layers
        **/
        var layer  = new Layer();
        layer.name = 'layer '+$.iLayers;

        $.pjs.activeLayer(layer);

        $.pjs.updLayer();
    },
    createGroup: function(){
        var count       = project.activeLayer.children;
        count           = count.length;

        var group       = new Group({
            name      : 'Group_'+count+'',
            className : 'group'
        });

        $.pjs.updLayer();
    },
    hierarchy: function(t, e){
        var items = project.selectedItems;
        var layer = project.activeLayer;

        console.log(t.attr('data-hierarchy'));

        // layer[t.attr('data-hierarchy')]();

        $.each(items, function(index, item) {
            var hierarchyItem = (t.attr('data-hierarchy-item')!=undefined)?item[t.attr('data-hirarchy-item')]:'';
            console.log(hierarchyItem);
            if(item.selected)
             item[t.attr('data-hierarchy')](hierarchyItem);
        });

        $.pjs.updLayer();
        project.view.update();


    },
    updLayer: function(){
        var layers = project.layers;


        $('#layers').html("");

        $.each(layers, function(index, layer) {
           var li = $("<li>",{'data-index':layer.index, class:'list-group-item'}).html($.layerLayer(layer));

           $('#layers').prepend(li);

        });

        /**
        * TODO : Synchroniser avec le canvas
        **/
        $('.layers').sortable('destroy');
        $('.layers').sortable({
             connectWith: '.layers'
        }).on('sortupdate', function(e, obj){
                var t = $(obj.item[0]);


                var layer = project.layers[t.attr('data-index')];
                console.log(layer);
                // project.insertLayer(t.attr('data-index'), layer);
                //
                // var idItem = t.attr('data-item');
                // var item = $.item.get(idItem);
                // console.log(item);
                // t.addClass('active');
                // item.selected = true;
                // item.activeLayer = true;
                // project.view.update();
                // $.pjs.updLayer();
            });
    },
    cleanEmpty: function(){
        var i = 0;
        $.each(project.layers, function(indexLayer, layer) {
             $.each(layer.children, function(indexChildren, children) {
                if (children.isEmpty() || children.className=="bound") {
                    if (children != undefined) {
                        i++;
                        console.log('clean');

                        children.remove();
                    }
                }
             });

        });
        console.log(i);
        $.pjs.updLayer();

    },
    raster: function (){
        var rand = Math.random().toString(36).substring(2);

        var raster = new Raster({
            source: $.qs['url']+'?rand='+rand,
            position: view.center
        });
        $.pjs.updLayer();
    },
    loadTool: function(t, e){
        t.parents('div').first().find('.active').removeClass('active');
        t.addClass('active');

        var url = $.generate.url.exec('editor','draw_load_tool');

        app[t.attr('data-tool')].activate();
    },
    load:function(t, e){
        var data = {
            file:$('canvas.draw-paper').attr('data-file')
        };
        $.post(t.attr('href'), data, function(json) {
            project.clear()
            project.importJSON(json.project);
            $.pjs.updLayer();
            project.view.update();
            $.iLayers = project.layers.length;
            $.history.setProtect(false)

        },'json');


    },
    save:function(t, e){
        var img      = document.getElementById($('canvas.draw-paper').attr('id'));
        var context  = img.getContext('2d');
        var ext      = 'png';
        var imgData  = img.toDataURL("image/"+ext);

        // var svg = "data:image/svg+xml;utf8," + encodeURIComponent(project.exportSVG({asString:true}));
        var svg = project.exportSVG({asString:true});
        // var svg = "project.exportSVG()";

        var data = {
            file:$('canvas.draw-paper').attr('data-file'),
            newName: $('#filename').val(),
            copy:  $('#file-copy').prop('checked'),
            contentSvg:svg,
            contentJson:project.exportJSON(),
            contentRaster:imgData
        };

        $.post(t.attr('href'), data, function(json) {
           $.notiny({ text: json.msg, position: 'right-top',theme: 'light' });
           $.history.setProtect(false)
        },'json');
    },
    resizeCanvas: function (){
        var w = $('#draw_w').val();
        var h = $('#draw_h').val();

        // project.view.size(w,h);

        project.view.viewSize.width = w;
        project.view.viewSize.height = h;

        console.log();

        project.view.update();
        $("canvas.draw-paper").css({
            width:w,
            height:h
        }).attr({
            'width':w,
            'height':h
        });
    },
    exportSvg: function(){
        var url = $.generate.url.exec('editor','svg_export');
        var data = {
            frame  : $.frames.cur,
            svg  : project.exportSVG({asString:true}),
            file : $('canvas.draw-paper').attr('data-file'),
            soft : 'ILLUSTRATOR'
        };

        $.post(url,data);
    },
    importSvg: function(){
        var url = $.generate.url.exec('editor','svg_import');
        var data = {
            frame  : $.frames.cur,
            file : $('canvas.draw-paper').attr('data-file'),
            soft : 'ILLUSTRATOR'
        };

        $.post(url,data,function(json){
            project.clear();
            project.importSVG(json.svg);

            project.view.update();
            $.pjs.updLayer();
            $.history.add();
        },'json');
    },
    strokeResize: function(w){
        $('#strokeWidth').val(w);
        $.pjs.stroleWidthPreview(w);
    },
    stroleWidthPreview: function(w){
         $('#strokeWidthPreview').css({
            width:w,
            'margin-top':0 - ( w / 2)+'px',
            height:w,
            'margin-left':0 - ( w / 2)+'px'
        });
    }

}



    $.frames = {
        cur : 1,
        frames : 5,
        add : function(){
            $.frames.frames = $.frames.frames + 1;
        },
        clone : function(frame_index){
            $.frames.frames = $.frames.frames + 1;
        },
        get : function(frame_index){
            if(frame_index <= 0)
                frame_index = $.frames.frames;
            else if(frame_index > $.frames.frames)
                frame_index = 1;

            $.frames.cur = frame_index;

            $('.frame').removeClass('active');
            $(".frame_"+frame_index).addClass('active');

        },
        export : function(frame_index){

        },
        import : function(){

        },
    }

    // $(document).on("mousedown","#circle-mouse",function (e){
    //     e.preventDefault();
    //     var t = $(this);
    //     if (e.button == 2)
    //         $.toggleMouseMenu(e);

    // })

 $(document).on("mousedown","canvas.draw-paper",function (e){
        var t = $(this);
        if (e.button == 2){
            $(document)[0].oncontextmenu = function() {
                return false;
            }
            $.toggleMouseMenu(e);
        }

    })

$(document).on("click",".btn-frame",function (e){
    e.preventDefault();
    var t = $(this);

    $.frames.get(t.attr('data-frame'));

})


/* créer la regexp pour trouver le resultat */
function createRegExp(strFind) {
    var strReg = "";
    var regexp = "[a-zA-Z0-9\\.\.\\s\_\-]{0,}";
    for (var i = 0; i < strFind.length; i++) strReg = strReg  + strFind[i] + "{1}(" + regexp + ")";
    return strReg;
}


console.log(projects);



 $(document).on("keyup","#searchLayer",function (e){
     var t = $(this);
     var layers = $('.layerLayer');
     t.attr('data-count',layers.is('.show').length);
     var cur = parseInt(t.attr('data-layer-cur'));
     if(e.keyCode == 38){
        /**
        * TODO : nav avec les fleches
        **/
        var active = layers.eq(cur--);
    }
     else if(e.keyCode == 40){
        /**
        * TODO : nav avec les fleches
        **/
        var active = layers.eq(cur++);
    }
     else if(t.val()!=''){
        var val  = t.val();
        var reg  = createRegExp(val);
        var patt = new RegExp(reg, "i");

        layers.find('thead.th_layerLayer').hide().removeClass('show');

        $.each(layers, function(index, val) {
            var eval = patt.test($(val).attr('id'));
            if(eval){
                $(val).find('thead.th_layerLayer').show().addClass('show');
                $(val).find('.btn-check').trigger('click');
            }
            t.attr('data-layer-cur',1);
        });

        if(e.keyCode == 27)
            t.val("");
     }

     else{
         layers.find('thead').show();
     }

 })
$('#tool_default').trigger('click');
$('.autoclick').trigger("click");

$(document).on("change keyup",".input-pjs",function (e){
    e.preventDefault();
    var t = $(this);

    $.pjs[t.attr('data-pjs')]();
})

// $('.slider-frames').slider().on("change",function (e){
//     e.preventDefault();
//     var t = $(this);
//     $.frames.get(t.val());
// });
