<?php
    $app = new app();

    $dir = DIR_PROJECT."/".$app->cur();
    $c->terminal($dir);

// terminal
if (true) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok terminal",
        'data'     =>  ''
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