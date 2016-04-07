<?php
    /**
     * iframe
     */
    $app = new app();
    $project = $app->getProject();

    $_SESSION['iframe'] = $_POST['iframe']['url'];

    if (true) {
        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec iframe",

            'cb'       => 'iframe',
            'url'      => $project['local']['web'].'/'.$_POST['iframe']['url']
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec iframe ",
            'data'     => ''
        ];
    }
?>
