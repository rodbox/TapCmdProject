<?php
// reload file
//
    $app     = new app();
    // $editor  = new editor();
    // $dirFile = $dir.'/'.$file;
    // $edit    = $editor->file($file);
    $content = file_get_contents($file);

$r = [
            'infotype' => "success",
            'msg'      => "ok editor",
            'content'  => $content
        ];
?>