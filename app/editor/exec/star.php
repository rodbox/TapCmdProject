<?php
// star
//

$app = new app();
$dirStars  = $app->dir().'/stars.json';

$star = $c->getJson($dirStars);
$star[] = $dir;
$c->setJson($dirStars, $star);

if (true) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok star",
        'dirStars' => $dirStars,
        'content'  => $c->viewsAsync('editor','files-stars',$star)
    ];
}


else{
    $r = [
        'infotype' => "error",
        'msg'      => "error star ",
        'data'     => ''
    ];
}
?>