<?php

    $file = DIR_PROJECTS.'/'.$_GET['project'].'.json';
    $d = $c->getJson($file);

    $d['name'] = $_GET['project'];

 ?>