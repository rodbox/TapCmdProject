<?php
session_start();

$_SESSION['app']['context'][$_GET['key']] = $_GET['value'];


// context session
if (true) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok context session",
        'data'     => ''
    ];
}


else{
    $r = [
        'infotype' => "error",
        'msg'      => "error context session ",
        'data'     => ''
    ];
}

?>