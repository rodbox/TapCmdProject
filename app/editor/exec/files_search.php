<?php

$app = new app();
$list = file_get_contents($app->files());
//
//
$dir = DIR_PROJECT.'/'.$app->cur();

// $files = $f->facade($dir,[$dir.'/var']);
// $d['dir'] = $dir.'/'.$folder;

// $dir_index = DIR_PROJECTS.'/'.$app->cur().'/files.txt';




// list
if (true) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok list",
        'dir'      => $dir,
        'content'  => $c->viewsAsync('editor','files-suggest',[
            'files' =>explode("\n",$list),
            'dir'   =>$dir
        ])
    ];
}


else{
    $r = [
        'infotype' => "error",
        'msg'      => "error list ",
        'data'     => ''
    ];
}
?>