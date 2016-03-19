<ul class="files">
    <?php foreach ($d['list'] as $key => $file): ?>
        <li>
            <?php if (is_string($file)): ?>
                <a href="<?php $c->urlExec('editor','edit',['file'=>$file,'dir'=>$d['dir']]) ?>" class="btn-f-edit c-5 ext-me" data-file="<?php echo $file; ?>" title="<?php echo $file; ?>" data-cb="setEditor" data-alt="<?php $c->urlExec('app','sh-dir',["dir"=>$d['dir'].'/'.$file]); ?>"><?php echo $file; ?></a>
            <?php else: ?>
                <a href="<?php $c->urlExec('editor','list',['folder'=>$key,'dir'=>$d['dir']]) ?>" class="btn-f-explore c-5" title="<?php echo $key; ?>" data-cb="toggleFolder" data-alt="<?php $c->urlExec('app','sh-dir',["dir"=>$d['dir'].'/'.$key]); ?>"><i class="fa fa-folder"></i> <?php echo $key; ?></a>
            <?php endif ?>
        </li>
    <?php endforeach ?>
</ul>