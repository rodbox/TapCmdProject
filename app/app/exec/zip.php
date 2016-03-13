<?php
$app = new app;

/**
* TODO : Gestion du zip de projet
    **/
    $rand        = substr( md5(rand()), 0, 8);
    $time        = date('d_m_Y__H_i');
    $tmpName     = $project.'_'.$time.'_'.$rand;

    $dir_project = DIR_TMP.'/'.$project;
    $dir_tmp     = DIR_TMP.'/'.$tmpName;
    $dir_zip     = DIR_TMP.'/'.$tmpName.'.zip';
    $file_zip    = $tmpName.'.zip';


    $list        = new zip_dir($dir_project,$dir_zip);

    delTree($dir_project);

    $app->uploadProject($project, $dir_zip, $file_zip);



 // zip
 if (true) {


     $r = [
         'infotype' => "success",
         'msg'      => "ok zip",
         'data'     => ''
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