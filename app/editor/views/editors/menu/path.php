<div class="input-group"><label for="strokeWidth" class="sm block">strokeWidth</label>
    <input id="strokeWidth" name="strokeWidth" type="number" data-properties="strokeWidth" class=" setSelect strokeWidth val-session form-control xs" min="0" value="<?php echo $d['val']['size']?? "1" ?>">
    </div>
<div class="input-group input-colors colorpicker-element">
     <label for="strokeColor" class="sm block">strokeColor</label>
        <span class="input-group-addon block"><i style=""></i></span>
        <input type="text" value="#242424" data-properties="strokeColor"   class="form-control hide" name="strokeColor" id="strokeColor">
    </div>
    <div class="input-group input-colors colorpicker-element">
        <label for="fillColor" class="sm block">fillColor</label>
        <span class="input-group-addon block"><i style=""></i></span>
        <input type="text" value="#fff" data-properties="fillColor" class=" setSelect form-control hide" name="fillColor" id="fillColor">
    </div>
<div class="input-group">|</div>
    <div class="input-group">
        <select id="strokeCap" name="strokeCap" data-properties="strokeCap" class="c-select setSelect">
            <option value="round">round</option>
            <option value="square">square</option>
            <option value="butt">butt</option>
        </select>
    </div>
<div class="input-group">|</div>
<div class="input-group">
    <label for="dash" class="sm block">dash</label>
    <input type="checkbox" id="dash" value="dash"></div>
<div class="input-group">
    <label for="dash_x" class="sm block">Dash X</label>
    <input id="dash_x" name="dash[0]" type="number" class=" setSelect form-control xs"  min="0"  value="<?php echo $d['val']['dash_x']?? "5" ?>">
</div>
<div class="input-group">
    <label for="dash_w" class="sm block">Dash W</label>
    <input id="dash_w" name="dash[1]" type="number" class=" setSelect form-control xs"  min="0"  value="<?php echo $d['val']['dash_w']?? "10" ?>">
</div>
<div class="input-group">|</div>
<div class="input-group xs">
   <label for="opacity" class="sm block">Opacity</label>
        <input id='opacity' name="opacity" data-slider-width="100" data-slider-id='opacity' class="setSelect slider" data-properties="opacity" type="text" data-slider-min='0' data-slider-max='1' data-slider-step="0.01" value='1'>
</div>
<div class="input-group xs">
   <label for="scaling" class="sm block">scaling</label>
        <input id='scaling' name="scaling" data-slider-width="100" data-slider-id='scaling' class="setSelect slider" data-properties="scaling" type="text" data-slider-min='0' data-slider-max='100' data-slider-step="10" value='1'>
</div>

<div class="input-group">|</div>
<div class="input-group ">
    <label for="rotation" class="sm block">Rotation</label>
    <input id='rotation' name="rotation" data-slider-id='rotation' class="setSelect  form-control xs" data-width="32" data-height="32" data-properties="rotation" type="number" data-slider-min='0' data-slider-max='360' data-slider-step="1" data-slider-value='0' value='0' data-displayInput=false>
</div>
<div class="input-group">|</div>
<div class="input-group">
    <label for="pivot_x" class="sm block">Pivot x</label>
    <input id='pivot_x' class="setSelect form-control xs" name="pivot[0]" data-properties="pivot_x" type="number" value='0'>
</div>
<div class="input-group">
    <label for="pivot_y" class="sm block">Pivot y</label>
    <input id='pivot_y' class="setSelect form-control xs" name="pivot[1]" data-properties="pivot_y" type="number" value='0'>
</div>
<div class="input-group">|</div>
<div class="input-group">
    <select id='blendMode' class="setSelect c-select form-control" data-properties="blendMode" name="blendMode"  min='0' max='1' >
        <?php foreach (DRAW_BLEND as $key => $value): ?>
            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
        <?php endforeach ?>
    </select>
</div>
<div class="input-group">|</div>
<div class="btn-group btn-group-sm">
   <a href="#" class="btn btn-primary btn-pjs" data-pjs="copy"><i class="icomoon-copy3 "></i></a>
<!--    <a href="#" class="btn btn-primary btn-pjs" data-pjs="flipVertical"><i class="icomoon-flip-vertical2 "></i></a>
   <a href="#" class="btn btn-primary btn-pjs" data-pjs="flipHorizontal"><i class="icomoon-flip-horizontal2 "></i></a> -->
</div>