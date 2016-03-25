<?php



$app   = new app();

$dir   = DIR_PROJECT.'/'.$app->cur();

$files = $f->facade($dir,[
    $dir.'/var',
    $dir.'/web/assets',
    $dir.'/web/bundles'
]);
$d = [];


$bundles    = [];
$controller = [];
$command    = [];
$listener   = [];
$view       = [];


foreach ($files as $key => $value) {
    // on cherche les bundles
    if(preg_match("#Bundle.php$#",$value) == 1){

        $info    = pathinfo($value);
        extract($info);

        $dirname     = DIR_PROJECT.'/'.$app->cur().$dirname;
        $controllers = $f->facade($dirname.'/Controller');
        $commands    = $f->facade($dirname.'/Command');
        $views       = $f->facade($dirname.'/Resources/views');

        $bundle  = [
            'dir'        => $dirname,
            'file'       => $basename,
            'bundle'     => $filename,
            'controller' => $controllers,
            'command'    => $commands,
            'views'      => $views
        ];

        // si c'est un bundle de vendor
        if(preg_match("#^/vendor#",$value) == 1)
            $bundles['vendor'][$filename] = $bundle;
        // sinon c'est un bundle de src
        else
            $bundles['src'][$filename] = $bundle;
    }
}

$dir_index = DIR_PROJECTS.'/'.$app->cur().'/bundles.json';
$c->setJson($dir_index, $bundles);

if (true) {

    $r = [
        'infotype' => "success",
        'msg'      => "ok list",
        'content'  => $bundles
    ];
}


else{
    $r = [
        'infotype' => "error",
        'msg'      => "error list ",
        'data'     => ''
    ];
}
?>