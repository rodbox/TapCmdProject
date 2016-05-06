<?php

    /**
    * TODO : enregistrement du fichier mais en créant une securité d'archive et/ ou de lockage
    **/

$app = new app();

$info = pathinfo($dir);
$ext  = $info['extension'];





    if ($ext =='png' || $ext =='jpg'){
        /**
         * Decodage Base 64
         */
        $img     = $content['img'];

        $img     = str_replace('data:image/'.$ext.';base64,', '', $img);
        $img     = str_replace(' ', '+', $img);
        $content = base64_decode($img);
        // $put           = file_put_contents($dirIco , $data);

    }

    file_put_contents($dir, $content, true);

    // exec name
    if (true) {
        if ($_SESSION['app']['sui']['sync'] ?? false =="true")
            $uploadFile = $app->uploadFile($dir);

        $r = [
            'infotype' => "success",
            'msg'      => "<strong><i class='fa fa-floppy-o'></i> ".basename($dir)."</strong> enregistré",
            'id'       => $id
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec name ",
            'data'     => ''
        ];
    }
?>