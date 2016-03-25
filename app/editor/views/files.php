<ul class="files <?php echo basename($d['dir']) ?>">
    <?php foreach ($d['list'] as $key => $file): ?>
        <li>
            <?php if (is_string($file)): ?>
                <a href="<?php $c->urlExec('editor','edit',['file'=>$file,'dir'=>$d['dir']]) ?>" class="btn-f-edit c-5 ext-me r-click" data-file="<?php echo $file; ?>" data-dest="<?php echo $d['dir']; ?>" title="<?php echo $file; ?>" data-cb="setEditor" data-cb-r-click="contextmenu"  data-cb-app="editor" data-alt="<?php $c->urlExec('app','sh-dir',["dir"=>$d['dir'].'/'.$file]); ?>"><?php echo $file; ?></a>
            <?php else: ?>
                <a href="<?php $c->urlExec('editor','list',['folder'=>$key,'dir'=>$d['dir']]) ?>" class="btn-f-explore c-5 r-click <?php echo $key ?>" data-dest="<?php echo $d['dir'].'/'.$key; ?>" title="<?php echo $key; ?>" data-cb="toggleFolder" data-alt="<?php $c->urlExec('app','sh-dir',["dir"=>$d['dir'].'/'.$key]); ?>" data-cb-r-click="contextmenu" data-context-menu='folder-contextmenu' data-context-model='templates' data-cb-app="editor"><?php echo $key; ?></a>
            <?php endif ?>
        </li>
    <?php endforeach ?>
</ul>