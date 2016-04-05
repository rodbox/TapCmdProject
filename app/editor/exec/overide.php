<?php
    /**
     * Install Overide
     */

    use Symfony\Component\Filesystem\Filesystem;

    /**
     * ATTENTION $src est le nom du bundle du dossier /src et PAS la source de la copie
     */

    $fs      = new Filesystem();
    $app     = new app();

    $dir     = $app->dirProject();
    $bundles = $app->getBundles();

    $list    = [];

    /**
     * Dossier de destination de overide
     */

    // vers le dossier app lorsqu'il n'y a pas de src selectionné.
    if ($src == ''){
        $destOveride           = $dir.'/app';
        $destOverideView       = $destOveride.'/Resources/'.$vendor.'/views';
        $destOverideController = $destOveride.'/'.$vendor.'/Controller';
    }
    // vers le dossier du bundle src
    else{
        $dirBundle             = $dir.'/'.$bundles['src'][$src]['dir'];
        $destOveride           = $dirBundle;
        $destOverideView       = $dirBundle.'/Resources/views';
        $destOverideForm       = $dirBundle;
        $destOverideEvent      = $dirBundle;
        $destOverideEntity     = $dirBundle.'/Entity';
        $destOverideListener   = $dirBundle.'/Listener';
        $destOverideController = $dirBundle.'/Controller';


        /**
         * Le nouveau fichier du bundle src
         */
        $data            = [
            'SRC'       => $src,
            'SRCDIR'    => $bundles['src'][$src]['dir'],
            'NAMESPACE' => $bundles['src'][$src]['namespace'],
            'VENDOR'    => $vendor
        ];

        templateFile('bundle_overide.php', $dirBundle, $data, $src);
    }

    /**
     * Source de l'overide
     */
    $srcOveride           = $dir.'/'.$bundles['vendor'][$vendor]['dir'];
    $srcOverideForm       = $srcOveride;
    $srcOverideEvent      = $srcOveride;
    $srcOverideView       = $srcOveride.'/Resources/views';
    $srcOverideEntity     = $srcOveride;
    $srcOverideListener   = $srcOveride;
    $srcOverideController = $srcOveride.'/Controller';




    /**
     *
     * Copie de l'overide
     *
     */

    /**
     * Les views
     */
    foreach ($overide['views'] ?? [] as $key => $value) {
        $srcOverideFile      = $srcOverideView.'/'.$value;
        $destOverideViewFile = $destOverideView.'/'.$value;

        $fs->copy($srcOverideFile, $destOverideViewFile, $force);
    }

    /**
     * Les controllers
     */

    foreach ($overide['controllers'] ?? [] as $key => $value) {

        $srcOverideFile            = $srcOverideController.'/'.$value;
        $destOverideControllerFile = $destOverideController.'/'.$value;

        if(!file_exists($destOverideControllerFile) || $force)
            $fs->copy($srcOverideFile, $destOverideControllerFile, $force);
    }

    /**
     * Les forms
     */
    foreach ($overide['forms'] ?? [] as $key => $value) {

        $srcOverideFile      = $srcOverideForm.'/'.$value;
        $destOverideFormFile = $destOverideForm.'/'.$value;

        if(!file_exists($destOverideFormFile))
            $fs->copy($srcOverideFile, $destOverideFormFile, $force);

         $list []=$srcOverideFile;
    }

    /**
     * Les entitys
     */
    foreach ($overide['entitys'] ?? [] as $key => $value) {

        $srcOverideFile        = $srcOverideEntity.'/'.$value;
        $destOverideEntityFile = $destOverideEntity.'/'.basename($value);

        if(!file_exists($destOverideEntityFile))
            $fs->copy($srcOverideFile, $destOverideEntityFile, $force);
    }

    /**
     * Les events
     */
    foreach ($overide['events'] ?? [] as $key => $value) {

        $srcOverideFile        = $srcOverideEntity.'/'.$value;
        $destOverideEventFile = $destOverideEvent.'/'.$value;

        if(!file_exists($destOverideEventFile))
            $fs->copy($srcOverideFile, $destOverideEventFile, $force);
    }
    /**
     * Les listeners
     */
    foreach ($overide['listeners'] ?? [] as $key => $value) {

        $srcOverideFile        = $srcOverideListener.'/'.$value;
        $destOverideListenerFile = $destOverideListener.'/'.$value;

        if(!file_exists($destOverideListenerFile))
            $fs->copy($srcOverideFile, $destOverideListenerFile, $force);
    }


    /**
     * Les archives
     */
    foreach ($overide['archives'] ?? [] as $archivesSource => $archivesList) {

        foreach ($archivesList ?? [] as $keyA => $valueA) {

            $fileRelative = explode($archivesSource,$valueA);
            $fileRelative = $fileRelative[1];

            $destOverideFile = $destOveride.'/'.$fileRelative;

            if(!file_exists($destOverideFile))
                $fs->copy($valueA, $destOverideFile, $force);

            # code...
        }



    }


    $r = array(
                'infotype' =>"success",
                'msg'      =>"ok",
                'list'=>$list

            );

?>