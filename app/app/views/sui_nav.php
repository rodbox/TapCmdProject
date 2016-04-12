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

        <div id="sui-editor-grid-1" class="sui-editor-grid">
            <?php $c->menu("editor","editor-menu"); ?>
            <div id="filesPanes" class="tab-content"></div>
        </div>
        <div id="sui-editor-grid-2" class="sui-editor-grid">
            <ul class="nav nav-tabs nav-tabs-editor" id="filesTabs-2"></ul>
            <div id="filesPanes-2" class="tab-content">
            </div>
        </div>
        <div id="sui-editor-grid-3" class="sui-editor-grid">
            <ul class="nav nav-tabs nav-tabs-editor" id="filesTabs-3"></ul>
            <div id="filesPanes-3" class="tab-content">
            </div>
        </div>
        <div id="sui-editor-grid-4" class="sui-editor-grid">
            <ul class="nav nav-tabs nav-tabs-editor" id="filesTabs-4"></ul>
            <div id="filesPanes-4" class="tab-content">
            </div>
        </div>

        <!-- END TABSCONTENT  -->
        <!-- END NAVTABS titleTabs -->
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

