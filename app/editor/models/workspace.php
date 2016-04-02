<?php
    $app      = new app();


    $ws        = $app->getWorkspace();

    $d = $ws??[];

    $d['todo'] = $app->getTodo();
 ?>