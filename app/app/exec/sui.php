<?php
    /**
     * Stock en session l'interface utilisateur
     */

    session_start();

    $_SESSION['app']['sui'][$_GET['key']] = $_GET['value'];


    // context sui
    if (true) {


        $r = [
            'infotype' => "success",
            'msg'      => "ok context sui",
            'data'     => ''
        ];
    }


    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error context sui ",
            'data'     => ''
        ];
    }

?>