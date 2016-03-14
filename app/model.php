<?php
    include('../../controller/controller.php');

    /**
    * TODO :
    **/


    $d = $c->model($app='app', $model, $dataSend = '');

    echo json_encode($d, JSON_PRETTY_PRINT);
?>