<?php

$app   = new app();

$dir   = DIR_PROJECT.'/'.$app->cur();

$files = $f->facade($dir,[
    $dir.'/var',
    $dir.'/vendor',
    $dir.'/web/assets',
    $dir.'/web/bundles'
]);
$d = [];
foreach ($files as $key => $value) {
    if(!is_dir($dir.'/'.$value))
        $d[] = $value;
}

$dir_index = DIR_PROJECTS.'/'.$app->cur().'/files.txt';

file_put_contents($dir_index, implode("\n",$d));








if (true) {

    $r = [
        'infotype' => "success",
        'msg'      => "ok list",
        'content'  => ""
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