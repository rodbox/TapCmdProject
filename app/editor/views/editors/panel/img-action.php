<div class="card">
    <div class="btn-group btn-group-justify">
        <a href="#" class="btn-pjs btn btn-default" data-pjs="undo"><i class="fa fa-undo"></i></a>
        <a href="#" class="btn-pjs btn btn-default" data-pjs="redo"><i class="fa fa-repeat"></i></a>
        <a href="#" class="btn-pjs btn btn-default" data-pjs="raster"><i class="fa fa-download"></i></a>
        <a href="<?php $c->urlExec('editor','draw_load') ?>" class="btn btn-pjs btn-default" data-pjs="load"><i class="fa fa-folder-o"></i></a>
        <a href="<?php $c->urlExec('editor','draw_save') ?>" class="btn btn-pjs btn-default" data-pjs="save" title="Save"><i class="fa fa-floppy-o"></i></a>
    </div>
</div>