<?php
    $app = new app();

    $dir = "-a /Applications/Utilities/Terminal.app ".DIR_PROJECT."/".$app->cur()." --args `ls`";
    $cmd = "/Applications/Utilities/Terminal.app";

// terminal
if (shell_exec('open '.$dir)) {


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