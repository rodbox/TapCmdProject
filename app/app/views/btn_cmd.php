<div class="btn-list row">
    <?php foreach ($d as $cmd => $cmdMeta): ?>
    <div class="col-xs-4 col-lg-2 col-md-3">
        <a href="<?php $c->urlExec('app','run',[
            'cmd'=>$cmdMeta
        ]); ?>" class="btn btn-box btn-cmd" data-src="#form-run" data-cmd="<?php echo $cmdMeta; ?>" data-target="#result-<?php echo $cmd; ?>"><?php echo $cmdMeta; ?></a>
    </div>
    <?php endforeach ?>
</div>