<?php

    include_once('controller/controller.php');

    if($c->isAsync()):
        $c->pageAsync($_GET['app'] ?? 'app' ,$_GET['page'] ?? 'index');
?>

<?php else: ?>
<!DOCTYPE html>
<html lang="fr" data-sui-a="false" <?php $c->attrSui(); ?> >
    <head>
        <meta charset="UTF-8">
        <title><?php $c->title(); ?></title>
        <link href="assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link href="assets/vendor/select2/dist/css/select2.min.css" rel="stylesheet" >
        <link href="assets/vendor/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" >
        <link href="app/editor/assets/css/app-circlemenu.css" rel="stylesheet">
        <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- <link href="assets/vendor/wtf-forms/wtf-forms.css" rel="stylesheet"> -->
        <link href="assets/css/icomoon/style.css" rel="stylesheet">

        <!-- Code mirror css -->
        <link rel="stylesheet" href="assets/vendor/codemirror/lib/codemirror.css">
        <link rel="stylesheet" href="assets/vendor/codemirror/theme/tomorrow-night-bright.css">
        <link rel="stylesheet" href="assets/vendor/codemirror/addon/dialog/dialog.css">
        <!-- end Code mirror css -->

        <link href="assets/css/app.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="assets/img/favicon.png" />

        <script src="assets/vendor/jquery/dist/jquery.min.js"></script>

         <?php
            $app     = new app();
            $img     = new img();

            $rand    = substr( md5(rand()), 0, 8);

            $file    = $app->cur().$_GET['img'];
            $dir     = $app->dirProject();
            $dirFile = $dir.$_GET['img'];

            $info = $img->info($dirFile);
            $alpha = $img->aphaColor($dirFile);
            // ImageJPEG($alpha);

        ?>

    </head>
    <body style="background-color: rgb(<?php echo implode(',',$info['color']); ?>) ">

    <div>

        <?php foreach ($info['palette'] as $key => $value): ?><span style="display:inline-block; width: 62.5px; height: 64px; background-color: rgb(<?php echo implode(',',$value); ?>) ;">
                           </span><?php endforeach ?>
        </div>


<?php echo"<pre>";
print_r($alpha);
echo"</pre>"; ?>
<?php foreach ($alpha as $key => $value): ?>
    <img src="http://localhost:8888/<?php echo $app->cur() ?>/<?php echo $value.'?i='.$rand; ?>" alt="">
<?php endforeach ?>

    </body>
</html>
<?php endif; ?>