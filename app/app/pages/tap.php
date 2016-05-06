<div style="padding-bottom: 5rem;">
<div class="row ">
    <!-- BEGIN COL : col-md-12 col-lg-12  -->
    <div class="col-md-12 col-lg-12 ">
        <?php $c->view("app","btn_cmd","cmds"); ?>
    </div>
    <!-- END COL : col-md-12 col-lg-12  -->
</div>
<!-- END ROW  -->
<!-- BEGIN ROW  -->
<div class="row ">
    <!-- BEGIN COL : col-md-12 col-lg-12  -->
    <div class="col-md-12 col-lg-12 ">
        <?php $c->view("app","tabs_cmd","cmds"); ?>
    </div>
    <!-- END COL : col-md-12 col-lg-12  -->
</div>
<!-- END ROW  -->
</div>
<footer style="padding: 0.2rem;">
<a href="<?php $c->urlPopup('app','iframe') ?>" class="btn btn-popup pull-right" data-cb="false" title="term" data-popup="iframe" id="iframe"><i class="fa fa-eye "></i></a>
    <?php $c->clipme('clipme3','php bin/console server:run'); ?>

    <div class="btn-group">
    <a href="<?php $c->urlExec('app','terminal') ?>" class="btn btn-primary btn-sm btn-exec" data-cb="false" title="term"><i class="fa fa-terminal on fa-square"></i></a>
    </div>
<div class="btn-group">
    <a href="<?php $c->urlExec('app','sublime') ?>" id="sublime" class="btn btn-primary btn-sm btn-exec" data-cb="false" title="term">Sublime</a>    </div>
<div class="btn-group">
    <a href="<?php $c->urlExec('app','manage') ?>" id="sublime" class="btn btn-primary btn-sm btn-exec" data-cb="false" title="term"><i class="fa fa-folder-o"></i></a>
    </div>
<div class="btn-group">
    <a href="http://localhost:8888/phpMyAdmin/db_structure.php?db=db608615456&table" class="btn btn-primary btn-sm btn-popup"><i class="fa fa-database"></i></a>
    </div>
<div class="btn-group">
    <a href="<?php $c->urlPopup('app','test') ?>" id="popupTest" class="btn btn-primary btn-sm btn-popup" data-popup="test" title="Test" target="blank"><i class="fa fa-flask"></i></a>
</div>
<div class="btn-group">
    <a href="<?php $c->urlExec('app','less_compile') ?>" class="btn btn-primary btn-sm  btn-exec" title="title"><i class="fa fa-css3"></i></a>
    <a href="<?php $c->urlExec('app','assets_expose') ?>" class="btn btn-primary btn-sm btn-exec" >expose</a>
</div>
<div class="btn-group">
    <a href="<?php $c->urlExec('editor','bundles_index') ?>" class="btn btn-primary btn-sm btn-exec" data-cb="false" title="term">Bundles index</a>
    <a href="<?php $c->urlPage('editor','overide'); ?>" class="btn btn-primary btn-sm btn-modal" title="overide"  data-form="#form-project" data-modal="modalM"  data-backdrop="static">Overide</a>
</div>
<div class="btn-group">
    <a href="http://localhost:8000/" class="btn btn-primary btn-sm" target="_blank" data-cb="false" title="term">Front</a>
    <a href="http://localhost:8000/admin" class="btn btn-primary btn-sm " target="_blank" title="overide">Admin</a>
</div>
<!-- BEGIN ROW  -->
</footer>