<ul class="files">
    <?php foreach ($d['list'] as $key => $file): ?>
        <li>
            <?php if (is_string($file)): ?>
                <a href="<?php $c->urlExec('editor','edit',['file'=>$file,'dir'=>$d['dir']]) ?>" class="btn-exec c-5" title="<?php echo $file; ?>" data-cb="setEditor" ><?php echo $file; ?></a>
            <?php else: ?>
                <a href="<?php $c->urlExec('editor','list',['folder'=>$key,'dir'=>$d['dir']]) ?>" class="btn-exec c-5" title="<?php echo $file; ?>" data-cb="toggleFolder" ><i class="fa fa-folder"></i> <?php echo $key; ?></a>
            <?php endif ?>
        </li>
    <?php endforeach ?>
</ul>