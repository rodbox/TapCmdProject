<!-- form :form-ftp  -->
<form id="form-ftp"  action="<?php $c->urlExec('app','ftp'); ?>" class=" form-live" >
    <!-- BEGIN COL : col-md-3 col-lg-3  -->
    <div class="col-md-3 col-lg-3 ">
        <div>Exclude</div>

    <input type="hidden" name="name" value="<?php echo $_GET['name']; ?>">
<?php
    $app = new app();
$app->btn_deploy(); ?>
<!--
        <div class="btn-group-vertical btn-group-sm" data-toggle="buttons">
            <label class="btn btn-secondary active">
                <input name="filters[]" value="vendor" checked="checked" type="checkbox"  checked="checked" > vendor
            </label>
            <label class="btn btn-secondary  active">
                <input name="filters[]" value="web/assets" checked="checked" type="checkbox" > web/assets
            </label>
            <label class="btn btn-secondary  active">
                <input name="filters[]" value="web/bundles" checked="checked" type="checkbox" > web/bundles
            </label>
            <label class="btn btn-secondary  active">
                <input name="filters[]" value="var" checked="checked" type="checkbox" > var
            </label>
        </div> -->
    </div>
    <!-- END COL : col-md-3 col-lg-3  -->
    <!-- BEGIN COL : col-md-9 col-lg-9  -->
    <div class="col-md-9 col-lg-9 ">
        <input type="hidden" name="project" value="<?php echo $_GET['project']; ?>">
        <!-- <a href="<?php $c->urlExec('app','copy') ?>" class="btn btn-default btn-exec" data-form="#form-ftp" title="copy"><i class="fa fa-copi-o"></i> copy</a>
        <a href="<?php $c->urlExec('app','dist') ?>" class="btn btn-default btn-exec" data-form="#form-ftp" title="dist">dist</a>
        <a href="<?php $c->urlExec('app','zip') ?>" class="btn btn-default btn-exec" data-form="#form-ftp" title="zip"><i class="fa fa-file-archive-o"></i> zip</a>
        <a href="<?php $c->urlExec('app','upl') ?>" class="btn btn-default btn-exec" data-form="#form-ftp" title="upl"><i class="fa fa-cloud-upload"></i> upl</a>
        <a href="<?php $c->urlExec('app','unzip') ?>" class="btn btn-default btn-exec" data-form="#form-ftp" title="unzip">unzip</a> -->
    </div>
    <!-- END COL : col-md-9 col-lg-9  -->
    <!-- BEGIN COL : col-md-12 col-lg-12  -->
    <div class="col-md-12 col-lg-12 ">
        <hr>

    </div>
    <!-- END COL : col-md-12 col-lg-12  -->
    <div class="clearfix"></div>
</form>
<!-- form : form-ftp