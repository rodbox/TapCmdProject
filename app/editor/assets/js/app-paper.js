tool.minDistance = 10;
tool.maxDistance = 45;
$.i = 0;
var path;


var toolsList = ['default'];
$.toolSelected = {};

// $.each(toolsList, function(index, val) {
//      $.get('./assets/paper/tools/'+val+'.json', function(json) {
//             window.app = {
//                 default : new Tool(json)
//             };
//         },'json');
// });
//
//

window.app = {
    default: new Tool({
        onMouseDown: function(event){
            path = new Path();
            $.i = $.i + 1;
            path.name = 'path'+$.i;
            path.strokeColor = $.colorFill();
            path.strokeWidth = $.strokeSize();
            path.strokeCap = "round";

            path.add(event.point);

            if($.dashMode())
                path.dashArray = $.dash();
        },
        onMouseDrag: function(event){
            path.add(event.middlePoint);
            path.smooth();
        },
        onMouseUp: function(event){
            $.pjs.updLayer();
            $.history.add(path);
        }
    }),
    circle: new Tool({
        onMouseDrag : function (event){
              var path = new Path.Circle({
                    center: event.downPoint,
                    radius: (event.downPoint - event.point).length,
                    strokeWidth : $.strokeSize()
                });
                path.fillColor   = $.colorFill();
                path.strokeColor = $.colorStroke();
                if($.dashMode())
                    path.dashArray = $.dash();
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
                point: [event.downPoint.x, event.downPoint.y],
                size: [event.point.x-event.downPoint.x, event.point.y-event.        downPoint.y]
            });

            if($.dashMode())
                    path.dashArray = $.dash();

            if ($.colorFill()!=""){
                path.fillColor = $.colorFill();
                // path.fillColor.alpha = alphaFill();
            }
            if ($.colorStroke()!=""){
                path.strokeColor =  $.colorStroke();
                // path.strokeColor.alpha = alphaStroke();
            }
            path.name = "rectangle";

            path.removeOnDrag();

            },
        onMouseUp   : function (event) {

                $.pjs.updLayer();
            },
        }),
    select: new Tool({
        onMouseDrag : function (event){
            var downPointX = event.downPoint.x;
            var downPointY = event.downPoint.y;
            var sizeX = event.point.x-downPointX;
            var sizeY = event.point.y-downPointY;

            var path = new Path.Rectangle({
                point: [downPointX,downPointY],
                size: [sizeX, sizeY]
            });

            path.fillColor = "black";
            path.fillColor.alpha = "0.1";
            path.strokeColor =  "grey";
            path.strokeWidth =  "1";
            path.strokeJoin = 'round';
            path.dashArray = [5, 5];
          /*  path.miterLimit(1);*/
            path.removeOnDrag();
            path.removeOnUp();

            var textX = new PointText({
                point: [downPointX+(sizeX/2), downPointY+13],
                content:  Math.abs(sizeX),
                fillColor: 'black',

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

            /**
            * TODO : Gestion du hit test pour la selection dans le rectangle de select
            **/

        }
    }),
    brush: new Tool({
        onKeyDown: function(event){
            console.log($.kalte('onAlt'));
            console.log(event.middlePoint);
        },
        onMouseDown: function(event){
            path = new Path();
            $.i = $.i + 1;
            var rand = Math.random().toString(36).substring(2);
            path.name = 'brush '+$.i;
            path.fillColor = $.getColor(1);
            path.add(event.point);
        },
        onMouseDrag: function(event){
            var step = event.delta / 2;
            step.angle += 90;
            var top = event.middlePoint + step;
            var bottom = event.middlePoint - step;
            path.add(top);
            path.insert(0, bottom);
            path.smooth();
        },
        onMouseUp: function(event){
            path.add(event.point);
            path.closed = true;
            path.smooth();
            $.history.add(path);
            $.pjs.updLayer();
            console.log(path.name);
        }
    })
};
app.default.activate();



/**
* TODO : Optimiser la gestion des parametrages des tools
**/

$.getColor = function (index){
    return $('#color'+index).val();
}
$.colorFill = function (){
   return $('#color1').val();
}

$.colorStroke = function (){
   return $('#color2').val();
}
$.strokeSize = function(){
    return $('#size').val();
}

$.dash = function(){
    var arr = new Array();
    arr.push($("#dash_x").val());
    arr.push($("#dash_w").val());
    return arr;
}

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
    max: 50,
    list: [],
    listRedo: [],
    undo:function (){
        var last = $.history.list.pop();
        $.history.listRedo.push(last);

        last.remove();
        project.view.update();
        $.pjs.updLayer();
        console.log(last);
    },
    redo:function(){
        /**
        * TODO : Corriger le redo
        **/
        var last = $.history.listRedo.pop();
        $.history.list.push(last);

        console.log(last);
        last.clone()
        // new last;
        project.view.update();
    },
    add:function(item){

        if($.history.list.length >= $.history.max)
            $.history.list.shift();

        $.history.list.push(item);
    }
}


$.rename = {
    on:function (t){
        t.attr('data-content',t.html());
        var input = $("<input>",{
            "type":"text",
            "class":"inline"
        }).val(t.text()).keypress(function(e) {
            if(e.keyCode == 13){
                var name = ($(this).val() != '')?$(this).val():t.attr('data-content');
                // project.layers[0]._children[]['name'] = $(this).val();
                $.item.set(t.attr('data-children'),'name',name);
                t.attr('data-content',name);

                $.rename.off(t);
            }
            else if (e.keyCode == 27){
                $.rename.off(t);
            }
        })

        t.html(input);

    },
    off:function (t){
        t.html(t.attr('data-content'));
    }
}


$.item = {
    set:function(itemIndex, attr, value){
        project.layers[0]._children[itemIndex][attr] = value;
        project.view.update();
    },
    get:function(itemIndex){
        return project.layers[0]._children[itemIndex];
    }
}


$(document).on("change",".setSelect",function (e){
    e.preventDefault();
    var t = $(this);
    var items = project.selectedItems;
    $.each(items, function(index, val) {
        if (val.selected)
            val[t.attr('data-properties')] = t.val();
    });
    project.view.update();
})


$.pjs = {
    undo: function(){
        $.history.undo();
    },
    redo: function(){
        $.history.redo();
    },
    createLayer: function(){
        /**
        * TODO : Fixer la gestion des layers
        **/
        var layer       = new Layer();
        layer.name      = 'layer';
        layer.className = 'layer';

        project.addLayer(layer);

        $.pjs.updLayer();
    },
    createGroup: function(){
        var group       = new Group();
        group.name      = 'group';
        group.className = 'group';
        $.pjs.updLayer();
    },
    updLayer: function(){
        var layersChildren = project.layers[0]._children;
        var trModel        = $("<tr>",{class:''});

        $('#layers tbody').html("");

        $.each(layersChildren, function(index, val) {

            var tr = trModel.clone();

            tr.attr('data-item', index);

            if (val.selected)
                tr.addClass('table-active');
            tr.addClass(val.className);
            var name = (val.name != undefined)?val.name:'item '+index;

            var aShow = $("<a>",{
                    href    : "#",
                    id      : "path_show_"+index,
                    'data-children':index,
                    class   : (val.visible)?'visible active':'visible',
                    style   : 'margin-right:0.275rem'
                }).html('<i class="fa fa-eye"></i>');

            var aName = $("<a>",{
                    href    : "#",
                    id      : "path_"+index,
                    'data-children':index,
                    class   : 'rename',
                    style   : 'margin-right:0.275rem'
                }).html(name);

            var aToggle = $("<a>",{
                    href    : "#",
                    'data-children':index,
                    class   : 'toggle',

                }).html('<i class="fa fa-caret-right"></i>');

            var aToggleChild = $("<a>",{
                    href    : "#",
                    'data-children':index,
                    class   : 'toggle',

                }).html('<i class="fa fa-caret-right"></i>');
            var aRemove = $("<a>",{
                    href    : "#",
                    id      : "path_"+index,
                    class   : 'remove pull-right'
                }).html('<i class="fa fa-close"></i>');

            tr.click(function(e) {
                e.preventDefault();
                var t        = $(this);
                t.toggleClass('table-active');
                val.selected = t.hasClass('table-active');
                project.view.update();
            });

            aShow.click(function(e) {
                $(this).toggleClass('active');
                val.visible = $(this).hasClass('active');
                project.view.update();
            });

            aToggle.click(function(e) {
                console.log(val);
            });

            aName.dblclick(function(e) {
                var t = $(this);
                $.rename.on(t);
            });


            aRemove.click(function(e) {
                e.preventDefault();
                if (confirm('Supprimer')) {
                    tr.remove();
                    val.remove();
                    project.view.update();
                }

            });

            var tdShow        = $("<td>").html(aShow);

            var tdToggleChild = $("<td>").html((val.className == 'Group')?aToggleChild:'');
            // var tdToggleChild = $("<td>").html(val.className);

            var tdName        = $("<td>").html(aName);
            var tdToggle      = $("<td>").html(aToggle);
            var tdRemove      = $("<td>").html(aRemove);

            tr.html(tdShow);
            tr.append(tdToggleChild);
            tr.append(tdName);
            tr.append(tdToggle);
            tr.append(tdRemove);

            $('#layers tbody').append(tr);
        });

        /**
        * TODO : Synchroniser avec le canvas
        **/
        $('#layers tbody').sortable('destroy');
        $('#layers tbody').sortable().on('sortupdate', function(e, obj){
                var t = $(obj.item[0]);

                var idItem = t.attr('data-item');
                var item = $.item.get(idItem);
                console.log(item);
                t.addClass('active');
                item.selected = true;
                item.activeLayer = true;
                project.view.update();
            });;
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
            file:$('canvas').attr('data-file')
        };
        $.post(t.attr('href'), data, function(json) {
            project.clear()
            project.importJSON(json.project);
            $.pjs.updLayer();
            project.view.update();
        },'json');


    },
    save:function(t, e){
        var img      = document.getElementById($('canvas').attr('id'));
        var context  = img.getContext('2d');
        var ext      = 'png';
        var imgData  = img.toDataURL("image/"+ext);

        // var svg = "data:image/svg+xml;utf8," + encodeURIComponent(project.exportSVG({asString:true}));
        var svg = project.exportSVG({asString:true});
        // var svg = "project.exportSVG()";

        var data = {
            file:$('canvas').attr('data-file'),
            contentSvg:svg,
            contentJson:project.exportJSON(),
            contentRaster:imgData
        };

        $.post(t.attr('href'), data, function(json) {
           $.notiny({ text: json.msg, position: 'right-top',theme: 'light' });
        },'json');
    }
}
    $(document).on("mousedown","#circle-mouse",function (e){
        e.preventDefault();
        var t = $(this);
        if (e.button == 2)
            $.toggleMouseMenu(e);

    })

 $(document).on("mousedown",function (e){
        var t = $(this);
        if (e.button == 2){
            $(document)[0].oncontextmenu = function() {
                return false;
            }
            $.toggleMouseMenu(e);
        }

    })