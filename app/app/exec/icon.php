<?php
use Imagine\Gd;
use Imagine\Draw;
use Imagine\Image\Box;
use Imagine\Image\Point;

$dirIco = DIR_PROJECTS.'/'.$name.'/logo_'.$name.'.png';
$dirFav = DIR_PROJECTS.'/'.$name.'/fav_'.$name.'.png';

$imagine = new Imagine\Gd\Imagine();
$palette = new Imagine\Image\Palette\RGB();



/**
* TODO : Creer le text de l'icon
* le centrer, en gras, en gros avec la gestion des couleurs
**/

/**
 * Icon 64x64
 */
$image = $imagine->create(new Box(64, 64), $palette->color($color['bg'] ?? '#242424'));
$image->draw()
    ->box(new Point(32, 32), new Box(32, 32), $image->palette()->color($color['color'] ?? '#fff'));

$image->save($dirIco);



/**
 * Favicon 16x16
 */
$imageFav = $imagine->create(new Box(24, 24), $palette->color($color['bg'] ?? '#242424'));
$imageFav->draw()
    ->ellipse(new Point(12, 12), new Box(12, 12), $imageFav->palette()->color($color['color'] ?? '#fff'));

$imageFav->save($dirFav);

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