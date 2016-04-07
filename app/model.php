<?php
    include('../../controller/controller.php');

    $d = $c->model($_GET['app'], $_GET['model'], $_GET['data'] ?? []);

    echo json_encode($d, JSON_PRETTY_PRINT);
?>