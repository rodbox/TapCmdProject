<div class="sui-sidebar">
    <div class="sui-sidebar-body">
        <!-- <?php $c->view("editor","files-menu"); ?> -->
        <?php $c->view("editor","files","files",["name"=>"__rodbox_sources__"]); ?>
    </div>
</div>
<div class="sui-editor">
    <div class="sui-editor-body">
        <?php $c->menu("editor","editor-menu"); ?>
        <?php $c->menu("editor","editor-submenu"); ?>
        <textarea id="myTextarea" name="myTextarea" class="cm"></textarea>
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


