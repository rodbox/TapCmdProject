<?php
    $app = new app();

    $dir = "-a /Applications/Utilities/Terminal.app ".DIR_PROJECT."/".$app->cur();
    // $cmd = " ls ";
    $cmd = "php ".DIR_PROJECT."/".$app->cur()."/bin/console server:run";


    $sys = shell_exec('open '.$dir);
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