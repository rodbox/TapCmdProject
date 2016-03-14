<?php

    include_once('controller/controller.php');

    if($c->isAsync()):
        $c->pageAsync($_GET['app'] ?? 'app' ,$_GET['page'] ?? 'index');
?>

<?php else: ?>
<!DOCTYPE html>
<html lang="fr" data-context-a="false">
    <head>
        <meta charset="UTF-8">
        <title><?php $c->title(); ?></title>
        <link href="assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link href="assets/vendor/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" >
        <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/app.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="assets/img/rb_favicon.png" />
    </head>
    <body>
        <div id="wrapper" >
            <?php $c->view('app','header'); ?>
            <div id="app-page">
                <?php $c->page($_GET['app'] ?? 'app' ,$_GET['page'] ?? 'index'); ?>
            </div>
        </div>
        <?php $c->view('app','modal'); ?>
        <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js" ></script>
        <script src="assets/vendor/clipboard/dist/js/clipboard.min.js" ></script>
        <script src="assets/vendor/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js" ></script>
        <script src="assets/js/app.js" type="text/javascript"> </script>
        <script src="assets/js/app-tictac.js" type="text/javascript"> </script>
        <script src="assets/js/app-context.js" type="text/javascript"> </script>
    </body>
</html>
<?php endif; ?>