<?php

    extract($_POST);

    $app   = new app;

    $eval = $app->zipProject($project);

    $r = [
        'infotype' => "success",
        // 'data'     => $login,
        'upload'      => $eval
    ];

?>