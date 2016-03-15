<?php
    $f = new file();
    $cmdss = $f->dir(DIR_CMDS);
    // $cmdss = file_list_mono(DIR_CMDS);
    foreach ($cmdss as $key => $cmd)
        $d[] = basename($cmd,'.php');

?>