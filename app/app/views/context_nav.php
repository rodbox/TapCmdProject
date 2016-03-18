<div class="context-sidebar">
    <div class="context-sidebar-body">
        <?php $c->view("editor","files","files",["name"=>"__rodbox_sources__"]); ?>
    </div>
</div>
<div class="context-editor">
    <div class="context-editor-body">
        <textarea id="myTextarea" name="myTextarea" class=""></textarea>
    </div>
    <div class="context-iframe">
        <iframe id="preview" src="http://localhost:8000">

        </iframe>
    </div>
</div>
<div class="context-quickbar">
    <div class="context-quickbar-body">
        quickbar
    </div>
</div>