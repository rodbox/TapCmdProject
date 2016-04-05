 <fieldset class="">


<!-- BEGIN COL : col-md-8 col-lg-8  -->
<div class="col-md-12 col-lg-12 ">
    <div class="form-group">
        <a href="<?php $c->urlExec('app','distinit') ?>" class="btn btn-secondary btn-exec " data-helper="initialisation des fichiers de configuration distant" title="init dist" data-form='#form-config'><i class="icomoon-stack-check "></i>Config Dist</a>
        <a href="<?php $c->urlExec('app','db_schema') ?>" class="btn btn-secondary btn-sm btn-exec" data-cb="false" title="term">Dump schema</a>
        <?php $app= new app(); $app->btn_deploy(); ?>

 <div class="input-group">
          <div id="clipme3" class="form-control sm-2">
          php bin/console server:run<br>
         </div>
          <span class="input-group-btn">
            <?php $c->clipme('clipme3'); ?>
            <a href="<?php $c->urlExec('app','terminal') ?>" class="btn btn-primary btn-sm btn-exec" title="title"><i class="fa fa-code"></i></a>
          </span>
    </div>

    </div>
</div>
<!-- END COL : col-md-10 col-lg-10  -->


<table class="table">
    <tbody>
        <tr>
            <td class="strong">Update : <span class="time_upd"><?php echo $d['upd'] ??''; ?><input type="hidden" name="upd" class="time_upd" value="<?php echo $d['upd'] ?? ''; ?>"></span></td>
        </tr><tr>
            <td class="strong">Upload : <span class="time_upl"><?php echo $d['upl'] ??''; ?><input type="hidden" name="upl" class="time_upl" value="<?php echo $d['upl'] ?? ''; ?>"></span></td>
        </tr>
    </tbody>
</table>


</fieldset>