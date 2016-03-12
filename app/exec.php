<?php

    include('../controller/controller.php');

    /**
    * TODO : exec loader
    **/

    extract($_POST);
    extract($_GET);

    include(DIR_APP.'/'.$app.'/exec/'.$exec.'.php');


    $r ?? [];

    // if (!isset($r)) {
    //     # code...
    // }

    // $r = [
    //     'infotype' => "success",
    //     'msg'      => "ok",
    //     'file'=>file_exists(DIR_APP.'/'.$app.'/exec/'.$exec.'.php'),
    //     'data'     => ''
    // ];

    echo json_encode($r);

?>