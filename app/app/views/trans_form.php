<form action ="<?php $c->urlExec('app','trans-add') ?>" class='form-live' data-cb-app='app'>
    <input type="text" name="index" class="form-control" value="<?php echo $d['index']; ?>"/>
    <?php foreach ($d['langs'] as $lang => $langValue): ?>
        <label>lang <?php echo $lang ?></label>
        <input type="text" name="value[<?php echo $lang ?>]" class="form-control" value='<?php echo $d['trans'][$lang] ?? ''; ?>'/>
    <?php endforeach ?>
    <hr>
    <button ></button>
</form>