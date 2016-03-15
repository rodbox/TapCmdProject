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
       <a href="<?php $c->urlPage('app','icon_generator'); ?>" class="btn btn-secondary btn-modal " data-modal="modalSm" title="icon" data-form='#form-config' data-backdrop="static"><i class="fa fa-magic"></i></a>
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
        <span class="input-group-addon"><i></i></span>
        <input type="text" name="color[bg]" value="<?php echo $d['color']['bg'] ?? '#242424'; ?>" class="form-control" />
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
        <input type="radio" name="type" class="form-control" <?php echo ($d['type'] ?? '' =='Symfony')?'checked="checked"':'' ?> id="type_sf" value="Symfony" />
        </label>
    <label for="type_rb" class="btn btn-secondary">Rodbox
        <input type="radio" name="type" class="form-control" <?php echo ($d['type'] ?? '' =='Rodbox')?'checked="checked"':'' ?> id="type_rb" value="Rodbox" />
        </label>
</div>
<!-- end input : type -->
</fieldset>

<fieldset>
    <legend>Color <a href="<?php $c->urlExec('app','less') ?>" class="btn btn-primary btn-sm btn-exec" data-form="#form-config" title="less">less</a></legend>
    <table class="table table-sm">
        <tbody>
            <?php foreach (CSS_SETTING_COLORS as $colorName => $colorValue): ?>
                <tr>
                    <th>
                        <?php echo $colorName; ?>
                    </th>
                    <td>
                        <div class="input-group input-colors">
                            <input type="text" name="css[colors][<?php echo $colorName ?>][1]" value="<?php echo $d['css']['colors']['<?php echo $colorName ?>'][1] ?? CSS_SETTING_COLORS[$colorName][0]; ?>" class="form-control" />
                            <span class="input-group-addon"><i></i></span>
                        </div>
                    </td>
                    <td>
                        <div class="input-group input-colors">
                            <span class="input-group-addon"><i></i></span>
                            <input type="text" name="css[colors][<?php echo $colorName ?>][2]" value="<?php echo $d['css']['colors']['<?php echo $colorName ?>'][2] ?? CSS_SETTING_COLORS[$colorName][1]; ?>" class="form-control" />

                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>


<legend>Vars</legend>
<table class="table table-sm">
<tbody>
<?php foreach (CSS_SETTING_VARS as $varName => $varValue): ?>
                <tr>
                    <th>
                        <?php echo $varName; ?>
                    </th>

                    <td>
                    <?php if (is_array($varValue)): ?>
                     <!--  -->
                    <?php else: ?>
                        <div class="input-group ">
                            <input type="text" name="css[vars][<?php echo $varName ?>]" value="<?php echo $d['css']['vars']['<?php echo $varName ?>'][2] ?? CSS_SETTING_VARS[$varName]; ?>" class="form-control" />
                        </div>
                    <?php endif ?>

                    </td>
                </tr>
            <?php endforeach ?>


        </tbody>
    </2>
</table>
</fieldset>