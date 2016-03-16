<?php

    /**
     * Renome les fichiers de configuration distant.
     */

    // $dir_tmp = DIR_TMP.'/'.$name.'/'.$tmp;

    $parameters_file      = $dir_tmp.'/app/config/parameters.yml';
    $parameters_file_dist = $dir_tmp.'/app/config/parameters.yml.dist';

    unlink($parameters_file);
    rename($parameters_file_dist,$parameters_file);


    $rb_config_file      = $dir_tmp.'/app/config/rb_config.yml';
    $rb_config_file_dist = $dir_tmp.'/app/config/rb_config.yml.dist';

    if(file_exists($rb_config_file)){
        unlink($rb_config_file);
        rename($rb_config_file_dist, $rb_config_file);
    }

    /**
    * TODO : Le faire par le parse du yaml et pas par le renommage de fichier
    * $yaml = yaml_parse($dir_tmp.$parameters_file);
    *
    **/


    use Symfony\Component\Yaml\Parser;

    $yaml = new Parser();

    $value = $yaml->parse(file_get_contents($parameters_file));


    // yml
    if (true) {
        $r = [
            'infotype' => "success",
            'msg'      => "ok yml",
            'yml'      => $value,
            'data'     => $dir_tmp.$parameters_file
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