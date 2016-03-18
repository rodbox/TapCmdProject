<nav class="navbar navbar-fixed-top">
    <form action="#" id="form-project" class="form-inline">
        <div class="container">
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
                            <a href="<?php $c->urlPage('app','config'); ?>" class="btn btn-secondary-outline btn-modal" title="Config" data-form="#form-project"  data-backdrop="static"><i class="fa fa-cog"></i></a>
                            <a href="<?php $c->urlPage('app','todo'); ?>" class="btn btn-secondary-outline btn-modal" title="Todo"  data-form="#form-project"   data-backdrop="static"><i class="fa fa-tasks"></i></a>
                        </div>
                    </div>
                    <?php
                        $app = new app();
                        $app->btn_deploy();
                    ?>
                </div>
            </div>

        </div>
        <!-- END ROW  -->
    </form>
</nav>