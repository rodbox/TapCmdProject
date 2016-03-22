<div id="files-stars">
<?php if (count($d)!=0): ?>
<h2>Favoris</h2>
<?php endif ?>
<ul  class="files">
    <?php foreach ($d as $key => $file): ?>
        <li>
            <a href="<?php $c->urlExec('editor','edit',[
            'file' => $file,
            'dir'  => dirname($file)
            ]); ?>" class="btn-f-edit c-5 ext-me pull-left" data-file="<?php echo basename($file); ?>" title="<?php echo $file; ?>" data-cb="setEditor" data-alt="<?php $c->urlExec('app','sh-dir',["dir"=>$file]); ?>"><?php echo basename($file); ?></a>
            <a href="<?php $c->urlExec('editor','star_del',[
            'key' => $key]);?>" class="pull-right btn-exec unstar btn-muted" data-cb="starsRefresh" data-cb-app="editor"><i class="fa fa-remove"></i></a>
            <div class="clearfix"></div>
        </li>
    <?php endforeach ?>
</ul></div>