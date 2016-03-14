 <fieldset class="">

<table class="table">
    <tbody>
        <tr>
            <td class="text-right strong">Update</td>
            <td><?php echo $d['upd'] ??''; ?></td>
        </tr><tr>
            <td class="text-right strong">Upload</td>
            <td><?php echo $d['upl'] ??''; ?></td>
        </tr>
    </tbody>
</table>

<div class="btn-group">
<a href="<?php $c->urlExec('app','distinit') ?>" class="btn btn-primary btn-sm btn-exec " title="init dist" data-form='#form-config'>init dist</a>

</div>
</fieldset>