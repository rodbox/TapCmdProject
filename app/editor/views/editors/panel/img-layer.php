<div class="card">
    <div class="card-header"><a href="#" class="btn-pjs" data-pjs="updLayer"> <i class="fa fa-list"></i> Calques</a></div>

    <div class="card-block ">
       <select id='blend' class="setSelect c-select form-control" data-properties="blendMode"  min='0' max='1' >
       <?php foreach (DRAW_BLEND as $key => $value): ?>
           <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
       <?php endforeach ?>
       </select>
   </div>

   <div class="btn-group-sm" style="padding:0rem 1rem ;">
       <a id="createGroup" href="#" class="btn-pjs btn btn-default" data-pjs="createGroup" title="createGroup"><i class="fa fa-folder-o"></i></a>
       <a id="createLayer" href="#" class="btn-pjs btn btn-default" data-pjs="createLayer" title="createLayer"><i class="fa fa-plus"></i></a>
       <a id="unselect" href="#" class="btn-pjs btn btn-default" data-pjs="unselect" title="unselect"><i class="fa fa-check-square"></i></a>
       <input id="searchLayer" type="text" class="btn btn-secondary" style="width:110px;" />
      </div>

   <div class="card-block h-50 overflow">
      <ul id="layers" class="sortable list-group">
      </ul>
   </div>
</div>