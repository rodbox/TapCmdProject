<?php
    /**
     * Flush une page vers un fichier html compilé.
     */

    include_once('../controller/controller.php');

    extract($_POST);
    extract($_GET);

    $dir_page_flush = DIR_TMP.'/'.$app.'_'.$page.'.html';


    ob_start();

    include('../index.php');
    $out = ob_get_clean();

    $e = file_put_contents($dir_page_flush, $out);

    if ($e) {

        $r = [
            'infotype' => "success",
            'msg'      => "ok flush",
            'data'     => ''
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error flush ",
            'data'     => ''
        ];
    }

 ?>