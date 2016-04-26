<?php include_once('controller/controller.php'); ?>
<!DOCTYPE html>
<html id="draw-page" lang="fr" class="h-100 draw-page">
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
        <link href="app/editor/assets/css/app-paper-circlemenu.css" rel="stylesheet">
        <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="assets/vendor/paper/dist/paper-full.js" ></script>
        <script type="text/javascript">$.cb = {};</script>
    </head>
    <body class="h-100 " data-sui-k="draw" >
      <div class="container-fluid">
      <?php
        extract($_GET);
        $rand  = substr( md5(rand()), 0, 8);
      ?>
        <!-- BEGIN ROW  -->
        <div class="row bg-inverse">
            <div class="col-xs-2 ">
              <?php $c->menu("editor","editors/panel/img-action","",$_GET); ?>
            </div>
            <div class="col-xs-offset-1 col-xs-6  text-center">
              <?php $c->view("editor","editors/panel/img-class","",$_GET); ?>
            </div>
            <div class="col-xs-3 ">
              <?php $c->menu('editor','editors/menu/img',$_GET); ?>
            </div>

        </div>
        <!-- BEGIN ROW  -->
        <div class="row bg-grey">
          <!-- BEGIN COL : col-xs-12  -->
          <div class="col-xs-12 ">
            <form id="toolMenu" action="#" class="form-inline"></form>
          </div>

          <!-- END COL : col-xs-12  -->
        </div>
        <!-- END ROW  -->
        <!-- END ROW  -->
        <div class="block ">
              <div class=" col-xs-2 col-md-3" style="left:-2rem">
                <?php $c->view("editor","editors/panel/img-tools","draw_tools",$_GET); ?>
              </div>
              <!-- BEGIN COL : col-lg-8  -->
              <div class="col-xs-8 col-md-6 text-center h-100 text-center" style="vertical-align: middle;" >
                <div class='text-center'>
                        <div class="btn-group">
                          <a id="draw_undo" href="#" class="btn-pjs btn btn-default" data-pjs="undo"><i class="fa fa-long-arrow-left"></i></a>
                          <!-- <a id="draw_redo" href="#" class="btn-pjs btn btn-default" data-pjs="redo"><i class="fa fa-repeat"></i></a> -->
                        </div>
                </div>
                <?php $c->view("editor","draw-contextmenu"); ?>
                <canvas id="<?php echo $_GET['id']; ?>" class="" data-file="<?php echo $file ?>" width="<?php echo $size[0] ?>" height="<?php echo $size[1] ?>" style="background-color: rgba(0,0,0,0.2);"></canvas>
              </div>
                <div id="panelbar" class="" >
                  <div class="btn-group-vertical btn-group-sm"><!-- BEGIN DROPDOWN HOVER  -->
    <a data-toggle="dropdown" href="#" class="btn btn-sm">
    <i class="fa fa-list"></i>
    </a>
    <div id="metaView" class="dropdown-menu">

    </div>
                  </div>
                </div>
              <div class=" col-xs-4 col-md-3 " style="right:-2rem" >
                <?php $c->view("editor","editors/panel/img-layer","",$_GET); ?>
              </div>
        </div>
      </div>
          <?php $c->view('app','modal'); ?>
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
            customClass: 'colorpicker-2x'
          });

          $('.slider').slider();

         });

       </script>

         <script type="text/paperscript" src="app/editor/assets/js/app-paper.js"  canvas="<?php echo $_GET['id']; ?>"></script>

 </body>
</html>
