<footer>
  <nav class="navbar navbar-bottom">            <!-- BEGIN ROW  -->
  <div class="row ">
    <div class="col-md-12 col-xs-12">
      <div class="input-group  text-right">
        <div class="input-group-btn">
           <a href="<?php $c->urlPopup('app','test') ?>" id="popupTest" class="btn btn-primary btn-sm btn-popup" data-popup="test" title="Test" target="blank"><i class="fa fa-flask"></i></a>
        </div>
      </div> <div class="input-group  text-right">
        <div class="input-group-btn">
           <a href="<?php $c->urlPage('editor','overide'); ?>" class="btn btn-primary btn-sm btn-modal" title="overide"  data-form="#form-project" data-modal="modalM"  data-backdrop="static">Overide</a>
        </div>
      </div>

      <div class="input-group  text-right">
          <div class="input-group-btn">
            <!-- <a href="<?php $c->urlExec('app','sys'); ?>" class="btn btn-secondary-outline btn-exec" title="Config" data-form="#form-project"  ><i class="fa fa-terminal"></i></a> -->
            <!-- <a href="<?php $c->urlExec('app','open_editor'); ?>" class="btn btn-secondary-outline btn-exec" title="Config" data-form="#form-project"  ><i class="fa fa-code"></i></a> -->
            <?php $c->btn_sui('<i class="fa fa-search "></i>','suggest'); ?>
            <?php $c->btn_sui('<i class="fa fa-columns"></i>','sidebar'); ?>
            <?php $c->btn_sui('<i class="fa fa-code"></i>','editor'); ?>

            <?php //$c->btn_sui('<i class="fa fa-eye-slash"></i>','iframe'); ?>
            <?php // $c->btn_sui('<i class="fa fa-columns"></i>','quickbar'); ?>

            <!--                             <a href="#" data-k='editor' data-context='editor' class='btn-context btn btn-secondary-outline'>editor</a> -->
            <!--   <a href="<?php $c->urlPage('app','test'); ?>" class="btn btn-secondary-outline" title="Config" data-form="#form-project"  ><i class="fa fa-flask"></i></a> -->
          </div>
        </div>
      <div class="input-group  text-right">
        <div class="input-group-btn">
          <a href="http://localhost:8888/phpMyAdmin/db_structure.php?db=db608615456&table" class="btn btn-primary btn-sm btn-popup">myAdmin</a>
          <a href="<?php $c->urlExec('editor','bundles_index') ?>" class="btn btn-primary btn-sm btn-exec" data-cb="false" title="term">Bundles index</a>
        </div></div>


        <div class="input-group text-right">
          <div class="input-group-btn">
  <?php $c->btn_sui('<i class="fa fa-list"></i>','todo'); ?>

            <a href="<?php $c->urlPopup('app','iframe') ?>" class="btn btn-primary btn-sm btn-popup" data-cb="false" title="term" data-popup="iframe" id="iframe"><i class="fa fa-eye"></i></a>
            <a href="<?php $c->urlPopup('app','tap') ?>" class="btn btn-primary btn-sm btn-popup" data-cb="false" title="term" data-popup="tap"><i class="fa fa-th"></i></a>
            <?php $c->btn_sui('editor-parse','editor-parse'); ?>
            <?php $c->btn_sui('debug','debug'); ?>
            <?php $c->btn_sui('Console','console'); ?>
            <a href="<?php $c->urlExec('app','sublime') ?>" id="sublime" class="btn btn-primary btn-sm btn-exec" data-cb="false" title="term">Sublime</a>
            <a href="<?php $c->urlExec('app','terminal') ?>" class="btn btn-primary btn-sm btn-exec" data-cb="false" title="term">Terminal</a>
          </div>
        </div>

      </div>
    </div>
    <!-- END ROW  -->
  </nav></footer>