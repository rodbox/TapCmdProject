<?php
    /**
     * Initialise les fichiers de configuration distant.
     */

    $app = new app();


    $project             = $app->cur();

    $dir_project         = DIR_PROJECT.'/'.$project;
    $dir_config          = $dir_project.'/app/config';

    $fileConfig          = 'rb_config.yml';
    $fileConfigDist      = 'rb_config.yml.dist';


    $rb_config_file      = $dir_config.'/'.$fileConfig;
    $rb_config_file_dist = $dir_config.'/'.$fileConfigDist;

    // si le fichier de config source existe
    if(file_exists($rb_config_file)){
        // si le fichier de config dist n'existe pas on clone le fichier source.
        if(!file_exists($rb_config_file_dist))
            copy($rb_config_file, $rb_config_file_dist);
    }

    else{
        templateFile('rb_config.yml',$dir_config, $fileConfig);
        templateFile('rb_config.yml',$dir_config, $fileConfigDist);
    }


    if (true) {
        $r = [
            'infotype' => "success",
            'msg'      => "ok yml"
        ];
    }


    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error yml ",
            'data'     => ''
        ];
    }
?>