<?php

    $size = getimagesize($d['file']);
    $rand = substr( md5(rand()), 0, 8);

    $canvasID = 'myCanvas_'.$d['id'];

    $query = http_build_query([
      'id'   => $canvasID,
      'size' => $size,
      'file' => $d['file'],
      'url'  => htmlspecialchars($d['url'])
    ]);

?>
<iframe src="draw.php?<?php echo $query; ?>" class="canvas-container" style="border-width: 0px;"></iframe>