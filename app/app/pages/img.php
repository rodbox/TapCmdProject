<?php
    $app     = new app();
    $img     = new img();
    $rand    = substr( md5(rand()), 0, 8);
    $file    = $app->getDirRelative($_GET['img']);
    $dir     = dirname($_GET['img']);
    $dirFile = $_GET['img'];
    $info    = $img->info($dirFile);
    $alpha   = $img->aphaColor($dirFile);
    // ImageJPEG($alpha);
    // echo $dirFile;
?>

<div>
    <?php foreach ($info['palette'] as $key => $value): ?><span style="display:inline-block; width: 62.5px; height: 64px; background-color: rgb(<?php echo implode(',',$value); ?>) ;">
    </span><?php endforeach ?>
</div>

<div style="background-color: rgb(<?php echo implode(',',$info['color']); ?>); padding:1rem;">
    <?php foreach ($alpha as $key => $value): ?>
        <?php $url =  $app->getUrlLocal($dir.'/'.$value.'?rand='.$rand); ?>
        <img src="<?php echo $url ?>" alt="">
    <?php endforeach ?>
</div>