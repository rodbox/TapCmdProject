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
    </head>
    <body>
        <?php //$c->view('app','header'); ?>
        <div id="wrapper" >

            <div id="app-page">
                <?php $c->page($_GET['app'] ?? 'app' ,$_GET['page'] ?? 'index'); ?>
            </div>
        </div>
        <?php $c->view('app','footer'); ?>
        <?php $c->view('app','modal'); ?>

        <?php $c->view('app','sui_nav'); ?>

        <script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js" ></script>
        <script src="assets/vendor/select2/dist/js/select2.full.min.js" ></script>
        <script src="assets/vendor/clipboard/dist/js/clipboard.min.js" ></script>
        <script src="assets/vendor/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js" ></script>
        <!-- <script src="assets/vendor/keynavigator/keynavigator-min.js" ></script> -->
        <script src="assets/vendor/checkdown/dist/js/checkdown.js" ></script>
        <script src="assets/js/app.js" type="text/javascript"> </script>
        <script src="assets/js/app-tictac.js" type="text/javascript"> </script>
        <script src="assets/js/app-sui.js" type="text/javascript"> </script>
        <script src="assets/js/kalt.js" type="text/javascript"> </script>
        <script src="assets/js/kalt-shortcut.js" type="text/javascript"> </script>

        <script src="app/app/assets/js/app-cb.js" type="text/javascript"> </script>

        <script src="app/editor/assets/js/app-cb.js" type="text/javascript"> </script>
        <script src="app/editor/assets/js/app-file.js" type="text/javascript"> </script>
        <script src="app/editor/assets/js/app-filter.js" type="text/javascript"> </script>
        <script src="app/editor/assets/js/app-codemirror-circlemenu.js" type="text/javascript"> </script>



        <!-- Code mirror JS-->
        <script src="assets/vendor/codemirror/lib/codemirror.js"></script>

        <!-- Addon codemirror -->
        <script src="assets/vendor/codemirror/addon/search/jumpToLine.js"></script>
        <script src="assets/vendor/codemirror/addon/search/searchcursor.js"></script>
        <script src="assets/vendor/codemirror/addon/search/search.js"></script>
        <script src="assets/vendor/codemirror/addon/dialog/dialog.js"></script>
        <script src="assets/vendor/codemirror/addon/edit/matchbrackets.js"></script>
        <script src="assets/vendor/codemirror/addon/edit/closebrackets.js"></script>
        <script src="assets/vendor/codemirror/addon/comment/comment.js"></script>
        <script src="assets/vendor/codemirror/addon/wrap/hardwrap.js"></script>
        <script src="assets/vendor/codemirror/addon/fold/foldcode.js"></script>
        <script src="assets/vendor/codemirror/addon/fold/brace-fold.js"></script>
        <!-- Code mirror mode -->
        <script src="assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
        <script src="assets/vendor/codemirror/mode/xml/xml.js"></script>
        <script src="assets/vendor/codemirror/mode/php/php.js"></script>
        <script src="assets/vendor/codemirror/mode/yaml/yaml.js"></script>
        <script src="assets/vendor/codemirror/mode/clike/clike.js"></script>
        <script src="assets/vendor/codemirror/mode/php/php.js"></script>
        <script src="assets/vendor/codemirror/mode/css/css.js"></script>
        <script src="assets/vendor/codemirror/mode/markdown/markdown.js"></script>
        <script src="assets/vendor/codemirror/mode/javascript/javascript.js"></script>


        <script src="assets/vendor/codemirror/lint/lint.js"></script>
        <script src="assets/vendor/codemirror/hint/show-hint.js"></script>
        <script src="assets/vendor/codemirror/hint/anyword-hint.js"></script>







        <!-- Code mirror keymap -->
        <script src="assets/vendor/codemirror/keymap/sublime.js"></script>
        <!-- end Code mirror -->


        <script src="app/editor/assets/js/app-codemirror.js" type="text/javascript"> </script>

        <!-- <script src="assets/js/app-paper.js" type="text/paperscript" canvas="labs"> </script> -->
    </body>
</html>
<?php endif; ?>