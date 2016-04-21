<?php include_once('controller/controller.php'); ?>
<!DOCTYPE html>
<html lang="fr" class="h-100">
    <head>
        <meta charset="UTF-8">
        <title>Draw</title>

        <link href="assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/vendor/notiny/dist/notiny.min.css" rel="stylesheet">
        <link href="assets/css/icomoon/style.css" rel="stylesheet">
        <link href="assets/css/app.css" rel="stylesheet">
        <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="assets/vendor/paper/dist/paper-full.js" ></script>
    </head>
    <body class="h-100">
      <?php
        extract($_GET);
        $rand  = substr( md5(rand()), 0, 8);
      ?>
      <!-- BEGIN COL : col-lg-8  -->
      <div class="col-xs-12 text-center h-100 text-center" style="vertical-align: middle;" >
         <canvas id="<?php echo $_GET['id']; ?>" style="margin-top: calc(50vh - <?php echo ($size[1] / 2) + 115 ?>px);" data-file="<?php echo $file ?>" width="<?php echo $size[0] ?>" height="<?php echo $size[1] ?>" style="background-color: rgba(0,0,0,0.2);"></canvas>
      </div>
      <!-- END COL : col-lg-8  -->


      <div class="fixed col-xs-3 " style="right:0px">
        <?php $c->view('editor','editors/menu/img',$_GET); ?>
         <?php $c->view("editor","editors/panel/img-action","",$_GET); ?>
         <?php $c->view("editor","editors/panel/img-layer","",$_GET); ?>
      </div>



        <script type="text/javascript" src="assets/js/app.js"></script>
        <script type="text/paperscript" src="app/editor/assets/js/app-paper.js"  canvas="<?php echo $_GET['id']; ?>"></script>

        <script type="text/javascript" src="assets/js/app-tictac.js"></script>
        <script type="text/javascript" src="assets/js/app-sui.js"></script>
        <script type="text/javascript" src="assets/js/kalt.js"></script>
        <script type="text/javascript" src="assets/js/kalt-shortcut.js"></script>
        <script type="text/javascript" src="assets/vendor/clipboard/dist/clipboard.min.js" ></script>
        <script type="text/javascript" src="assets/vendor/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js" ></script>
        <script type="text/javascript" src="app/app/assets/js/app-cb.js"></script>

        <script type="text/javascript" src="app/editor/assets/js/app-cb.js"></script>
        <script type="text/javascript" src="app/editor/assets/js/app-file.js"></script>
        <script type="text/javascript" src="app/editor/assets/js/app-editor.js"></script>
        <script type="text/javascript" src="app/editor/assets/js/app-codemirror-circlemenu.js"></script>
 </body>
</html>
