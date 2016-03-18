<?php
    /**
    * TODO : pour ouvrir sublime text depuis le navigateur.
    * voir : http://www.sublimetext.com/docs/3/osx_command_line.html
    **/

    // open sublime
    if (shell_exec('open '.DIR_EDITOR)) {


        $r = [
            'infotype' => "success",
            'msg'      => '',
            'data'     => ''
        ];
    }


    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error open editor ",
            'data'     => ''
        ];
    }
?>