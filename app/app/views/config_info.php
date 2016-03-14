<!-- BEGIN ROW  -->
<div class="row ">
<!-- input : upload -->
<div class="form-group text-right small">
    <label for="upload" class="form-control-label">Upload</label> <?php echo $info['upload'] ?? ''; ?>
</div>
<!-- end input : upload -->

<fieldset class="col-sm-offset-2 col-sm-10">
<!-- input : type -->
<div class="btn-group">
    <label for="type_sf" class="btn btn-secondary">Symfony
        <input type="checkbox" name="type" class="form-control" <?php echo ($d['type']=='Symfony')?'checked="checked"':'' ?> id="type_sf" placeholder="Symfony" value="Symfony" />
        </label>
    <label for="type_rb" class="btn btn-secondary">Rodbox
        <input type="checkbox" name="type" class="form-control" <?php echo ($d['type']=='Rodbox')?'checked="checked"':'' ?> id="type_rb" placeholder="Rodbox" value="Rodbox" />
        </label>
</div>
<!-- end input : type -->



</fieldset>


    <fieldset class="col-sm-offset-2 col-sm-10">

<div class="btn-group">
<a href="<?php $c->urlExec('app','distinit') ?>" class="btn btn-primary btn-sm btn-exec " title="init dist" data-form='#form-config'>init dist</a>
</div>
</fieldset>


</div>
<!-- END ROW  -->


<fieldset>
    <!-- input : dir -->
    <div class="form-group row">
        <label for="dir" class="col-sm-2 form-control-label">dir Server</label>
        <div class="col-sm-10">
                <input type="text" name="server[dir]" class="form-control" id="dir" placeholder="dir Server" value="<?php echo $d['server']['dir'] ?? ''; ?>" />
        </div>
    </div>
    <!-- end input : dir -->
    <!-- input : web -->
    <div class="form-group row">
        <label for="web" class="col-sm-2 form-control-label">web server</label>
        <div class="col-sm-10">
                <input type="text" name="server[web]" class="form-control" id="web" placeholder="web server" value="<?php echo $d['server']['web'] ?? ''; ?>" />
        </div>
    </div>
    <!-- end input : web -->
</fieldset>

<fieldset>
    <!-- input : dir -->
    <div class="form-group row">
        <label for="dir" class="col-sm-2 form-control-label">dir Local</label>
        <div class="col-sm-10">
                <input type="text" name="local[dir]" class="form-control" id="dir" placeholder="dir Local" value="<?php echo $d['local']['dir'] ?? ''; ?>" />
        </div>
    </div>
    <!-- end input : dir -->
    <!-- input : web -->
    <div class="form-group row">
        <label for="web" class="col-sm-2 form-control-label">web server</label>
        <div class="col-sm-10">
                <input type="text" name="local[web]" class="form-control" id="web" placeholder="web server" value="<?php echo $d['local']['web'] ?? ''; ?>" />
        </div>
    </div>
    <!-- end input : web -->
</fieldset>


