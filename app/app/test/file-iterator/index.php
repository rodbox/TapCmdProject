<?php

    /**
     * Voir : https://github.com/sebastianbergmann/php-file-iterator/blob/master/src/Facade.php
     */

    $exclude = [
        '/Applications/MAMP/htdocs/___cmd___/var/tmp/__rodbox_sources__/app/appKernel.php',
        '/Applications/MAMP/htdocs/___cmd___/var/tmp/__rodbox_sources__/src'
    ];

    $facade  = new File_Iterator_Facade();
    $tmp     = $facade->getFilesAsArray(DIR_TMP,'','',$exclude);

    echo"<pre>";
    print_r($tmp);
    echo"</pre>";

 ?>