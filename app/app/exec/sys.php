<?php
    /**
     * Execute une commande system
     */


    // sys
    if (true) {


        $r = [
            'infotype' => "success",
            'msg'      => "ok sys",
            'data'     => shell_exec('open /Applications/Utilitaires/Terminal.app')
        ];
    }


    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error sys ",
            'data'     => ''
        ];
    }
 ?>