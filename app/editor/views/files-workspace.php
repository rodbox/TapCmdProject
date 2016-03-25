<div id="files-workspace" data-open="<?php echo count($d['open']); ?>" data-star="<?php echo count($d['star']); ?>">
<!-- stars -->
<h2 class="fav-title">Favoris</h2>
<ul id="filesStars" class="files ">
    <?php foreach ($d['star'] ?? [] as $key => $file): ?>
        <li>
        <a href="<?php $c->urlExec('editor','ws_del',[
            'index'=>'star',
            'key' => $key]);?>" class="btn-exec unstar btn-muted" data-cb="starsRefresh" data-cb-app="editor"><i class="fa fa-remove"></i></a>
            <a href="<?php $c->urlExec('editor','edit',[
            'file' => $file,
            'dir'  => dirname($file)
            ]); ?>" class="btn-f-edit c-5 ext-me " data-file="<?php echo basename($file); ?>" title="<?php echo $file; ?>" data-cb="setEditor" data-alt="<?php $c->urlExec('app','sh-dir',["dir"=>$file]); ?>"><?php echo basename($file); ?></a>

            <div class="clearfix"></div>
        </li>
    <?php endforeach ?>
</ul>


<!-- stars -->
<h2 class="open-title">Fichiers ouverts</h2>
<ul id='filesOpens'  class="files">
    <?php foreach ($d['open'] ?? [] as $key => $file): ?>

    <?php endforeach ?>
</ul>

</div>
