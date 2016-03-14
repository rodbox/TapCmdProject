<fieldset>
<legend>Icone</legend>
<!-- BEGIN COL : col-md-2 col-lg-2  -->
<div class="col-md-2 col-lg-2 ">
     <?php
        $ico = new app();
        $ico->getIcon($d['name']);
        $ico->getFav($d['name']);

    ?>
</div>
<!-- END COL : col-md-2 col-lg-2  -->
<!-- BEGIN COL : col-md-10 col-lg-10  -->
<div class="col-md-10 col-lg-10 ">
    <div class="form-group">
         <div class="input-group">
      <input type="text" name="shortname" class="form-control" id="shortname" placeholder="Short Name"  value="<?php echo $d['shortname'] ?? ''; ?>" />
      <span class="input-group-btn">
       <a href="<?php $c->urlExec('app','icon') ?>" class="btn btn-secondary btn-sm btn-exec " title="icon" data-form='#form-config'>gen</a>
      </span>
    </div>
    </div>
<!-- BEGIN ROW  -->
<div class="row ">

         <!-- BEGIN COL : col-md-6 col-lg-6  -->
    <div class="col-md-6 col-lg-6 ">
    <div class="input-group input-colors">
        <input type="text" name="color[color]" value="<?php echo $d['color']['color'] ?? '#fff'; ?>" class="form-control" />
        <span class="input-group-addon"><i></i></span>
    </div>
    </div>
    <!-- END COL : col-md-6 col-lg-6  -->
 <!-- BEGIN COL : col-md-6 col-lg-6  -->
    <div class="col-md-6 col-lg-6 ">
    <div class="input-group input-colors">
        <input type="text" name="color[bg]" value="<?php echo $d['color']['bg'] ?? '#242424'; ?>" class="form-control" />
        <span class="input-group-addon"><i></i></span>
    </div>
    </div>
    <!-- END COL : col-md-6 col-lg-6  -->
</div>
<!-- END COL : col-md-10 col-lg-10  -->

</div>
<!-- END ROW  -->
</fieldset>

<fieldset class="">
<legend>Type</legend>
<!-- input : type -->
<div class="btn-group">
    <label for="type_sf" class="btn btn-secondary">Symfony
        <input type="radio" name="type" class="form-control" <?php echo ($d['type'] ?? 'Symfony' =='Symfony')?'checked="checked"':'' ?> id="type_sf" placeholder="Symfony" value="Symfony" />
        </label>
    <label for="type_rb" class="btn btn-secondary">Rodbox
        <input type="radio" name="type" class="form-control" <?php echo ($d['type'] ?? '' =='Rodbox')?'checked="checked"':'' ?> id="type_rb" placeholder="Rodbox" value="Rodbox" />
        </label>
</div>
<!-- end input : type -->
</fieldset>

<fieldset>
    <legend>Color</legend>

    <table class="table-condesed">
        <tbody>
            <?php foreach (COLORS_SETTING as $colorName => $colorValue): ?>
                <tr>
                    <th>
                        <?php echo $colorName; ?>
                    </th>
                    <td>
                        <div class="input-group input-colors">
                            <input type="text" name="colors[<?php echo $colorName ?>][1]" value="<?php echo $d['colors']['<?php echo $colorName ?>'][1] ?? COLORS_SETTING[$colorName][0]; ?>" class="form-control" />
                            <span class="input-group-addon"><i></i></span>
                        </div>
                    </td>
                    <td>
                        <div class="input-group input-colors">
                            <span class="input-group-addon"><i></i></span>
                            <input type="text" name="colors[<?php echo $colorName ?>][2]" value="<?php echo $d['colors']['<?php echo $colorName ?>'][2] ?? COLORS_SETTING[$colorName][1]; ?>" class="form-control" />

                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</fieldset>