<?php

$dir_tmp_same = DIR_TMP.'/'.$project;

$parameters_file = $dir_tmp_same.'/app/config/parameters.yml';
$parameters_file_dist = $dir_tmp_same.'/app/config/parameters.yml.dist';

unlink($parameters_file);
rename($parameters_file_dist,$parameters_file);

// $yaml = yaml_parse($dir_tmp_same.$parameters_file);

 ?>


 <?php
 // yml
 if (true) {


     $r = [
         'infotype' => "success",
         'msg'      => "ok yml",
         'data'     => $dir_tmp_same.$parameters_file
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