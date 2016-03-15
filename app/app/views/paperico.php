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
      <strong>Attention</strong> le bouton save enregistre directement l'image dans le dossier de gestion du projet.
    </div>

    <div class="alert alert-warning alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      La prévisualisation se fait en passant la sourie apres avoir cliquer sur la baguette ou sur un input color.
    </div>

<?php endif ?>


<form id="form-paper" action="#"> <!-- BEGIN COL : col-md-2 col-lg-2  -->

        <nav>
            <button class='btn-tools btn btn-sm btn-default'><i class="fa fa-magic"></i></button>
            <a href="<?php $c->urlExec('app','icon') ?>" data-form='#form-project' class="btn btn-primary btn-sm btn-canvas" data-canvas="icon75" title="save"><i class="fa fa-floppy-o"></i></a>
        </nav>
        <hr>

        <!-- BEGIN COL : col-md-2 col-lg-2  -->
        <div class="col-md-2 col-lg-2 ">
            <canvas id="icon75" height="75" width="75"></canvas>
        </div>
        <!-- END COL : col-md-4 col-lg-4  -->

        <!-- BEGIN COL : col-md-8 col-lg-8  -->
        <div class="col-md-8 col-lg-8 ">
            <label for="size" class="block">font size
        <input type="range" min="7" max="75" id="size">
        </label>
        <label for="top" class="block">Top
        <input type="range" min="0" max="75" id="top">
        </label>
        </div>
        <!-- END COL : col-md-8 col-lg-8  -->
<div class="clearfix"></div>
        <label for="shortname" class="block ">shortname</label>
        <input type="text" name="shortname" class="form-control" id="shortname" placeholder="" value="<?php echo $d['shortname'] ?? '';?>" />
        <select id="font" name="font" class="form-control c-select">
            <option value="League Spartan">League Spartan</option>
            <option value="Minecraftia">Minecraftia</option>
            <option value="Tondu">Tondu</option>
            <option value="Permanent Marker">Permanent Marker</option>
            <option value="Rock Salt">Rock Salt</option>
            <option value="Times New Roman">Times New Roman</option>
        </select>
        <div class="input-group input-colors">
            <input type="text" name="color1" class="form-control" id="color1" placeholder="" value="<?php echo $d['color1'] ?? '#242424';?>" />
            <span class="input-group-addon"><i></i></span>
        </div>
        <div class="input-group input-colors">
            <input type="text" name="color2" class="form-control" id="color2" placeholder="" value="<?php echo $d['color2'] ?? '#fff';?>" />
            <span class="input-group-addon"><i></i></span>
        </div>



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



        $(document).on("change click","#form-paper input, .btn-tools",function (e){
            e.preventDefault();
            var t = $(this);
            ico(75);

        })

    };
</script>
</fieldset>