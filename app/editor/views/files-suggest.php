<div class="list-group">
    <?php foreach ($d['files'] as $key => $value): ?>
    <?php

        $file = basename($value);
        $dir = dirname($value);

     ?><a href="<?php $c->urlExec('editor','edit',['file'=>$file,'dir'=>$d['dir'].$dir]) ?>" class="btn-f-edit ext-me list-group-item" data-file="<?php echo $file; ?>"  title="<?php echo $value; ?>" data-cb="setEditor" data-alt="<?php $c->urlExec('app','sh-dir',["dir"=>$value]); ?>"><h4 class="c-5 "><?php echo basename($value); ?></h4>
    <p class="c-5 text-muted"><?php echo $value; ?></p>
    </a>
    <?php endforeach ?>
</div>