<fieldset>
    <h2>Icone</h2>
    <table class="table table-sm">
        <tbody>
            <tr>
                <td rowspan="3"><?php
        $ico = new app();
        $ico->getIcon($d['name']);
        $ico->getFav($d['name']);
        ?></td>
                <td colspan="2">  <div class="input-group">
                <input type="text" name="shortname" class="form-control" id="shortname" placeholder="Short Name"  value="<?php echo $d['shortname'] ?? ''; ?>" />
                <span class="input-group-btn">
                    <a href="<?php $c->urlPopup('app','icon_generator'); ?>" class="btn btn-secondary btn-popup " title="icon" data-form='#form-config' data-backdrop="static" data-popup='paper' target='blank'><i class="fa fa-magic"></i></a>
                </span>
            </div></td>

            </tr> <tr>

                <td><div class="input-group input-colors">
                    <input type="text" name="color[color]" value="<?php echo $d['color']['color'] ?? '#fff'; ?>" class="form-control" />
                    <span class="input-group-addon"><i></i></span>
                </div></td>
                <td><div class="input-group input-colors">
                    <span class="input-group-addon"><i></i></span>
                    <input type="text" name="color[bg]" value="<?php echo $d['color']['bg'] ?? '#242424'; ?>" class="form-control" />
                </div></td>
            </tr> <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

</fieldset>
<fieldset class="">
    <h2>Type</h2>
    <!-- input : type -->
    <div class="btn-group">
        <label for="type_sf" class="btn btn-secondary">Symfony
            <input type="radio" name="type" class="form-control" required="required" <?php echo ($d['type'] =='Symfony')?'checked="checked"':'' ?> id="type_sf" value="Symfony" />
        </label>
        <label for="type_rb" class="btn btn-secondary">Rodbox
            <input type="radio" name="type" class="form-control" required="required" <?php echo ($d['type'] =='Rodbox')?'checked="checked"':'' ?> id="type_rb" value="Rodbox" />
        </label>
    </div>
    <!-- end input : type -->
</fieldset>
<fieldset class="">
    <h2>Langues</h2>
    <!-- input : type -->
    <div class="btn-group">
        <?php foreach (TRANS_SETTING as $lang => $langValue): ?>
        <label for="trans-<?php echo $langValue ?>" class="btn btn-secondary"><?php echo $langValue ?>
            <input type="checkbox" name="langs[<?php echo $lang ?>]" class="form-control" <?php echo (in_array($lang, $d['langs'] ?? []) == $lang)?'checked="checked"':'' ?> id="trans-<?php echo $langValue ?>" value="<?php echo $langValue ?>" />
        </label>
        <?php endforeach ?>
    </div>
    <!-- end input : type -->
</fieldset>
<fieldset><h2>Lessmaster <?php $c->helper('Liste des fichiers .less sources'); ?></h2>
    <ul style="list-style: none;">
    <?php foreach ($d['css']['lessmaster'] as $keyLessmaster => $lessmaster): ?>
        <li><div class="input-group">
            <input name="css['lessmaster'][]" type="text" value="<?php echo $lessmaster; ?>" class="form-control" />
              <div class='input-group-btn'><a href='#' class='btn-secondary btn-del btn' data-target='li'><i class='fa fa-remove'></i></a>
              </div>
           </div></li>
        </li>
    <?php endforeach ?>
    </ul></fieldset>
<fieldset>
    <h2>Color <a href="<?php $c->urlExec('app','less') ?>" class="label label-default btn-exec" data-form="#form-config" title="less">less</a>
    <?php $c->helper('Compile le fichier de variable Less dans le dossier de gestion de projet'); ?>
</h2>
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
<h2>Vars </h2>
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