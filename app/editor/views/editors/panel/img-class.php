<div class="btn-group">
<?php foreach (DRAW_CLASS as $key => $value): ?>
    <label class="btn"><input type="radio" name="optionsRadios" id="draw_class_<?php echo $key; ?>" value="<?php echo $value; ?>" ><?php echo $value; ?></label>
<?php endforeach ?>
</div>