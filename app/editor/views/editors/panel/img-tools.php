<div class="btn-group-vertical btn-group-sm">
<?php foreach ($d as $key => $tool): ?>
    <a href="<?php $c->urlExec('editor','draw_load_tool',['toolName'=>$tool['name']]) ?>" class="btn btn-primary btn-sm btn-pjs" data-tool="<?php echo $tool['name']; ?>" data-pjs="loadTool" title="<?php echo $tool['name']; ?>"><i class="<?php echo $tool['ico']; ?>"></i></a>
<?php endforeach ?>
</div>


<div class="btn-group-sm">
    <div class="input-group input-colors">
    <span class="input-group-addon"><i></i></span>
                <input type="text" id="color1" name="color1" class="form-control" id="color1" placeholder="" value="<?php echo $d['color1'] ?? '#242424';?>" />

            </div>
            <div class="input-group input-colors">
                <span class="input-group-addon"><i></i></span>
                <input type="text" id="color2" name="color2" class="form-control" id="color2" placeholder="" value="<?php echo $d['color2'] ?? '#fff';?>" />
            </div>
</div>