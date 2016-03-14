<?php
    /**
     * return le contenue d'un tictac ;-)
     */

    include('../controller/controller.php');

    extract($_POST);
    extract($_GET);

    $tc = new tictac($tictac);

    echo $tc->check();
?>