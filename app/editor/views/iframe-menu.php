<form action="<?php $c->urlExec('editor','iframe') ?>" id="iframe-form" class="form-inline form-live" data-target='#preview' >
    <input type="text"  id="urlPreview" class="form-control" name="iframe[url]" value="<?php echo $_SESSION['iframe'] ?? ''; ?>" />
    <button class="btn btn-sm btn-primary " type="submit"><i class="fa fa-refresh"></i></button>
</form>
