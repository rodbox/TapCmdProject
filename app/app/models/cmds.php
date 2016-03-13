<?php

    $cmdss = file_list_mono(DIR_CMDS);
    foreach ($cmdss as $key => $name)
        $d[] = basename($name,'.php');

?>