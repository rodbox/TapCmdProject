<?php

$file = DIR_PROJECTS.'/'.$s['project'].'.json';
    if(file_exists($file))
        $d = json_decode(file_get_contents($file), true);
    else
        $d[];

 ?>