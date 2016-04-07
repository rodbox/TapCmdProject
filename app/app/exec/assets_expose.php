<?php
/**
 * Expose les assets de la listes
 */

use Symfony\Component\Filesystem\Filesystem;

$app            = new app();
$project        = $app->getProject();
$assets         = $project['assets'] ?? [];
$dirProject     = $app->dirProject();
$dirExpose      = $dirProject.'/web/assets/';

$dirExposeFront = $dirExpose;
$dirExposeAdmin = $dirExpose;

$dirExposeFrontJS  = $dirExposeFront;
$dirExposeFrontCSS = $dirExposeFront;
$dirExposeFrontIMG = $dirExposeFront;
$dirExposeAdminJS  = $dirExposeAdmin;
$dirExposeAdminCSS = $dirExposeAdmin;
$dirExposeAdminIMG = $dirExposeAdmin;

$fs             = new Filesystem();


// FRONT
$front          = $assets['front'] ?? [];
$frontJS        = $assets['front']['js'] ?? [];
$frontCSS       = $assets['front']['css'] ?? [];
$frontPNG       = $assets['front']['png'] ?? [];
$frontJPG       = $assets['front']['jpg'] ?? [];
$frontGIF       = $assets['front']['gif'] ?? [];
$frontSVG       = $assets['front']['svg'] ?? [];

$frontIMG = array_merge($frontPNG, $frontJPG, $frontGIF, $frontSVG);

$merge          = false;

$contentFrontJS = '';
foreach ($frontJS as $key => $value) {
    $dir             = $dirExposeFrontJS;
    $dirBundle       = preg_replace(['/src/','/Resources/','/public/'],'',$value);
    $dirExposeBundle = $dir.'/'.$dirBundle;
    $info            = pathinfo($value);
    if($merge)
        $contentFrontJS .= file_get_contents($dir.'/'.$value);
    else
        $fs->copy($dirProject.'/'.$value, $dirExposeBundle, true);
}


$contentFrontCSS = '';
foreach ($frontCSS as $key => $value) {
    $dir             = $dirExposeFrontCSS;
    $dirBundle       = preg_replace(['/src/','/Resources/','/public/'],'',$value);
    $dirExposeBundle = $dir.'/'.$dirBundle;
    $info            = pathinfo($value);
    if($merge)
        $contentFrontCSS.= file_get_contents($dir.'/'.$value);
    else
        $fs->copy($dirProject.'/'.$value, $dirExposeBundle, true);
}

// END FRONT


// ADMIN
$admin    = $assets['admin'] ?? [];
$adminJS  = $assets['admin']['js'] ?? [];
$adminCSS = $assets['admin']['css'] ?? [];
$adminPNG = $assets['admin']['png'] ?? [];
$adminJPG = $assets['admin']['jpg'] ?? [];
$adminGIF = $assets['admin']['gif'] ?? [];
$adminSVG = $assets['admin']['svg'] ?? [];

$adminIMG = array_merge($adminPNG, $adminJPG, $adminGIF, $adminSVG);




$contentAdminJS ='';
foreach ($adminJS as $key => $value) {
    $dir             = $dirExposeFrontJS;
    $dirBundle       = preg_replace(['/src/','/Resources/','/public/'],'',$value);
    $dirExposeBundle = $dir.'/'.$dirBundle;
    $info            = pathinfo($value);
    if($merge)
        $contentAdminJS .= file_get_contents($dir.'/'.$value);
    else
        $fs->copy($dirProject.'/'.$value, $dirExposeBundle, true);
}


$contentAdminCSS ='';
foreach ($adminCSS as $key => $value) {
    $dir             = $dirExposeFrontCSS;
    $dirBundle       = preg_replace(['/src/','/Resources/','/public/'],'',$value);
    $dirExposeBundle = $dir.'/'.$dirBundle;
    $info            = pathinfo($value);
    if($merge)
        $contentAdminCSS.= file_get_contents($dir.'/'.$value);
    else
        $fs->copy($dirProject.'/'.$value, $dirExposeBundle, true);
}

// END ADMIN


if($merge){
    file_put_contents($dirExposeFront.'/js/app-front.js', $contentFrontJS);
    file_put_contents($dirExposeFront.'/css/app-front.css', $contentFrontCSS);
    file_put_contents($dirExposeAdmin.'/js/app-admin.js', $contentAdminJS);
    file_put_contents($dirExposeAdmin.'/css/app-admin.css', $contentAdminCSS);
}



if (true) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok less master"
    ];
}


else{
    $r = [
        'infotype' => "error",
        'msg'      => "error less master ",
        'data'     => ''
    ];
}
?>