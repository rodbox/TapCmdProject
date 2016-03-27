<?php
    include('../controller/controller.php');

    extract($_POST);
    extract($_GET);

   $force = (isset($_POST['force']) && $_POST['force'] == "true");


    include(DIR_APP.'/'.$app.'/exec/'.$exec.'.php');

    $r ?? [
        'infotype' => "info",
        'msg'      => "pas de retour",
        'cb'       => '',
        'dom'      => '',
        'data'     => ''
    ];

    $r['force'] = $force;

    echo json_encode($r);
?>