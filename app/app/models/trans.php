<?php
$d          = [];
$app        = new app();
$list       = $app->getProject($app->cur());

foreach ($list['langs'] as $key => $value)
    $d['trans'][$value] = $app->getTrans($_GET['selection'],$key);


$d['langs'] = $list['langs'];
$d['index'] = $_GET['selection'];

 ?>