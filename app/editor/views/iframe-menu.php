<form action="<?php $c->urlExec('editor','iframe') ?>" id="iframe-form" class="form-inline form-live" data-target='#preview' >
    <input type="text"  id="urlPreview" class="form-control" name="iframe[url]" value="<?php echo $_SESSION['iframe'] ?? ''; ?>" />
</form>
