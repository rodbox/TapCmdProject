<div class="btn-group-vertical btn-group-sm">
    <?php foreach ($d as $key => $tool): ?>
        <a id="tool_<?php echo $tool['name'] ?>" href="<?php $c->urlExec('editor','draw_load_tool',['toolName'=>$tool['name']]) ?>" class="btn btn-primary  btn-sm btn-pjs btn-tool " data-tool="<?php echo $tool['name']; ?>" data-pjs="loadTool" title="<?php echo $tool['name']; ?>" data-cb="initDrawMenu" data-cb-app="editor"><i class="<?php echo $tool['ico']; ?>"></i></a>
    <?php endforeach ?>
</div>
<div class="btn-group-sm">
    <div class="input-group input-colors-right">
        <span class="input-group-addon"><i></i></span>
        <input type="text" id="color1" name="color1" class="strokeColor form-control" id="color1" placeholder="" value="<?php echo $d['color1'] ?? '#242424';?>" />
    </div>
    <div class="input-group input-colors-right">
        <span class="input-group-addon"><i></i></span>
        <input type="text" id="color2" name="color2" class="fillColor form-control" id="color2" placeholder="" value="<?php echo $d['color2'] ?? '#fff';?>" />
    </div>
</div>