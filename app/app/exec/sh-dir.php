<?php
    /**
     * ouvre un dossier ou un fichier avec le finder
     */

// exec name
if (true) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok exec name",
        'data'     => shell_exec('open '.$dir)
    ];
}


else{
    $r = [
        'infotype' => "error",
        'msg'      => "error exec name ",
        'data'     => ''
    ];
}
?>