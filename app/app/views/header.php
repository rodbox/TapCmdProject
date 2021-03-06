<nav class="navbar navbar-header">
    <form action="<?php $c->urlExec('app','project') ?>" id="form-project" class="form-inline form-live" data-cb="refresh">
        <!-- BEGIN DROPDOWN HOVER  -->
        <div class="input-group">
            <div class="input-group-btn">
                <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#" class="btn btn-sm c-2">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="dropdown-menu pull-right">
                    <a href="<?php $c->urlPage('app','create'); ?>" id="newproject" class="dropdown-item btn-modal" title="Créer un projet"   data-backdrop="static" data-modal="modalSm"><i class="fa fa-plus"></i> Créer un projet</a>
                    <a href="<?php $c->urlPage('app','config'); ?>" id="paramproject" class="dropdown-item btn-modal pull-right" title="Paramètres" data-form="#form-project"  data-backdrop="static"><i class="fa fa-cog"></i> Paramètres</a>
                </div>
            </div>
            <div class="input-group">
                <?php $c->view("app","select_project","projects"); ?>
                <a href="<?php $c->urlExec('app','open_project'); ?>" id="openDir" class="btn input-group-addon btn-default btn-exec" ><i class="fa fa-folder"></i></a>
            </div>


        </div>
        <!-- END DROPDOWN HOVER  -->
    </form>
</nav>