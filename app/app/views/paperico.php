<fieldset>
<!-- /**
* TODO : voir documentation paperjs :http://paperjs.org/tutorials/getting-started/using-javascript-directly/
**/ -->
<legend>Paper</legend>
<!-- /**
* TODO : corriger les bugs de generations d'icone avec paperjs.
**/ -->
<?php if ($c->isAsync()): ?>
    <div class="alert alert-warning alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Probleme</strong>  de generation dans le modal. Ouvrir la page dans un <a href="<?php $c->urlPage('app','icon_generator') ?>" class="" target='blank' title="autre onglet">autre onglet</a>.
    </div>
<?php else: ?>
     <div class="alert alert-warning alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Attention</strong> le bouton save ( <i class="fa fa-floppy-o"></i> ) enregistre directement l'image dans le dossier de gestion du projet et dans les assets du projet en local.
    </div>

<?php endif ?>


<form id="form-paper" action="#"> <!-- BEGIN COL : col-md-2 col-lg-2  -->

        <nav>
            <button class='btn-tools btn btn-sm btn-secondary '><i class="fa fa-magic"></i></button>
            <a href="<?php $c->urlExec('app','icon') ?>" data-form='#form-project' class="btn btn-secondary btn-sm btn-canvas" data-canvas="icon75" title="save"><i class="fa fa-floppy-o"></i></a>
        </nav>
        <hr>

        <!-- BEGIN COL : col-md-2 col-lg-2  -->
        <div class="col-sm-3 ">
            <canvas id="icon75" height="75" width="75"></canvas>
        </div>
        <!-- BEGIN COL : col-sm-9  -->
        <div class="col-sm-9 ">


        <!-- END COL : col-sm-9  -->
        <!-- END COL : col-md-4 col-lg-4  -->
        <div class="form-group">
        <label for="size" class="col-sm-2 form-control-label"><i class="fa fa-font"></i>
        </label>
            <input type="range" min="7" max="75" id="size" value="30">
        </div>
        <div class="form-group">
        <label for="top" class="col-sm-2 form-control-label">Top</label>
            <input type="range" min="0" max="75" id="top" value="50">
        </div>
        </div>
        <!-- END COL : col-md-8 col-lg-8  -->
        <div class="clearfix"></div>
<hr>
    <div class="form-group">
        <input type="text" name="shortname" class="form-control" id="shortname" placeholder="Texte Icone" value="<?php echo $d['shortname'] ?? 'RB';?>" />
        </div>
        <div class="form-group">
        <select id="font" name="font" class="form-control c-select">
            <option value="League Spartan">League Spartan</option>
            <option value="Minecraftia">Minecraftia</option>
            <option value="Tondu">Tondu</option>
            <option value="Permanent Marker">Permanent Marker</option>
            <option value="Rock Salt">Rock Salt</option>
            <option value="Times New Roman">Times New Roman</option>
        </select>
        </div>
        <!-- BEGIN ROW  -->
        <div class="row ">
            <div class="input-group input-colors col-sm-6 ">
                <input type="text" name="color1" class="form-control" id="color1" placeholder="" value="<?php echo $d['color1'] ?? '#242424';?>" />
                <span class="input-group-addon"><i></i></span>
            </div>
            <div class="input-group input-colors col-sm-6 ">
                <span class="input-group-addon"><i></i></span>
                <input type="text" name="color2" class="form-control" id="color2" placeholder="" value="<?php echo $d['color2'] ?? '#fff';?>" />
            </div>
        </div>
        <!-- END ROW  -->



</form>


<!-- Load the Paper.js library -->
<script type="text/javascript" src="assets/vendor/paper/dist/paper-full.min.js"></script>

<script type="text/javascript">
    paper.install(window);
    // Only executed our code once the DOM is ready.
    window.onload = function() {
        // Get a reference to the canvas object
        var canvasIco = document.getElementById('icon75');
        // Create an empty project and a view for the canvasIco:
        // paper.setup(canvasIco);

        function ico(size){

            var c1       = $('#color1').val();
            var c2       = $('#color2').val();
            var font     = $('#font').val();
            var txt      = $('#shortname').val();
            var top      = parseInt($('#top').val());
            var fontSize = $('#size').val();

            paper.clear();
            paper.setup(canvasIco);

            var path         = new Path();

            center           = size / 2;

            path.strokeColor = $('#color1').val();
            path.fillColor   = $('#color1').val();


            var rectangle    = new Rectangle(new Point(0, 0), new Point(size, size));
            var cornerSize   = new Size(10, 10);
            var path         = new Path.RoundRectangle(rectangle, cornerSize);

            path.fillColor   = c1;
            var text           = new PointText(new Point(center, top));
            text.justification = 'center';
            text.fillColor     = c2;
            text.fontFamily    = font;
            text.fontSize      = fontSize+'px';
            text.fontWeight    = 'bolder';
            text.content       = txt;
        }



        $(document).on("change click","#form-paper input, .input-colors , #form-paper select, .btn-tools",function (e){
            e.preventDefault();
            var t = $(this);

            ico(75);
            paper.view.update();
        })

        $('.autoclick').trigger('click');
    };
</script>
</fieldset>