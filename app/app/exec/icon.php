<?php
    /**
     * Enregistre l'icone base64 en fichier et le copie en favicon.
     */

    use Imagine\Image\Box;
    use Imagine\Image\Point;

    extract($_POST);
    extract($img);

    $dirIco = DIR_PROJECTS.'/'.$project.'/file/logo_'.$project.'.png';
    $dirFav = DIR_PROJECTS.'/'.$project.'/file/fav_'.$project.'.png';


    /**
     * Decodage Base 64
     */
    $unencodedData = base64_decode($img);
    $img           = str_replace('data:image/'.$ext.';base64,', '', $img);
    $img           = str_replace(' ', '+', $img);
    $data          = base64_decode($img);
    $put           = file_put_contents($dirIco , $data);


    /**
     * Resize pour le favicon
     */
    $imagine = new Imagine\Gd\Imagine();
    $image   = $imagine->open($dirIco);
    $image
        ->resize(new Box(16, 16))
        ->crop(new Point(0, 0), new Box(16, 16))
        ->save($dirFav)
    ;


    // icon
    if (true) {
        $r = [
            'infotype' => "success",
            'msg'      => "ok icon",
            'data'     => ''
        ];
    }


    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error icon ",
            'data'     => ''
        ];
    }

?>