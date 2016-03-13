<?php

    $projects = file_list_mono(DIR_PROJECTS);
    foreach ($projects as $key => $name)
        $d[] = basename($name,'.json');

?>