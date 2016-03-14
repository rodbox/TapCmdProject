<?php
    /**
     * Enregistre la configuration de la config d'un projet
     */

    $file = DIR_PROJECTS.'/'.$_POST['name'].'/'.$_POST['name'].'.json';
    $config = $_POST;
    $config['upd']= date('d m Y H:i:s');
    $c->setJson($file, $config);

    $r = [
        'infotype' => "success",
        'msg'      => "ok",
        'data'     => ''
    ];

?>