<?php
    // include('config.php');

/**
*
*/
class editor extends controller
{

    var $k; // clés de securité optionnel (pour les requetes de ftp_control);

    function __construct($k='')
    {
        $this->k = $k;
    }



}

$editor = new editor();

 ?>