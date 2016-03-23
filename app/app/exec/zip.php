<?php
    /**
     * Zip le dossier du clone tmp du projet.
     */

    use Symfony\Component\Filesystem\Filesystem;
    // $app = new app;
    $fs  = new Filesystem();

    /**
    * TODO : Gestion du zip de projet
    **/
    // $rand        = substr( md5(rand()), 0, 8);
    $time        = date('d_m_Y__H_i');
    // $tmpName     = $name.'_'.$time.'_'.$rand;

    $dir_project = DIR_TMP.'/'.$name.'/'.$tmpName;
    $dir_del     = DIR_TMP.'/'.$name;

    /**
    * TODO : attention le fichier dir zip ne peux pas etre identifié par son nom.
    **/
    $file_zip = $rand.'.zip';
    $dir_zip  = DIR_TMP.'/'.$file_zip;

    $list     = new zip_dir($dir_project, $dir_zip, [], false);

    $zip_size = filesize($dir_zip);

    $fs->remove($dir_del);


 // zip
 if (true) {

     $r = [
         'infotype' => "success",
         'msg'      => "ok zip",
         'data'     => '',
         'upload'   => $time,
         'size'     => $zip_size
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