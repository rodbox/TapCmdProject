<div class="input-group">
     <input id="size" type="text" class="slider val-session form-control" data-slider-min="1" data-slider-max="30" data-slider-value="<?php echo $_SESSION['val']['size']?? "1" ?>" value="<?php echo $_SESSION['val']['size']?? "1" ?>">
     <div class="input-group-addon value"></div>
</div>
<input type="checkbox" id="dash" value="dash">
<div class="input-group">

     <input id="dash_x" type="text" class="form-control"  value="<?php echo $_SESSION['val']['dash_x']?? "5" ?>">
     </div>
     <div class="input-group">
     <input id="dash_w" type="text" class="form-control"  value="<?php echo $_SESSION['val']['dash_w']?? "10" ?>">
</div>