<?php
    /**
     * Test les log PHP
     */

    extract($_POST['ftp']);

    $ftp_conn = ftp_connect($host) or die("Could not connect to $host");
    $login    = ftp_login($ftp_conn, $user, $password);
    ftp_close($ftp_conn);
    if($login){
        $r        = [
            'infotype' => "success",
            'msg'      => "connextion Ok",
            'data'     => $login
        ];
    }

    else{
         $r        = [
            'infotype' => "error",
            'msg'      => "connextion Failed"
        ];
    }


?>
