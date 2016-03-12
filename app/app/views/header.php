<nav class="navbar navbar-dark bg-inverse">
    <form action="#" id="form-project">
        <div class="container">
            <!-- BEGIN ROW  -->
            <div class="row ">
                <div class="col-md-12 col-xs-12">
                    <div class="input-group">
                        <select id="project" name="project" class="form-control c-select">
                            <?php foreach (PROJECTS as $key => $project): ?>
                            <option value="<?php echo $project; ?>"><?php echo $project; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="input-group-btn">
                            <a href="<?php $c->urlPage('app','config'); ?>" class="btn btn-secondary-outline btn-modal" title="Config" data-form="#form-project"  data-backdrop="static"><i class="fa fa-cog"></i></a>
                            <a href="<?php $c->urlExec('app','ftp'); ?>" class="btn btn-secondary-outline btn-exec" title="Ftp" data-form="#form-project"><i class="fa fa-upload"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- END ROW  -->
    </form>
</nav>