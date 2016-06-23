<div style="padding-bottom: 5rem;">
    <div class="row ">
        <div class="col-md-12 col-lg-12 ">
            <?php $c->view("app","btn_cmd","cmds"); ?>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-12 col-lg-12 ">
            <?php $c->view("app","tabs_cmd","cmds"); ?>
        </div>
    </div>
</div>
<footer class="tap" style="padding: 0.2rem;">
<div class="m-b">
    <a href="<?php $c->urlExec('app','assets_symfony') ?>" class="btn btn-primary btn-sm btn-exec" data-cb="false" title="term">Assets</a>
    <div id="clipme4" class="absolute " style='left:-10000px;'>
        php bin/console doctrine:database:drop --force <br>
        php bin/console doctrine:database:create<br>
        php bin/console doctrine:schema:update --force<br>
        php bin/console doctrine:fixture:load <br>
    </div>
    <?php $c->clipme('clipme4','','db clean'); ?>
    <?php $c->clipme('clipme5','php bin/console server:run','Server run'); ?>
    <?php $c->clipme('clipme6','php bin/console assets:install','Assets install'); ?>
    <?php $c->clipme('clipme7','php composer.phar update','Composer update'); ?>
</div>

<div class="m-b">
    <div class="btn-group">
        <a href="<?php $c->urlExec('app','terminal') ?>" class="btn btn-primary btn-sm btn-exec" data-cb="false" title="term"><i class="fa fa-terminal on fa-square"></i></a>
        </div>
    <div class="btn-group">
        <a href="<?php $c->urlExec('app','sublime') ?>" id="sublime" class="btn btn-primary btn-sm btn-exec" data-cb="false" title="term">Sublime</a></div>
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
        <a href="<?php $c->urlExec('app','less_compilsidee') ?>" class="btn btn-primary btn-sm  btn-exec" title="title"><i class="fa fa-css3"></i></a>
        <a href="<?php $c->urlExec('app','assets_expose') ?>" class="btn btn-primary btn-sm btn-exec" >expose</a>
    </div>
</div>

<div class="">
    <div class="btn-group">
        <a href="<?php $c->urlExec('editor','bundles_index') ?>" class="btn btn-primary btn-sm btn-exec" data-cb="false" title="term">Bundles index</a>
        <a href="<?php $c->urlPage('editor','overide'); ?>" class="btn btn-primary btn-sm btn-modal" title="overide"  data-form="#form-project" data-modal="modalM"  data-backdrop="static">Overide</a>
    </div>
    <div class="btn-group">
        <a href="<?php $c->urlExec('app','curlme') ?>" class="btn btn-primary btn-sm btn-exec" data-cb="false" title="term">Curlme</a>

    </div>
    <div class="btn-group">
        <a href="http://localhost:8000/" class="btn btn-primary btn-sm" target="_blank" data-cb="false" title="term">Front</a>
        <a href="http://localhost:8000/admin" class="btn btn-primary btn-sm " target="_blank" title="overide">Admin</a>
        <a href="http://localhost:8000/bw/bowerfix" class="btn btn-primary btn-sm " target="_blank" title="Bower fix init"  data-form="#form-project" data-modal="modalM"  data-backdrop="static">Bower fix</a>
    </div>
</div>

<!-- BEGIN ROW  -->
</footer>