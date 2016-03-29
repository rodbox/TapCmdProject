<form action="<?php $c->urlExec('editor','bundles_overides') ?>" class="form-live">
    <!-- BEGIN COL : col-md-6 col-lg-6  -->
    <div class="col-md-6 col-lg-6 ">
        <?php $c->helper('Choisir le bundle vendor à surcharger','Vendor','1'); ?>
        <select id="vendor" name="vendor" class="form-control c-select  on-change" data-cb-change="overidesList" data-cb-app="editor"  placeholder="vendor" >
        <option></option>
            <?php foreach ($d['vendor'] as $key => $value): ?>
                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <!-- END COL : col-md-6 col-lg-6  -->
    <!-- BEGIN COL : col-md-6 col-lg-6  -->
    <div class="col-md-6 col-lg-6 ">
        <?php $c->helper('Selectionnez le bundle de destination. Si le aucun namespace n\'est selectionné ' ,'Src','2'); ?>
        <select id="src" name="src" class="form-control c-select "  placeholder="src" >
        <option></option>
            <?php foreach ($d['src'] as $key => $value): ?>
                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <!-- END COL : col-md-6 col-lg-6  -->
    <hr>
    <div class="clearfix"></div>
    <!-- BEGIN COL : col-md-12 col-lg-12  -->
    <div class="col-md-12 col-lg-12 ">
        <div id="overides-content"></div>
    </div>
    <!-- END COL : col-md-12 col-lg-12  -->
    <hr>

</form>