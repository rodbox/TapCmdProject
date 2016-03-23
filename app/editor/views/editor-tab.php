<li class="nav-item  editor-<?php echo $d['id'] ?>" data-editor='<?php echo $d['id'] ?>'>
    <a class="nav-link editor-<?php echo $d['id'] ?> files-editor" data-toggle="tab" href="#editor-tab-<?php echo $d['id'] ?>" aria-expanded="false"><?php echo $d['file'] ?></a>
    <?php editor::btn_close($d['id']); ?>
</li>