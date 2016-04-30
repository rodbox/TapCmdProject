    <div class="btn-group">
        <a href="#" class="btn-pjs btn btn-default" data-pjs="new"><i class="fa fa-file"></i></a>
        <a href="#" class="btn-pjs btn btn-default" data-pjs="raster"><i class="fa fa-download"></i></a>
        <a id="draw_load" href="<?php $c->urlExec('editor','draw_load') ?>" class="btn btn-pjs btn-default autoclick" data-pjs="load"><i class="fa fa-folder-o"></i></a>
        </div>
        <div class="btn-group">
        <a id="draw_save" href="<?php $c->urlExec('editor','draw_save') ?>" class="btn btn-pjs btn-default" data-pjs="save" title="Save"><i class="fa fa-floppy-o"></i></a>
        <input type="text" id="filename" class="form-control form-inverse" value="<?php echo basename($_GET['file']); ?>">
        <input type="checkbox" id="file-copy" name="copy" title="copy" class="">
    </div>
    <div class="btn-group">
        <input type="text" id="draw_w" name="draw_w" data-pjs="resizeCanvas" class="input-pjs form-control xs form-inverse" value="<?php echo $_GET['size'][0] ?>">
        x
        <input type="text" id="draw_h" name="draw_h" data-pjs="resizeCanvas" class="input-pjs form-control xs form-inverse" value="<?php echo $_GET['size'][1] ?>">
    </div>