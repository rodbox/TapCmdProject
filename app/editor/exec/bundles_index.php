<?php
    /**
     * Creer le fichier de récapitulatif des bundles d'une app Symfony
     */

    use Symfony\Component\Finder\Finder;

    $app     = new app();
    $finder  = new finder();

    $dir     = DIR_PROJECT.'/'.$app->cur();

    $exclude = ['var','/web/assets','/web/bundles'];
    $bundles = [];
    $list    = [];
    $d       = [];



    // Filtre de dossier
    foreach ($exclude as $key => $value)
        $finder->notPath($value);


    $finder->files()->name('#Bundle.php$#');
    $finder->in($dir);
    $bundles_controller = $finder;

    foreach ($bundles_controller as $key => $file) {
        $bundleController = $file->getRelativePathname();

        $info             = pathinfo($bundleController);
        extract($info);

        $bundleDir        = $dir.'/'.$dirname;

        $phpFile          = $parse->file($file->getRealpath(), false);
        $namespace        = $phpFile['namespace'];
        $parent           = $phpFile['parent'];

        // Les controllers
        $controllers      = [];
        $finderController = new finder();

        $folderEntity     = ['Entity','Model'];

        $finderController->in($bundleDir)->files()->name('#Controller.php$#');

        foreach ($finderController as $keyCont => $fileCont)
            $controllers[]      = basename($fileCont->getRelativePathname());

        // Les entitys
        // dans les sous dossier /Model ou /Entity
        $entitys       = [];
        $finderEntity  = new finder();
        foreach ($folderEntity as $key => $value) {
            if (is_dir($bundleDir.'/'.$value)){
                $finderEntity->in($bundleDir.'/'.$value)->files();

                foreach ($finderEntity  as $keyEntity => $fileEntity)
                    $entitys[]      = $value.'/'.basename($fileEntity->getRelativePathname());

            }
        }

        // Les commands
        $commands       = [];
        $finderCommand  = new finder();
        $finderCommand->in($dir.'/'.$dirname)->files()->name('#Command.php$#');
        foreach ($finderCommand as $keyCom => $fileCom)
            $commands[]      = basename($fileCom->getRelativePathname());


        // Les form
        $forms       = [];
        $finderForm  = new finder();
        $finderForm->in($dir.'/'.$dirname)->files()->name('#FormType.php$#');
        foreach ($finderForm as $keyForm => $fileForm)
            $forms[]      = $fileForm->getRelativePathname();

        // Les events
        $events       = [];
        $finderEvent  = new finder();
        $finderEvent->in($dir.'/'.$dirname)->files()->name('#Event.php$#');
        foreach ($finderEvent as $keyCom => $fileCom)
            $events[]      = $fileCom->getRelativePathname();

        // Les listeners
        $listeners    = [];
        $finderEvent  = new finder();
        $finderEvent->in($dir.'/'.$dirname)->files()->name('#Listener.php$#');
        foreach ($finderEvent as $keyList => $fileList)
            $listeners[]      = $fileList->getRelativePathname();


        // Les views
        $views      = [];
        if(is_dir($dir.'/'.$dirname.'/Resources/views')){
            $finderView = new finder();
            $finderView->in($dir.'/'.$dirname.'/Resources/views')->files();
            foreach ($finderView as $keyView => $fileView)
                $views[]      = $fileView->getRelativePathname();
        }

        $dirReadme1 = $dir.'/'.$dirname.'/README.md';
        $dirReadme2 = $dir.'/'.$dirname.'/README.markdown';

        if(file_exists($dirReadme1))
            $readme = $dirReadme1;
        else if(file_exists($dirReadme2))
            $readme = $dirReadme2;
        else
            $readme = '';







        // $url      = 'http://localhost:8000/dev';

        // $RestRoutes   = $app->getRest($url,['req'=>'routes']);
        // $RestBundles  = $app->getRest($url,['req'=>'bundles']);
        // $RestServices = $app->getRest($url,['req'=>'services']);


        $bundle           = [
            'dir'         => $dirname,
            'file'        => $basename,
            'forms'       => $forms,
            'parent'      => $parent,
            'bundle'      => $filename,
            'readme'      => $readme,
            'events'      => $events,
            'entitys'     => $entitys,
            'listeners'   => $listeners,
            'namespace'   => $namespace,
            'controllers' => $controllers,
            'commands'    => $commands,
            'views'       => $views
        ];


        //si c'est un bundle de vendor
        if(preg_match("#^vendor#", $bundleController) == 1)
            $bundles['vendor'][$filename] = $bundle;
        // sinon c'est un bundle de src
        else
            $bundles['src'][$filename] = $bundle;

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