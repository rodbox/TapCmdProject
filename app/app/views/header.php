<nav class="navbar navbar-dark bg-inverse">
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
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i>

        </button>
        <div class="dropdown-menu">
        <label class="dropdown-item">
            <input type="checkbox" class="" id="assets" name="assets" aria-label="Checkbox for following text input"> Assets
        </label>
        <label class="dropdown-item">
            <input type="checkbox" class="" id="vendor" name="vendor" aria-label="Checkbox for following text input"> Vendor
        </label>
        <div role="separator" class="dropdown-divider"></div>
        <a href="<?php $c->urlPage('app','config'); ?>" class="dropdown-item btn-modal" title="Config">Config</a>
        </div>
      </div>

                    <span class="input-group-btn">
                        <a href="<?php $c->urlPage('app','config'); ?>" class="btn btn-secondary-outline btn-modal" title="Config">Config</a>
                        <a href="<?php $c->urlExec('app','ftp'); ?>" class="btn btn-secondary-outline btn-form" title="Ftp"><i class="fa fa-upload"></i></a>
                    </span>
                </div>
            </div>
        </div></div>
        <!-- END ROW  -->
    </nav>