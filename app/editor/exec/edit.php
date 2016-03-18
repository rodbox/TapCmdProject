<?php
// editor
//

    $app = file_get_contents($dir.'/'.$file);

if (true) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok editor",
        'dir'      => $dir,
        'file'      => $file,
        'content'     => $app
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