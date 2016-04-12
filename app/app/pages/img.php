<?php
    $app     = new app();
    $img     = new img();
    $rand    = substr( md5(rand()), 0, 8);
    $file    = $app->getDirRelative($_GET['img']);
    $dir     = dirname($_GET['img']);
    $dirFile = $_GET['img'];
    $info    = $img->info($dirFile);
    $alpha   = $img->aphaColor($dirFile);

    $dominante = implode(',',$info['color']);
    // ImageJPEG($alpha);
    // echo $dirFile;
?>
<form action="<?php $c->urlExec('app','palettes') ?>" class="form-live" >

<ul class="sortable color-preview">
<input type="hidden" name="img_name" value="<?php echo $dirFile; ?>">
<input type="hidden" name="palette[color]" id="" value="<?php echo $dominante; ?>">
    <?php foreach ($info['palette'] as $key => $value): ?><?php $rgb = implode(',',$value); ?><li style="background-color: rgb(<?php echo $rgb; ?>) ;">
        <input type="hidden" name="palette[colors][]" id="" value="<?php echo $rgb; ?>">

    </li><?php endforeach ?>

</ul>
<ul class="color-preview">
    <li>
        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-floppy-o"></i></button>
    </li>
</ul>
<div style="background-color: rgb(<?php echo implode(',',$info['color']); ?>); padding:1rem;">
    <?php foreach ($alpha as $key => $value): ?>
        <?php $url =  $app->getUrlLocal($dir.'/'.$value.'?rand='.$rand); ?>
        <img src="<?php echo $url ?>" alt="">
    <?php endforeach ?>
</div></form>