<?php
// star
//

$app = new app();
// $dirStars  = $app->dir().'/stars.json';

// $star = $c->getJson($dirStars);
// unset($star[$key]);
// $c->setJson($dirStars, $star);

$ws = $app->delWorkspace($index, $key);

if (true) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok star",
        'dirStars' => "",
        'content'  => $c->viewsAsync('editor','files-workspace',$ws)
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