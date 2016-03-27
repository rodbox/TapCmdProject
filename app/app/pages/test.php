<?php
    $f      = new file();
    $app    = new app();


    $exemple = 'namespace FOS\UserBundle\toto';

    $reg = "/namespace\s{1,}([a-zA-Z\\\]{0,})/";

    preg_match_all($reg, $exemple, $matches);

    echo"<pre>";
    print_r($matches);
    echo"</pre>";

 ?>