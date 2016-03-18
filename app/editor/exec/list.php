<?php
// list
//
$d['list'] = $f->files($dir.'/'.$folder);
$d['dir'] = $dir.'/'.$folder;


if (true) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok list",
        'content'  => $c->viewsAsync('editor','files',$d)
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