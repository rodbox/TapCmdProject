<?php
    $f        = new file();
    $projects = $f->dir(DIR_PROJECTS);
    foreach ($projects as $key => $name)
        $d[] = basename($name);

?>