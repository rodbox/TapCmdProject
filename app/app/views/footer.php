<footer>
<nav class="navbar navbar-bottom">            <!-- BEGIN ROW  -->
            <div class="row ">
                <div class="col-md-12 col-xs-12">
                <div class="input-group text-right">
                    <div class="input-group-btn">
                    <a href="http://localhost:8888/phpMyAdmin/db_structure.php?db=db608615456&table" class="btn btn-primary btn-sm btn-popup">myAdmin</a>
                         <a href="<?php $c->urlPage('app','todo'); ?>" class="btn btn-secondary-outline btn-modal" title="Todo"  data-form="#form-project"   data-backdrop="static"><i class="fa fa-tasks"></i></a>
                            <a href="<?php $c->urlPopup('app','tap') ?>" class="btn btn-primary btn-sm btn-popup" data-cb="false" title="term" data-popup="tap"><i class="fa fa-th"></i></a>
                            <a href="<?php $c->urlPopup('app','iframe') ?>" class="btn btn-primary btn-sm btn-popup" data-cb="false" title="term" data-popup="iframe"><i class="fa fa-eye"></i></a>
                            <a href="<?php $c->urlExec('app','terminal') ?>" class="btn btn-primary btn-sm btn-exec" data-cb="false" title="term"><i class="fa fa-code"></i></a>
                    </div>

                </div>
                    <div class="input-group">
                     <div class="input-group-btn">
                            <!-- <a href="<?php $c->urlExec('app','sys'); ?>" class="btn btn-secondary-outline btn-exec" title="Config" data-form="#form-project"  ><i class="fa fa-terminal"></i></a> -->
                            <!-- <a href="<?php $c->urlExec('app','open_editor'); ?>" class="btn btn-secondary-outline btn-exec" title="Config" data-form="#form-project"  ><i class="fa fa-code"></i></a> -->

                            <?php $c->btn_sui('<i class="fa fa-align-justify "></i>','suggest'); ?>
                            <?php $c->btn_sui('<i class="fa fa-columns"></i>','sidebar'); ?>
                            <?php $c->btn_sui('<i class="fa fa-code"></i>','editor'); ?>
                            <?php $c->btn_sui('<i class="fa fa-eye-slash"></i>','iframe'); ?>
                            <?php $c->btn_sui('<i class="fa fa-flask"></i>','labs'); ?>
                            <?php $c->btn_sui('<i class="fa fa-columns"></i>','quickbar'); ?>
                            <?php $c->btn_sui('<i class="fa fa-code"></i>','console'); ?>
<!--                             <a href="#" data-k='editor' data-context='editor' class='btn-context btn btn-secondary-outline'>editor</a> -->
                          <!--   <a href="<?php $c->urlPage('app','test'); ?>" class="btn btn-secondary-outline" title="Config" data-form="#form-project"  ><i class="fa fa-flask"></i></a> -->

                    </div>

                </div>
            </div>

        </div>
        <!-- END ROW  -->

</nav></footer>