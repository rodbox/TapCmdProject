            <a href="<?php $c->urlExec('app','sublime') ?>" id="sublime" class="btn btn-primary btn-sm btn-exec" data-cb="false" title="term">Sublime</a>
            <a href="<?php $c->urlExec('app','terminal') ?>" class="btn btn-primary btn-sm btn-exec" data-cb="false" title="term">Terminal</a>
          <a href="http://localhost:8888/phpMyAdmin/db_structure.php?db=db608615456&table" class="btn btn-primary btn-sm btn-popup">myAdmin</a>
          <a href="<?php $c->urlExec('editor','bundles_index') ?>" class="btn btn-primary btn-sm btn-exec" data-cb="false" title="term">Bundles index</a>

<!-- BEGIN ROW  -->
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
