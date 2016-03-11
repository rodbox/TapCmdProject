<?php
    include('../function.php');
    include('../config.php');

    extract($_POST);

    $dir_project = DIR_SRC.'/'.$project;

    ob_start();
    include('../../cmd/'.$cmd.'.php');
    // echo "ls";
    $out = ob_get_clean();


    // $r = shell_exec('ls');
    $r = [
        'cmd'     => $out,
        'file'     => file_exists('../../cmd/'.$cmd.'.php'),
        'project' => $project,
        'shell'   => shell_exec(stripcslashes($out))
    ];

    echo json_encode($r,true);
 ?>