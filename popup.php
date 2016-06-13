<?php
    include_once('controller/controller.php');
?>

<!DOCTYPE html>
<html lang="fr" data-sui-a="false" <?php $c->attrSui(); ?> >
    <head>
        <meta charset="UTF-8">
        <title><?php $c->title(); ?></title>
        <link href="assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link href="assets/vendor/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" >
        <link href="assets/vendor/notiny/dist/notiny.min.css" rel="stylesheet">
        <link href="assets/vendor/select2/dist/css/select2.min.css" rel="stylesheet" >
        <link href="assets/vendor/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css" rel="stylesheet" >
        <!-- <link href="assets/vendor/checkdown/dist/css/checkdown.css" rel="stylesheet"> -->
        <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- <link href="assets/vendor/wtf-forms/wtf-forms.css" rel="stylesheet"> -->
        <link href="assets/css/icomoon/style.css" rel="stylesheet">

        <link href="assets/css/app.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="assets/img/favicon.png" />

        <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript">$.cb = {};</script>
    </head>
    <body><?php $c->view('app','click_project','projects'); ?>
        <div id="wrapper" >
            <div class="container-fluid">
                <div id="popup-page">

                    <?php $c->page($_GET['app'] ?? 'app' ,$_GET['page'] ?? 'index'); ?>
                </div>
            </div>
        </div>
        <?php $c->view('app','modal'); ?>
        <script type="text/javascript" src="assets/vendor/tether/dist/js/tether.min.js" ></script>
        <script type="text/javascript" src="assets/vendor/bootstrap/dist/js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="assets/vendor/html.sortable/dist/html.sortable.min.js" ></script>        <script type="text/javascript" src="assets/vendor/notiny/dist/notiny.min.js" ></script>
        <script type="text/javascript" src="assets/vendor/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js" ></script>
        <script type="text/javascript" src="assets/vendor/select2/dist/js/select2.full.min.js" ></script>
        <script src="assets/vendor/clipboard/dist/clipboard.min.js" ></script>
        <script src="assets/vendor/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js" ></script>

        <script src="assets/vendor/checkdown/dist/js/checkdown.js" ></script>
        <script src="assets/js/kalt.js" type="text/javascript"> </script>
        <script src="assets/js/app.js" type="text/javascript"> </script>
        <script src="assets/js/app-tictac.js" type="text/javascript"> </script>
        <script src="assets/js/app-sui.js" type="text/javascript"> </script>


        <script src="app/app/assets/js/app-cb.js" type="text/javascript"> </script>

        <script src="app/editor/assets/js/app-cb.js" type="text/javascript"> </script>
        <script src="app/editor/assets/js/app-file.js" type="text/javascript"> </script>


<script type="text/javascript">

    $(document).ready(function() {
        $('#iframe-form').trigger('submit');
    });

</script>
    </body>
</html>
