<!-- NAVTABS : titleTabs  -->
<!-- BEGIN NAVTABS : titleTabs  -->
<ul class="nav nav-tabs" id="titleTabs">
 <li class="nav-item ">
        <a class="nav-link active" data-toggle="tab" href="#titleTabs-tab-3" aria-expanded="true">Infos</a>
    </li>
     <li class="nav-item">
        <a class="nav-link " data-toggle="tab" href="#titleTabs-tab-2" aria-expanded="false">Views</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link " data-toggle="tab" href="#titleTabs-tab-1" aria-expanded="false">Controller</a>
    </li>


</ul>
<!-- END NAVTABS : titleTabs  -->
<!-- BEGIN TABSCONTENT  -->
<div class="tab-content">
    <!-- TABS 1  -->
    <div id="titleTabs-tab-1" class="tab-pane ">
        <div class="btn-group-vertical" data-toggle="buttons">
        <?php foreach ($d['controllers'] as $key => $controller): ?>
            <label for="over_controller_<?php echo $key; ?>" class="btn btn-primary">
                <input type="checkbox" value="<?php echo $controller; ?>" name="overide[controllers]"  autocomplete="off"  id="over_controller_<?php echo $key; ?>"/><?php echo $controller; ?>
            </label>
        <?php endforeach ?>
        </div>
        </div>
    <!-- END TABS 1  -->
    <!-- TABS 2  -->
    <div id="titleTabs-tab-2" class="tab-pane ">
        <div class="btn-group-vertical" data-toggle="buttons">
         <?php foreach ($d['views'] as $key => $views): ?>
            <label for="over_views_<?php echo $key; ?>" class="btn btn-primary">
                <input type="checkbox" value="<?php echo $views; ?>" name="overide[views]"  autocomplete="off"  id="over_views_<?php echo $key; ?>"/><?php echo $views; ?>
            </label>
        <?php endforeach ?>
        </div>
    </div>
    <!-- END TABS 2  -->

    <!-- TABS 3  -->
    <div id="titleTabs-tab-3" class="tab-pane active">
    <?php $c->getMd($d['readme']); ?>
    </div>
    <!-- END TABS 3  -->

</div>
<!-- END TABSCONTENT  -->
<!-- END NAVTABS titleTabs -->
<hr>
<button id="" data-toggle="Submit" class="btn btn-success" type="button" aria-pressed="false">Overide</button>