<?php
    use Symfony\Component\Filesystem\Filesystem;
    use Symfony\Component\Finder\Finder;


    $app    = new app();

    $fs     = new Filesystem();
    $finder = new Finder();
    $parse  = new parse();



    /**
     * 1. On recupere le dossier du bundle
     * 2. Namespace du bundle
     * 3. Copy dans le dossier relatif au namespace
     */


    /**
     * 1
     */
    $dir        = str_replace($app->dirProject(),'',$file);
    $dirExplode = explode('Bundle',$file);
    $dirBundle  = $dirExplode[0].'Bundle';

    $finder->files()->name('#Bundle.php$#');
    $finder->in($dirBundle);
    /**
     * 2
     */
    $files = [];
    foreach ($finder as $key => $value)
        $files[] = $parse->file($value->getRealpath());

    $bundle     = $files[0];
    $namespace  = $bundle['parent']['val'] ?? $bundle['namespace']['val'];

    // echo"<pre>";
    // print_r($namespace);
    // echo"</pre>";
    $dirArchive = DIR_OVERIDES.'/'.$namespace.'/'.$app->cur().str_replace($dirBundle,'',$file);
    // $dirArchive = [];



    /**
     * 3
     */
    // $fs->copy($file, $dirArchive, $force);


    /**
     * overide archive
     */


    if (true) {
        $dataView    = [
            'file'      => $file,
            'dir'       => $dir,
            'dirBundle' => $dirBundle,
            'namespace' => $namespace,
            'archive'   => $dirArchive
        ];
        $target      = [
            '#debug' => $c->viewsAsync('app', 'default', $dataView)
        ];
        $cb          = 'default';
        $a           = 'prepend';
        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec overide archive",
            'data'     => $dataView,
            'target'   => $target,
            'cb'       => $cb,
            'a'        => $a
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec overide archive ",
            'data'     => ''
        ];
    }
?>