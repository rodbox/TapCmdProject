<div id="files-workspace" data-open="<?php echo count($d['open']); ?>" data-star="<?php echo count($d['star']); ?>">
<!-- stars -->
<div id="sui-todo"><a href="#collapse_filesTodo" class="btn-sui-collapse">
<h2 class="todo-title">Todo</h2></a>
<?php $c->view("editor","todo-sidebar",$d); ?></div>
<!-- stars -->
 <a href="#collapse_filesStars" class="btn-sui-collapse">
<h2 class="fav-title">Favoris</h2></a>
<div id="collapse_filesStars">
<ul id="filesStars" class="files ">
    <?php foreach ($d['star'] ?? [] as $key => $file): ?>
        <li>
        <a href="<?php $c->urlExec('editor','ws_del',[
            'index'=>'star',
            'key' => $key]);?>" class="btn-exec unstar btn-muted" data-cb="starsRefresh" data-cb-app="editor"><i class="fa fa-remove"></i></a>
            <a href="<?php $c->urlExec('editor','edit',[
            'file' => $file,
            'dir'  => dirname($file)
            ]); ?>" class="btn-f-edit ext-me " data-file="<?php echo basename($file); ?>" title="<?php echo $file; ?>" data-cb="setEditor" data-alt="<?php $c->urlExec('app','sh-dir',["dir"=>$file]); ?>"><?php echo basename($file); ?></a>

            <div class="clearfix"></div>
        </li>
    <?php endforeach ?>
</ul>
</div>

<!-- stars -->
 <a href="#collapse_filesOpens" class="btn-sui-collapse">
<h2 class="open-title">Fichiers ouverts</h2></a>
<div id="collapse_filesOpens">
    <ul id='filesOpens'  class="files">
        <?php foreach ($d['open'] ?? [] as $key => $file): ?>
            <?php $c->view("editor","files-open",[
                'id'=>$key,
                'file'=>$file
            ]); ?>
        <?php endforeach ?>
    </ul>
</div>
</div>
