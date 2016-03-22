<?php
    include('../controller/controller.php');

    extract($_POST);
    extract($_GET);

    $c->view($app, $view, $model ?? '');

?>