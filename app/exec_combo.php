<?php
    include('../controller/controller.php');

    /**
    * TODO : exec array loader
    **/

    extract($_POST);
    extract($_GET);

    // Return combo
        $rc    = [];

        $app   = new app();

        $tc    = new tictac($tictac);
        $tc->init();

        $count = count($combos);
        $i     = 0;

    foreach ($combos as $key => $combos) {
        $i++;
        $progess   = ceil($i / $count) * 100;
        $msg       = $i. '/'. $count;

        $appCombo  = $combos[0];
        $execCombo = $combos[1];

        include(DIR_APP.'/'.$appCombo.'/exec/'.$execCombo.'.php');

        $c->pushR($r, $appCombo.'_'.$execCombo);

        $tc->upd($key, $msg, $progess);
    }

    $tc->upd('Finish', '<i class="fa fa-checkmark"></i>', '100');

    // $tc->clear($tictac);


    $r = [
        'infotype' => "success",
        'msg'      => "pas de retour",
        'cb'       => '',
        'dom'      => '',
        'data'     => '',
        'combo'    => $c->getR()
    ];

    echo json_encode($r);
?>