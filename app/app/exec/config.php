<?php
    /**
     * Enregistre la configuration de la config d'un projet
     */

    $file = DIR_PROJECTS.'/'.$_POST['name'].'.json';
    $c->setJson($file,$_POST);

    $r = [
        'infotype' => "success",
        'msg'      => "ok",
        'data'     => ''
    ];

?>