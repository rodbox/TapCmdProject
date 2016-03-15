<?php
    /**
     * Enregistre la configuration de la config d'un projet
     */

    $file          = DIR_PROJECTS.'/'.$_POST['name'].'/'.$_POST['name'].'.json';
    $config        = $_POST;
    $upd           = date('d m Y H:i:s');
    $config['upd'] = $upd;
    $c->setJson($file, $config);

    $r = [
        'infotype' => "success",
        'msg'      => "ok",
        'data'     => '',
        'upd'   => $upd
    ];

?>