<nav class="navbar navbar-dark bg-inverse">
    <div class="navbar navbar-inverse no-radius no-marg">
    <ul class="nav navbar-nav navbar-right ">
        <li class="nav-item"><a href="<?php $c->urlPage('app','index') ?>" class="nav-link" title="Index"><i class="fa fa-home"></i></a></li>
    </ul>
    <form action="#" id="form-project" class="form-inline">
        <div class="container">
            <!-- BEGIN ROW  -->
            <div class="row ">
                <div class="col-md-12 col-xs-12">
                    <div class="input-group">
                     <div class="input-group-btn">
                        <a href="<?php $c->urlPage('app','create'); ?>" class="btn btn-secondary-outline btn-modal" title="Create"   data-backdrop="static"><i class="fa fa-plus"></i></a>
                        </div>
                        <?php $c->view("app","select_project","projects"); ?>
                        <div class="input-group-btn">
                            <!-- <a href="<?php $c->urlExec('app','sys'); ?>" class="btn btn-secondary-outline btn-exec" title="Config" data-form="#form-project"  ><i class="fa fa-terminal"></i></a> -->
                            <a href="<?php $c->urlExec('app','open_editor'); ?>" class="btn btn-secondary-outline btn-exec" title="Config" data-form="#form-project"  ><i class="fa fa-code"></i></a>
                            <a href="<?php $c->urlPage('app','test'); ?>" class="btn btn-secondary-outline" title="Config" data-form="#form-project"  ><i class="fa fa-flask"></i></a>
                            <a href="<?php $c->urlPage('app','config'); ?>" class="btn btn-secondary-outline btn-modal" title="Config" data-form="#form-project"  data-backdrop="static"><i class="fa fa-cog"></i></a>
                            <a href="<?php $c->urlPage('app','deploy'); ?>" class="btn btn-secondary-outline btn-modal" title="Ftp" data-form="#form-project" data-backdrop="static"><i class="fa fa-upload"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END ROW  -->
    </form>
    </div>
</nav>