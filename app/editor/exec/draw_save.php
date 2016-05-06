<?php

    $app           = new app();

    $date = date('y-m-d___H_i');

 $copy_suffix = ($copy == "true")?'__copy_'.$date:'';


    $svg           = $file.$copy_suffix.'.svg';
    $json          = $file.$copy_suffix.'.json';
    $raster        = $file.$copy_suffix.'.raster.png';

    $ext           = 'png';


    /**
    * Decodage Base 64
    */
    $img           = $contentRaster;

    $img           = str_replace('data:image/'.$ext.';base64,', '', $img);
    $img           = str_replace(' ', '+', $img);
    $contentRaster = base64_decode($img);

    file_put_contents($json, $contentJson, true);
    file_put_contents($svg, $contentSvg, true);
    file_put_contents($raster, $contentRaster, true);

    // exec name
    if (true) {
        $r = [
            'infotype' => "success",
            'msg'      => "<strong><i class='fa fa-floppy-o'></i> ".basename($file)."</strong> enregistré"
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