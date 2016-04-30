<?php
    /**
     * Execute une commande system
     */



$fileExport = $file.'_f'.$frame.'_export.svg';


    // sys
    if (true) {


        $r = [
            'infotype' => "success",

            'soft'=>'open -a '.SOFT[$soft],
            'svg'     => file_get_contents($fileExport)
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