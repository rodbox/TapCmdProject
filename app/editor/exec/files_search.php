<?php
    use Symfony\Component\Finder\Finder;

    $app     = new app();
    $finder  = new finder();

    $dir     = DIR_PROJECT.'/'.$app->cur();

    $exclude = ['var','web','vendor'];
    $list = [];

    $finder->in($dir);
    // Filtre de dossier
    foreach ($exclude as $key => $value)
        $finder->notPath($value);

    // Regurlar ex by js
    $finder->path('/'.$_GET['reg'].'/i');
    $finder->files();

    foreach ($finder as $file)
        $list[]   = '/'.$file->getRelativePathname();

// list
if (true) {


    $r = [
        'infotype' => "success",
        'msg'      => $finder,
        'dir'      => $dir,
        'content'  => $c->viewsAsync('editor','files-suggest',[
            'dir'   => $dir,
            'files' => $list
        ])
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