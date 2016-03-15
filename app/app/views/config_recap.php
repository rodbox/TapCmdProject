 <fieldset class="">


<!-- BEGIN COL : col-md-8 col-lg-8  -->
<div class="col-md-12 col-lg-12 ">
<div class="form-group">
<a href="<?php $c->urlExec('app','distinit') ?>" class="btn btn-secondary btn-exec btn-sm " data-helper="initialisation des fichiers de configuration distant" title="init dist" data-form='#form-config'><i class="icomoon-stack-check "></i>distinit</a>

        <a href="<?php $c->urlExec('app','copy') ?>" class="btn btn-secondary btn-exec btn-sm" data-form="#form-config" title="copy" data-cb="copy" data-helper="Copie le projet filtrer pour l'upload"><i class="fa fa-files-o"></i>  copy</a>
        <a href="<?php $c->urlExec('app','dist') ?>" data-helper="Initialise les fichiers de configurations distant." class="btn btn-secondary btn-exec btn-sm" data-form="#form-config" title="dist"><i class="icomoon-sphere3 "></i></i>dist</a>
        <a href="<?php $c->urlExec('app','zip') ?>" data-helper="Compresse le projet." class="btn btn-secondary btn-exec btn-sm" data-form="#form-config" title="zip"><i class="fa fa-file-archive-o"></i> zip</a>
        <a href="<?php $c->urlExec('app','upl') ?>" data-helper="Upload le projet" class="btn btn-secondary btn-exec btn-sm" data-form="#form-config" title="upl" data-cb="upl"><i class="fa fa-cloud-upload"></i> upl</a>
        <a href="<?php $c->urlExec('app','unzip') ?>" data-helper="Décompresse le projet sur le server" class="btn btn-secondary btn-exec btn-sm disabled" data-form="#form-config" title="unzip"><i class="icomoon-stackoverflow "></i>unzip</a>
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