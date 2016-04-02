<?php
    $app = new app();

    $dir = DIR_PROJECT."/".$app->cur();
    $c->terminal($dir);

// terminal
if ($sys) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok terminal",
        'data'     =>  $sys
    ];
}


else{
    $r = [
        'infotype' => "error",
        'msg'      => "error terminal ",
        'data'     => ''
    ];
}
?>