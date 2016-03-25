<?php
    $f      = new file();
    $app    = new app();


    $exclude = ['var','web','vendor'];

    $list   = $f->finder(DIR_PROJECT.'/'.$app->cur(), $exclude);

    echo"<pre>";
    print_r($list);
    echo"</pre>";

 ?>