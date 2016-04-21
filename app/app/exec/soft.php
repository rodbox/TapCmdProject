<?php
    /**
     * Execute une commande system
     */


    // sys
    if (true) {


        $r = [
            'infotype' => "success",

            'soft'=>'open -a '.SOFT[$soft],
            'data'     => shell_exec('open -a "'.SOFT[$soft].'" '.$file)
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