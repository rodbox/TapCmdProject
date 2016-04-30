<?php
    /**
     * Execute une commande system
     */



$fileExport = $file.'_f'.$frame.'_export.svg';

file_put_contents($fileExport,$svg);

    // sys
    if (true) {


        $r = [
            'infotype' => "success",

            'soft'=>'open -a '.SOFT[$soft],
            'data'     => shell_exec('open -a "'.SOFT[$soft].'" '.$fileExport)
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