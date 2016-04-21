tool.minDistance = 10;
tool.maxDistance = 45;

var path;



function onMouseDown(event) {
    path = new Path();
    path.strokeColor = '#00000';
    // path.selected = true;
    path.className = "marker_poil";
    path.add(event.point);
}


function onMouseUp(event) {
    $.pjs.updLayer();
}

function onMouseDrag(event) {

    var step = event.delta;
    step.angle += 90;

    var top = event.middlePoint + step;
    var bottom = event.middlePoint - step;

    var line = new Path();

    line.strokeColor = '#000000';
    line.add(top);
    line.add(bottom);

    path.add(top);
    path.insert(0, bottom);
    // line.set({className : "marker_poil"});
}







$(".btn-pjs").on("click",function (e){
    e.preventDefault();
    var t = $(this);

    $.pjs[t.data('pjs')](t, e);
})


$.pjs = {
    undo: function(){},
    redo: function(){},
    updLayer: function(){
        var layersChildren = project.layers[0]._children;
        var liModel  = $("<li>",{class:'list-group-item'});
        $('#layers').html('');
        $.each(layersChildren, function(index, val) {

            var li = liModel.clone();

            if (val.selected)
                li.addClass('active');

            var a = $("<a>",{
                    href    : "#",
                    id      : "path_"+index,
                    class   : 'selector'
                }).html('path '+index);

            a.click(function(e) {
                e.preventDefault();
                var p        = $(this).parent('li');
                p.toggleClass('active');
                val.selected =p.hasClass('active');
                project.view.update();
            });

            var aRemove = $("<a>",{
                    href    : "#",
                    id      : "path_"+index,
                    class   : 'remove pull-right'
                }).html('<i class="fa fa-close"></i>');

            aRemove.click(function(e) {
                e.preventDefault();
                li.remove();
                val.remove();
                project.view.update();
            });

            li.html(a);
            li.append(aRemove);

             $('#layers').append(li);
        })
    },
    raster: function (){
        var rand = Math.random().toString(36).substring(2);

        var raster = new Raster({
            source: $.qs['url']+'?rand='+rand,
            position: view.center
        });
    },
    load:function(t, e){
        var data = {
            file:$('canvas').attr('data-file')
        };
        $.post(t.attr('href'), data, function(json) {
            project.clear()
            project.importJSON(json.project);
            $.pjs.updLayer();
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
            /*optional stuff to do after success */
        },'json');
    }


    // $.pjs.raster();


}