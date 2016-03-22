<div id="editor-tab-<?php echo $d['id'] ?>" class="tab-pane editor-<?php echo $d['id'] ?> files-editor">
    <nav id="editor-menu-<?php echo $d['id'] ?>" class="navbar nav c-menu">
        <div class="nav navbar-nav">
            <div class="submenu ">
                <div class="text-muted">
                    <input type="hidden" id="file-open-<?php echo $d['id']; ?> " class="file-open" value="<?php echo $d['dir'].'/'.$d['file']; ?>">
                    <span id="file-open-title-<?php echo $d['id']; ?>" class="file-open-title">

                    <?php $c->breadFile($d['dir'].'/'.$d['file']); ?>

                    </span>
                    <span id="file-open-mode-<?php echo $d['id']; ?>" class="file-open-mode"> default </span>
                </div>
            </div>
        </div>
    </nav>
    <textarea id="cm-ediror-<?php echo $d['id'] ?>" class="cm"><?php echo $d['content'] ?></textarea>
</div>
