$.i = 0;
$.iLayers = project.layers.length;
var path;

var segment, path;
var movePath = false;

var hitOptions = {
      fill: true,
      stroke: true,
      segments: true,
      bounds: true,
      tolerance:10
};



$.toolSelected = {};
$.selected     = {};
$.selectedDown = {};

$.time         = {};
$.rotate       = 0;
var x          = 0, y = 0;
$.canvasPos    = $("canvas.draw-paper").position();

$.angle = function (cx, cy, ex, ey) {
  var dy = ey - cy;
  var dx = ex - cx;
  var theta = Math.atan2(dy, dx); // range (-PI, PI]
  theta *= 180 / Math.PI; // rads to degs, range (-180, 180]
  //if (theta < 0) theta = 360 + theta; // range [0, 360)
  return theta;
}






/**
 * http://paperjs.org/features/
 */
project.currentStyle.fillColor = 'black';

var values = {
    fixLength: false,
    fixAngle: false,
    showCircle: false,
    showAngleLength: true,
    showCoordinates: false
};

var vector, vectorPrevious;
var vectorItem, items, dashedItems;

var vectorStart = view.center;

function processVector(event, drag) {
    vector = event.point - vectorStart;
    if (vectorPrevious) {
        if (values.fixLength && values.fixAngle) {
            vector = vectorPrevious;
        } else if (values.fixLength) {
            vector.length = vectorPrevious.length;
        } else if (values.fixAngle) {
            vector = vector.project(vectorPrevious);
        }
    }
    drawVector(drag);
}

function drawVector(drag) {
    if (items) {
        for (var i = 0, l = items.length; i < l; i++) {
            items[i].remove();
        }
    }
    if (vectorItem)
        vectorItem.remove();
    items = [];
    var arrowVector = vector.normalize(10);
    var end = vectorStart + vector;
    vectorItem = new Group([
        new Path([vectorStart, end]),
        new Path([
            end + arrowVector.rotate(135),
            end,
            end + arrowVector.rotate(-135)
        ])
    ]);
    vectorItem.style = {
        strokeWidth: 0.75,
        strokeColor: '#e4141b',
        dashArray: [],
        fillColor: null
    };
    // Display:
    dashedItems = [];
    // Draw Circle
    if (values.showCircle) {
        dashedItems.push(new Path.Circle({
            center: vectorStart,
            radius: vector.length
        }));
    }
    // Draw Labels
    if (values.showAngleLength) {
        if (drawAngle(vectorStart, vector, !drag) && !drag) {
            drawLength(vectorStart, end, vector.angle < 0 ? -1 : 1, true);
        }
    }
    var quadrant = vector.quadrant;
    if (values.showCoordinates && !drag) {
        drawLength(vectorStart, vectorStart + [vector.x, 0],
                [1, 3].indexOf(quadrant) != -1 ? -1 : 1, true, vector.x, 'x: ');
        drawLength(vectorStart, vectorStart + [0, vector.y],
                [1, 3].indexOf(quadrant) != -1 ? 1 : -1, true, vector.y, 'y: ');
    }
    for (var i = 0, l = dashedItems.length; i < l; i++) {
        var item = dashedItems[i];
        item.style = {
            strokeColor: '#8b8b8b',
            fillColor: null,
            dashArray: [1, 2]
        };
        items.push(item);
    }
    // Update palette
    values.x = vector.x;
    values.y = vector.y;
    values.length = vector.length;
    values.angle = vector.angle;
}

function drawAngle(center, vector, label) {
    var radius = 25, threshold = 10;
    if (vector.length > radius + threshold) {
        var from = new Point(radius, 0);
        var through = from.rotate(vector.angle / 2);
        var to = from.rotate(vector.angle);
        var end = center + to;
        dashedItems.push(new Path.Line(center,
                center + new Point(radius + threshold, 0)));
        dashedItems.push(new Path.Arc(center + from, center + through, end));
        if (Math.abs(vector.angle) > 15) {
            var arrowVector = to.normalize(7.5).rotate(vector.angle < 0 ? -90 : 90);
            dashedItems.push(new Path([
                    end + arrowVector.rotate(135),
                    end,
                    end + arrowVector.rotate(-135)
            ]));
        }
        if (label) {
            // Angle Label
            var text = new PointText(center
                    + through.normalize(radius + 10) + new Point(0, 3));
            text.content = 'angle: ' + Math.floor(vector.angle * 100) / 100 + '°';
            text.fontSize = 12;
            items.push(text);
        }
        return true;
    }
    return false;
}

function drawLength(from, to, sign, label, value, prefix) {
    var lengthSize = 5;
    var vector = to - from;
    var awayVector = vector.normalize(lengthSize).rotate(90 * sign);
    var upVector = vector.normalize(lengthSize).rotate(45 * sign);
    var downVector = upVector.rotate(-90 * sign);
    var lengthVector = vector.normalize(
            vector.length / 2 - lengthSize * Math.sqrt(2));
    var line = new Path();
    line.add(from + awayVector);
    line.lineBy(upVector);
    line.lineBy(lengthVector);
    line.lineBy(upVector);
    var middle = line.lastSegment.point;
    line.lineBy(downVector);
    line.lineBy(lengthVector);
    line.lineBy(downVector);
    dashedItems.push(line);
    if (label) {
        // Length Label
        var textAngle = Math.abs(vector.angle) > 90
                ? textAngle = 180 + vector.angle : vector.angle;
        // Label needs to move away by different amounts based on the
        // vector's quadrant:
        var away = (sign >= 0 ? [1, 4] : [2, 3]).indexOf(vector.quadrant) != -1
                ? 8 : 0;
        var text = new PointText({
            point: middle + awayVector.normalize(away + lengthSize),
            fontSize: 12,
            justification: 'center'
        });
        text.rotate(textAngle);
        value = value || vector.length;
        text.content = '' + (prefix || '') + Math.floor(value * 1000) / 1000;
        items.push(text);
    }
}

////////////////////////////////////////////////////////////////////////////////
// Mouse Handling

var dashItem;
/**
 * end feature :http://paperjs.org/features/
 *
 */







function MouseWheelHandler(e) {

    // cross-browser wheel delta
    var e = window.event || e; // old IE support
    var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
    console.log(delta);
    return delta;
}

$.matrixRotate = function(item, angle){
    item.pivot = $.getPivot();
    angle = angle-$.rotate;
    item.rotate(angle);


    // console.log(item.matrix);

    // var a  = Math.cos(angle);
    // var b  = -Math.sin(angle);
    // var c  = Math.sin(angle);
    // var d  = Math.cos(angle);
    // var tx = item.pivot.x;
    // var ty = item.pivot.y;

    // item.matrix.set(a,b,c,d,tx,ty);
    // item.matrix.apply();



    $.rotate = angle;

    return item;
}


$.getMatrix = function (item, rotation){
    // var rot = $.def(rotation,0);

    // var rotation = 180;

    // var matrix = item.matrix; // valeur de départ
    // var matrix2 =  item.matrix; // valeur apres transformation

    // $("#matrix_1_a").val(matrix.a);
    // $("#matrix_1_b").val(matrix.b);
    // $("#matrix_1_c").val(matrix.c);
    // $("#matrix_1_d").val(matrix.d);
    // $("#matrix_1_tx").val(matrix.tx);
    // $("#matrix_1_ty").val(matrix.ty);

    // console.log(rotation);

    // $('#matrix_rotation').val(rotation);

    item.pivot    = $.getPivot();
    // item.rotation = rotation


    // item.matrixset({
    //     a  : Math.cos(rotation),
    //     b  : -Math.sin(rotation),
    //     c  : Math.sin(rotation),
    //     d  : Math.cos(rotation),
    //     tx : 0,
    //     ty : 0
    // })
    console.log(item);
      /**
     * Formule de rotation
     */

    // var newMatrix = new Matrix(a, c, b, d, tx, ty);
    //  item.transform(newMatrix);
    //     console.log(newMatrix);
    // var m2 = item.matrix.set(a,b,c,d,tx,ty);

    // console.log('sin');
    // console.log(b);
    // console.log('-sin');
    // console.log(-b);

    // console.log(matrix2);



    // $("#matrix_2_a").val(matrix2.a);
    // $("#matrix_2_b").val(matrix2.b);
    // $("#matrix_2_c").val(matrix2.c);
    // $("#matrix_2_d").val(matrix2.d);
    // $("#matrix_2_tx").val(matrix2.tx);
    // $("#matrix_2_ty").val(matrix2.ty);

    project.view.update();
}

function showIntersections(path1, path2) {
    var intersections = path1.getIntersections(path2);
    for (var i = 0; i < intersections.length; i++) {
        new Path.Circle({
            center: intersections[i].point,
            radius: 5,
            fillColor: '#009dec'
        }).removeOnMove();
    }
}

document.addEventListener('mousemove', function(e){
    x = e.layerX - $.canvasPos.left,
    y = e.layerY - 35;
}, false);

if (document.addEventListener) {
    // IE9, Chrome, Safari, Opera
    document.addEventListener("mousewheel", MouseWheelHandler, false);
    // Firefox
    document.addEventListener("DOMMouseScroll", MouseWheelHandler, false);
}
// IE 6/7/8
else document.attachEvent("onmousewheel", MouseWheelHandler);



/**
 * Les frames sont contenue dans les layers de premier niveau
 * est sont activer comme layer active par la fonction $.frames.cur
 */


$( window ).resize(function (e){
    $.canvasPos  = $("canvas.draw-paper").position();
})


var hitOptions = {
    segments: true,
    stroke: true,
    fill: true,
    tolerance: 40
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
                path.clearHandles();
            }
        },
        onMouseUp: function(event){
            if($.kalte('onMaj')){
                $('#strokeWidthPreview').css({
                    left:'inherit',
                    top:'inherit'
                }).removeClass('mousedrag');
            }
            else{
                $.pjs.updLayer();
                path.simplify();
                $.history.add(path);
            }
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
    selectPoint: new Tool({
        onMouseDown : function(event) {
            segment = path = null;
            var hitResult = project.hitTest(event.point, hitOptions);
            if (!hitResult)
                return;

            if (event.modifiers.shift) {
                if (hitResult.type == 'segment') {
                    hitResult.segment.remove();
                };
                return;
            }

            if (hitResult) {
                path = hitResult.item;
                if (hitResult.type == 'segment') {
                    segment = hitResult.segment;
                } else if (hitResult.type == 'stroke') {
                    var location = hitResult.location;
                    segment = path.insert(location.index + 1, event.point);
                    path.smooth();
                }
            }
            movePath = hitResult.type == 'fill';
            if (movePath)
                project.activeLayer.addChild(hitResult.item);
        },
        onMouseMove : function(event) {
            project.activeLayer.fullySelected = false;
            if (event.item)
                event.item.fullySelected = true;
        },
        onMouseDrag : function(event) {
            if (segment) {
                segment.point += event.delta;
                path.smooth();
            }
            else if (path) {
                path.position += event.delta;
            }
        }
    }),
    select: new Tool({
        onMouseDown : function (event){
            $.selected     = project.selectedItems;
            // project.selectedItems.selected = false;

            if($.kalte('onCmd')){
                if (event.item){
                    event.item.selected = true;

                    // event.item.fitBounds(view.bounds);
                }
            }
            else{

                if (event.item){
                    event.item.selected = !event.item.selected;
                    // $.getMatrix(event.item);
                }


                  $.each($.selected, function(index, intem) {
                    intem.selected = false;
                });
            }



            $.selected     = project.selectedItems;
            $.selectedDown = {};
            $.each($.selected, function(index, val) {
                 $.selectedDown[index] = val.position;
            });

        },
        onMouseMove : function (event) {
            // console.log($.kalte('onCmd'));

            // console.log(project);
            // if($.kalte('onMaj')){
            //     console.log();
            //     project.selectedItems.selected = false;

            //     if (event.item)
            //         event.item.selected = true;
            // }

            // if($.kalte('onAlt')){
            //     console.log();
            //     project.selectedItems.selected = false;

            //     if (event.item)
            //         event.item.selected = false;
            // }
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

            else if($.kalte('onCmd')){

                var angle = $.angle(downPointX,downPointY,event.point.x,event.point.y);
                console.log($.selected);
                var item = $.selected[0];
                $.matrixRotate(item,angle);

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

            }
            else if($.kalte('onMaj')){

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
            path.closed = true;
            $.isFirst = true;
        },
        onMouseDown : function (event){
            if($.isFirst == undefined || $.isFirst ){
                path             = new Path();
                $.i              = $.i + 1;
                path.name        = 'path'+$.i;
                path.strokeColor = $.getStrokeColor();
                path.fillColor   = $.getFillColor();
                path.strokeWidth = $.getW();
                path.strokeCap   = $.getCap();
                path.add(event.point);
                $.isFirst = false;
            }
            else{
                path.add(event.point);
            }
        },
        onKeyUp : function (event){
            path.closed = true;
            $.history.add(path);
            $.pjs.updLayer();
        }
    }),
    eraser: new Tool({
        onMouseDown: function(event){
            circle = new Path.Circle({
                center: event.downPoint,
                radius: 20,
                strokeWidth : $.getW(),
                strokeColor: '#fff',
                opacity: 0.5,
                selected : false
            });
        },
        onMouseDrag : function(event){
            // console.log(X);

            circle.position.x = event.event.offsetX;
            circle.position.y = event.event.offsetY;
            circle.selected = false;

            /**
            * TODO : fonction eraser
            **/
            var hitResult = project.hitTest(event.point);
            project.activeLayer.selected = false;
            if (hitResult && hitResult.type=="fill"){
                console.log(hitResult);
                // var cross = hitResult.item.getCrossings(circle)
                // console.log(cross);
                // showIntersections(circle, hitResult.item);
                hitResult.item.selected = true;
                 // console.log(hitResult.type);
            }
        },
        onMouseUp : function (event){
            circle.remove();
        }
    }),
    angle: new Tool({
        onMouseDown  : function(event){

            var end = vectorStart + vector;
            var create = false;
            if (event.modifiers.shift && vectorItem) {
                vectorStart = end;
                create = true;
            } else {
                vectorStart = event.point;
            }
            if (create) {
                dashItem = vectorItem;
                vectorItem = null;
            }
            processVector(event, true);


        },
        onMouseMove : function(event) {

        },
        onMouseDrag  : function(event){


            if (!event.modifiers.shift && values.fixLength && values.fixAngle)
                vectorStart = event.point;
            processVector(event, event.modifiers.shift);

            // var dash = [1,2];

            // var point1 = new Point(event.downPoint);
            // var point2 = new Point(event.point);
            // var pathdrag = new Path([point1,point2]);
            // pathdrag.strokeWidth=2;
            // pathdrag.strokeColor='#000';



            // var pathdragX = new Path([point1,{x:point2.x, y:point1.y}]);
            // pathdragX.strokeWidth=1;
            // pathdragX.strokeColor='#8D8D8D';
            // pathdragX.dashArray=dash;
            // pathdragX.removeOnDrag().removeOnUp();

            // var pathdragY = new Path([{x:point2.x, y:point1.y},point2]);
            // pathdragY.strokeWidth=1;
            // pathdragY.strokeColor='#8D8D8D';
            // pathdragY.dashArray=dash;

            // pathdragY.removeOnDrag().removeOnUp();

            // // var radiusArc = 100;

            // // var arc = new Path.Arc({
            // //     from: [point1.x, point1.y],
            // //     through: [60, 10],
            // //     to: point2,
            // //     strokeColor: 'black',
            // //     dashArray:[5,5]
            // // }).removeOnDrag().removeOnUp();


            // var vector = point2 - point1;
            // var textPosition = (point1+vector/2);
            // textPosition.y -= 10;


            // if ((vector.angle < -90) || (vector.angle < 180 && vector.angle >= 90))
            //     textAngle = vector.angle + 180;
            // else
            //     textAngle = vector.angle
            //     console.log(vector.angle);
            //     var textY = new PointText({
            //         point: textPosition,
            //         content:  Math.round(vector.length,2),
            //         fillColor: 'black',
            //         justification: 'center',
            //         fontSize:13
            //     }).rotate(textAngle).removeOnDrag().removeOnUp();



            // pathdrag.removeOnDrag().removeOnUp();
        },
        onMouseUp : function (event){
            // processVector({ point: new Point(view.size * 0.75) }, false);
            // pathdrag.removeOnUp();
            // point1.removeOnUp();
        }
    })


};
app.default.activate();

$.dashMode = function(){
    return $('#dash').prop('checked');
}

$(".btn-pjs").on("click",function (e){
    e.preventDefault();
    var t = $(this);

    $.pjs[t.data('pjs')](t, e);
})


$.groupSelect = {
    list : {},
    add : function(children){
        $.groupSelect.list.addChild(children);
    },
    init : function(childrens){
console.log(childrens);

        var group  = new Group(childrens);
        // console.log('init');
        // group.name = 'selection';
        // group.id   = 'selection';

        // console.log(group);
        // $.groupSelect.list = group;

        return group;
    },
    clear: function (){
        // $.groupSelect.list.removeChild(0,$.groupSelect.length);

        // console.log($.groupSelect.list);
    }
}


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

    project.view.update();
})


$.setSelect = function(properties, value){
    var form = $('#pathMenu').serializeObject();
    // items = project.selectedItems;
    var items = $.groupSelect.init(project.selectedItems);
    // var value = $.def(value,form[properties]);

    if (properties == 'rotation') {


        // items.pivot    = $.getPivot();


        $.getMatrix(items, form[properties]);
    }

    // else if (properties == 'scaling') {
    //     items.pivot    = $.getPivot();
    //     items.matrix.scale(form[properties]);
    // }
    // else{
    //     $.each(items.children, function(index, item) {
    //         if (item.selected)
    //             item[properties] = value;
    //     })
    // }

    project.view.update();
    // clearTimeout($.time);
    // $.time = setTimeout($.history.add(),1000);
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

        var css = (item.selected)?'btn-check active':'btn-check';

        return $("<a>",{
                href    : "#",
                id      : "path_check_"+item.index,
                'data-children':item.index,
                style   : 'margin-right:0.275rem',
                class   : css
            })
            .html(svg)
            .click(function(e) {
                e.preventDefault();
                var t        = $(this);

                t.toggleClass('active');

                $.sel.add(item,t.hasClass('active'));
                // $('#metaView').html(div);
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
            class   : (item.data.open)?'open toggle btn-toggle ':'toggle btn-toggle ',

        }).html('<i class="fa fa-caret-right"></i>').click(function(e) {
            e.preventDefault();
            $(this).toggleClass('open');
            $(this).parents('table').first().toggleClass('open');
            item.data.open = $(this).hasClass('open');
        });
    }

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
        });
        return div;
    }
};
// $.rotore = {};
$.bound = {};

$.sel = {
    list: {},
    single:function(item, bool){
        if(bool){
            var b = item.bounds;

            item.pivot = $.getPivot();
            // $.bound[item.index] = new Path.Rectangle(b);
            // $.bound[item.index].className = 'bound';
            // $.bound[item.index].name = 'bound'+item.index;
        }
        else{
            // if ($.bound[item.index] != undefined)
            //     $.bound[item.index].remove();
        }

        item.selected = bool;
        project.view.update();
    },
    add:function(item, bool){

        // if(!$.kalte('onCmd')){
        //     // $.sel.clear();
        // }

        item.selected = bool;
        if(bool)
            item.fitBounds(view.bounds);
        $.pjs.updLayer();
        project.view.update();
    },
    toggle:function(){},
    clear: function(){
        var items = project.selectedItems;
        $.each(items, function(index, item) {
           $.sel.add(item, false);
        });
        project.view.update();
    }
}

$.itemPath  = function(path){
    var open        = $.def(path.data.open,false);
    var openClass   = (open)?'open':'';


    var table = $("<table>",{"id":path.name,"class":"layerPath layers table table-sm "+path.className+" "+openClass});
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
    // if (path.selected){
    //     tr.addClass('table-active');
    //     tr.addClass(path.className);
    //     var name = (path.name != undefined)?path.name:'item '+path.index;
    // }

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
        // console.log(children);
        tbody.append($.itemPath(children));
    });


    table.append(tbody);

    return table;
}


$.layerLayer = function(layer){
    var open        = $.def(layer.data.open,false);
    var openClass   = (open)?'open':'';

    var active        = $.def(layer.active,false);
    var activeClass = (active)?'active':'';

    var table       = $("<table>",{
        "id":"layer_"+layer.name,
        "data-layer-name":layer.name,
        "data-contextmenu":'item',
        "class":"layerLayer  table table-sm btn-context "+openClass + " "+activeClass
    });
    var thead       = $("<thead>",{"id":"th_"+layer.name,"data-layer-name":layer.name,"class":"th_layerLayer"});
    var tbody       = $("<tbody>",{"id":"tb_"+layer.name,"class":"tb_layerLayer"});

    var metaList    = [
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
        td.html($.itemPath(children))
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

            $.iLayers    = project.layers.length;
            $.frames.clear('');
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
       if (confirm('Supprimer la selection ?')) {
         var items = project.selectedItems;
        $.each(items, function(index, item) {
           item.remove();
        });
        $.pjs.updLayer();
        project.view.update();

       }
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
          item.selected = false;
        });
        project.view.update();
    },
    selectAll: function(){
       var layerItems = project.activeLayer.children;
       $.each(layerItems, function(index, item) {
            item.selected = true;
       });

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
        var defaultName =  'Group_'+count;
        var name = prompt('nom du groupe',defaultName);

        var group       = new Group({
            name      : name,
            className : 'group'
        });

        $.each(project.selectedItems, function(index, item) {
            group.addChild(item);
        });


        $.pjs.updLayer();
    },
    createFrame: function(){
       $.iLayers = parseInt($.iLayers) + 1;

        var layer  = new Layer();
        layer.name = 'layer '+$.iLayers;

        $.pjs.activeLayer(layer);

        $.pjs.updLayer();
    },
    hierarchy: function(t, e){
        var items = project.selectedItems;
        var layer = project.activeLayer;

        console.log(t.attr('data-hierarchy'));

        // layer[t.attr('data-hierarchy')]();

        $.each(items, function(index, item) {
            var hierarchyItem = (t.attr('data-hierarchy-item')!=undefined)?item[t.attr('data-hirarchy-item')]:'';
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

        $('.layers').sortable('destroy');
        $('.layers').sortable({
             connectWith: '.layers'
        }).on('sortupdate', function(e, obj){
                var t = $(obj.item[0]);

                var layer = project.layers[t.attr('data-index')];

                if($.kalte('onCmd')){
                    console.log(obj.item[0]);
                }

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

        $.pjs.updSymbols();
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
            $.pjs.updSymbols();
            project.view.update();

            console.log(project.symbols);

            $.iLayers = project.layers.length;
            $.history.setProtect(false);






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
            contentRaster:imgData,
            contentSymbole: project.symbols
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
    },
    createSymbole: function(){
        var name = prompt('nom du symbol');
        var i = 0;


        var group       = new Group(project.selectedItems);
        group.name = name;
        group.id = name;


        var symbol = new Symbol(group);
        symbol.name=name;
        //     symbol.name = name+"_"+i;
        // name      : name,
        //     className : 'group'
        // $.each(, function(index, item) {
        //     i++;
        //     var symbol = new Symbol(item);
        //     symbol.name = name+"_"+i;
        // });

        $.pjs.updSymbols();
    },
    updSymbols: function(){
        var symbols = project.symbols;

        $('#symbols').html("");

        $.each(symbols, function(index, symbol) {
           var li = $("<li>",{'id':'symbole_'+symbol.name+'_'+$.i,'data-index':symbol.index, class:'list-group-item symbol'}).html(symbol.name);

           li.click(function(){
            $.pjs.placeSymbol(index);
           })

           $('#symbols').prepend(li);
           $.i++;
        });
    },
    placeSymbol: function (symbol_index){
        console.log(symbol_index);

        var symbol = project.symbols[symbol_index];

        var instance = new PlacedSymbol(symbol);
         // Move the instance to a random position within the view:
        instance.position = Point.random() * view.size;


        project.view.update();
    },
    addFrame: function(){
        $.frames.add();
    },
    copy: function(){
        $.each($.selected, function(index, item) {
             var clone = item.clone();
             item.selected = false;
             clone.position.x += 50;
             clone.position.y += 50;
        });
        project.view.update();
    },
    flipVertical: function(){
        $.each($.selected, function(index, item) {
             console.log(item.matrix.inverted());
        });
        project.view.update();
    },
    flipHorizontal: function(){
        $.each($.selected, function(index, item) {
             console.log(item.matrix.inverted());
        });
        project.view.update();
    }
}



    $.frames = {
        cur : 1,
        frames : 1,
        clear: function(){
            $('#frames').html("");
            $.frames.cur = 1;
            $.frames.thumb(1);

            // $.frames.add(1);
        },
        thumb: function(f){
            var li  = $("<li>");

            var a   = $("<a>",{"id":"frame_"+f,
                "data-frame":f,
                "class":"btn-frame frame_"+f+" frame active"
            }).css({'display':'block'}).html('');

            var svg = $("<svg>",{
                "id":"frame_preview_"+f,
                "class":"frame-thumb"
            }).html("");

            a.append(svg);
            li.html(a);
            $('#frames').append(li);
            $('#frames').sortable('destroy');
            $('#frames').sortable();

        },
        add : function(){
            $('.frame.active').removeClass('active');
            var f   = $.frames.frames = $.frames.frames + 1;

            $.frames.thumb(f);

            $.pjs.updLayer();
            var layer  = new Layer();
            layer.name = 'frame_'+f;
            layer.id   = 'frame_'+f;
            layer.className   = 'frame';

            $.frames.get(f);
            project.view.update();
        },
        remove: function(frame_index){
            var frame  =  project.layers[frame_index-1];
            var f      = $.frames.frames = $.frames.frames - 1;
            frame.remove();
            $('#frames .frame_'+frame_index).parents('li').remove();
        },
        clone : function(frame_index){
           var frame  =  project.layers[frame_index-1];
           var f      = $.frames.frames = $.frames.frames + 1;
           var clone  = frame.clone();
           clone.id   = f+'_copy';
           clone.name = f+'_copy';
           $.frames.thumb(f);
        },
        get : function(frame_index){
            if(frame_index <= 0)
                frame_index = $.frames.frames;
            else if(frame_index > $.frames.frames)
                frame_index = 1;

            $.frames.cur = frame_index;

            var curFrame = project.activeLayer;
            curFrame.visible = false;

            var frame =  project.layers[frame_index-1];

            frame.visible = true;
            frame.activate();

            // gestion de l'affichage des frames du footer
            $('a.frame').removeClass('active');
            $("a.frame_"+frame_index).addClass('active');


            $('.curFrame').html(frame_index);
            $.pjs.updLayer();

            project.view.update();


            var layers = project.layers;
            console.log(layers);

            //  var frames = project.getItems({
            //     class: Layer,
            //     className: 'frame'
            // })
            // console.log(frames);


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

$(document).on("dblclick",".btn-frame",function (e){
    e.preventDefault();
    var t = $(this);
    if($.kalte('onCmd'))
        $.frames.remove(t.attr('data-frame'))
    else
        $.frames.clone(t.attr('data-frame'));
})


/* créer la regexp pour trouver le resultat */
function createRegExp(strFind) {
    var strReg = "";
    var regexp = "[a-zA-Z0-9\\.\.\\s\_\-]{0,}";
    for (var i = 0; i < strFind.length; i++) strReg = strReg  + strFind[i] + "{1}(" + regexp + ")";
    return strReg;
}



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


$('#frames').sortable();
// $('.slider-frames').slider().on("change",function (e){
//     e.preventDefault();
//     var t = $(this);
//     $.frames.get(t.val());
// });
