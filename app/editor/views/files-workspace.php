<div id="files-workspace">
<!-- stars -->
<?php if (count($d['star'] ?? [])!=0): ?>
<h2>Favoris</h2>
<ul id="filesStars" class="files ">
    <?php foreach ($d['star'] ?? [] as $key => $file): ?>
        <li>
            <a href="<?php $c->urlExec('editor','edit',[
            'file' => $file,
            'dir'  => dirname($file)
            ]); ?>" class="btn-f-edit c-5 ext-me pull-left" data-file="<?php echo basename($file); ?>" title="<?php echo $file; ?>" data-cb="setEditor" data-alt="<?php $c->urlExec('app','sh-dir',["dir"=>$file]); ?>"><?php echo basename($file); ?></a>
            <a href="<?php $c->urlExec('editor','ws_del',[
            'index'=>'star',
            'key' => $key]);?>" class="pull-right btn-exec unstar btn-muted" data-cb="starsRefresh" data-cb-app="editor"><i class="fa fa-remove"></i></a>
            <div class="clearfix"></div>
        </li>
    <?php endforeach ?>
</ul>
<?php endif ?>


<!-- stars -->
<?php if (count($d['open'] ?? [])!=0): ?>
<h2>Fichiers ouverts</h2>
<ul id='filesOpens'  class="files">
    <?php foreach ($d['open'] ?? [] as $key => $file): ?>
        <li data-editor='<?php echo $key ?>'>
            <a href="<?php $c->urlExec('editor','edit',[
            'file' => $file,
            'dir'  => dirname($file)
            ]); ?>" class="btn-f-edit c-5 ext-me pull-left" data-file="<?php echo basename($file); ?>" title="<?php echo $file; ?>" data-cb="setEditor" data-alt="<?php $c->urlExec('app','sh-dir',["dir"=>$file]); ?>"><?php echo basename($file); ?></a>
            <?php editor::btn_close($key); ?>
            <div class="clearfix"></div>
        </li>
    <?php endforeach ?>
</ul>
<?php endif ?>
</div>
