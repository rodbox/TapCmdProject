<select id="vendor" name="vendor" class="form-control c-select  on-change" data-cb-change="overidesList" data-cb-app="editor"  placeholder="vendor" >
<option></option>
    <?php foreach ($d['vendor'] as $key => $value): ?>
        <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
    <?php endforeach ?>
</select>