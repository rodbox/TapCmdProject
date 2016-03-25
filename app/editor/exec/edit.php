<?php
// editor
//

    $content = file_get_contents($dir.'/'.$file);
    $rand    = (isset($key))?$key:substr( md5(rand()), 0, 8);
    $app      = new app();

    // $id_replace = strtolower(preg_replace('/\/./', '_', $dir.'/'.$file));
    $id_replace = $rand;

    $metaTabs = [
        'dir'  => $dir,
        'file' => $file,
        'id'   => $id_replace
    ];
    $metaPane = [
        'dir'     => $dir,
        'file'    => $file,
        'content' => $content,
        'id'      => $id_replace
    ];

    $target = [
        '#filesTabs'  => $c->viewsAsync('editor', 'editor-tab', $metaTabs),
        '#filesPanes' => $c->viewsAsync('editor', 'editor-pane', $metaPane),
        '#filesOpens' => $c->viewsAsync('editor', 'files-open', $metaTabs)
    ];

    $cb = 'editor_init';

    $app->addWorkspace('open',$dir.'/'.$file, $id_replace);

if (true) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok editor",
        'dir'      => $dir,
        'file'     => $file,
        'content'  => $content,
        'target'   => $target,
        'a'        => 'append',
        'id'       => $id_replace,
        'idre'       => $id_replace,
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