<li class="nav-item  editor-<?php echo $d['id'] ?>" data-editor='<?php echo $d['id'] ?>' >
    <a id="editor-<?php echo $d['id'] ?>" class="nav-link editor-<?php echo $d['id'] ?> files-editor" data-toggle="tab" href="#editor-tab-<?php echo $d['id'] ?>" aria-expanded="false" data-rel="<?php echo $d['dir'].'/'.$d['file'] ?>"><?php echo $d['file'] ?></a>
    <?php editor::btn_close($d['id']); ?>
</li>