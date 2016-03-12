<?php
    extract($_POST['ftp']);

    $ftp_conn = ftp_connect($host) or die("Could not connect to $host");
    $login    = ftp_login($ftp_conn, $user, $password);

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

    ftp_close($ftp_conn);
?>
