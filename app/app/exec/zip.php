<?php

    /**
     * Zip le dossier du clone tmp du projet.
     */

    use Symfony\Component\Filesystem\Filesystem;
    $app = new app;
    $fs  = new Filesystem();

/**
* TODO : Gestion du zip de projet
    **/
    $rand        = substr( md5(rand()), 0, 8);
    $time        = date('d_m_Y__H_i');
    $tmpName     = $name.'_'.$time.'_'.$rand;

    $dir_project = DIR_TMP.'/'.$name.'/'.$tmp;
    $dir_tmp     = DIR_TMP.'/'.$tmpName;


    /**
    * TODO : attention le fichier dir zip ne peux pas etre identifié par son nom.
    **/
    $dir_zip     = DIR_TMP.'/'.$name.'.zip';
    $file_zip    = $tmpName.'.zip';


    $list        = new zip_dir($dir_project,$dir_zip);

    // delTree($dir_project);
    $fs->remove($dir_project);





 // zip
 if (true) {


     $r = [
         'infotype' => "success",
         'msg'      => "ok zip",
         'data'     => '',
         'upload'   => $time
     ];
 }


 else{
     $r = [
         'infotype' => "error",
         'msg'      => "error zip ",
         'data'     => ''
     ];
 }
 ?>