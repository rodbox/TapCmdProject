<select id="project" name="project" class="form-control c-select">
    <?php foreach ($d as $key => $project): ?>
    <option value="<?php echo $project; ?>"><?php echo $project; ?></option>
    <?php endforeach ?>
</select>