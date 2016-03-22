<nav class="navbar navbar-fixed-top">
    <form action="<?php $c->urlExec('app','project') ?>" id="form-project" class="form-inline form-live" data-cb="refresh">
            <!-- BEGIN ROW  -->
            <div class="row ">
                <div class="col-md-12 col-xs-12">
                    <div class="input-group">
                     <div class="input-group-btn">
                        <a href="<?php $c->urlPage('app','index') ?>" class="btn btn-secondary-outline" title="Index"><i class="fa fa-home"></i></a>
                        <a href="<?php $c->urlPage('app','create'); ?>" class="btn btn-secondary-outline btn-modal" title="Create"   data-backdrop="static"><i class="fa fa-plus"></i></a>
                        </div>
                        <?php $c->view("app","select_project","projects"); ?>
                        <div class="input-group-btn">
                        </div>
                    </div>
   <a href="<?php $c->urlPage('app','config'); ?>" class="btn btn-secondary-outline btn-modal pull-right" title="Config" data-form="#form-project"  data-backdrop="static"><i class="fa fa-cog"></i></a>
                </div>
            </div>
        <!-- END ROW  -->
    </form>
</nav>