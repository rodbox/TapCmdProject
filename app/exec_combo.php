<?php

    include('../controller/controller.php');

    /**
    * TODO : exec array loader
    **/

    extract($_POST);
    extract($_GET);

    // Return combo
    $rc = [];

    $tc = new tictac($tictac);
    $tc->init();

    $count = count($combos);
    $i     = 0;

    foreach ($combos as $key => $combos) {
        $i++;
        $progess = ceil($i / $count) * 100;
        $msg      = $i. '/'. $count;

        $app      = $combos[0];
        $exec     = $combos[1];

        include(DIR_APP.'/'.$app.'/exec/'.$exec.'.php');

        $tc->upd($key, $msg, $progess);
    }

    $tc->upd('Finish', '<i class="fa fa-checkmark"></i>', '100');

    // $tc->clear($tictac);


    $r == [
        'infotype' => "info",
        'msg'      => "pas de retour",
        'cb'       => '',
        'dom'      => '',
        'data'     => '',
        'combo'    => $rc
    ];

    echo json_encode($r);
?>