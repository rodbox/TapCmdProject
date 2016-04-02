<?php $app = new app();
$cur =  $app->cur();
 ?>
<select id="project" name="name" class="form-control c-select on-change" data-cb-change='loadProject' >
    <?php foreach ($d as $key => $project): ?>
    <option value="<?php echo $project; ?>" <?php if ($project == $cur): ?> selected='selected' <?php endif ?>><?php echo $project; ?></option>
    <?php endforeach ?>
</select>