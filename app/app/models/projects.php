<?php

    $projects = folder_list(DIR_PROJECTS);
    foreach ($projects as $key => $name)
        $d[] = basename($name);

?>