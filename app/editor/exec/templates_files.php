<?php
    /**
     * Créer un fichier a partir d'une template
     */

    use Symfony\Component\Filesystem\Filesystem;

    if ($file_type == 'folder')
        mkdir($dest.'/'.$file);

    else{
        $info = pathinfo($file_type);
        $ext = $info['extension'];
        $newFile  = $file.'.'.$ext;


        $fs = new Filesystem();
        $src = DIR_TEMPLATE.'/files/'.$file_type;
        $fs->copy($src, $dest.'/'.$newFile, true);
    }




    if (true) {


        $r = [
            'infotype' => "success",
            'msg'      => "ok templates",
            'data'     => ''
        ];
    }


    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error templates ",
            'data'     => ''
        ];
    }
?>