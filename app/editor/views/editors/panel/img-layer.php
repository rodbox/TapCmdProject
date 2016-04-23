<div class="card">
    <div class="card-header"><a href="#" class="btn-pjs" data-pjs="updLayer"> <i class="fa fa-list"></i> Calques</a></div>
    <div class="card-block ">
        <label for="alpha">Opacity</label>
        <input id='alpha' data-slider-id='alpha' class="setSelect slider" data-properties="opacity" type="text" data-slider-min='0' data-slider-max='1' data-slider-step="0.01" value='1'>

        <label for="rotate">Rotate</label>
        <input id='rotate' data-slider-id='rotate' class="setSelect slider" data-properties="rotation" type="text" data-slider-min='0' data-slider-max='360' data-slider-step="1" value='1'>

    </div>
    <div class="card-block ">
       <select id='blend' class="setSelect c-select form-control" data-properties="blendMode"  min='0' max='1' >
       <?php foreach (DRAW_BLEND as $key => $value): ?>
           <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
       <?php endforeach ?>
       </select>
   </div>
   <div class="card-block h-50 overflow">
        <ul id="layers" class="list-group sortable">
    </ul>
   </div>
</div>