<?php
    include('config.php');
use Symfony\Component\Filesystem\Filesystem;

class app extends controller
{

    var $k; // clés de securité optionnel (pour les requetes de ftp_control);
    var $name; // nom du projet en cours

    function __construct($k='')
    {
        $this->k = $k;
    }

    /**
     * Retourne le projet en session
     * @return string le nom du projet;
     */
    static public function cur()
    {
        return $_SESSION['project']['name'] ?? DEFAULT_PROJECT;

    }


}

$app = new app();

 ?>