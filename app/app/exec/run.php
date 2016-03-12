<?php

    $dir_project = DIR_SRC.'/'.$project;
    $dir_cmd     = DIR_CMDS.'/'.$cmd.'.php';

    ob_start();

    include($dir_cmd);
    $out = ob_get_clean();

    $r   = [
        'cmd'     => $out,
        'project' => $project,
        'file'    => file_exists($dir_cmd),
        'shell'   => shell_exec(stripcslashes($out))
    ];

 ?>