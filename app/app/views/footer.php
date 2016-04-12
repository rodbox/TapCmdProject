<footer>
          <!-- BEGIN ROW  -->
      <div class="btn-group-vertical btn-group-sm bg-2 c-5" style="margin:0.5rem;">

            <!-- <a href="<?php $c->urlExec('app','sys'); ?>" class="btn btn-secondary-outline btn-exec" title="Config" data-form="#form-project"  ><i class="fa fa-terminal"></i></a> -->
            <!-- <a href="<?php $c->urlExec('app','open_editor'); ?>" class="btn btn-secondary-outline btn-exec" title="Config" data-form="#form-project"  ><i class="fa fa-code"></i></a> -->
            <?php $c->btn_sui('<i class="fa fa-refresh"></i>','autorefresh','true', 'btn btn-sm '); ?>
            <?php $c->btn_sui('<i class="fa fa-eye-slash"></i>','iframe'); ?>
            <a href="<?php $c->urlPopup('app','iframe') ?>" class="btn btn-popup" data-cb="false" title="term" data-popup="iframe" id="iframe"><i class="fa fa-eye"></i></a>
            <?php $c->btn_sui('<i class="fa fa-cloud-upload "></i>','sync','true', 'btn btn-sm '); ?>
            <?php $c->btn_sui('<i class="fa fa-search "></i>','suggest'); ?>
            <?php $c->btn_sui('<i class="fa fa-columns"></i>','sidebar'); ?>
            <?php $c->radio_sui(1,'editor-grid',1); ?>
            <?php $c->radio_sui(2,'editor-grid',2); ?>
            <?php $c->radio_sui(3,'editor-grid',3); ?>
            <?php $c->radio_sui(4,'editor-grid',4); ?>
            <?php $c->btn_sui('<i class="fa fa-code"></i>','editor'); ?>

            <?php // $c->btn_sui('<i class="fa fa-columns"></i>','quickbar'); ?>

            <!--                             <a href="#" data-k='editor' data-context='editor' class='btn-context btn btn-secondary-outline'>editor</a> -->
            <!--   <a href="<?php $c->urlPage('app','test'); ?>" class="btn btn-secondary-outline" title="Config" data-form="#form-project"  ><i class="fa fa-flask"></i></a> -->

            <?php $c->btn_sui('<i class="fa fa-list"></i>','todo'); ?>

            <a href="<?php $c->urlPopup('app','tap') ?>" id="btnTap" class="btn btn-popup" data-cb="false" title="term" data-popup="tap"><i class="fa fa-th"></i></a>
            <?php $c->btn_sui('Parse','editor-parse'); ?>
            <?php $c->btn_sui('Debug','debug'); ?>
            <?php $c->btn_sui('Console','console'); ?>
            <div id="keyconsole" class="btn"></div>
        </div>
</footer>