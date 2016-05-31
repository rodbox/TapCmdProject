<div class="sui-sidebar">
    <?php $c->view("app","header"); ?>
    <div class="sui-sidebar-body">
        <?php $c->view("editor","files-workspace","workspace"); ?>
        <div class="">
        <a href="#collapse_files" class="btn-sui-collapse"><h2>Fichiers</h2></a>
        <div id="collapse_files">
        <?php $c->view("editor","files","files"); ?></div>
        </div>
    </div>
</div><?php $c->view("editor","editor-contextmenu"); ?>
<div class="sui-editor "  data-cb-r-click='toggleMouseMenu'>
    <div class="sui-editor-body">
        <?php
            $editor = new editor();
            $editor->editorTab(1);
            $editor->editorTab(2);
            $editor->editorTab(3);
            $editor->editorTab(4);
        ?>
    </div>

</div>
 <div class="sui-iframe">
        <?php $c->menu("editor","iframe-menu"); ?>
        <iframe id="preview" src="http://localhost:8000">

        </iframe>
    </div>
    <div class="sui-console">
            <iframe id="console" src="http://localhost:8000/_console/_console">
            </iframe>
            <div class="sui-console-body">
        </div>
    </div>
<div class="sui-quickbar">
    <div class="sui-quickbar-body">
        quickbar
    </div>
</div>
<div class="sui-suggest">
    <div class="sui-suggest-body">
        <?php $c->menu("editor","files-menu"); ?>
    </div>
</div>
<div class="sui-debug">
    <div class="sui-debug-body">
        <div id="debug"></div>
    </div>
</div>

