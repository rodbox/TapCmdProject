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
            path.add(event.point);
        },
        onMouseDrag: function(event){
            path.add(event.middlePoint);
            path.smooth();
        },
        onMouseUp: function(event){
            $.pjs.updLayer();
        }
    }),
    circle: new Tool({
        onMouseDrag : function (event){
              var path = new Path.Circle({
                    center: event.downPoint,
                    radius: (event.downPoint - event.point).length
                });
              path.fillColor = $.colorFill();
              path.strokeColor = $.colorStroke();
              path.name ="circle";
            path.removeOnDrag();
        },
        onMouseUp   : function (event) {

            $.pjs.updLayer();

        },
    }),
    rectangle: new Tool({
        onMouseDrag : function (event){
            var path = new Path.Rectangle({
                point: [event.downPoint.x, event.downPoint.y],
                size: [event.point.x-event.downPoint.x, event.point.y-event.        downPoint.y]
            });
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
        }
    }),
    brush: new Tool({
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
            $.pjs.updLayer();
            console.log(path.name);
        }
    })
};
app.default.activate();


$.getColor = function (index){
    return $('#color'+index).val();
}
$.colorFill = function (){
   return $('#color1').val();
}

$.colorStroke = function (){
   return $('#color2').val();
}


$(".btn-pjs").on("click",function (e){
    e.preventDefault();
    var t = $(this);

    $.pjs[t.data('pjs')](t, e);
})





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
        val[t.attr('data-properties')] = t.val();
    });
    project.view.update();
})


$.pjs = {
    undo: function(){},
    redo: function(){},
    updLayer: function(){
        var layersChildren = project.layers[0]._children;
        var liModel        = $("<li>",{class:'list-group-item'});
        $('#layers').html('');
        $.each(layersChildren, function(index, val) {

            var li = liModel.clone();

            li.attr('data-item', index);

            if (val.selected)
                li.addClass('active');

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



            li.click(function(e) {
                e.stopImmediatePropagation();
                var t        = $(this);
                t.toggleClass('active');
                val.selected = t.hasClass('active');
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
            var aRemove = $("<a>",{
                    href    : "#",
                    id      : "path_"+index,
                    class   : 'remove pull-right'
                }).html('<i class="fa fa-close"></i>');

            aRemove.click(function(e) {
                e.preventDefault();
                if (confirm('Supprimer')) {
                    li.remove();
                    val.remove();
                    project.view.update();
                }

            });

            // li.html(aCheck);
            li.html(aShow);

            li.append(aName);
            li.append(aToggle);
            li.append(aRemove);

            $('#layers').append(li);
        });

        /**
        * TODO : Synchroniser avec le canvas
        **/
        $('#layers').sortable('destroy');
        $('#layers').sortable().on('sortupdate', function(e, obj){
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
        app[t.attr('data-tool')].activate();

        // var data = {

        // };

        //  $.post('./assets/paper/tools/default.json', data, function(json) {
        //     $.toolSelected = json;
        //     console.log($.toolSelected);
        // },'json');

         // new tool($.toolSelected);
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


    // $.pjs.raster();


}