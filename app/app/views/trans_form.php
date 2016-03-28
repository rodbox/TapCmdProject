<form action ="<?php $c->urlExec('app','trans-add') ?>" class='form-live' data-cb-app='app'>
<div class="form-group"><label for="index">Index</label>
    <input type="text" id="index" name="index" class="form-control" value="<?php echo $d['index']; ?>"/></div>
    <?php foreach ($d['langs'] as $lang => $langValue): ?>
        <div class="form-group">
        <label>lang <?php echo $lang ?></label>
        <input type="text" name="value[<?php echo $lang ?>]" class="form-control" value='<?php echo $d['trans'][$lang] ?? ''; ?>'/>
        </div>
    <?php endforeach ?>
    <hr>
    <button class="btn-success btn" type="submit">Enregistrer</button>
</form>