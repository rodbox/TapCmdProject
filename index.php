<?php

    include_once('controller/controller.php');

    if($c->isAsync()):
        $c->pageAsync($_GET['app'] ?? 'app' ,$_GET['page'] ?? 'index');
?>

<?php else: ?>
<!DOCTYPE html>
<html lang="fr" data-sui-a="false" data-sui-k="editor" <?php $c->attrSui(); ?> >
    <head>
        <meta charset="UTF-8">
        <title><?php $c->title(); ?></title>
        <link href="assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link href="assets/vendor/select2/dist/css/select2.min.css" rel="stylesheet" >
        <link href="assets/vendor/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" >
        <link href="app/editor/assets/css/app-circlemenu.css" rel="stylesheet">
        <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/vendor/notiny/dist/notiny.min.css" rel="stylesheet">
        <!-- <link href="assets/vendor/wtf-forms/wtf-forms.css" rel="stylesheet"> -->
        <link href="assets/css/icomoon/style.css" rel="stylesheet">

        <!-- Code mirror css -->
        <link rel="stylesheet" href="assets/vendor/codemirror/lib/codemirror.css">
        <link rel="stylesheet" href="assets/vendor/codemirror/theme/tomorrow-night-bright.css">
        <link rel="stylesheet" href="assets/vendor/codemirror/addon/dialog/dialog.css">
        <link rel="stylesheet" href="assets/vendor/codemirror/addon/hint/show-hint.css">
        <!-- end Code mirror css -->

        <link rel="stylesheet" href="assets/vendor/summernote/dist/summernote.css">
        <link href="assets/vendor/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css" rel="stylesheet" >
        <link href="assets/css/app.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="assets/img/favicon.png" />

        <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="assets/vendor/paper/dist/paper-full.js" ></script>
        <script type="text/javascript">$.cb = {};</script>
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

<!--  -->

        <script type="text/javascript" src="assets/vendor/tether/dist/js/tether.min.js" ></script>
        <script type="text/javascript" src="assets/vendor/notiny/dist/notiny.min.js" ></script>
        <script type="text/javascript" src="assets/vendor/bootstrap/dist/js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="assets/vendor/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js" ></script>
        <script type="text/javascript" src="assets/vendor/select2/dist/js/select2.full.min.js" ></script>
        <script type="text/javascript" src="assets/vendor/clipboard/dist/clipboard.min.js" ></script>
        <script type="text/javascript" src="assets/vendor/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js" ></script>
        <!-- <script src="assets/vendor/keynavigator/keynavigator-min.js" ></script> -->
        <script type="text/javascript" src="assets/vendor/checkdown/dist/js/checkdown.js" ></script>
        <script type="text/javascript" src="assets/vendor/html.sortable/dist/html.sortable.min.js" ></script>
        <script type="text/javascript" src="assets/js/app.js"></script>
        <script type="text/javascript" src="assets/js/app-serializeobject.js"></script>
        <script type="text/javascript" src="assets/js/app-tictac.js"></script>
        <script type="text/javascript" src="assets/js/app-sui.js"></script>
        <script type="text/javascript" src="assets/js/kalt.js"></script>
        <script type="text/javascript" src="assets/js/kalt-shortcut.js"></script>

        <script type="text/javascript" src="app/app/assets/js/app-cb.js"></script>

        <script type="text/javascript" src="app/editor/assets/js/app-cb.js"></script>
        <script type="text/javascript" src="app/editor/assets/js/app-file.js"></script>
        <script type="text/javascript" src="app/editor/assets/js/app-editor.js"></script>
        <script type="text/javascript" src="app/editor/assets/js/app-codemirror-circlemenu.js"></script>

            <script type="text/javascript" src="assets/vendor/summernote/dist/summernote.min.js"></script>

        <!-- Code mirror JS-->

        <script type="text/javascript" src="assets/vendor/codemirror/lib/codemirror.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/addon/hint/show-hint.js"></script>
        <!-- Addon codemirror -->
        <script type="text/javascript" src="assets/vendor/codemirror/addon/search/jump-to-line.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/addon/search/searchcursor.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/addon/search/search.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/addon/dialog/dialog.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/addon/edit/matchbrackets.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/addon/edit/closebrackets.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/addon/comment/comment.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/addon/wrap/hardwrap.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/addon/fold/foldcode.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/addon/fold/brace-fold.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/addon/selection/active-line.js"></script>
        <!-- Code mirror mode -->
        <script type="text/javascript" src="assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/mode/xml/xml.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/mode/php/php.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/mode/yaml/yaml.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/mode/clike/clike.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/mode/php/php.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/mode/css/css.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/mode/markdown/markdown.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/mode/javascript/javascript.js"></script>

        <script type="text/javascript" src="assets/vendor/codemirror/addon/lint/lint.js"></script>

        <script type="text/javascript" src="assets/vendor/codemirror/addon/hint/anyword-hint.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/addon/hint/javascript-hint.js"></script>
        <script type="text/javascript" src="assets/vendor/codemirror/addon/hint/xml-hint.js"></script>
        <!-- Code mirror keymap -->
        <script type="text/javascript" src="assets/vendor/codemirror/keymap/sublime.js"></script>
        <!-- end Code mirror -->

<!-- XQuery -->
        <script src="assets/vendor/CodeMirror-XQuery/codemirror-xquery/addon/xquery-commons.js"></script>
        <script src="assets/vendor/CodeMirror-XQuery/codemirror-xquery/addon/hint/xquery-hint.js"></script>
        <link rel="stylesheet" href="assets/vendor/CodeMirror-XQuery/codemirror-xquery/addon/hint/xquery-hint.css">
        <script src="assets/vendor/CodeMirror-XQuery/codemirror-xquery/addon/hint/xquery-templates.js"></script>
        <script src="assets/vendor/CodeMirror-XQuery/codemirror-xquery/mode/xquery/xquery.js"></script>
<!-- XQuery -->

        <script type="text/javascript" src="app/editor/assets/js/app-codemirror.js"></script>

        <!-- <script src="assets/js/app-paper.js" type="text/paperscript" canvas="labs"> </script> -->
    </body>
</html>
<?php endif; ?>