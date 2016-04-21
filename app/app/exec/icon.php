<?php
    /**
     * Enregistre l'icone base64 en fichier et le copie en favicon.
     */
    use Symfony\Component\Filesystem\Filesystem;
    use Imagine\Image\Box;
    use Imagine\Image\Point;

    extract($_POST);
    extract($img);


    $app = new app();
    $fs  = new Filesystem();
    $cur = $app->cur();
    $dir = $app->dirProject();

    $fs->mkdir($dir.'/web/img');

    $dirIco = DIR_PROJECTS.'/'.$cur.'/file/logo_rb.png';
    $dirFav = DIR_PROJECTS.'/'.$cur.'/file/fav_rb.png';

    $dirIcoProject = $dir.'/web/img/logo_rb.png';
    $dirFavProject = $dir.'/web/img/fav_rb.png';



    /**
     * Decodage Base 64
     */
    $unencodedData = base64_decode($img);





    $img           = str_replace('data:image/'.$ext.';base64,', '', $img);
    $img           = str_replace(' ', '+', $img);
    $data          = base64_decode($img);
    $put           = file_put_contents($dirIco , $data);
    $put           = file_put_contents($dirIcoProject , $data);


    /**
     * Resize pour le favicon
     */
    $imagine = new Imagine\Gd\Imagine();
    $image   = $imagine->open($dirIco);
    $image
        ->resize(new Box(16, 16))
        ->crop(new Point(0, 0), new Box(16, 16))
        ->save($dirFav)
        ->save($dirFavProject)
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