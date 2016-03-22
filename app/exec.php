<?php
    include('../controller/controller.php');

    extract($_POST);
    extract($_GET);

    include(DIR_APP.'/'.$app.'/exec/'.$exec.'.php');

    $r ?? [
        'infotype' => "info",
        'msg'      => "pas de retour",
        'cb'       => '',
        'dom'      => '',
        'data'     => ''
    ];

    echo json_encode($r);
?>