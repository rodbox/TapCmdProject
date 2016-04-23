<?php include_once('controller/controller.php'); ?>
<!DOCTYPE html>
<html lang="fr" class="h-100 draw-page">
    <head>
        <meta charset="UTF-8">
        <title>Draw</title>

        <link href="assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/vendor/notiny/dist/notiny.min.css" rel="stylesheet">
                <link href="assets/vendor/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" >
                <link href="assets/vendor/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css" rel="stylesheet" >
        <link href="assets/css/icomoon/style.css" rel="stylesheet">
        <link href="assets/css/app.css" rel="stylesheet">
        <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="assets/vendor/paper/dist/paper-full.js" ></script>
        <script type="text/javascript">$.cb = {};</script>
    </head>
    <body class="h-100">
      <?php
        extract($_GET);
        $rand  = substr( md5(rand()), 0, 8);
      ?>

  <!-- BEGIN COL : col-xs-3 col-lg-8  -->
      <!-- BEGIN ROW  -->
      <div class="row bg-inverse">
          <div class="col-xs-3 ">
            <?php $c->menu("editor","editors/panel/img-action","",$_GET); ?>
          </div>
          <div class="col-xs-6 text-center">
            <?php $c->view("editor","editors/panel/img-class","",$_GET); ?>
          </div>
          <div class="col-xs-3 ">
            <?php $c->menu('editor','editors/menu/img',$_GET); ?>
          </div>
      </div>
      <!-- END ROW  -->
      <div class="row ">
            <div class=" col-xs-3 " style="left:0px">
              <?php $c->view("editor","editors/panel/img-tools","draw_tools",$_GET); ?>
            </div>
            <!-- BEGIN COL : col-lg-8  -->
            <div class="col-xs-6 text-center h-100 text-center" style="vertical-align: middle;" >
              <div class='text-center'>
                      <div class="btn-group">
                        <a href="#" class="btn-pjs btn btn-default" data-pjs="undo"><i class="fa fa-undo"></i></a>
                        <a href="#" class="btn-pjs btn btn-default" data-pjs="redo"><i class="fa fa-repeat"></i></a>
                      </div>
              </div>
              <canvas id="<?php echo $_GET['id']; ?>" style="" data-file="<?php echo $file ?>" width="<?php echo $size[0] ?>" height="<?php echo $size[1] ?>" style="background-color: rgba(0,0,0,0.2);"></canvas>
            </div>
            <div class=" col-xs-3 " >
              <?php $c->view("editor","editors/panel/img-layer","",$_GET); ?>
            </div>
      </div>

        <script type="text/javascript" src="assets/vendor/tether/dist/js/tether.min.js" ></script>
        <script type="text/javascript" src="assets/vendor/notiny/dist/notiny.min.js" ></script>
        <script type="text/javascript" src="assets/vendor/bootstrap/dist/js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="assets/vendor/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js" ></script>

        <script type="text/javascript" src="assets/vendor/select2/dist/js/select2.full.min.js" ></script>
        <script type="text/javascript" src="app/app/assets/js/app-cb.js"></script>
        <script type="text/javascript" src="app/editor/assets/js/app-cb.js"></script>

        <script type="text/javascript" src="assets/vendor/html.sortable/dist/html.sortable.min.js" ></script>
        <script type="text/javascript" src="assets/js/app-tictac.js"></script>
        <script type="text/javascript" src="assets/js/app-sui.js"></script>
        <script type="text/javascript" src="assets/js/kalt.js"></script>
        <script type="text/javascript" src="assets/js/kalt-shortcut.js"></script>

        <script type="text/javascript" src="assets/vendor/clipboard/dist/clipboard.min.js" ></script>
        <script type="text/javascript" src="assets/vendor/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js" ></script>

        <script type="text/javascript" src="app/editor/assets/js/app-file.js"></script>
        <script type="text/javascript" src="app/editor/assets/js/app-editor.js"></script>
        <script type="text/javascript" src="app/editor/assets/js/app-codemirror-circlemenu.js"></script>
        <script type="text/javascript" src="assets/js/app.js"></script>
        <script type="text/javascript">

         $(".btn-exec").click(function (e){
            e.preventDefault();
            var t = $(this);
           $.get(t.attr('href'));
         });

         jQuery(document).ready(function($) {
          $('.input-colors').colorpicker({
            inline:true,
            align:"right",
            customClass: 'colorpicker-2x'}
          );

          $('.slider').slider({
            formatter: function(value) {
              return 'Current value: ' + value;
            }
          });

         });

       </script>

         <script type="text/paperscript" src="app/editor/assets/js/app-paper.js"  canvas="<?php echo $_GET['id']; ?>"></script>

 </body>
</html>
