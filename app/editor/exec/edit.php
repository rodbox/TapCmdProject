<?php
// editor
//

    $content = file_get_contents($dir.'/'.$file);
    $rand    = substr( md5(rand()), 0, 8);

    $metaTabs = [
        'dir'  => $dir,
        'file' => $file,
        'id'   => $rand
    ];
    $metaPane = [
        'dir'     => $dir,
        'file'    => $file,
        'content' => $content,
        'id'      => $rand
    ];

    $target = [
        '#filesTabs'  => $c->viewsAsync('editor', 'editor-tab', $metaTabs),
        '#filesPanes' => $c->viewsAsync('editor', 'editor-pane', $metaPane)
    ];
    $cb = 'editor_init';

if (true) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok editor",
        'dir'      => $dir,
        'file'     => $file,
        'content'  => $content,
        'target'   => $target,
        'id'       => $rand,
        'cb'       => $cb
    ];
}


else{
    $r = [
        'infotype' => "error",
        'msg'      => "error editor ",
        'data'     => ''
    ];
}
?>