<div class="card">
<?php $c->view("editor","draw-layer-contextmenu"); ?>
<!-- NAVTABS : Items  -->
<!-- BEGIN NAVTABS : Items  -->
<ul class="nav nav-tabs" id="Items"  style="margin:0px !important;">
    <li class="nav-item ">
        <a class="nav-link active" data-toggle="tab" href="#Items-tab-1" aria-expanded="true"> <i class="fa fa-list"></i> Calques</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#Items-tab-2" aria-expanded="false">Symbols</a>
    </li>  <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#Items-tab-3" aria-expanded="false">Styles</a>
    </li>

</ul>
<!-- END NAVTABS : Items  -->
<!-- BEGIN TABSCONTENT  -->
<div class="tab-content  " style="padding:0px !important;">
    <!-- TABS 1  -->
    <div id="Items-tab-1" class="tab-pane active">
      <div class="btn-group-sm" style="padding:0rem 1rem ;">
       <a id="createGroup" href="#" class="btn-pjs btn btn-default" data-pjs="createGroup" title="createGroup"><i class="fa fa-folder-o"></i></a>
       <a id="createLayer" href="#" class="btn-pjs btn btn-default" data-pjs="createLayer" title="createLayer"><i class="fa fa-plus"></i></a>
       <a id="selectRemove" href="#" class="btn-pjs btn btn-default" data-pjs="selectRemove" title="selectRemove"><i class="fa fa-close"></i></a>
       <a id="unselect" href="#" class="btn-pjs btn btn-default" data-pjs="unselect" title="unselect"><i class="fa fa-check-square"></i></a>
       <input id="searchLayer" type="text" class="btn btn-secondary" style="width:110px;" />
      </div>

   <div class="card-block h-50 overflow"">
      <ul id="layers" class="layers list-group">
      </ul>
   </div>
    </div>
    <!-- END TABS 1  -->
    <!-- TABS 2  -->
    <div id="Items-tab-2" class="tab-pane">
      <ul id="symbols" class="symbols list-group"></ul>
    </div>

    <div id="Items-tab-3" class="tab-pane">
      <ul id="styles" class="styles list-group"></ul>
    </div>
    <!-- END TABS 2  -->

</div>
<!-- END TABSCONTENT  -->
<!-- END NAVTABS Items -->


</div>

