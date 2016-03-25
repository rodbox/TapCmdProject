<?php
// less master
//

$app     = new app();
$project = $app->getProject();

$reldir  = str_replace(DIR_PROJECT.'/'.$app->cur(),'',$file);

if(!in_array($reldir, $project['css']['lessmaster']))
    $project['css']['lessmaster'][] = $reldir;

$app->setProject('',$project);
if (true) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok less master",
        'data'     => $project,
        'dir'     => $app->dir(),
        'reldir'     => $reldir
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