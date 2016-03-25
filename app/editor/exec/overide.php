<?php
use Symfony\Component\Filesystem\Filesystem;
$fs = new Filesystem();


/**
* TODO : Faire ca au propre avec un formulaire
* est un gestionnaire de destination
**/


$app       = new app();
$dir_index = DIR_PROJECTS.'/'.$app->cur().'/bundles.json';
$bundles   = $c->getJson($dir_index);




$dirProject = DIR_PROJECT.'/'.$app->cur().'/app/Resources/';




$srcFile = $bundle[$type][0].'/'.$type.'/'.$file;
$destFile = $dirProject.$bundle['bundle'].'/'.$type.$file;



// si le fichier n'existe pas on copi l'originale
//
$eval = !file_exists($destFile);
if ($eval) {
    $fs->copy($srcFile,$destFile);
}


// if () {
//     $bundles[];
// }



$dest  = '';


// overide
if ($eval) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok overide",
        'data'     => $srcFile,
        'dest'     => file_exists($destFile)
    ];
}


else{
    $r = [
        'infotype' => "error",
        'msg'      => "error overide ",
        'data'     => ''
    ];
}
?>