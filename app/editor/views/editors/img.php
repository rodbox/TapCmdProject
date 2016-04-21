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

?><!--
<div class="text-center canvas-container"><canvas id="<?php echo $canvasID ?>" width="<?php echo $size[0] ?>" height="<?php echo $size[1] ?>"></canvas></div>
    <script>
      // var canvas = document.getElementById('<?php echo $canvasID ?>');
      // var context = canvas.getContext('2d');
      // var imageObj = new Image();

      // imageObj.onload = function() {
      //   context.drawImage(imageObj, 0, 0);
      // };
      // imageObj.src = '<?php echo $d['url'].'?rand='.$rand ?>';
      // imageObj.src = 'http://www.html5canvastutorials.com/demos/assets/darth-vader.jpg';

    </script>
    <script type="text/paperscript" src="app/editor/assets/js/app-paper.js" canvas="<?php echo $canvasID ?>"></script>
 -->

<iframe src="draw.php?<?php echo $query; ?>" class="canvas-container" style="border-width: 0px;"></iframe> -->