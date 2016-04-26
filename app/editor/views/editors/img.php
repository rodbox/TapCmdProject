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
<a href="draw.php?<?php echo $query; ?>">open</a>
<iframe src="draw.php?<?php echo $query; ?>" class="canvas-container" style="border-width: 0px;"></iframe>